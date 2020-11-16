<?php $row = $this->db->query("SELECT * FROM tbl_global_setting")->row();?>
<style>
	body {
		font-family: Arial, Helvetica, sans-serif;
	}

	.about-section {
		background-color: #1e72ba;
		width: 100%;
		float: left;
	}

	p {
		color: #000000;
		line-height: 26px;
		font-size: 18px;
		/* margin-top: -7px; */
	}

	#call-us {
		background-position: center !important;
		background-color: #04336b;
		width: 100%;
		float: left;
		padding: 0;
		background-size: cover !important;
		background: url(<?php echo base_url();
		?><?php echo $row->readytobgimg;
		?>) no-repeat;
	}

	#footer-up .back-img {
		background: url(<?php echo base_url();
		?><?php echo $row->footer_top_image;
		?>) no-repeat;
		height: 176px;
		width: 567px;
	}

	.form-section .form-post input[type="password"] {
		width: 200px;
		height: 40px;
		border-radius: 4px;
		background-color: #FFF;
		float: left;
		margin-right: 30px;
		margin-bottom: 20px;
	}

	#services .owl-carousel {
		padding: 0 1px;
		position: relative;
	}

	.modal-open[style] {
		padding-right: 0px !important;
	}

	.modal {
		text-align: center;
	}

	@media screen and (min-width: 768px) {
		.modal:before {
			display: inline-block;
			vertical-align: middle;
			content: " ";
			height: 100%;
		}
	}

	.modal-dialog {
		display: inline-block;
		text-align: left;
		vertical-align: middle;
	}

	.text {
		background-color: #04336b;
		color: white;
		font-size: 16px;
		padding: 16px 32px;
	}
</style>

<div class="sections-wrapper">
	<section class="sec-pad form-section">

		<div class="row" style="padding:5px;">
			<div class="col-md-3">
				<h3>Track Your Shipment</h3>
			</div>
			<div class="col-md-3">
				<input type="text" class="form-control" id="booking_id" name="booking_id"
					placeholder="Track Your Booking ID.">
			</div>
			<div class="col-md-3">
				<button type="button" class="btn btn-danger btn-block" id="searchbtn"
					onclick="checkBookingId();">Find</button>
			</div>
		</div>
		<span id="booking_info"></span>
		<hr>
		<form action="<?php echo base_url(); ?>contact/send_request" method="post">
			<center>
				<font color="white">
					<?php
                        $message = $this->session->userdata('request_msg');
                        if (isset($message)) {
                            echo $message;
                            $this->session->unset_userdata('request_msg');
                        }
                        ?>

				</font>
			</center>
			<div class="row" style="padding:5px;">
				<div class="col-md-3">
					<h3>Request a Quote</h3>
				</div>
				<div class="col-md-3">
					<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
				</div>
				<div class="col-md-3">
					<select name="packages" required>
					<option value="">Please Select</option>
						<option value="local">Local Shipping</option>
						<option value="international">International Shipping</option>
						<option value="haulage">Haulage</option>
						<option value="forwarding">Forwarding</option>
						<option value="Packaging">Packaging</option>
					</select>
				</div>
				<div class="col-md-3">
					<button type="submit" class="btn btn-danger btn-block">Send Now</button>
				</div>
			</div>
		</form>

		<hr>

		<form id="rateCaculator">
			<div class="row" style="padding:5px;">
				<center>
					<h3>RATE CALCULATOR</h3>
					<small>Use our rates calculator to know the worth of your package pickup and
						delivery</small><br><br>
					<p style="border: 2px solid coral; border-radius: 25px; padding:5px;">Extra Services will attract an
						additional fee (not shown here)</p>
					<p style="border: 2px solid coral; border-radius: 25px; padding:5px;">High Value items including
						Phones, Laptops, Cameras, Tablets etc. attract an extra fee to cover
						insurance.
					</p><br>

				</center>

				<div class="col-md-2">
					<p>Type</p>
					<select name="rate_type" id="ratetype" style="width: 100%;" required=""
						onchange="validation(this.value); ">
						<option selected="selected">Select</option>
						<option value="Domestic">Domestic</option>
						<option value="International">International</option>
					</select>
				</div>

				<div class="col-md-3">
					<p>From Location</p>
					<select name="frmLocation" id="frmLocation" style="width: 100%; height:36px;">
						<option>Select</option>
					</select>
				</div>

				<div class="col-md-3">
					<p>To Location</p>
					<select name="toLocation" id="toLocation" style="width: 100%; height:36px;"
						onchange="checkWeightList(this.value);">
						<option>Select</option>
					</select>
				</div>

				<div class="col-md-3">
					<p>Weight</p>
					<select style="width:100%;" name="rate_id" id="rate_id" onchange="getRateCost(this.value);">
						<option selected="selected">Select</option>
					</select>
				</div>

			</div>

		</form>
		<hr>
		<center><span id="show_cost" style="font-size: 25px; font-weight: bold;"></span></center>
		<div class="row" style="display: none;">
			<div class="col-md-1 col-sm-12 hidden-xs"></div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<h3>&nbsp;&nbsp;&nbsp;Call: <span><b><?php
                                if (isset($row->compnay_phone)) {
                                    echo $row->compnay_phone;
                                }
                                ?></b></b></span>
				</h3>

			</div>
			<div class="col-md-7 col-sm-12 col-xs-12 pull-right">
				<div class="form-post">
					<div style="font-size: 18px; padding-bottom: 10px;">Login..</div>
					<center>
						<font color="red">
							<?php
                        $message = $this->session->userdata('msg');
                        if (isset($message)) {
                            echo $message;
                            $this->session->unset_userdata('msg');
                        }
                        ?>

						</font>

					</center>
					<form id="loginform" method="post" action="<?php echo base_url(); ?>login/ckLogin">
						<input type="text" name="userName" autocomplete="off" placeholder="Name*">
						<input type="password" name="password" autocomplete="off" placeholder="password*">
						<input type="submit" name="submit" value="Login">
					</form>

				</div>
			</div>
		</div>
