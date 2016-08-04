
<nav id="navigation" class="navbar navbar-default navbar-static-top hidden-xs" role="navigation">       
    <div class="navbar-header col-xs-12 col-sm-4 col-md-4 col-lg-3">
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>css/images/e-magyar-logo-hu<?php // $this->session->userdata('language'); ?>.png" alt="<?= $this->lang->line('brand'); ?>" class="img-responsive" /></a>
    </div>
    <div class="navbar-nav-wrapper">
        <ul class="nav navbar-nav">
            <?php $this->load->view('_layout/menuitems'); ?>
        </ul>
    </div>    
    <div id="langswitch" class="navbar-right langswitch lgray">
        <?php //$this->load->view('_layout/langswitch'); ?>
    </div>    
</nav>

<nav id="navigation-xs" class="navmenu navmenu-default navmenu-fixed-left offcanvas-xs hidden-sm hidden-md hidden-lg" role="navigation">    
    <ul class="nav navmenu-nav">
        <?php $this->load->view('_layout/menuitems'); ?>
    </ul>
</nav>

<div class="navbar navbar-default navbar-fixed-top visible-xs">    
    <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target="#navigation-xs" data-canvas="body">        
        <span class="icon-bar top-bar"></span>
        <span class="icon-bar middle-bar"></span>
        <span class="icon-bar bottom-bar"></span>
    </button>
    <div class="navbar-header logo-xs visible-xs">
        <div class="navbar-brand"><img src="<?php echo base_url(); ?>css/images/e-magyar-logo-hu<?php // $this->session->userdata('language'); ?>.png" alt="<?= $this->lang->line('brand'); ?>" class="img-responsive" /></div>
    </div>
</div>
