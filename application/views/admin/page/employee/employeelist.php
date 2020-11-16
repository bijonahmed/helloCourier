   	<center><?php
$message = $this->session->userdata('msg');
if (isset($message)) {
    echo $message;
    $this->session->unset_userdata('msg');
}
?></center>
   	<div class="row">
   		<div class="col-lg-12">
   			<div class="card">
   				<div class="card-body">
   					<div class="row">
   						<div class="col-md-6">
   							<h5 class="card-title">Employee List</h5>
   						</div>
   						<div class="col-md-6">
   							<!--<button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> </button>-->
   							<div align="right"><button type="button" class="btn btn-primary" onclick="showModal();">Add New Employee</button></a></div><br>
   						</div>
   					</div>
   					<div class="row">
   						<div class="col-8">
   							<div align="right">
   								<input type="text" id="name" class="search form-control" placeholder="Search Name..." autofocus>
   							</div>
   						</div>
   						<div class="col-3">
   							<select class="form-control" id="status">
   								<option value="1">Active</option>
   								<option value="0">Inactive</option>
   							</select>
   						</div>
   						<div class="col-1">
   							<button id="myBtn" onclick="filterCategory();" class="btn btn-primary"><i class="fa fa-search"></i> </button>
   						</div>
   					</div>
   				</div>
   				<br>
   				<center>
   					<div id="loading"></div>
   				</center>
   				<div id="form-group-item" style="width:100%; height:450px; overflow:auto; ">
   					<table class="table table-hover table-sm" id="item_list">
   						<thead class="thead-primary">
   							<tr>
   								<td class="text-center">S.L</td>
   								<td class="text-left">Name</td>
   								<td class="text-left">Phone</td>
   								<td class="text-left">Photo</td>
   								<td class="text-left">Salary</td>
   								<td class="text-left">Status</td>
   								<td class="text-center">Action</td>
   							</tr>
   						</thead>
   						<tbody>
   						</tbody>
   					</table>
   				</div>
   			</div>
   		</div>
   	</div>
   	</div>
   	<form method="post" id="employee" enctype="multipart/form-data" action="<?php echo base_url(); ?>mangement/mangement/insertEmployee">
   		<div class="modal fade" id="myModal">
   			<div class="modal-dialog center modal-lg">
   				<div class="modal-content animated">
   					<!-- Modal Header -->
   					<div class="modal-header bg-primary">
   						<h5 class="modal-title text-white">
   							<div style="font-size: 15px;" class="modal-title">
   								Add Employee
   							</div>
   						</h5>
   						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
   							<span aria-hidden="true">&times;</span>
   						</button>
   					</div>
   					<!-- Modal body -->
   					<div class="form-group row" style="margin-top: 15px;">
   						<label for="fname" class="col-sm-2 text-right control-label col-form-label">Name</label>
   						<div class="col-sm-8">
   							<input type="text" class="form-control" id="employeename" placeholder="Name" required="" name="employeename">
   						</div>
   					</div>
   					<div class="form-group row">
   						<label for="fname" class="col-sm-2 text-right control-label col-form-label">Phone</label>
   						<div class="col-sm-8">
   							<input type="text" class="form-control" id="mobile_number" placeholder="Phone" required="" name="mobile_number" onkeydown="checkMobileNumber(this.value);">
							<span id="msg" style="color:red; font-size: 15px;"></span>
   						</div>
   					</div>
   					<div class="form-group row">
   						<label for="fname" class="col-sm-2 text-right control-label col-form-label">Email</label>
   						<div class="col-sm-8">
   							<input type="text" class="form-control" id="email" name="email" required="Email" placeholder="Email" onkeydown="checkEmailNumber(this.value);">
								<span id="emsg" style="color:red; font-size: 15px;"></span>
   						</div>
   					</div>
   					<div class="form-group row">
   						<label for="fname" class="col-sm-2 text-right control-label col-form-label">Address</label>
   						<div class="col-sm-8">
   							<textarea name="address" id="address" class="form-control" required="Address" placeholder="Address"></textarea>
   						</div>
   					</div>
   					<div class="form-group row">
   						<label for="fname" class="col-sm-2 text-right control-label col-form-label">Department</label>
   						<div class="col-sm-8">
   							<select name="dpt_id" id="dpt_id" required="" style="width: 100%;">
   								<option value="">Select Department</option>
   								<?php
                                    foreach ($department as $value):
                                        ?>
   								<option value="<?php echo $value->dpt_id; ?>">
   									<?php echo $value->dpt_name ; ?></option>
   								<?php
                                    endforeach;
                                    ?>
   							</select>
   						</div>
   					</div>
   					<div class="form-group row">
   						<label for="fname" class="col-sm-2 text-right control-label col-form-label">Designation</label>
   						<div class="col-sm-8">
   							<select name="designation_id" id="designation_id" required="" style="width: 100%;">
   								<option value="">Select Designation</option>
   								<?php
                                    foreach ($designation as $value):
                                        ?>
   								<option value="<?php echo $value->designation_id; ?>">
   									<?php echo $value->designation_name ; ?></option>
   								<?php
                                    endforeach;
                                    ?>
   							</select>
   						</div>
   					</div>
   					<div class="form-group row">
   						<label for="fname" class="col-sm-2 text-right control-label col-form-label">Salary</label>
   						<div class="col-sm-8">
   							<input type="text" class="form-control" id="salary" name="salary" required="" placeholder="Salary">
									<input type="hidden" class="form-control" id="employeeid" name="employeeid">
   						</div>
   					</div>
   					<div class="form-group row">
   						<label for="fname" class="col-sm-2 text-right control-label col-form-label">Join Date</label>
   						<div class="col-sm-8">
   							<input type="text" class="form-control" id="joindate" required="" name="joindate" placeholder="Join Date">
   						</div>
   					</div>
   					<div class="form-group row">
   						<label for="cono1" class="col-sm-2 text-right control-label col-form-label">Status</label>
   						<div class="col-sm-8">
   							<select name="status" id="status" style="width: 100%; height:36px;" required="">
   								<option value="1" selected="selected">Active</option>
   								<option value="0">Inactive</option>
   							</select>
   						</div>
   					</div>
   					<div class="form-group row">
   						<label for="cono1" class="col-sm-2 text-right control-label col-form-label">Photo</label>
   						<div class="col-sm-10">
   							<input type="file" name="image" id="image"><br>
							<div id="showimage"></div>
   						</div>
   					</div>
   					<button type="submit" id="addedit_frm" class="btn btn-primary btn-lg btn-block">Save & New</button>
   				</div>
   			</div>
   		</div>
   	</form>
   	<!-- Modal footer -->
   	<script>
	function checkEmailNumber(email){
	$.ajax({
			url: "<?php echo base_url(); ?>employee/employee/checkEmail?email=" + email,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				console.log(json);
				var result = json;
				if (result == 'yes') {
					$("#addedit_frm").hide();
					$("#emsg").text("Sorry already phone number exits. Try another phone number ");
					$("#email").focus();
				}
				if (result == 'no') {
					$("#addedit_frm").show();
					$("#emsg").text("");
				}
			}
		});
	}	
	function checkMobileNumber(mobile_number)
	{
		$.ajax({
			url: "<?php echo base_url(); ?>employee/employee/checkMobile?mobile_number=" + mobile_number,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				console.log(json);
				var result = json;
				if (result == 'yes') {
					$("#addedit_frm").hide();
					$("#msg").text("Sorry already phone number exits. Try another phone number ");
					$("#mobile_number").focus();
				}
				if (result == 'no') {
					$("#addedit_frm").show();
					$("#msg").text("");
				}
			}
		});
	}
	function showModal(){
		$("#employee")[0].reset();
		$('#showimage').html("");
		$('#myModal').modal('show');
	}
	$(document).ready(function() {
		$("#joindate").datepicker();
	});
	$("#name").keyup(function(event) {
		if (event.keyCode === 13) {
			$("#myBtn").click();
		}
	});
	function filterCategory() {
		$('#item_list tbody tr').remove();
		var value = $("#name").val();
		var sts = $("#status").val();
		//console.log(sts);
		var statuss = ['Inactive', 'Active'];
		sl = 1;
		$('#loading').html('<img src="<?php echo base_url(); ?>/resource/admin/assets/images/loading.gif"> loading...');
		$.ajax({
			url: "<?php echo base_url(); ?>/employee/employee/getjsonEmployee?name=" + value + "&status=" + sts,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				$('#loading').html(json);
				$.map(json, function(item) {
					var images = '<?php echo base_url() ?>' + item.image;
					var id = "item_list" + item.employeeid;
					var html = "<tr id='" + id + "'>";
					html += "<td>" + sl + "</td>";
					html += "<td class='text-left'>" + item.employeename + "</td>";
					html += "<td class='text-left'>" + item.mobile_number + "</td>";
					if (item.image !== null && item.image !== '') {
						html += "<td class='text-left'>" + '<img class="img-thumbnail" style="height: 100px; width: 100px;" src="' + images + '" />' + "</td>";
					} else {
						html += "<td class='text-left'>" + 'Image Not found' + "</td>";
					}
					html += "<td class='text-left'>" + item.salary + "</td>";
					html += "<td class='text-left'>" + statuss[item.status] + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.employeeid + ")>" + 'Edit' + "</td>";
					html += "</tr>";
					if ($('#' + id).length < 1) {
						$('#form-group-item #item_list tbody').append(html);
						sl++;
					}
				});
			}
		});
	}
	function getsId(employeeid) {
		$.ajax({
			url: "<?php echo base_url(); ?>employee/employee/findEmployeeFrm?employeeid=" + employeeid,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				$('#employeeid').val(json.employeeid);
				$('#employeename').val(json.employeename);
				$('#mobile_number').val(json.mobile_number);
				$('#email').val(json.email);
				$('#address').val(json.address);
				$('#salary').val(json.salary);
				$('#joindate').val(json.joindate);
				$('#dpt_id').val(json.dpt_id);
				$('#designation_id').val(json.designation_id);
				$('#status').val(json.status);
				var images = '<?php echo base_url() ?>' + json.image;
				$('#showimage').html("");
				$('#showimage').append('<img style="height: 150px; width: 160px; "  src="' + images + '" />');
				$('#myModal').modal('show');
			}
		});
	}
	filterCategory();
   	</script>