</div>
</section>
</div>
<section class="about-section">
	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<div style="text-align: left; margin-top: 55px;">

					<?php
                        foreach ($data as $value) {
                            ?>
					<h1 style="color: white;"><?php echo $value->post_title;?></h1>
					<h3 style="text-align: justify;"><?php echo $value->post_description;?></h3>
					<?php
                        }
                        ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- start clients section-->
<section id="services" class="sec-pad textcolor">
	<div class="container">
		<div class="row">
			<?php foreach ($ourServices as $value) {
                        ?>
			<div class="col-md-3" style="padding: 2px;">
				<div class="text-center">
					<img src="<?php echo base_url(); ?><?php echo $value->image; ?>" alt="Avatar" class="img-responsive"
						style="height: 209px; width: 100%;">
				</div>
				<div class="middle">
					<div class="text"
						style="background-color: #6f046e;color: white;font-size: 16px;padding: 16px 32px;">
						<a href="<?php echo base_url();?>service/service_details/<?php echo $value->post_id;?>"
							target="_blank" style="color: white; text-decoration: none;">
							<?php echo $value->post_title; ?></a></div>
				</div>
			</div>
			<?php } ?>
		</div>

	</div>

	</div>
	</div>
</section><!-- End clients section-->

<!-- End testimonial section -->

<div class="container">
	<div class="row">
		<div class="col-md-12 pull-right">
			<div class="why-choose-list">
				<br>
				<div class="section-title title-padd-btm">
					<h1>Why choose us?</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End why-choose-us -->
<!-- Star fact Section -->
<section id="counter" class="sec-pad">
	<div class="container">
		<div class="row">
			<?php if (!empty($row->businessYear)) { ?>
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="circle brd-color">
					<img src="<?php echo base_url(); ?>resource/fronted/img/icons/suitcase.png" alt="">
					<h1 class="timer" data-from="5" data-to="<?php echo $row->businessYear; ?>" data-speed="2000"
						data-refresh-interval="50">
						<?php echo $row->businessYear; ?></h1>
					<center>Year in buisness</center>
				</div>
			</div>
			<?php } ?>

			<?php if (!empty($row->happyUser)) { ?>
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="circle brd-color-2">
					<img src="<?php echo base_url(); ?>resource/fronted/img/icons/smily.png" alt="">
					<h1 class="timer" data-from="85" data-to="<?php echo $row->happyUser; ?>" data-speed="2000"
						data-refresh-interval="50">
						<?php echo $row->happyUser; ?></h1>
					<center>Happy Users</center>
				</div>
			</div>
			<?php } ?>

			<?php if (!empty($row->Vehicles)) { ?>
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="circle brd-color-3">
					<img src="<?php echo base_url(); ?>resource/fronted/img/icons/vehicle.png" alt="">
					<h1 class="timer" data-from="990" data-to="<?php echo $row->Vehicles; ?>" data-speed="2000"
						data-refresh-interval="50">
						<?php echo $row->Vehicles; ?></h1>
					<center>Vehicles Shipping</center>
				</div>
			</div>
			<?php } ?>

			<?php if (!empty($row->branches)) { ?>
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="circle brd-color-4">
					<img src="<?php echo base_url(); ?>resource/fronted/img/icons/branches.png" alt="">
					<h1 class="timer" data-from="45" data-to="<?php echo $row->branches; ?>" data-speed="2000"
						data-refresh-interval="50">
						<?php echo $row->branches; ?></h1>
					<center>Logistics</center>
				</div>
			</div>
			<?php } ?>

		</div>
	</div>
