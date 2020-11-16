<div class="bd-example bd-example-tabs">
	<nav class="nav nav-tabs" id="nav-tab" role="tablist">
		<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="home" aria-expanded="true">User Details</a>
		<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="profile" aria-expanded="false">Change Password</a>

	</nav>
	<div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" aria-expanded="true">

			<div class="card">
				<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/saveUserRecord">
					<div class="card-body">
						<h4 class="card-title">Edit User Registration</h4>
						<div class="form-group row">
							<label for="fname" class="col-sm-2 text-right control-label col-form-label">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="fname" placeholder="" required="" name="full_name" autofocus="1" value="<?php echo $user_row->full_name; ?>">
							</div>
						</div>

						<div class="form-group row">
							<label for="fname" class="col-sm-2 text-right control-label col-form-label">Company</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="company" placeholder="" name="company" value="<?php echo $user_row->company; ?>">
							</div>
						</div>

						<div class="form-group row">
							<label for="lname" class="col-sm-2 text-right control-label col-form-label">Mobile</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" id="lname" required="" name="mobile_number" value="<?php echo $user_row->mobile_number; ?>">
							</div>
						</div>

						<div class="form-group row">
							<label for="lname" class="col-sm-2 text-right control-label col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" required="" id="lname" name="email" value="<?php echo $user_row->email; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="lname" class="col-sm-2 text-right control-label col-form-label">Short Code</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" required="" id="shortCode" name="shortCode" value="<?php echo $user_row->shortCode; ?>">
							</div>
						</div>

						<div class="form-group row">
							<label for="cono1" class="col-sm-2 text-right control-label col-form-label">Country</label>
							<div class="col-sm-10">
								<select class="form-control custom-select" name="country_id" id="country_id" required="" onchange="getState(this.value)">
									<option value="" selected="selected">Select</option>
									<?php  foreach ($country as $value):
                    ?>
									<option value="<?php echo $value->id; ?>"><?php echo $value->name; ?>
									</option>
									<?php  endforeach;  ?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="cono1" class="col-sm-2 text-right control-label col-form-label">State</label>
							<div class="col-sm-10">
								<select class="form-control custom-select" name="state_id" id="state_id" required="">
									<option value="" selected="selected">Select</option>
									<?php  foreach ($allState as $value):
                    ?>
									<option value="<?php echo $value->id; ?>"><?php echo $value->name; ?>
									</option>
									<?php  endforeach;  ?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="lname" class="col-sm-2 text-right control-label col-form-label">Address</label>
							<div class="col-sm-10">
								<textarea class="form-control" name="address"><?php echo $user_row->address; ?></textarea>
							</div>
						</div>

						<div class="form-group row" style="display:none;">
							<label for="cono1" class="col-sm-2 text-right control-label col-form-label">Zone</label>
							<div class="col-sm-10">
								<select name="hubs_id" id="hubs_id" class="form-control">
									<option value="">Select Zone</option>
									<?php
                                foreach ($hublist as $value) {
                                    ?>
									<option value="<?php echo $value->hubs_id; ?>"><?php echo $value->hubsname; ?>
									</option>
									<?php
						  }?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="cono1" class="col-sm-2 text-right control-label col-form-label">User
								Role</label>
							<div class="col-sm-10">
								<select class="" name="role_id" id="role_id" style="width: 100%; height:36px;" required="">
									<option value="">Select</option>
									<?php
                                    foreach ($userrole as $value):
                                        ?>
									<option value="<?php echo $value->role_id; ?>"><?php echo $value->role_name; ?>
									</option>
									<?php
                                    endforeach;
                                    ?>

								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="cono1" class="col-sm-2 text-right control-label col-form-label">User
								Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="user_name" id="cono1" value="<?php echo $user_row->user_name; ?>" required="">
								<input type="hidden" class="form-control" name="user_id" id="cono1" value="<?php echo $user_row->user_id; ?>">
							</div>
						</div>

						<div class="form-group row">
							<label for="cono1" class="col-sm-2 text-right control-label col-form-label">Status</label>
							<div class="col-sm-10">
								<select class="" id="status" name="status" style="width: 100%; height:36px;" required="">
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
							</div>
						</div>
						<div class="border-top">
							<div class="card-body">
								<div align="right">
									<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
									<a href="<?php echo base_url(); ?>user/user/getUserList">
										<button type="button" onclick="cancelList();" style="margin-top: 10px;" class="btn btn-danger btn-lg btn-block">Cancel</button></a>

								</div>
							</div>
						</div>
					</div>
				</form>

			</div>

		</div>
		<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" aria-expanded="false">
			<div class="card">
				<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/updateUserPass">
					<div class="card-body">
						<div class="form-group row">
							<label for="cono1" class="col-sm-1 text-right control-label col-form-label">Password</label>
							<div class="col-sm-11">
								<input type="password" class="form-control" name="password" id="cono1" required>
								<input type="hidden" class="form-control" name="user_id" id="cono1" value="<?php echo $user_row->user_id; ?>">
							</div>
						</div>
						<div class="border-top">
							<div class="card-body">
								<div align="right">
									<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button><br>
									<a href="<?php echo base_url(); ?>user/user/getUserList"><button type="button" onclick="cancelList();" class="btn btn-danger btn-lg btn-block">Cancel</button></a>

								</div>
							</div>
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>

	<script src="<?php echo base_url(); ?>resource/assets/libs/jquery/dist/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			var hubs_id = '<?php echo $user_row->hubs_id;?>';
			var role_id = '<?php echo $user_row->role_id;?>';
			var statusdata = '<?php echo $user_row->status;?>';
			var country_id = '<?php echo $user_row->country_id;?>';
			var state_id = "<?php echo $user_row->state_id;?>";
			console.log(state_id);
			//getState(country_id);
			$('#status').val(statusdata);
			$('#role_id').val(role_id);
			$('#hubs_id').val(hubs_id);
			$('#country_id').val(country_id);
			$('#state_id').val(state_id);
		});


		function getState(country_id) {

			$.ajax({
				type: 'post',
				url: '<?php echo base_url(); ?>home/getallStatefrm',
				data: {
					country_id: country_id
				},
				success: function(response) {
					document.getElementById("state_id").innerHTML = response;
				}
			});
		}

		function checkMobile(mobile) {
			$.ajax({
				type: 'post',
				dataType: "json",
				url: '<?php echo base_url(); ?>mangement/mangement/getUserMobile',
				data: {
					mobile: mobile
				},
				success: function(response) {
					var result = response;
					if (result == 'yes') {
						$("#savebtn").hide();
					}
					if (result == 'no') {
						$("#savebtn").show();
					}
				}
			});
		}

		function checkEmail(email) {
			$.ajax({
				type: 'post',
				dataType: "json",
				url: '<?php echo base_url(); ?>mangement/mangement/getUserEmail',
				data: {
					email: email
				},
				success: function(response) {
					var result = response;
					if (result == 'yes') {
						$("#savebtn").hide();
					}
					if (result == 'no') {
						$("#savebtn").show();
					}
				}
			});
		}

		function checkUserName(userName) {
			$.ajax({
				type: 'post',
				dataType: "json",
				url: '<?php echo base_url(); ?>mangement/mangement/getUserName',
				data: {
					userName: userName
				},
				success: function(response) {
					var result = response;
					if (result == 'yes') {
						$("#savebtn").hide();
					}
					if (result == 'no') {
						$("#savebtn").show();
					}
				}
			});
		}

		function cancelList() {
			var answer = confirm("Are you back ?")
			if (answer) {
				window.location.assign("<?php echo base_url(); ?>user/user/getUserList");
			}
		}

		function validatenumerics(key) {
			//getting key code of pressed key
			var keycode = (key.which) ? key.which : key.keyCode;
			//comparing pressed keycodes
			if (keycode > 31 && (keycode < 48 || keycode > 57)) {
				alert("Must Be Number Input");
				return false;
			} else
				return true;
		}

		function validate(evt) {
			var theEvent = evt || window.event;
			// Handle paste
			if (theEvent.type === 'paste') {
				key = event.clipboardData.getData('text/plain');
			} else {
				// Handle key press
				var key = theEvent.keyCode || theEvent.which;
				key = String.fromCharCode(key);
			}
			var regex = /[0-9]|\./;
			if (!regex.test(key)) {
				theEvent.returnValue = false;
				if (theEvent.preventDefault) theEvent.preventDefault();
			}
		}
	</script>