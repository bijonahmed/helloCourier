<?php $row = $this->db->query("SELECT * FROM tbl_global_setting")->row(); ?>
<style>
	.inner-baner {
		background: url(<?php echo base_url();
		?><?php echo $row->bn_image;
		?>);
	}
	#faq {
		padding: 10px 0;
	}
	#faq .section-title-style {
		width: 100%;
		padding-bottom: 5px;
	}
	.general-question {
		margin-top: 10px;
	}
</style>
<section class="page-title inner-baner">
	<div class="container">
		<h2>Faq</h2>
		<ul class="bread-crumb clearfix">
			<li><i class="fa fa-home"></i> <a href="<?php echo base_url();?>">Home</a></li>
			<li class="active">Faq</li>
		</ul>
	</div>
</section>
<!--End Page Title-->
<section id="faq">
	<div class="container">
		<div class="section-title-style text-left" style="text-align: center;">
			<h1>Frequently ask questions</h1>
			<hr>
		</div>
		<div class="row">
			<!-- .faq-content -->
			<div class="row">
				<div class="col-lg-12">
					<div class="general-question">
						<div class="panel-group" role="tablist" aria-multiselectable="true">
							<?php
						foreach($faq as $i){
							?>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $i->post_id;?>" aria-expanded="false" aria-controls="collapseTwo">
												 <?php echo $i->post_title;?>
										</a>
									</h4>
								</div>
								<div id="<?php echo $i->post_id;?>" class="panel-collapse collapse" role="tabpanel">
									<div class="panel-body">
										<div class="panel_body_up">
											 <?php echo $i->post_description;?>
										</div>
									</div>
								</div>
							</div>
							
							<?php } ?>
							<br><br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- col -->
	</div> <!-- row -->
	</div>
</section>