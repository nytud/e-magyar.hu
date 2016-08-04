<!DOCTYPE html>
<html class="no-js" lang="hu">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>e-magyar.hu</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="MTA Nyelvtudományi Intézet">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="">

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/bootstrap/css/jasny-bootstrap.min.css" />  
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/bootstrap/css/awesome-bootstrap-checkbox.css" />  
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/datatables/media/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/datatables/extensions/FixedHeader/css/dataTables.fixedHeader.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/treant/Treant.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/font-awesome/css/font-awesome.min.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/farm.css">

        <script type="text/javascript" src="<?php echo base_url(); ?>vendor/modernizr/modernizr-custom.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>

        <script>
            $(window).load(function () {
                $(".loader").fadeOut("fast");
            });
        </script>        

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="container-fluid">

            <!--<div class="loader"></div>-->      

            <!--NAVIGATION-->
            <?php $this->load->view('_layout/navigation'); ?>

            <!-- MAIN CONTENT -->
            <div id="main-content">                
                <?php $this->load->view($content); ?>
            </div>

            <!-- FOOTER -->
            <?php $this->load->view('_layout/footer'); ?>

        </div>

        <!-- JavaScript -->        
        <script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap/js/jasny-bootstrap.min.js"></script>  
        <script type="text/javascript" src="<?php echo base_url(); ?>vendor/jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>vendor/datatables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>vendor/datatables/media/js/dataTables.bootstrap.min.js"></script>        
        <script type="text/javascript" src="<?php echo base_url(); ?>vendor/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.min.js"></script>        
        <script type="text/javascript" src="<?php echo base_url(); ?>vendor/treant/vendor/raphael.js"></script>        
        <script type="text/javascript" src="<?php echo base_url(); ?>vendor/treant/Treant.js"></script>        
        <script type="text/javascript" src="<?php echo base_url(); ?>vendor/xregexp/xregexp-all.js"></script>  
        <script type="text/javascript" src="<?php echo base_url(); ?>vendor/trianglify/dist/trianglify.min.js"></script>
        <script>
            var base_url = '<?php echo base_url(); ?>';
            var language = 'hu<?php //echo $this->session->userdata("language"); ?>';
            var maxchar = '<?php echo $this->config->item("maxchar"); ?>';
            var translations = {
                dep_tree: '<?= $this->lang->line("dep_tree"); ?>',
                const_tree: '<?= $this->lang->line("const_tree"); ?>',
                no_input_error: '<?= $this->lang->line("no_input"); ?>',
                too_long_error: '<?= $this->lang->line("too_long"); ?>'
            };
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/parser.js"></script>        

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            //            (function (b, o, i, l, e, r) {
            //                b.GoogleAnalyticsObject = l;
            //                b[l] || (b[l] =
            //                        function () {
            //                            (b[l].q = b[l].q || []).push(arguments)
            //                        });
            //                b[l].l = +new Date;
            //                e = o.createElement(i);
            //                r = o.getElementsByTagName(i)[0];
            //                e.src = 'https://www.google-analytics.com/analytics.js';
            //                r.parentNode.insertBefore(e, r)
            //            }(window, document, 'script', 'ga'));
            //            ga('create', 'UA-XXXXX-X', 'auto');
            //            ga('send', 'pageview');
        </script>
    </body>
</html>



