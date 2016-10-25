<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {

    private $language;

    function __construct() {
        parent::__construct();
//        $language = $this->session->userdata('language');
//        if (!isset($language)) {
//            $this->session->set_userdata('language', "hu");
//        }
//        //$this->language = "hu";
//        $this->language = $this->session->userdata('language');	
//        $this->lang->load($this->language . "_lang", $this->language);
        $this->lang->load($this->config->item('language_abbr') . "_lang", $this->config->item('language'));
    }

    public function index() {
        $this->home();
    }

    public function home() {
        $data['content'] = "home";
        $data['menuitems'] = array(
            'home' => "active",
            'intro' => "",
            'textmodules' => "",
            'speechmodules' => "",
            'parser' => ""
        );
        $this->load->view('_layout/default', $data);
    }

    public function intro() {
        $data['content'] = "intro-" . $this->config->item('language_abbr');
        $data['menuitems'] = array(
            'home' => "",
            'intro' => "active",
            'textmodules' => "",
            'speechmodules' => "",
            'parser' => ""
        );
        $this->load->view('_layout/default', $data);
    }
    
    public function textmodules($module) {
        $data['content'] = "modules-" . $this->config->item('language_abbr') . "/" . $module;
        $data['menuitems'] = array(
            'home' => "",
            'intro' => "",
            'textmodules' => "active",
            'speechmodules' => "",
            'parser' => ""
        );
        $this->load->view('_layout/default', $data);
    }
    
    public function speechmodules($module) {
        $data['content'] = "modules-" . $this->config->item('language_abbr') . "/" . $module;
        $data['menuitems'] = array(
            'home' => "",
            'intro' => "",
            'textmodules' => "",
            'speechmodules' => "active",
            'parser' => ""
        );
        $this->load->view('_layout/default', $data);
    }

    public function parser() {
        $data['content'] = "parser";
        $data['menuitems'] = array(
            'home' => "",
            'intro' => "",
            'textmodules' => "",
            'speechmodules' => "",
            'parser' => "active"
        );
        $this->load->view('_layout/default', $data);
    }
    
    function error404() {   
        $data['content'] = "errors/html/error_404";
        $this->load->view('_layout/default', $data);
    }

//    function setSiteLang($lang = "hu") {
//        try {
//            $this->session->set_userdata('language', $lang);
//            if ($this->input->is_ajax_request()) {
//                echo json_encode(array('status' => true));
//                exit();
//            } else {
//                redirect();
//            }
//        } catch (Exception $ex) {
//            die($ex->getMessage());
//        }
//    }

}
