<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>resource/merchent/assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>resource/merchent/assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title> Welcome To hellocourierbd </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'  name='viewport' />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resource/merchent/assets/css/fonts.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>resource/merchent/assets/css/font-awesome.min.css">
        <link href="<?php echo base_url(); ?>resource/merchent/assets/css/material-dashboard.min1036.css?v=2.1.1"
              rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/merchent/assets/demo/demo.css" rel="stylesheet" />
    </head>
    <body>
        <div class="wrapper">
<?php
                    $user_info = $this->db->query("SELECT * FROM tbl_global_setting")->row();
                    if (!empty($user_info->image)) {
                        ?>
            <div class="logo" style="text-align: center;">
                <a href="<?php echo base_url(); ?>marchent/" class="simple-text logo-normal">
                    <img src="<?php echo base_url(); ?><?php echo $user_info->image;?>">
                </a>
            </div>
            <?php } ?>
            <!-- Navbar -->
            <?php
            if (isset($navbvar)) {
                echo $navbvar;
            }
              if (isset($mainContent)) {
                echo $mainContent;
            }
            ?>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright float-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        <a href="http://hellocourierbd.com" target="_blank">hellocourierbd Team</a> <small><strong>beta
                                version 1.0</strong></small>
                    </div>
                </div>
            </footer>
        </div>
        <!--   Core JS Files   -->
        
        <script src="<?php echo base_url(); ?>resource/merchent/assets/js/core/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>resource/merchent/assets/js/core/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>resource/merchent/assets/js/core/bootstrap-material-design.min.js"></script>
        <script src="<?php echo base_url(); ?>resource/merchent/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>resource/merchent/assets/js/plugins/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>resource/merchent/assets/js/plugins/sweetalert2.js"></script>
        <script src="<?php echo base_url(); ?>resource/merchent/assets/js/plugins/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>resource/merchent/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
        <script src="<?php echo base_url(); ?>resource/merchent/assets/js/plugins/bootstrap-tagsinput.js"></script>
        <script src="<?php echo base_url(); ?>resource/merchent/assets/js/plugins/jasny-bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>resource/merchent/cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js">
        </script>
        <script src="<?php echo base_url(); ?>resource/merchent/assets/js/plugins/arrive.min.js"></script>
        <script async defer src="<?php echo base_url(); ?>resource/merchent/buttons.github.io/buttons.js"></script>
        <script src="<?php echo base_url(); ?>resource/merchent/assets/js/plugins/chartist.min.js"></script>
        <script src="<?php echo base_url(); ?>resource/merchent/assets/js/plugins/bootstrap-notify.js"></script>
        <script src="<?php echo base_url(); ?>resource/merchent/assets/js/material-dashboard.min1036.js?v=2.1.1"
        type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resource/merchent/assets/demo/demo.js"></script>
        <script src="<?php echo base_url(); ?>resource/merchent/assets/demo/jquery.sharrre.js"></script>
        <script src="<?php echo base_url(); ?>resource/merchent/assets/js/jquery-ui.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>resource/merchent/assets/css/jquery-ui.css">
        <script>
          $(document).ready(function () {
                                    // Javascript method's body can be found in assets/js/demos.js
           });
        </script>
    </body>
</html>