<?php
if (empty($menuitems)) {
    $menuitems = array(
        'home' => "",
        'intro' => "",
        'textmodules' => "",
        'speechmodules' => "",
        'parser' => ""
    );
}
?>

<li class="visible-xs <?= $menuitems['home']; ?>">
    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/home"><?= $this->lang->line("menu_home"); ?></a>
</li>
<li class="<?= $menuitems['intro']; ?>">
    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/intro"><?= $this->lang->line("menu_intro"); ?></a>
</li>
<li class="dropdown two <?= $menuitems['textmodules']; ?>">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $this->lang->line("menu_textparser"); ?> <span class="caret"></span></a>    
    <ul class="dropdown-menu">        
        <li><a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/textoverview"><?= $this->lang->line("overview"); ?></a></li>
        <li class="divider"></li>
        <li><a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emtoken"><?= $this->lang->line("emtoken"); ?></a></li>
        <li><a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emmorph"><?= $this->lang->line("emmorph"); ?></a></li>
        <li><a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emlem"><?= $this->lang->line("emlem"); ?></a></li>
        <li><a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emtag"><?= $this->lang->line("emtag"); ?></a></li>
        <li><a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emcons"><?= $this->lang->line("emconst"); ?></a></li>
        <li><a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emdep"><?= $this->lang->line("emdep"); ?></a></li>
        <li><a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emchunk"><?= $this->lang->line("emchunk"); ?></a></li>        
        <li><a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emner"><?= $this->lang->line("emner"); ?></a></li>        
        <li class="divider"></li>
        <li><a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/gate"><?= $this->lang->line("gate"); ?></a></li>
        <li class="divider"></li>
        <li><a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emlam"><?= $this->lang->line("emlam"); ?></a></li>
    </ul>
</li>
<li class="dropdown <?= $menuitems['speechmodules']; ?>">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $this->lang->line("menu_speechparser"); ?> <span class="caret"></span></a>    
    <ul class="dropdown-menu"> 
        <li><a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/speechmodules/speechoverview"><?= $this->lang->line("overview"); ?></a></li>
        <li class="divider"></li>
        <li><a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/speechmodules/emsad"><?= $this->lang->line("emsad"); ?></a></li>
        <li><a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/speechmodules/emdia"><?= $this->lang->line("emdia"); ?></a></li>
        <!--<li><a href="<?php //echo base_url(); ?><?php //echo $this->config->item('language_abbr'); ?>/speechmodules/emlid"><?php //echo $this->lang->line("emlid"); ?></a></li>-->               
        <li><a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/speechmodules/prosotool"><?= $this->lang->line("prosotool"); ?></a></li>               
        <li class="divider"></li>
        <li><a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/speechmodules/speechdb"><?= $this->lang->line("speechdb"); ?></a></li> 
    </ul>
</li>
<li class="<?= $menuitems['parser']; ?>">
    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/parser"><?= $this->lang->line("menu_parser"); ?></a>
</li>
<li class="langswitch-xs visible-xs <?php echo $this->config->item('language_abbr') == "hu" ? "active" : ""; ?>">
    <a href="<?php echo base_url(); ?>hu<?php echo $this->uri->uri_string(); ?>">hu</a>
    <!--    <a href="#">hu</a>-->
</li>
<li class="langswitch-xs visible-xs <?php echo $this->config->item('language_abbr') == "en" ? "active" : ""; ?>">
    <a href="<?php echo base_url(); ?>en<?php echo $this->uri->uri_string(); ?>">en</a>
    <!--    <a href="#">en</a>-->
</li>
<hr class="hidden-xs" />