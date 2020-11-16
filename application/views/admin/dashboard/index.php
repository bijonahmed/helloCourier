<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>
            <?php
            if (isset($title)):
                echo $title;
            endif;
            ?>
        </title>
        <link rel="icon" href="<?php echo base_url(); ?>resource/fronted/assets/img/logo/logo-2.png" type="image/x-icon" />
        <link href="<?php echo base_url(); ?>resource/admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/admin/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/admin/assets/css/animate.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>resource/admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>resource/admin/assets/css/sidebar-menu.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/admin/assets/css/app-style.css" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>resource/admin/assets/js/jquery.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>resource/admin/assets/js/jquery-ui.css">
        <link href="<?php echo base_url(); ?>resource/admin/assets/css/dorpdownAutocomplete.css" rel="stylesheet" />

    </head>
    <body>
        <div id="wrapper">
            <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
                <?php
                if (isset($sidebar)):
                    echo $sidebar;
                endif;
                ?>
            </div>
            <header class="topbar-nav">
                <?php
                if (isset($header)):
                    echo $header;
                endif;
                ?>
            </header>
            <div class="clearfix"></div>
            <div class="content-wrapper">
                <?php
                if (isset($maincontent)):
                    echo $maincontent;
                endif;
                ?>
            </div>
        </div>
        <footer>
            <?php if (isset($footer)): echo $footer;
            endif;
            ?>
        </footer>
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        


    </body>
</html>
