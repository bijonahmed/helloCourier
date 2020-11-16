<?php $row = $this->db->query("SELECT * FROM tbl_global_setting")->row(); ?>
<style>
	/* Credit to bootsnipp.com for the css for the color graph */
	.colorgraph {
		height: 5px;
		border-top: 0;
		background: #c4e17f;
		border-radius: 5px;
		background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
		background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
		background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
		background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	}

	.sec-pad {
		padding: 10px 0;
	}

	.myCheckbox input {
		position: relative;
		z-index: -9999;
	}

	.myCheckbox span {
		width: 20px;
		height: 20px;
		display: block;
		background: url("link_to_image");
	}

	.myCheckbox input:checked+span {
		background: url("link_to_another_image");
	}
</style>
<section class="page-title inner-baner">
	<div class="container">
		<h2>Registration</h2>
		<ul class="bread-crumb clearfix">
			<li><i class="fa fa-home"></i> <a href="<?php echo base_url();?>">Home</a></li>
			<li class="active">Registration</li>
		</ul>
	</div>
</section>
<!--End Page Title-->
<div class="sections-wrapper">
	<section class="sec-pad">
		<div class="container">
			<div class="container">
				<div class="row">
					<center>
						<font color="green">
							<?php
        $message = $this->session->userdata('rmsg');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('rmsg');
        }
        ?> </font>
					</center>
					<div class="row" style="margin-top:20px">
						<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
							<form method="post" action="<?php echo base_url(); ?>login/saveRegistration">
								<fieldset>
									<h2>Registration</h2>
									<hr class="colorgraph">
									<p id="msg" style="color: red; font-size: 20px; font-weight: bold;"></p>
									<div class="form-group">
										<label>Full Name</label>
										<input type="text" class="form-control" placeholder="Full Name" required=""
											id="full_name" name="full_name">
									</div>
									<div class="form-group" style="display: none;">
										<input type="text" class="form-control" placeholder="Company" id="company"
											name="company">
									</div>
									<!------>
									<div class="form-group">
										<label>Mobile Number</label>
										<input type="text" class="form-control" required="" placeholder="Mobile"
											name="mobile_number" id="mobile_number"
											onchange="checkPhoneNumber(this.value)">
									</div>

									<div class="form-group">
										<label>Email</label>
										<input type="email" class="form-control" placeholder="Email" required=""
											name="email" onchange="checkemail(this.value)">
									</div>

									<div class="form-group">
										<label>Country</label>
										<select class="form-control custom-select" name="frm_country_id"
											id="frm_country_id" required="" onchange="getState(this.value)">
											<?php  foreach ($country as $value):
                                              ?>
											<option value="<?php echo $value->id; ?>" selected="selected">
												<?php echo $value->name; ?>
											</option>
											<?php  endforeach;  ?>
										</select>

									</div>

									<div class="form-group">
										<label>State</label>
										<select class="" name="frm_sate_id" id="sate_id"
											style="width: 100%; height:36px;">
											<option value="">Select</option>
										</select>
									</div>

									<div class="form-group">
										<label>Address</label>
										<textarea type="text" class="form-control" placeholder="Address" required=""
											name="address"></textarea>
									</div>
									<div class="form-group">
										<label>Username</label>
										<input type="text" class="form-control" placeholder="User Name" name="user_name"
											id="user_name" onchange="checkUserName(this.value)">
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control" placeholder="Password"
											name="password" id="password">
									</div>

									<hr class="colorgraph">
									<div class="row">
										<div class="col-xs-6 col-sm-6 col-md-6">
											<input type="submit" class="btn btn-lg btn-success btn-block"
												value="Registration" id="btn-registration">
										</div>
										<div class="col-xs-6 col-sm-6 col-md-6" id="login">
											<a href="<?php echo base_url();?>marchentLogin"
												class="btn btn-lg btn-primary btn-block">Login</a>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!-- row -->
