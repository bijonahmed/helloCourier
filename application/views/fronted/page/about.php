
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
		<h2>About us</h2>
		<ul class="bread-crumb clearfix">
			<li><i class="fa fa-home"></i> <a href="<?php echo base_url();?>">Home</a></li>
			<li class="active">About</li>
		</ul>
	</div>
</section>
<!--End Page Title-->
<style>
	.color: #c02537 !important;
</style>

<div class="sections-wrapper">
	<section class="sec-pad">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12" style="text-align: justify;">
					<?php
            foreach ($data as $value) {
            ?>
					<h1><?php echo $value->post_title;?></h1>
					<?php echo strip_tags($value->post_description);?>
					<?php } ?>
				</div>

			</div><!-- row -->

		</div>
	</section>
</div>