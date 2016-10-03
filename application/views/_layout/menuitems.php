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
    <a href="<?php echo base_url(); ?>home"><?= $this->lang->line("menu_home"); ?></a>
</li>
<li class="<?= $menuitems['intro']; ?>">
    <a href="<?php echo base_url(); ?>intro"><?= $this->lang->line("menu_intro"); ?></a>
</li>
<li class="dropdown two <?= $menuitems['textmodules']; ?>">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $this->lang->line("menu_textparser"); ?> <span class="caret"></span></a>    
    <ul class="dropdown-menu">        
        <li><a href="<?php echo base_url(); ?>textmodules/textoverview"><?= $this->lang->line("overview"); ?></a></li>
		<li class="divider"></li>
        <li><a href="<?php echo base_url(); ?>textmodules/emtoken"><?= $this->lang->line("emtoken"); ?></a></li>
        <li><a href="<?php echo base_url(); ?>textmodules/emmorph"><?= $this->lang->line("emmorph"); ?></a></li>
        <li><a href="<?php echo base_url(); ?>textmodules/emlem"><?= $this->lang->line("emlem"); ?></a></li>
        <li><a href="<?php echo base_url(); ?>textmodules/emtag"><?= $this->lang->line("emtag"); ?></a></li>
        <li><a href="<?php echo base_url(); ?>textmodules/emcons"><?= $this->lang->line("emconst"); ?></a></li>
        <li><a href="<?php echo base_url(); ?>textmodules/emdep"><?= $this->lang->line("emdep"); ?></a></li>
        <li><a href="<?php echo base_url(); ?>textmodules/emchunk"><?= $this->lang->line("emchunk"); ?></a></li>        
        <li><a href="<?php echo base_url(); ?>textmodules/emner"><?= $this->lang->line("emner"); ?></a></li>        
        <li class="divider"></li>
        <li><a href="<?php echo base_url(); ?>textmodules/gate"><?= $this->lang->line("gate"); ?></a></li>
        <li class="divider"></li>
        <li><a href="<?php echo base_url(); ?>textmodules/emlam"><?= $this->lang->line("emlam"); ?></a></li>
    </ul>
</li>
<li class="dropdown <?= $menuitems['speechmodules']; ?>">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $this->lang->line("menu_speechparser"); ?> <span class="caret"></span></a>    
    <ul class="dropdown-menu"> 
        <li><a href="<?php echo base_url(); ?>speechmodules/speechoverview"><?= $this->lang->line("overview"); ?></a></li>
		<li class="divider"></li>
        <li><a href="<?php echo base_url(); ?>speechmodules/emsad"><?= $this->lang->line("emsad"); ?></a></li>
        <li><a href="<?php echo base_url(); ?>speechmodules/emdia"><?= $this->lang->line("emdia"); ?></a></li>
        <li><a href="<?php echo base_url(); ?>speechmodules/emlid"><?= $this->lang->line("emlid"); ?></a></li>               
        <li class="divider"></li>
        <li><a href="<?php echo base_url(); ?>speechmodules/speechdb"><?= $this->lang->line("speechdb"); ?></a></li> 
    </ul>
</li>
<li class="<?= $menuitems['parser']; ?>">
    <a href="<?php echo base_url(); ?>parser"><?= $this->lang->line("menu_parser"); ?></a>
</li>
<li class="langswitch-xs visible-xs <?php echo $this->session->userdata("language") == "hu" ? "active" : ""; ?>">
    <a href="<?php echo base_url(); ?>language/hu">hu</a>
<!--    <a href="#">hu</a>-->
</li>
<li class="langswitch-xs visible-xs <?php echo $this->session->userdata("language") == "en" ? "active" : ""; ?>">
    <a href="<?php echo base_url(); ?>language/en">en</a>
<!--    <a href="#">en</a>-->
</li>
<hr class="hidden-xs" />