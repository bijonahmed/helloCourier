<?php $row = $this->db->query("SELECT * FROM tbl_global_setting")->row(); ?>

<header>
	<nav class="navbar navbar-default navbar-sticky bootsnav">
		<div class="top-search">
			<div class="container">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-search"></i></span>
					<input type="text" class="form-control" placeholder="Search">
					<span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
				</div>
			</div>
		</div>
		<div class="container">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapsibleNavbar">
					<i class="fa fa-bars"></i>
				</button>
				<a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?><?php
                    if (isset($row->image)) {
                        echo $row->image;
                    }
                    ?>" class="logo logo-scrolled" alt="logo" style="height: 50px; width: 147px; margin-top: -10px;"></a>
			</div>

			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="nav navbar-nav navbar-right" data-in="" data-out="">
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
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<div class="clearfix"></div>
</header>

<script>
	function closenavbar() {
		var links = "<?php echo base_url(); ?>";
		window.location.href = links;
	}
</script>