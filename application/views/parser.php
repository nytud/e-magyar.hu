<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section>   

    <div id="tabs" style="display: none;">

        <ul>
            <li>
                <a id="tab1" href="#input">
                    <div><i class="fa fa-sign-in dgray"></i><span class="dblue"> <?= $this->lang->line("input_tab"); ?></span><p class="dgray"><?= $this->lang->line("input_tab_text"); ?></p></div>
                </a>
            </li>
            <li>
                <a id="tab2" href="#output">
                    <div><span class="dblue"><?= $this->lang->line("output_tab"); ?> </span><i class="fa fa-sign-out dgray"></i><p class="dgray"><?= $this->lang->line("output_tab_text"); ?></p></div>
                </a>
            </li>            
        </ul> 

        <div id="input" class="fullpage">
            <div class="row">
                <div class="col-xs-12 col-md-offset-1 col-lg-offset-2 col-md-10 col-lg-8">     
                    <h3 class="text-center dblue"><?= $this->lang->line("how_to_use"); ?></h3>
                    <p class="text-justify demo_guide">
                        <?= $this->lang->line("demo_guide"); ?>
                    </p>
                </div>
            </div>
            <form id="form" method="post" action="<?php echo base_url(); ?>parser/check" autocomplete="off" novalidate>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 col-sm-push-8 col-md-push-8 col-lg-push-8">
                        <label class="control-label"><?= $this->lang->line("modules"); ?></label>
                        <div class="checkbox"> 
                            <input type="hidden" name="module[]" value="token" >
                            <input type="checkbox" id="token" class="default" checked disabled><label for="token"><?= $this->lang->line("emtoken"); ?></label>                            
                            <span class="help" title="azonosítja a mondat- és szóhatárokat a szövegben"><i class="fa fa-question-circle"></i></span>
                        </div> 
                        <div class="checkbox">
                            <input type="hidden" id="morph_hidden" name="module[]" value="morph" disabled>
                            <input type="checkbox" id="morph"><label for="morph"><?= $this->lang->line("emmorph"); ?></label>                            
                            <span class="help" title="hozzárendeli a szöveg minden egyes szóalakjához annak összes lehetséges morfológiai, morfoszintaktikai elemzését"><i class="fa fa-question-circle"></i></span>
                        </div>
                        <div class="checkbox">
                            <input type="hidden" id="pos_hidden" name="module[]" value="pos" disabled>
                            <input type="checkbox" id="pos"><label for="pos"><?= $this->lang->line("emtag"); ?></label>                            
                            <span class="help" title="meghatározza a tokenek szófaji címkéjét"><i class="fa fa-question-circle"></i></span>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="module[]" id="syntax" value="syntax"><label for="syntax"><?= $this->lang->line("syntax_anal"); ?></label>
                            <span class="help" title="csoportokba rendezi az egy jelentéses egységet alkotó szavakat nyelvtani kategória alapján, illetve hozzárendeli a szavakhoz azok nyelvtani szerepeit (alany, tárgy stb.)"><i class="fa fa-question-circle"></i></span>
                        </div> 
                        <div class="checkbox">
                            <input type="checkbox" name="module[]" id="npchunk" value="npchunk"><label for="npchunk"><?= $this->lang->line("emchunk"); ?></label>
                            <span class="help" title="azonosítja a szövegben található főnévi csoportokat"><i class="fa fa-question-circle"></i></span>
                        </div>                                               
                        <div class="checkbox">
                            <input type="checkbox" name="module[]" id="ner" value="ner"><label for="ner"><?= $this->lang->line("emner"); ?></label>
                            <span class="help" title="azonosítja a szövegben található tulajdonneveket"><i class="fa fa-question-circle"></i></span>
                        </div>  
                        <!--<p><a href="<?php //echo base_url(); ?>modules"><?= $this->lang->line("more_about_modules"); ?></a></p>-->
                        <div class="row">
                            <div class="col-xs-12 hidden-xs">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-gears"></i> <?= $this->lang->line("submit"); ?></button>  
                            </div>                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6 col-md-offset-1 col-lg-offset-2 col-sm-pull-4 col-md-pull-4 col-lg-pull-3">                        
                        <div class="form-group">
                            <label class="control-label" for="text"><?= $this->lang->line("text_input"); ?></label>
                            <textarea id="text" class="form-control" name="text" placeholder="<?= $this->lang->line("placeholder"); ?>"></textarea>
                        </div>                        
                        <p id="form-feedback" class="form-feedback"></p>  
                        <span id="spinner" class="hidden"><img src="<?php echo base_url(); ?>loader.gif" /></span>
                        <div id="please_wait" class="hidden"><p><?= $this->lang->line("being_processed"); ?><br><?= $this->lang->line("take_a_while"); ?><br><?= $this->lang->line("please_wait"); ?></p></div>
                        <div class="visible-xs">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-gears"></i> <?= $this->lang->line("submit"); ?></button>  
                        </div>  
                    </div>                     
                </div>                               
            </form>           
        </div>

        <div id="output" class="fullpage">
            <div class="row">
                <div id="controls">                                       
                    <div id="filter" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="checkbox">
                            <input type="checkbox" id="tokens" value="token"><label for="tokens"><?= $this->lang->line("tokens"); ?></label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="sentences" value="sentence"><label for="sentences"><?= $this->lang->line("sentences"); ?></label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="npchunks" value="np"><label for="npchunks"><?= $this->lang->line("nps"); ?></label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="nes" value="ne"><label for="nes"><?= $this->lang->line("nes"); ?></label>
                        </div>
                    </div>              
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div id="download" class="pull-right">                        
                            <a id="download_link" href="" class="btn btn-sm btn-primary pull-right" download><i class="fa fa-download"></i> <?= $this->lang->line("download_output"); ?></a>                        
                        </div> 
                        <div id="orientation_switch" class="pull-right">
                            <div class="input-group input-group-sm">
                                <div class="input-group-btn input-group-btn-sm">
                                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->lang->line("view"); ?> <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" class="active" data-orientation="horizontal"><?= $this->lang->line("horizontal"); ?></a></li>
                                        <li><a href="#" data-orientation="vertical"><?= $this->lang->line("vertical"); ?></a></li>                                   
                                    </ul>
                                </div>
                                <input type="text" class="form-control" aria-label="..." value="<?= $this->lang->line("horizontal"); ?>" disabled>
                            </div>                            
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="row">
                <div id="parsed" class="col-xs-12">
                    <!-- placeholder for parsed text -->
                </div>
            </div> 
        </div>

    </div>
</section>

<div id="annot_modal" class="modal">
    <!-- placeholder fol annotations -->
</div>

<div id="deptree_modal" class="modal" title="<?= $this->lang->line("dep_tree"); ?>">
    <!-- placeholder fol dependency tree -->    
</div>

<div id="consttree_modal" class="modal" title="<?= $this->lang->line("const_tree"); ?>">
    <!--<div id="tree_wrapper" ></div>-->    
</div>

