<div class="card">
	<center>
		<font color="red">
			<?php
        $message = $this->session->userdata('msg');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('msg');
        }
        ?> </font>
	</center>

	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/saveUserRecord">
		<div class="card-body">
			<h4 class="card-title">User Registration</h4>
			<div class="form-group row">
				<label for="fname" class="col-sm-2 text-right control-label col-form-label">Name</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="fname" placeholder="" required="" name="full_name"
						autofocus="1">
				</div>
			</div>
			<div class="form-group row">
				<label for="fname" class="col-sm-2 text-right control-label col-form-label">Company</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="company" placeholder="" required="" name="company">
				</div>
			</div>
			
			<div class="form-group row">
				<label for="lname" class="col-sm-2 text-right control-label col-form-label">Mobile</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="mobile_number" required="" name="mobile_number"
						onChange="checkMobile(this.value);validatenumerics(this.value);">
				</div>
			</div>
			<div class="form-group row">
				<label for="lname" class="col-sm-2 text-right control-label col-form-label">Email</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" required="" id="email_add" name="email"
						onChange="checkEmail(this.value);" placeholder="">
				</div>
			</div>

			<div class="form-group row">
				<label for="lname" class="col-sm-2 text-right control-label col-form-label">Short Code</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" required="" id="shortCode" name="shortCode" placeholder="">
				</div>
			</div>

			<div class="form-group row">
				<label for="cono1" class="col-sm-2 text-right control-label col-form-label">Country</label>
				<div class="col-sm-8">
					<select class="form-control custom-select" name="country_id" id="country_id" required=""
						onchange="getState(this.value)">
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
				<div class="col-sm-8">
					<select class="" name="state_id" id="state_id" style="width: 100%; height:36px;">
						<option value="">Select</option>
					</select>
				</div>
			</div>

			<div class="form-group row" style="display:none;">
				<label for="cono1" class="col-sm-2 text-right control-label col-form-label">Zone</label>
				<div class="col-sm-8">
					<select name="hubs_id" id="hubs_id" class="form-control">
						<option value="">None</option>
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
				<label for="lname" class="col-sm-2 text-right control-label col-form-label">Address</label>
				<div class="col-sm-8">
					<textarea class="form-control" name="address"></textarea>
				</div>
			</div>

			<div class="form-group row">
				<label for="cono1" class="col-sm-2 text-right control-label col-form-label">User Role</label>
				<div class="col-sm-8">
					<select class="select2 form-control custom-select" name="role_id" style="width: 100%; height:36px;"
						required="" onchange="getMerchentId(this.value);">
						<option value="">Select</option>
						<?php
                        foreach ($userrole as $value):
                            ?>
						<option value="<?php echo $value->role_id; ?>"><?php echo $value->role_name; ?></option>
						<?php
                        endforeach;
                        ?>

					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="cono1" class="col-sm-2 text-right control-label col-form-label">User Name</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="user_name" id="user_name"
						onChange="checkUserName(this.value);" placeholder="" required="">
				</div>
			</div>
			<div class="form-group row">
				<label for="cono1" class="col-sm-2 text-right control-label col-form-label">Password</label>
				<div class="col-sm-8">
					<input type="password" class="form-control" name="password" id="cono1" placeholder="" required="">
				</div>
			</div>
			<div class="form-group row">
				<label for="cono1" class="col-sm-2 text-right control-label col-form-label">Status</label>
				<div class="col-sm-8">
					<select class="select2 form-control custom-select" name="status" style="width: 100%; height:36px;"
						required="">
						<option value="1">Active</option>
						<option value="0">Inactive</option>
					</select>
				</div>
			</div>

		</div>
		<div class="border-top">
			<div class="card-body">
				<div align="right">
					<button type="submit" id="savebtn" class="btn btn-primary btn-lg btn-block">Submit</button>
					<button type="button" onclick="cancelList();"
						class="btn btn-danger btn-lg btn-block">Cancel</button>

				</div>
			</div>
		</div>
	</form>
</div>

<script>
	function getState(country_id) {
		//var country_id = 230;
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
					$("#mobile_number").val("");
					$("#mobile_number").focus();
					alert("Sorry already exits.Please try again another name");
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
					$("#email_add").val("");
					$("#email_add").focus();
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
					alert("Sorry already exits.Please try again another name");
					$("#user_name").val("");
					$("#user_name").focus();
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