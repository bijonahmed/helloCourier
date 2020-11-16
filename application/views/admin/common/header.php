
<nav class="navbar navbar-expand fixed-top gradient-scooter">
	<ul class="navbar-nav mr-auto align-items-center">
		<li class="nav-item">
			<a class="nav-link toggle-menu" href="javascript:void();">
				<i class="icon-menu menu-icon"></i>
			</a>
		</li>
	</ul>
	<ul class="navbar-nav align-items-center right-nav-link">
		<li class="nav-item dropdown-lg">
			<a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
				<div class="dropdown-menu dropdown-menu-right">
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<a href="javaScript:void();">
								<div class="media">
									<i class="icon-cup fa-2x mr-3 text-warning"></i>
									<div class="media-body">
										<h6 class="mt-0 msg-title">New Received Orders</h6>
										<p class="msg-info">Lorem ipsum dolor sit amet...</p>
									</div>
								</div>
							</a>
						</li>
						<li class="list-group-item"><a href="javaScript:void();">See All Notifications</a></li>
					</ul>
				</div>
		</li>
		<li class="nav-item">
			<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
				<span class="user-profile">
					<?php
                    $user_id = $this->session->userdata('user_id');
                    $user_info = $this->db->query("SELECT * FROM tbl_user WHERE user_id='$user_id'")->row();
                    if (!empty($user_info->image)) {
                        ?>
					<img src="<?php echo base_url(); ?><?php echo $user_info->image;?>" class="img-circle" alt="user avatar">
					<?php
                    }else{
                      $user_id = $this->session->userdata('user_id');
                    $admin = $this->db->query("SELECT * FROM tbl_user WHERE role_id='1'")->row();
                        ?>
					<img src="<?php echo base_url(); ?><?php echo $admin->image;?>" class="img-circle" alt="user avatar">
					<?php
                    }
                    ?>
				</span>
			</a>
			<ul class="dropdown-menu dropdown-menu-right">
				<li class="dropdown-item user-details">
					<a href="javaScript:void();">
						<div class="media">
							<?php
                            if (!empty($user_info->image)) {
                                ?>
							<div class="avatar"><img class="align-self-start mr-3" src="<?php echo base_url(); ?><?php echo $user_info->image ?>" alt="user avatar"></div>
							<?php }  
                                ?>
							
							<div class="media-body">
								<h6 class="mt-2 user-title">
									<?php echo $this->session->userdata('full_name'); ?>
								</h6>
								<p class="user-subtitle">
									<?php echo $this->session->userdata('email'); ?>
								</p>
							</div>
						</div>
					</a>
				</li>
				<a href="<?php echo base_url(); ?>" target="_blank">
					<li class="dropdown-item"><i class="icon-wallet mr-2"></i>Fronted</li>
				</a>
				
			 
				<li class="dropdown-divider"></li>
				<a href="<?php echo base_url(); ?>profile/profile">
					<li class="dropdown-item"><i class="icon-wallet mr-2"></i>Account</li>
				</a>
				<li class="dropdown-divider"></li>
				<li class="dropdown-item"><i class="icon-power mr-2"></i><a href="<?php echo base_url(); ?>login/logout">Logout</a></li>
			</ul>
		</li>
	</ul>
</nav>