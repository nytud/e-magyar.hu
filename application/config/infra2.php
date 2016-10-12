<?php

$config['gate_path'] = "/home/joker/GATE_Developer_8.1";
$config['hunlp_path'] = "/home/gerocs/hunlp-GATE";

$config['port'] = 8000;

$config['maxchar'] = 6000;

/*$config['modules'] = array(
    'tokenizer' => "hu.nytud.gate.tokenizers.QunTokenCommandLine",
	//'tokenizer' => "hu.nytud.gate.tokenizers.MagyarlancSentenceSplitterTokenizer",	
    'pos_tagger' => "hu.nytud.gate.postaggers.MagyarlancPOSTaggerLemmatizer",
    'dep_parser' => "hu.nytud.gate.parsers.MagyarlancDependencyParser",
    'morph_anal' => "hu.nytud.gate.morph.HFSTMorphJava",
    'ner_tagger' => "",
    'np_chunker' => "hu.nytud.gate.othertaggers.Huntag3NPChunkerCommandLine",
    'preverb_id' => "hu.nytud.gate.parsers.PreverbIdentifier",
    'iob_converter' => "hu.nytud.gate.converters.Iob2Annot inputIobAnnotAttrib NP-BIO outputAnnotationName NP"
);*/

/*$config['modules'] = array(
    'tokenizer' => "hu.nytud.gate.tokenizers.QunTokenCommandLine",
    'pos_tagger' => "com.precognox.kconnect.gate.magyarlanc.HungarianLemmatizerPosTagger",
    'dep_parser' => "hu.nytud.gate.parsers.Magyarlanc3DependencyParser",
	'const_parser' => "hu.nytud.gate.parsers.Magyarlanc3ConstituencyParser",
    'morph_anal' => "hu.nytud.gate.morph.HFSTMorphJava",
    'ner_tagger' => "",
    'np_chunker' => "hu.nytud.gate.othertaggers.Huntag3NPChunkerCommandLine",
    'preverb_id' => "hu.nytud.gate.parsers.PreverbIdentifier",
    'iob_converter' => "hu.nytud.gate.converters.Iob2Annot inputIobAnnotAttrib NP-BIO outputAnnotationName NP"
);*/

/*$config['modules'] = array(
    'tokenizer' => array(0, "QT"),
	'morph_anal' => array(1, "HFSTLemm"),
    'pos_tagger' => array(2, "ML2-PosLem,ML3-PosLem"),
	//régi:
	'np_chunker' => array(3, "huntag3-NP-pipe"), //új: huntag3-NP-pipe 
    'dep_parser' => array(4, "ML3-Dep"),
	'const_parser' => array(5, "ML3-Cons"),    
    'ner_tagger' => array(6, ""),    
    'preverb_id' => array(7, "Preverb"),
    'iob_converter' => array(8, "IOB4NP")
);*/
//HFSTLemm

/*$config['modules'] = array(
    'tokenizer' => array(0, "QT"),
	'morph_anal' => array(1, "HFSTLemm"),
    'pos_tagger' => array(2, "ML3-PosLem"),	
	'dep_parser' => array(3, "ML3-Dep,Preverb"),
	'const_parser' => array(4, "ML3-Cons"),    
    'np_chunker' => array(5, "ML2-PosLem-pos,ML2-PosLem-feature,huntag3-NP-pipe,IOB4NP"),
	'ner_tagger' => array(6, "ML2-PosLem-pos,ML2-PosLem-feature,huntag3-NER-pipe,IOB4NER")
);*/
//HFSTLemm
//QT,ML2-PosLem-pos,ML2-PosLem-feature,huntag3-NP-pipe,huntag3-NER-pipe,IOB4NP,IOB4NER,HFSTLemm,ML3-PosLem,ML3-Dep,ML3-Cons,Preverb
//QT,HFSTLemm,ML3-PosLem,ML3-Dep,ML3-Cons,Preverb, ML2-PosLem-pos,ML2-PosLem-feature,huntag3-NP-pipe,huntag3-NER-pipe,IOB4NP,IOB4NER

$config['modules'] = array(
  'tokenizer' => array(0, "QT"),
  'morph_anal' => array(1, "HFSTLemm,readable-morpho"),
  'pos_tagger' => array(2, "ML3-PosLem-hfstcode"),	
  'dep_parser' => array(3, "ML3-Dep,Preverb"),
  'const_parser' => array(4, "ML3-Cons"),    
  'np_chunker' => array(5, "huntag3-NP-pipe-hfstcode,IOB4NP"),
  'ner_tagger' => array(6, "huntag3-NER-pipe-hfstcode,IOB4NER")
);