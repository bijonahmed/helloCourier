<?php $row = $this->db->query("SELECT * FROM tbl_global_setting")->row(); ?>
<!DOCTYPE html>
<html class="html">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo base_url(); ?><?php
            if(isset($row->image)){ echo $row->image;} ?>">
	<title><?php  if(isset($row->home_page_title)){ echo $row->home_page_title; } ?></title>
	<meta name="keywords" content="><?php  if(isset($row->meta_keyword)){ echo $row->meta_keyword; } ?>">
	<meta name="description" content="><?php  if(isset($row->meta_description)){echo $row->meta_description; }  ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>resource/fronted/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet"
		href="<?php echo base_url(); ?>resource/fronted/plugins/owl.carousel-2/assets/owl.carousel.css">
	<link rel="stylesheet"
		href="<?php echo base_url(); ?>resource/fronted/plugins/owl.carousel-2/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>resource/fronted/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>resource/fronted/css/responsive.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	<style>
		#topbar {
			background-color: #fff;
			color: #020202;
			min-height: 40px;
		}

		.wrap-sticky nav.navbar.bootsnav {
			position: absolute;
			width: 100%;
			left: 0;
			top: 0;
			z-index: 1500;
			background-color: #6f046e;

		}

		.form-section {
			background-color: #6f046e;
			padding: 50px;
			overflow: hidden;
			color: #FFF;
		}

		nav.navbar.bootsnav ul.nav>li>a {
			color: #fff;
			background-color: transparent !important;
		}

		.about-section {
			background-color: #6f046e;
			width: 100%;
			float: left;
		}

		#footer-up {
			width: 100%;
			float: left;
			background-color: #6f046e;
			padding: 55px 0 84px;
		}

		.about-section {
			background-color: #881887;
			width: 100%;
			float: left;
		}

		.footer-btm {
			background-color: #fffcfa;
			color: black;
			padding: 20px 0;
			width: 100%;
			float: left;
		}

		.btn-danger {
			color: #fff;
			background-color: #310330;
			border-color: #1e0403;
		}

		nav.navbar.bootsnav ul.nav>li>a {
			color: #fff;
			background-color: #6f046e !important;
		}
	</style>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-151768501-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'UA-151768501-1');
	</script>

</head>

<body>
	<section id="topbar">
		<div class="container">
			<div class="row" style="margin-top: 10px;">
				<div class="col-sm-6" style="text-align: center;">
					<?php
                            if(isset($row->compnay_phone)){
                                echo $row->compnay_phone;
                            }
                            ?>
				</div>
				<div class="col-sm-6" style="text-align: center;">
					<i class="fa fa-send"></i> Email: <?php
                            if(isset($row->company_email)){
                                echo $row->company_email;
                            }
                            ?>

				</div>
			</div>
	</section>
	<!--header start-->
	<!--header start-->
	<?php
        if (isset($header)):
            echo $header;
        endif;
            
        if (isset($slider)):
            echo $slider;
        endif;
        
        if (isset($mainContent)):
            echo $mainContent;
        endif;
        
        if (isset($footer)):
            echo $footer;
        endif;
    ?>
	<script src="<?php echo base_url(); ?>resource/fronted/js/plugins.js"></script>
	<script src="<?php echo base_url(); ?>resource/fronted/plugins/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>resource/fronted/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>resource/fronted/plugins/owl.carousel-2/owl.carousel.min.js"></script>
	<script src="<?php echo base_url(); ?>resource/fronted/js/jquery.appear.js"></script>
	<script src="<?php echo base_url(); ?>resource/fronted/js/jquery.countTo.js"></script>
	<script src="<?php echo base_url(); ?>resource/fronted/js/theme.js"></script>
	<script src="<?php echo base_url(); ?>resource/fronted/js/wow.js"></script>
	<script src="<?php echo base_url(); ?>resource/fronted/js/slider.js"></script>
</body>

</html>