</section>

<!-- End fact Section -->
<!-- Start Overlay Section Section -->
<section id="call-us">
	<div class="overlay sec-pad">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="call-bx img-fluid"
						style="url(<?php echo base_url(); ?>resource/fronted/img/resource/rectangle-bg.png)">
						<h1 class="main-title">Are You Ready to Move</h1>
						<div class="call-bx-inner">
							<div class="phn-icon-circle"></div>
							<div class="call-us-text" style="text-align: center;">
								<br>
								<h2>Call Us 24 hour available:</h2>
								<h1><?php
                            if (isset($row->compnay_phone)) {
                                echo '+'.$row->compnay_phone;
                            }
                            ?></h1>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- End Overlay Section Section -->

<!-- Start footer-up Section -->
<section id="footer-up">
	<div class="container">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="aside-bx news-letter-img">
				<div class="overlay">
					<h2>Signup Our Newsletter</h2>
					<p>
						Subscribe now and receive weekly newsletter
					</p>

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

					<form action="<?php echo base_url(); ?>contact/send_subs_email" method="post">
						<div class="subscribe-form">
							<input type="text" name="email" placeholder="Signup Our Newsletter" required>
							<button class="subscribe-button btn-md" type="submit">subscribe</button>
						</div>
					</form>

				</div>
			</div>
		</div><!-- col -->

	</div>
</section>

<!-- Contact Us Modal HTML -->
<div id="contactus" class="modal fade" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-sm">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #134784;; color: white;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Contact Us</h4>
			</div>
			<div class="modal-body" style="background-color: #134784;">

				<center style="font-size: 20px; color: white; font-weight: bold;"><a
						href="<?php echo base_url();?>contact" style="color: white; text-drecreaction: none;"
						target="_blnak">
						Please, contact us for delivery to other countries aside Nigeria or UK<br>
						<button class="btn btn-primary btn-lg btn-block">Go</button>
					</a></center>

			</div>
			<div class="modal-footer" style="background-color: #134784;">
				<!-- <button type="button" class="btn btn-info btn-block" data-dismiss="modal">Close</button> -->
			</div>
		</div>

	</div>
</div>


<!-- Error Us Modal HTML -->
<div id="error" class="modal fade">
	<div class="modal-dialog modal-sm">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #ff0505;; color: white;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">
					<center>Warning</center>
				</h4>
			</div>
			<div class="modal-body" style="background-color: #ff0505;">
				<center style="font-size: 20px; color: white; font-weight: bold;">Fill in required boxes to continue.
				</center>
			</div>
			<div class="modal-footer" style="background-color: #ff0505;">
				<button type="button" class="btn btn-info btn-block" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<div id="myModal" class="modal fade" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-sm">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #134784;; color: white;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Your estimated freight charge</h4>
			</div>

			<form action="<?php echo base_url();?>home/buy" method="post">
				<div class="modal-body" style="background-color: #134784;">
					<center style="font-size: 25px; color: white;"> £ <span id="final_result"
							style="color: white;text-align: center;"></span></center>
					<input type="hidden" id="result" name="result" />
					<input type="hidden" id="cus_id" name="cus_id" />
					<input type="hidden" id="bookingId" name="bookingId" />
					<input type="hidden" id="cus_email" name="cus_email" />
					<input type="hidden" id="rcvfulladdress" name="recv_full_address" />
					<input type="hidden" id="recmobile" name="rec_mobile" />
					<input type="hidden" id="recemail" name="rec_email" />

					<button type="submit" class="btn btn-primary btn-block"
						style="font-weight: bold; font-size: 22px;">Book Now</button>
				</div>
			</form>

			<div class="modal-footer" style="background-color: #134784;">
				<button type="button" class="btn btn-info btn-block" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<!--login modal-->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="loginmodalLabel">Username & Password</h4>
			</div>
			<div class="modal-body" style="margin-top: -25px;">
				<form id="checklogin">
					<div class="form-group">
						<label for="exampleInputEmail1">Username</label>
						<input type="text" class="form-control" id="userName" name="userName" placeholder="Username"
							autocomplete="off">
					</div>
					<div class="form-group">
						<input type="hidden" id="bid" name="bid" />
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password"
							autocomplete="off">
					</div>
					<button type="button" class="btn btn-default btn btn-block" onclick="loginCheck();">Login</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!--error modal-->
