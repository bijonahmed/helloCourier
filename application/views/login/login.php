<?php $row = $this->db->query("SELECT * FROM tbl_global_setting")->row(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Login...</title>
  <!--favicon-->
  <link rel="icon" href="<?php echo base_url(); ?>resource/admin/assets/images/favicon.ico" type="image/x-icon">
  <link href="<?php echo base_url(); ?>resource/admin/assets/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="<?php echo base_url(); ?>resource/admin/assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url(); ?>resource/admin/assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url(); ?>resource/admin/assets/css/app-style.css" rel="stylesheet"/>

</head>
<style>
body {
 background-image: url(<?php echo base_url(); ?>resource/admin/assets/images/bg.jpg);
background-repeat: no-repeat;

}
</style>
<body>
 <!-- Start wrapper-->
 <div id="wrapper">
	<div class="card border-primary border-top-sm border-bottom-sm card-authentication1 mx-auto my-5 animated bounceInDown">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="<?php echo base_url(); ?><?php
            if(isset($row->image)){ echo $row->image;} ?>" style="height: 150px; width:100%;">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">Sign In</div>
		    <center>
                        <font color="green">
                        <?php
                        $message = $this->session->userdata('msg');
                        if (isset($message)) {
                            echo $message;
                            $this->session->unset_userdata('msg');
                        }
                        ?>

                        </font>
                    </center>
		    <form class="form-horizontal m-t-20" id="loginform" method="post" action="<?php echo base_url(); ?>login/checkUserLogin">
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="exampleInputUsername" class="sr-only">Username</label>
				  <input type="text" autofocus id="exampleInputUsername" name="userName" autocomplete="off" class="form-control form-control-rounded" placeholder="Username" required>
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="exampleInputPassword" class="sr-only">Password</label>
				  <input type="password" id="exampleInputPassword" name="password" autocomplete="off" class="form-control form-control-rounded" placeholder="Password" required>
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			<div class="form-row mr-0 ml-0" style="display: none;">
			 <div class="form-group col-6">
			   <div class="icheck-primary">
                <input type="checkbox" id="user-checkbox" checked="" />
                <label for="user-checkbox">Remember me</label>
			  </div>
			 </div>
			 <div class="form-group col-6 text-right" style="display: none;">
			  <a href="authentication-reset-password.html">Reset Password</a>
			 </div>
			</div>
			 <button type="submit"  class="btn btn-primary shadow-primary btn-round btn-block waves-effect waves-light">Sign In</button>
			  <div class="text-center pt-3">

				<!-- <p class="text-muted">Do not have an account? <a href="#"> Sign Up here</a></p> -->
			  </div>
			 </form>
		   </div>
		  </div>
	     </div>

    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	</div><!--wrapper-->

  <script src="<?php echo base_url(); ?>resource/admin/assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>resource/admin/assets/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>resource/admin/assets/js/bootstrap.min.js"></script>

</body>

</html>
