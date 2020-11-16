    <!--Page Title-->
    <section class="page-title inner-baner">
    	<div class="container">
    		<h2>service</h2>
    		<ul class="bread-crumb clearfix">
    			<li><a href="index-2.html">Home</a></li>
    			<li class="active">service</li>
    		</ul>
    	</div>
    </section>
    <!--End Page Title-->
    <div class="sections-wrapper">
    	<section class="sec-pad">
    		<div class="container">
    			<?php
                    foreach($ourServices as $i){
                    ?>
    			<div class="row">
    				<div class="col-md-7 col-sm-7">

    					<h2>
    						<b><?php echo $i->post_title; ?></b>
    					</h2>
    					      <div style="text-align: justify; font-size: 18px;">
    						<?php
                                        $position = 500; // Define how many character you want to display.
                                        $message = strip_tags("$i->post_description");
                                        $post = substr($message, 0, $position);
                                        
                                        echo $post;
                                        ?>
                            </div>    
                                        <a href="<?php echo base_url();?>service/service_details/<?php echo $i->post_id;?>"> read more..</a>
    					

    				</div>

    				<div class="col-md-5 col-sm-4">
    					<img src="<?php echo base_url(); ?><?php echo $i->image; ?>" alt="">
    					<br><br><br>
    				</div>


    			</div><!-- row -->
    			<?php } ?>
    		</div>
    	</section>



    </div>