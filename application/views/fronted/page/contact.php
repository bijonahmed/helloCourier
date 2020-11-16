<?php $row = $this->db->query("SELECT * FROM tbl_global_setting")->row(); ?>
<style>
	.inner-baner {
		background: url(<?php echo base_url();
		?><?php echo $row->bn_image;
		?>);
	}
</style>

<section class="page-title inner-baner">
	<div class="container">
		<h2><?php echo $name;?></h2>
		<ul class="bread-crumb clearfix">
			<li><i class="fa fa-home"></i> <a href="<?php echo base_url();?>">Home</a></li>
			<li class="active"><?php echo $name;?></li>
		</ul>
	</div>
</section>
<!--End Page Title-->


<div class="sections-wrapper sec-pad">
	<div class="container">
		<div class="section-title title-padd-btm">
			<h1>GET IN TOUCH</h1>
		</div>
		<div class="row">

			<div class="col-md-7 col-sm-6 col-xs-12 pull-right">
				<h1>
					<center>
						<font color="green">
							<?php
                            $message = $this->session->userdata('send_msg');
                            if (isset($message)) {
                                echo $message;
                                $this->session->unset_userdata('send_msg');
                            }
                            ?> </font>
					</center>
				</h1>
				<form action="<?php echo base_url(); ?>contact/send_email" method="post">
					<p><input type="text" name="fullname" id="fullname" placeholder="Name" required></p>
					<p><input type="text" name="email_address" placeholder="Email" required></p>
					<p><input type="text" name="phonenumber" placeholder="Phone" required></p>
					<p><textarea name="message" placeholder="Message" required></textarea></p>
					<button type="submit" class="theme-btn-orng btn-lg">
						<span>Submit Now</span>
					</button>
				</form>


			</div>
			<div class="col-md-5 col-sm-6 col-xs-12">
				<div class="tt-contact">
					<div class="tt-contact-info">
						<div class="simple-text">
							<p><?php echo '<span style="color: black;"'.$setting->company_address.'</span>'; ?></p>
						</div>
					</div>
				</div>
			</div><!-- col -->

		</div><!-- row -->

	</div>
</div>

<!-- Start Map Section -->
<div class="">
	<div class="map-column col-md-12 col-sm-6 col-xs-12">
		<div class="inner-box">
			<div class="map-outer">
				<!--Map Canvas-->
				<div class="mapouter">
				<!--	<div class="gmap_canvas"><iframe width="100%" height="455" id="gmap_canvas"
					src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed"
					frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
					<a href="https://www.enable-javascript.net/blog/divi-discount/"></a></div>-->
				
				
				<div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="455" id="gmap_canvas" src="https://maps.google.com/maps?q=160%20Maple%20Road%2C%20Penge%20London&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/divi-discount-code-elegant-themes-coupon/">divi theme discount</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
				
					<style>
						.mapouter {
							position: relative;
							text-align: right;
							height: 455px;
							width: 100%;
						}

						.gmap_canvas {
							overflow: hidden;
							background: none !important;
							height: 455px;
							width: 100%;
						}
					</style>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Map Section -->