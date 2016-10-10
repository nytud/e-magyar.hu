<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ParserController extends CI_Controller {

    private $language;
    private $hunlppath;
    private $gatepath;
    private $configpath;
    private $logpath;
    private $temppath;
    private $zippath;
    private $tempurl;
    private $zipurl;
    private $zip_ext;

    function __construct() {
        parent::__construct();
        $language = $this->session->userdata('language');
        if (!isset($language)) {
            $this->session->set_userdata('language', "hu");
        }
        //$this->language = "hu";
        $this->language = $this->session->userdata('language');
        $this->lang->load($this->language . "_lang", $this->language);

        $this->hunlppath = $this->config->item("hunlp_path");
        $this->gatepath = $this->config->item("gate_path");
        $this->configpath = "/home/gerocs/hunlp-GATE/Lang_Hungarian/resources/pipeline/";

        $this->logpath = realpath(APPPATH . "/../parser_logs");
        $this->temppath = realpath(APPPATH . "/../temp");
        $this->zippath = realpath(APPPATH . "/../download");
        $this->tempurl = base_url() . "temp";
        $this->zipurl = base_url() . "download";
        $this->zip_ext = ".zip";
        $this->load->library('zip');
    }

    public function check() {
        try {

            $maxchar = $this->config->item("maxchar");

            $text = $this->input->post("text");
            $modules = $this->input->post("module");

            if (empty($text)) {
                throw new Exception("No input text submitted.");
            }
            if (mb_strlen(stripslashes($text), 'UTF-8') > $maxchar) {
                throw new Exception("Input is too long. Maximum " . $maxchar . " characters is allowed.");
            }
            if (empty($modules)) {
                throw new Exception("No modules selected.");
            }

            $this->createLog($text, $modules);

            $tempname = "post" . uniqid();

            $input = $this->cleanText($text);

            file_put_contents($this->temppath . "/" . $tempname . "_orig.txt", htmlspecialchars($input));

            //régi pipeline
            //$configfile = $this->getConfig($modules);
            //file_put_contents($this->temppath . "/" . $tempname . "_config.config", $configfile); 
            //compiles shell command
            //$xml = shell_exec('cd ' . $this->hunlppath . '; make GATE_HOME=' . $this->gatepath . ' PIPELINE_INPUT=' . $this->temppath . '/' . $tempname . '_orig.txt CONFIG=' . $this->temppath . "/" . $tempname . "_config.config" . ' pipeline');
            //$xml = shell_exec('cd ' . $this->hunlppath . '; make GATE_HOME=' . $this->gatepath . ' PIPELINE_INPUT=' . $this->temppath . '/' . $tempname . '_orig.txt CONFIG=' . $configfile . ' pipeline');
            //új pipeline
            $config = $this->getConfig($modules);

            //$xml = file_get_contents("http://localhost:8000/process?run=QT,HFST,ML3-PosLem,ML3-Dep,ML3-Cons,Preverb,IOB4NP&text=A+kutya+nem+ugat,+hanem+el+is+alszik.");
            //$xml = file_get_contents("http://localhost:8000/process?run=QT,HFST,ML2-PosLem,ML3-PosLem,ML3-Dep,ML3-Cons,huntag3-NP,Preverb,IOB4NP&text=A+kutya+nem+ugat,+hanem+el+is+alszik.");
            //$url = "http://localhost:8000/process?run=" . $config . "&text=" . urlencode($text);
            //hack!
            $url = "http://localhost:" . $this->config->item('port') . "/process?run=" . $config . "&text=" . str_replace("%0D%0A", "%0A", urlencode($text));

            set_time_limit(300);
            $xml = file_get_contents($url);

            /* $xml = preg_replace('/(.*)?(<GateDocument .*)/s', '$2', $xml);
              $xml = "<?xml version='1.0' encoding='UTF-8'?>\n" . $xml; */

            file_put_contents($this->temppath . "/" . $tempname . "_output.xml", $xml);                  

            $this->createTSV($this->temppath, $tempname . "_output.xml", $tempname . "_output.tsv");

            $files = array(
                $this->temppath . "/" . $tempname . "_orig.txt",
                $this->temppath . "/" . $tempname . "_output.xml",
                $this->temppath . "/" . $tempname . "_output.tsv"
            );
            $this->createZip($files, $this->zippath, $tempname);

            $files[] = $this->temppath . "/" . $tempname . "_config.config";

            $this->clean($files);

            $url = $this->tempurl . "/" . $tempname . "_output.xml";
            $zipurl = $this->zipurl . "/" . $tempname . $this->zip_ext;

            echo json_encode(array('status' => true, 'xml' => $xml, 'zipurl' => $zipurl, 'modules' => $modules), JSON_PRETTY_PRINT);
            exit();
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    private function createLog($text, $modules) {
        if (!function_exists("getClientIP")) {

            function getClientIP() {
                $ipaddress = '';
                if (isset($_SERVER['HTTP_CLIENT_IP']))
                    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
                else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
                else if (isset($_SERVER['HTTP_X_FORWARDED']))
                    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
                else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
                    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                else if (isset($_SERVER['HTTP_FORWARDED']))
                    $ipaddress = $_SERVER['HTTP_FORWARDED'];
                else if (isset($_SERVER['REMOTE_ADDR']))
                    $ipaddress = $_SERVER['REMOTE_ADDR'];
                else
                    $ipaddress = 'UNKNOWN';
                return $ipaddress;
            }

        }
        $ip = getClientIP();
        $date = date("Y-m-d H:i:s");
        $length = strlen($text);
        $log = $ip . "\t" . $length . "\t" . $date . "\t";
        for ($i = 0; $i < count($modules); $i++) {
            $log .= $modules[$i];
            if ($i !== count($modules) - 1) {
                $log .= ", ";
            }
        }
        $log .= "\n";
        file_put_contents($this->logpath . "/logs.txt", $log, FILE_APPEND);
    }

    private function cleanText($text) {
        return strip_tags(trim(str_replace("\r\n", "\n", $text)));
        return $text;
    }

    private function getConfig($selected_modules) {

        if (!function_exists("addToConfig")) {

            function addToConfig($required, $config) {
                foreach ($required as $r) {
                    if (!in_array($r, $config)) {
                        $config[] = $r;
                    }
                }
                return $config;
            }

        }

        $modules = $this->config->item('modules');

        $config = [];

        if (in_array("ner", $selected_modules)) {
            $required = [$modules['tokenizer'], $modules['ner_tagger']];
            $config = addToConfig($required, $config);
        }
        if (in_array("npchunk", $selected_modules)) {
            $required = [$modules['tokenizer'], $modules['np_chunker']];
            $config = addToConfig($required, $config);
        }
        if (in_array("syntax", $selected_modules)) {
            $required = [$modules['tokenizer'], $modules['pos_tagger'], $modules['dep_parser'], $modules['const_parser']];
            $config = addToConfig($required, $config);
        }
        if (in_array("pos", $selected_modules)) {
            $required = [$modules['tokenizer'], $modules['pos_tagger']];
            $config = addToConfig($required, $config);
        }
        if (in_array("morph", $selected_modules)) {
            $required = [$modules['tokenizer'], $modules['morph_anal']];
            $config = addToConfig($required, $config);
        }
        if (in_array("token", $selected_modules)) {
            $required = [$modules['tokenizer']];
            $config = addToConfig($required, $config);
        }

        //régi pipeline
        //$config = implode("\n", $config);
        //új pipeline
        //sort modules
        usort($config, function($a, $b) {
            if ($a[0] == $b[0])
                return 0;
            return ($a[0] < $b[0]) ? -1 : 1;
        });
        $config = implode(',', array_map(function ($a) {
                    return $a[1];
                }, $config));

        return $config;
    }

    private function createTSV($path, $xmlname, $tsvname) {

        if (!function_exists("getLine")) {

            function getLine($features) {
                $line = "";
                if (array_key_exists('string', $features)) {
                    $line .= $features['string'];
                }
                $line .= "\t";
                if (array_key_exists('anas', $features)) {
                    $line .= $features['anas'];
                }
                $line .= "\t";
                if (array_key_exists('feature', $features)) {
                    $line .= $features['feature'];
                }
                $line .= "\t";
                if (array_key_exists('lemma', $features)) {
                    $line .= $features['lemma'];
                }
                $line .= "\t";
                if (array_key_exists('hfstana', $features)) {
                    $line .= $features['hfstana'];
                }
                $line .= "\t";
                if (array_key_exists('pos', $features)) {
                    $line .= $features['pos'];
                }
                $line .= "\t";
                if (array_key_exists('depType', $features)) {
                    $line .= $features['depType'];
                }
                $line .= "\t";
                if (array_key_exists('depTarget', $features)) {
                    $line .= $features['depTarget'];
                }
                $line .= "\t";
                if (array_key_exists('cons', $features)) {
                    $line .= $features['cons'];
                }
                $line .= "\t";

                $line .= "\n";
                return $line;
            }

        }

        $doc = new DOMDocument();
        $doc->load($path . "/" . $xmlname);
        $annotationSet = $doc->getElementsByTagName("AnnotationSet");
        $annotations = $annotationSet->item(0)->getElementsByTagName("Annotation");

        if (file_exists($this->temppath . "/" . $tsvname)) {
            unlink($this->temppath . "/" . $tsvname);
        }

        $sentenceStartNodes = [];
        $sentenceEndNodes = [];

        foreach ($annotations as $annot) {

            $type = $annot->getAttribute('Type');

            if ($type === "Sentence") {
                $sentenceStartNodes[] = $annot->getAttribute('StartNode');
                $sentenceEndNodes[] = $annot->getAttribute('EndNode');
            }
        }

        $handle = fopen($this->temppath . "/" . $tsvname, "a");

        fwrite($handle, "ID\tstring\tanas\tfeature\tlemma\thfstana\tpos\tdepType\tdepTarget\tcons\n");

        foreach ($annotations as $annot) {
            $fullline = "";
            $type = $annot->getAttribute('Type');
            $tid = $annot->getAttribute('Id');
            $startNode = $annot->getAttribute('StartNode');
            $endNode = $annot->getAttribute('EndNode');
            if ($type === "Token") {

                if (in_array($startNode, $sentenceStartNodes)) {
                    $fullline .= "<s>\n";
                }

                $fullline .= $tid . "\t";
                $fts = array();
                $features = $annot->getElementsByTagName("Feature");
                foreach ($features as $feature) {
                    $name = $feature->getElementsByTagName("Name")->item(0);
                    $value = $feature->getElementsByTagName("Value")->item(0);
                    $fts[$name->nodeValue] = $value->nodeValue;
                }
                $fullline .= getLine($fts);

                if (in_array($endNode, $sentenceEndNodes)) {
                    $fullline .= "</s>\n";
                }

                fwrite($handle, $fullline);
            }
        }
        fclose($handle);
    }

    private function createZip($files, $path, $filename) {
        foreach ($files as $file) {
            $this->zip->read_file($file);
        }
        $this->zip->archive($path . "/" . $filename . $this->zip_ext);
    }

    private function clean($files) {
        foreach ($files as $file) {
            if (file_exists($file)) {
                unlink($file);
            }
        }
    }

}
