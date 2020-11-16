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
		<h2>Our Team</h2>
		<ul class="bread-crumb clearfix">
			<li><i class="fa fa-home"></i> <a href="<?php echo base_url();?>">Home</a></li>
			<li class="active">Our Team</li>
		</ul>
	</div>
</section>
<!--End Page Title-->

<section class="sec-pad">
	<div class="container ptb">
		<div class="row">



			<?php
            foreach ($data as $value) {?>
			<div class="col-md-12 col-sm-6">
				<div class="our-team">
				
					<div class="team-info">
						<h3 class="title"><?php echo $value->post_title;?></h3>
						<span class="post"><?php echo $value->post_description;?></span>
					</div>
				</div>
			</div><!-- col -->
			<?php } ?>





		</div>
	</div>

</section>