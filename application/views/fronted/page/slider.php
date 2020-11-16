<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
		<li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
		<li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
	</ol>
	<!-- Wrapper For Slides -->
	<div class="carousel-inner" role="listbox">
        <?php
            foreach ($sliderdata as $item) {
                if ($item->sort ==1) {
                    ?>
		<!-- Third Slide -->
		<div class="item active">
			<!-- Slide Background -->
			<img src="<?php echo base_url(); ?><?php echo $item->image;?>" alt="" class="slide-image" />
			<div class="bs-slider-overlay"></div>
			<div class="container">
				<div class="row">
					<!-- Slide Text Layer -->
					<div class="slide-text slide_style_center">
						<h1 data-animation="<?php  echo $item->title;?>"><?php  echo $item->title;?></h1>
						<p><?php  echo $item->description;?></p>
						
					</div>
				</div>
			</div>
		</div>
		<?php } else { ?>
		<div class="item">
			<!-- Slide Background -->
			<img src="<?php echo base_url(); ?><?php echo $item->image;?>" alt="" class="slide-image" />
			<div class="bs-slider-overlay"></div>
			<!-- Slide Text Layer -->
			<div class="slide-text slide_style_center">
				<h1 data-animation="<?php  echo $item->title;?>"><?php  echo $item->title;?></h1>
				<p><?php  echo $item->description;?></p>
				
			</div>
		</div>
        <?php } } ?>
		<!-- End of Slide -->
		<!-- Third Slide -->
		 
		<!-- End of Slide -->
	</div><!-- End of Wrapper For Slides -->
	<!-- Left Control -->
	<a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
		<span class="fa fa-angle-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<!-- Right Control -->
	<a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
		<span class="fa fa-angle-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>