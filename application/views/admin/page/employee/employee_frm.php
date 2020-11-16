<script src="<?php echo base_url(); ?>resource/assets/libs/jquery/dist/jquery.min.js"></script>
<div class="card">


	<?php
$message = $this->session->userdata('msg');
if (isset($message)) {
    echo $message;
    $this->session->unset_userdata('msg');
}
?>
	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/insertEmployee" enctype="multipart/form-data">
		<div class="card-body">
			<h4 class="card-title">Add Employee</h4>
			<hr>
			<div class="form-group row">
				<label for="fname" class="col-sm-2 text-right control-label col-form-label">Name</label>
				<div class="col-sm-8">
					<?php
                    if (isset($row->employeename )){
                        ?>
					<input type="text" class="form-control" id="employeename " placeholder="" required="" name="employeename" autofocus="1" value="<?php echo $row->employeename ; ?>">
					<?php
                    }else{
                        ?>
					<input type="text" class="form-control" id="employeename " placeholder="" required="" name="employeename">
					<?php
                    }
                    ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="fname" class="col-sm-2 text-right control-label col-form-label">Phone Number</label>
				<div class="col-sm-8">
					<?php
                    if (isset($row->mobile_number )){
                        ?>
					<input type="text" class="form-control" id="mobile_number" placeholder="" required="" name="mobile_number" value="<?php echo $row->mobile_number ; ?>">
					<?php
                    }else{
                        ?>
					<input type="text" class="form-control" id="mobile_number" placeholder="" required="" name="mobile_number">
					<?php
                    }
                    ?>
				</div>
			</div>


			<div class="form-group row">
				<label for="fname" class="col-sm-2 text-right control-label col-form-label">Email</label>
				<div class="col-sm-8">
					<?php
                    if (isset($row->email )){
                        ?>
					<input type="text" class="form-control" id="email" name="email" value="<?php echo $row->email ; ?>" required="">
					<?php
                    }else{
                        ?>
					<input type="text" class="form-control" id="email" name="email" required="">
					<?php
                    }
                    ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="fname" class="col-sm-2 text-right control-label col-form-label">Address</label>
				<div class="col-sm-8">
					<?php
                    if (isset($row->address )){
                        ?>
					<textarea name="address" class="form-control" required=""><?php echo $row->mobile_number ; ?></textarea>
					<?php
                    }else{
                        ?>
					<textarea name="address" class="form-control" required=""></textarea>
					<?php
                    }
                    ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="fname" class="col-sm-2 text-right control-label col-form-label">Department</label>
				<div class="col-sm-8">
					<?php
                    if (isset($row->dpt_id )){
                        ?>
					<select name="dpt_id" id="dpt_id" required="" style="width: 100%;">
						<option value="">Select Designation</option>
						<?php
                                foreach ($department as $value):
                                    ?>
						<option value="<?php echo $value->dpt_id; ?>">
							<?php echo $value->dpt_name ; ?></option>
						<?php
                                endforeach;
                                ?>
					</select>
					<?php
                    }else{
                        ?>
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
					<?php
                    }
                    ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="fname" class="col-sm-2 text-right control-label col-form-label">Designation</label>
				<div class="col-sm-8">
					<?php
                    if (isset($row->designation_id )){
                        ?>
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
					<?php
                    }else{
                        ?>
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
					<?php
                    }
                    ?>
				</div>
			</div>




			<div class="form-group row">
				<label for="fname" class="col-sm-2 text-right control-label col-form-label">Salary</label>
				<div class="col-sm-8">
					<?php
                    if (isset($row->salary)){
                        ?>
					<input type="text" class="form-control" id="salary" name="salary" required="" value="<?php echo $row->salary ; ?>">
					<?php
                    }else{
                        ?>
					<input type="text" class="form-control" id="salary" name="salary" required="">
					<?php
                    }
                    ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="fname" class="col-sm-2 text-right control-label col-form-label">Join Date</label>
				<div class="col-sm-8">
					<?php
                    if (isset($row->joindate)){
                        ?>
					<input type="text" class="form-control" id="joindate" required="" name="joindate" autofocus="1" value="<?php echo date("d-m-Y",strtotime($row->joindate));?>">
					<?php
                    }else{
                        ?>
					<input type="text" class="form-control" id="joindate" required="" name="joindate">
					<?php
                    }
                    ?>
				</div>
			</div>
			<input type="hidden" name="employeeid" value="<?php
            if (isset($row)):
                echo $row->employeeid;
            endif;
            ?>" />

			<div class="form-group row">
				<label for="cono1" class="col-sm-2 text-right control-label col-form-label">Status</label>
				<div class="col-sm-8">
					<select  name="status" id="status" style="width: 100%; height:36px;" required="">
						<option value="" selected="selected">Select Status</option>
						<option value="1">Active</option>
						<option value="0">Inactive</option>
					</select>
				</div>
			</div>
			
			 <div class="form-group row">
                            <label for="cono1" class="col-sm-2 text-right control-label col-form-label">Photo</label>
                            <div class="col-sm-10">
                                <input type="file" name="image" id="image"><br>
								<?php
                    if (isset($row->image)){
                        ?>
						<img src="<?php echo base_url();?><?php echo $row->image;?>" style="height: 150px; width: 150px;">
						<?php } ?>
                            </div>
             </div>
			<div class="border-top">
				<div class="card-body">
					<div align="right">
						<button type="submit" id="savebtn" class="btn btn-primary btn-lg btn-block">Submit</button>
						<a href="<?php echo base_url(); ?>employee/employee/getemployeelist" style="text-decoration: none;"><button style="margin-top: 10px;" type="button" class="btn btn-danger btn-lg btn-block">Cancel</button></a>

					</div>
				</div>
			</div>
	</form>
</div>

<script>
	$(document).ready(function() {
		$("#joindate").datepicker();
		var status = '<?php if(isset($row->status)){ echo $row->status; } ?>';
		var dpt_id = '<?php if(isset($row->dpt_id )){ echo $row->dpt_id ; } ?>';
		var designation_id = '<?php if(isset($row->designation_id)){ echo $row->designation_id; } ?>';
		//alert(status);
		if (status != 'NULL') {
			$("#status").val(status);
		}else{
			$("#status").val('1');
		}
		
		if (dpt_id != 'NULL') {
			$("#dpt_id").val(dpt_id);
		}
		
		if (designation_id != 'NULL') {
			$("#designation_id").val(designation_id);
		}

	});
</script>