</div>
</section>
</div>
<script>
	function checkUserName(user_name) {
		$.ajax({
			type: 'post',
			dataType: "json",
			url: '<?php echo base_url(); ?>home/getuser_name',
			data: {
				user_name: user_name
			},
			success: function(response) {
				var result = response;
				if (result == 'yes') {
					$("#btn-registration").hide();
					$("#login").hide();
					$("#user_name").focus();
					$("#msg").text(
						"Sorry already your username exits. Try another username or go Login Page ");
					$("#email").focus();
				}
				if (result == 'no') {
					$("#login").show();
					$("#btn-registration").show();
					$("#msg").text("");
				}
			}
		});
	}

	function checkemail(email) {
		$.ajax({
			type: 'post',
			dataType: "json",
			url: '<?php echo base_url(); ?>home/getUserEmail',
			data: {
				email: email
			},
			success: function(response) {
				var result = response;
				if (result == 'yes') {
					$("#savebtn").hide();
					$("#login").show();
					$("#msg").text(
						"Sorry already your email id  exits. Try another email or go Login Page ");
					$("#email").focus();
				}
				if (result == 'no') {
					$("#login").hide();
					$("#savebtn").show();
					$("#msg").text("");
				}
			}
		});
	}

	function checkPhoneNumber(mobile) {
		$.ajax({
			type: 'post',
			dataType: "json",
			url: '<?php echo base_url(); ?>home/getUserMobile',
			data: {
				mobile: mobile
			},
			success: function(response) {
				var result = response;
				if (result == 'yes') {
					$("#savebtn").hide();
					$("#login").show();
					$("#msg").text(
						"Sorry already phone number exits. Try another phone number or go Login Page ");
					$("#mobile_number").focus();
				}
				if (result == 'no') {
					$("#login").hide();
					$("#savebtn").show();
					$("#msg").text("");
				}
			}
		});
	}

	function showBankInfo(val) {
		if (val == 1) {
			$("#bank_details").show();
			$("#bkas_details").hide();
			$("#condition").hide();
		} else if (val == 2) {
			$("#bkas_details").show();
			$("#bank_details").hide();
			$("#condition").hide();
		} else if (val == 3) {
			$("#condition").show();
			$("#bank_details").hide();
			$("#bkas_details").hide();
		}
	}
	$(function() {
		$('.button-checkbox').each(function() {
			var $widget = $(this),
				$button = $widget.find('button'),
				$checkbox = $widget.find('input:checkbox'),
				color = $button.data('color'),
				settings = {
					on: {
						icon: 'glyphicon glyphicon-check'
					},
					off: {
						icon: 'glyphicon glyphicon-unchecked'
					}
				};
			$button.on('click', function() {
				$checkbox.prop('checked', !$checkbox.is(':checked'));
				$checkbox.triggerHandler('change');
				updateDisplay();
			});
			$checkbox.on('change', function() {
				updateDisplay();
			});

			function updateDisplay() {
				var isChecked = $checkbox.is(':checked');
				// Set the button's state
				$button.data('state', (isChecked) ? "on" : "off");
				// Set the button's icon
				$button.find('.state-icon')
					.removeClass()
					.addClass('state-icon ' + settings[$button.data('state')].icon);
				// Update the button's color
				if (isChecked) {
					$button
						.removeClass('btn-default')
						.addClass('btn-' + color + ' active');
				} else {
					$button
						.removeClass('btn-' + color + ' active')
						.addClass('btn-default');
				}
			}

			function init() {
				updateDisplay();
				// Inject the icon if applicable
				if ($button.find('.state-icon').length == 0) {
					$button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon +
						'"></i> ');
				}
			}
			init();
		});
	});

	function getState(country_id) {
		//var country_id = 230;
		$.ajax({
			type: 'post',
			url: '<?php echo base_url(); ?>home/getallStatefrm',
			data: {
				country_id: country_id
			},
			success: function(response) {
				document.getElementById("sate_id").innerHTML = response;
			}
		});
	}
</script>