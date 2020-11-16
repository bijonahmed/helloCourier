<style>
p {
	color: black;
	line-height: 26px;
	font-size: 14px;
	/* margin-top: -7px; */
}
</style>
<footer class="footer-bg sec-pad" style="color: black;">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-4 col-xs-12">
				<div class="widget">
					<h3>Get in Touch</h3>
						<small><p><?php //echo $setting->company_address; ?></p></small>
					<div class="phone-num-box">
						<div class="icon-col"><i class="fa fa-phone"></i></div>
						<div class="phn">+<?php echo $setting->compnay_phone ?></div>
					</div><!-- info-bx -->
					<div class="phone-num-box">
						<div class="icon-col"><i class="fa fa-envelope"></i></div>
						<div class="phn"><a href="mailto:<?php echo $setting->company_email ?>"><?php echo $setting->company_email ?></a></div>
					</div><!-- info-bx -->
					<div class="phone-num-box">
						<div class="icon-col"><i class="fa fa-fax"></i></div>
						<div class="phn"><a href="mailto:<?php echo $setting->company_fax ?>"><?php echo $setting->company_fax ?></a></div>
					</div><!-- info-bx -->

				</div>
			</div><!-- col -->
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="widget">
					<h3>Site Map</h3>
					<div class="quick-links">
						<ul>
						<?php
                        foreach($menu as $i){
                            if($i->menu_id==8){
                    ?>
					<li><a href="<?php echo base_url();?>"><?php echo $i->name; ?></a></li>
                    <?php }else{
                          $slug = strtolower($i->slug);
                        ?>
                    <li><a href="<?php echo base_url();?>menu/<?php echo $slug; ?>"><?php echo $i->name; ?></a></li>
					<?php 
                    } } ?>
						</ul>
					</div>
				</div>
			</div><!-- col -->
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="widget">
					<h3>Company Info</h3>
					<div class="quick-links" style="color: white; text-align: justify;">
						<?php
                        if (isset($setting->company_short_descirption)) {
                            echo $setting->company_short_descirption;
                        }
                        ?>
					</div>
				</div>
			</div><!-- col -->
			<div class="col-md-3 col-sm-2 col-xs-12">
				<div class="widget">
					<h3>Connect with us</h3>
					<div class="social-links-footer">
						<?php
                        if (!empty($setting->facebook_link)) {
                            ?>
						<a href="<?php echo $setting->facebook_link; ?>" target="_blank"> <i class="fa fa-facebook-f"></i></a>
						<?php } ?>


						<?php
                        if (!empty($setting->twitter_url)) {
                            ?>
						<a href="<?php echo $setting->facebook_link; ?>" target="_blank"> <i class="fa fa-twitter"></i></a>
						<?php } ?>


						<?php
                        if (!empty($setting->linkdin_url)) {
                            ?>
						<a href="<?php echo $setting->linkdin_url; ?>" target="_blank"> <i class="fa fa-linkedin"></i></a>
						<?php } ?>

					</div><!-- social-link -->
				</div>
			</div><!-- col -->
		</div><!-- row -->
	</div>
</footer>
<!-- Stat Footer -->
<!-- Stat footer-btm -->
<div class="footer-btm">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12" style="color: black; font-weight: bold;">
				<center><?php echo $setting->copyright ?></center>

			</div>
		</div>
	</div>
</div>