<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content" style="background-color: red;">
			<center><span style="font-size: 25px; font-weight: bold; color: #ffffff; text-align: center;">Please Enter
					Your Tracking Booking Id.</span></center>
		</div>
	</div>
</div>
<div class="modal fade" id="errormsg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm" role="document" data-dismiss="modal">
		<div class="modal-content" style="background-color: red;">
			<center><span style="font-size: 25px; font-weight: bold; color: #ffffff; text-align: center;">Please Enter
					Your Valid Username/Password.</span></center>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>resource/fronted/plugins/jquery.min.js"></script>
<script>
	function validation(value) {
		$.ajax({
			type: 'post',
			url: '<?php echo base_url();?>home/getLocationValue',
			data: {
				value: value
			},
			success: function(response) {
				document.getElementById("frmLocation").innerHTML = response;
				document.getElementById("toLocation").innerHTML = response;
			}
		});
	}

	function checkWeightList(toLocation) {
		var frmLocation = $("#frmLocation").val();
		$.ajax({
			type: 'get',
			url: '<?php echo base_url();?>home/checkRateCostList',
			data: {
				toLocation: toLocation,
				frmLocation: frmLocation,
			},
			success: function(response) {
				$("#rate_id").html(response);
			}
		});
	}

	function getRateCost(rate_id) {
		$.ajax({
			type: 'post',
			dataType: 'json',
			url: '<?php echo base_url();?>home/checkRateCost',
			data: {
				rate_id: rate_id
			},
			success: function(response) {
				$("#show_cost").text("Total = NGN " + response);
			}
		});
	}

	function showbtn() {
		$('#searchbtn').show();
	}
	// w3 modal
	function QuoteMeValidation() {
		var recv_full_address = $('#recv_full_address').val();
		var rec_email = $('#rec_email').val();
		var rec_mobile = $('#rec_mobile').val();
		$('#recmobile').val(rec_mobile);
		$('#recemail').val(rec_email);
		$("#rcvfulladdress").val(recv_full_address);
		if (recv_full_address == "" && rec_email == "" && rec_mobile == "") {
			$('#error_address').modal('show');
		} else {
			$('#myModal').modal('show');
		}
	}
	// validation
	function validation_du() {
		var frm_country_id = $("#frm_country_id").val();
		var frm_sate_id = $("#sate_id").val();
		var to_country_id = $("#to_country_id").val();
		var to_sate_id = $("#to_sate_id").val();
		var email = $("#email").val();
		var services = $("#dataservices").val();
		var noofparcels = $("#noofparcels").val();
		if (frm_country_id == '' || frm_sate_id == '' || to_country_id == '' || to_sate_id == '' || email == '' ||
			services == '' || noofparcels == '') {
			$('#error').modal('show');
		}
	}
	//Email Validation
	$("#email").keyup(function() {
		var email = $("#email").val();
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(email)) {
			//alert('Please provide a valid email address');
			$("#error_email").text(email + " is not a valid email");
			email.focus;
			//return false;
		} else {
			$("#error_email").text("");
		}
	});



	function checkBookingId() {
		var booking_id = $("#booking_id").val();
		$("#bid").val(booking_id);
		if (booking_id !== "") {
			
			$.ajax({
				type: "POST",
				dataType: 'json',
				url: "<?php echo base_url(); ?>login/find_booking_status",
				data: {
					booking_id: booking_id
			},
				success: function(data) {
				  $('#booking_info').html(data);
					if (userName !== "" && password !== "") {
						$('#errormsg').modal('hide');
					}
				}
			});
			//$('#loginmodal').modal('show');
		} else {
			$('#error').modal('show');
		}
	}
</script>
<!-- Your customer chat code -->
<div class="fb-customerchat" attribution=setup_tool page_id="<?php echo $setting->facebook_page_id ?>">
</div>