<style>
	.form-check,
	label {
		font-size: 14px;
		line-height: 1.42857;
		color: #000;
		font-weight: 400;
	}

	.form-group {
		padding-bottom: 1px;
		position: relative;
		margin: 1px 0 0;
	}

	.form-group {
		padding-bottom: 1px;
		position: relative;
		margin: 1px 0 0;
	}
</style>
<form method="post" action="<?php echo base_url(); ?>marchent/update_bookingUser" id="booking">
	<div class="modal" id="book">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Update Booking</h4>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="login-wrap text-center">
						<div class="login-form clrbg-before">


							<div class="row">
								<br>
								<div class="col-md-12">
									<div class="form-group">
										<label for="uname">Type:</label><br>
										<select name="rate_type" id="ratetype" style="width: 100%;" required="" onchange="validation(this.value); ">
											<option selected="selected">Select</option>
											<option value="Domestic">Domestic</option>
											<option value="International">International</option>
										</select>
										<input type="hidden" id="booking_id" name="booking_id" style="width:100%;">
									</div>
									<div class="form-group" style="display: none;">
										<label for="uname">Customer:</label>
										<input type="hidden" name="user_id" id="user_id" style="width: 100%;" value="<?php echo $this->session->userdata('user_id');?>">

									</div>
									<div class="form-group">
										<label for="uname">Receiver Name:</label>
										<div class="form-group">
											<input type="text" id="recv_name" required="" name="recv_name" style="width:100%;">
										</div>
									</div>
									<div class="form-group">
										<label for="uname">Receiver Phone:</label>
										<div class="form-group">
											<input type="text" id="recv_phone" required="" name="recv_phone" style="width:100%;">
										</div>
									</div>
									<div class="form-group">
										<label for="uname">Receiver Email:</label>
										<div class="form-group">
											<input type="text" id="recv_email" required="" name="recv_email" style="width:100%;">
										</div>
									</div>
									<div class="form-group">
										<label for="uname">Receiver Address :</label>
										<textarea id="recv_address" placeholder="Receiver Address " name="recv_address" style="width:100%; height: 50px;"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="uname">Form Location:</label>
										<div class="form-group">
											<select name="frmLocation" id="frmLocation" style="width: 100%; height:36px;">
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="uname">To Location:</label>
										<select name="toLocation" id="toLocation" style="width: 100%; height:36px;" onchange="checkWeightList(this.value);">
										</select>
									</div>
									<div class="form-group" id="intpartner">
										<label for="uname">Partner:</label>
										<input type="text" id="partner" name="partner" style="width:100%;">
									</div>
									<div class="form-group" id="intwaybillno">
										<label for="uname">Way Bill No:</label>
										<input type="text" id="wayBillNo" name="wayBillNo" style="width:100%;">
									</div>
									<div class="form-group">
										<label for="uname">Product Content:</label>
										<input type="text" id="productContent" name="productContent" style="width:100%;">
									</div>
									<div class="form-group">
										<label for="uname">Weight:</label>
										<select style="width:100%;" name="rate_id" id="rate_id" onchange="getRateCost(this.value);">
											<option selected="selected">Select</option>
										</select>
									</div>
									<div class="form-group">
										<label for="uname">Cost:</label>
										<input type="text" id="show_cost" name="show_cost" style="width:100%;" readonly>
									</div>
									<div class="form-group" style="display: none;">
										<label for="uname">Status:</label>
										<input type="text" name="status_id" id="status_id" style="width:100%;" value="1">

									</div>
									<div class="form-group">
										<label for="uname">Note:</label>
										<textarea id="note" name="note" style="width:100%; height: 50px;"></textarea>
									</div>

								</div>
							</div>


						</div>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-lg btn-block" onclick="bookingaddeditfrm();">Update</button>
                      <button type="button" class="btn btn-primary btn-lg btn-block" onclick="back();">Back</button>
					</div>

				</div>
			</div>
		</div>
</form>
<script src="<?php echo base_url(); ?>resource/merchent/assets/js/core/jquery.min.js"></script>
<script>
    function back(){
        location.replace("<?php echo base_url();?>marchent");
    }
	$(document).ready(function() {
		$('#book').modal('show');
        $("#intpartner").hide();
	    $("#intwaybillno").hide();
		//alert("<?php echo $booking->booking_id; ?>");
		var booking_id = "<?php echo $booking->booking_id; ?>";
		$.ajax({
			url: "<?php echo base_url(); ?>booking/booking/geteditBookingData?booking_id=" + booking_id,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				getFrmLocation(json.frmLocation, json.rate_type);
				getToLocation(json.toLocation, json.rate_type);
				getRate(json.rate_id);
				$('#ratetype').val(json.rate_type);
				$('#user_id').val(json.user_id);
				$('#booking_id').val(json.booking_id);
				$('#recv_name').val(json.recv_name);
				$('#recv_phone').val(json.recv_phone);
				$('#recv_email').val(json.recv_email);
				$('#recv_address').val(json.recv_address);
				$('#wayBillNo').val(json.wayBillNo);
				$('#productContent').val(json.productContent);
				$('#rate_id').val(json.rate_id);
				$('#show_cost').val(json.show_cost);
				$('#custom_cost').val(json.custom_cost);
				$('#actual_cost').val(json.actual_cost);
				$('#status_id').val(json.status_id);
				$('#note').val(json.note);
				$('#frmLocation').val(json.frmLocation);
				$('#rate_id').val(json.rate_id);
				$('#myModal').modal('show');
			}
		});


	});

	//edit
	function getFrmLocation(frmLocation, rate_type) {
		$.ajax({
			type: 'post',
			url: '<?php echo base_url();?>mangement/mangement/bookingFrmLocationEdit',
			data: {
				frmLocation: frmLocation,
				rate_type: rate_type
			},
			success: function(response) {
				//console.log(response);
				$("#frmLocation").html(response);
			}
		});
	}

	function getToLocation(toLocation, rate_type) {
		$.ajax({
			type: 'post',
			url: '<?php echo base_url();?>mangement/mangement/bookingToLocationEdit',
			data: {
				toLocation: toLocation,
				rate_type: rate_type
			},
			success: function(response) {
				//console.log(response);
				$("#toLocation").html(response);
			}
		});
	}

	function getRate(rate_id) {
		$.ajax({
			type: 'post',
			url: '<?php echo base_url();?>mangement/mangement/searchRateId',
			data: {
				rate_id: rate_id,
			},
			success: function(response) {
				$("#rate_id").html(response);
			}
		});
	}
</script>