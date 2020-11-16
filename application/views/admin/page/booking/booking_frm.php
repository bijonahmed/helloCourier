 <div class="card">
 	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/updateBookings">
 		<div class="card-body">
 			<input type="hidden" name="user_id" id="user_id">
 			<div class="form-group row">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">Hubs</label>
 				<div class="col-sm-8">
 					<select name="hubs_id" id="hubs_id" class="form-control">
 						<?php
                                foreach ($hublist as $value) {
                                    ?>
 						<option value="<?php echo $value->hubs_id; ?>"><?php echo $value->hubsname; ?>
 						</option>
 						<?php
						  }?> </select>
 				</div>
 			</div>


 			<div class="form-group row">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">Sender/Marchent</label>
 				<div class="col-sm-8">
 					<input type="text" class="form-control" readonly autofocus="1" value="<?php echo $booking_row->company; ?>">
 				</div>
 			</div>

 			<div class="form-group row">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">Booking Date</label>
 				<div class="col-sm-8">
 					<input type="text" class="form-control" readonly autofocus="1" value="<?php echo $booking_row->date; ?>">

 				</div>
 			</div>

 			<div class="form-group row">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">Reciver Name</label>
 				<div class="col-sm-8">
 					<input type="text" class="form-control" id="reciver_name" placeholder="" required="" name="reciver_name" autofocus="1" value="<?php echo $booking_row->reciver_name; ?>">
 				</div>
 			</div>
 			<div class="form-group row">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">Reciver Address</label>
 				<div class="col-sm-8">
 					<input type="text" class="form-control" id="reciver_address" placeholder="" required="" name="reciver_address" autofocus="1" value="<?php echo $booking_row->reciver_address; ?>">
 				</div>
 			</div>
 			<div class="form-group row">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">Reciver Phone</label>
 				<div class="col-sm-8">
 					<input type="text" class="form-control" id="reciver_phone" placeholder="" required="" name="reciver_phone" autofocus="1" value="<?php echo $booking_row->reciver_phone; ?>">
 				</div>
 			</div>
 			<div class="form-group row">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">Package Description</label>
 				<div class="col-sm-8">
 					<input type="text" class="form-control" id="reciver_packege_des" placeholder="" required="" name="reciver_packege_des" autofocus="1" value="<?php echo $booking_row->reciver_packege_des; ?>">
 				</div>
 			</div>
 			<div class="form-group row">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">Instruction</label>
 				<div class="col-sm-8">
 					<input type="text" class="form-control" id="reciver_instruction" placeholder="" required="" name="reciver_instruction" autofocus="1" value="<?php echo $booking_row->reciver_instruction; ?>">
 				</div>
 			</div>
 			<div class="form-group row">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">Reciver COD</label>
 				<div class="col-sm-8">
 					<input type="text" class="form-control" id="booking_cod" placeholder="" required="" name="booking_cod" autofocus="1" value="<?php echo $booking_row->booking_cod; ?>">
 				</div>
 			</div>

 			<div class="form-group row">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">Update COD</label>
 				<div class="col-sm-8">
 					<input type="text" class="form-control" id="update_cod" placeholder="" required="" name="update_cod" autofocus="1" value="<?php echo $booking_row->update_cod; ?>">
 				</div>
 			</div>

 			<input type="hidden" name="booking_id" value="<?php
               if (isset($booking_row)):
                   echo $booking_row->booking_id;
               endif;
               ?>" />


 			<div class="form-group row">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">Category</label>
 				<div class="col-sm-8">
 					<select name="category_id" id="category_id" required onchange="getpaymentType(this.value);getcategoryId(this.value);">
 						<?php
 foreach ($categoryList as $value):
 ?>
 						<option value="<?php echo $value->category_id; ?>" selected>
 							<?php echo $value->category_name; ?></option>
 						<?php
 endforeach;
 ?>
 					</select>
 				</div>
 			</div>

 			<div class="form-group row" id="thirdParty" style="display: none;">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">3rd Party Charge</label>
 				<div class="col-sm-8">
 					<input type="text" class="form-control" id="third_party_charge" name="third_party_charge" autofocus="1" value="<?php echo $booking_row->third_party_charge; ?>">

 				</div>
 			</div>


 			<div class="form-group row" id="transportType" style="display: none;">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">Transport Type</label>
 				<div class="col-sm-8">
 					<select name="thirdpartyTransportType" id="thirdpartyTransportType" class="form-control">
 						<option value="">Select Transport Type</option>
 						<option value="SA Paribahan">SA Paribahan</option>
 						<option value="Sundarban">Sundarban</option>
 					</select>
 				</div>
 			</div>


 			<?php
if($role_id==1){
?>
 			<div class="form-group row">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">Delivery Charge</label>
 				<div class="col-sm-8">
 					<input type="text" class="form-control" id="delivery_type" name="delivery_type" autofocus="1" value="<?php echo $booking_row->delivery_type; ?>">
 				</div>
 			</div>
 			<div class="form-group row">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">Status</label>
 				<div class="col-sm-8">
 					<select class="form-control" name="status" id="status" style="width: 100%; height:36px;" required="" onchange="getchangesValue(this.value);">
 						<?php
           foreach ($delivery_status as $value) {
               ?>
 						<option value="<?php echo $value->status; ?>"><?php echo $value->display; ?></option>
 						<?php
           }
 ?> </select>
 				</div>
 			</div>
 			<?php }else{ ?>
 			<div class="form-group row">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">Delivery Charge</label>
 				<div class="col-sm-8">
 					<input type="text" class="form-control" id="delivery_type" name="delivery_type" autofocus="1" value="<?php echo $booking_row->delivery_type; ?>" readonly>
 				</div>
 			</div>

 			<?php } ?>


 			<div class="form-group row">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label" style="color: red;">Reason</label>
 				<div class="col-sm-8">
 					<input type="text" class="form-control" id="reason" name="reason" value="<?php echo $booking_row->reason; ?>">
 				</div>
 			</div>
 			<input type="hidden" name="date" value="<?php echo $booking_row->date; ?>">
 			<!-- <input type="hidden"  name="user_id" value="<?php //echo $booking_row->user_id; ?>"> -->

 			<?php
if($role_id==1){
?>
 			<div class="form-group row">
 				<label for="fname" class="col-sm-3 text-right control-label col-form-label">Paid Type</label>
 				<div class="col-sm-8">
 					<select class="form-control custom-select" name="paid_type" id="paid_type" style="width: 100%; height:36px;" required="">
 						<option value="Unpaid">Unpaid</option>
 						<option value="Paid">Paid</option>
 					</select>
 				</div>
 			</div>
 			<?php } ?>
 			<div class="border-top">
 				<div class="card-body">
 					<div align="right">
 						<button type="submit" id="savebtn" class="btn btn-primary btn-lg btn-block">Submit</button>
 						<a href="<?php echo base_url(); ?>booking/booking/getbookingList" style="text-decoration: none;"><button style="margin-top: 10px;" type="button" class="btn btn-danger btn-lg btn-block">Cancel</button></a>
 					</div>
 				</div>
 			</div>
 	</form>
 </div>
 <script>
 	function getcategoryId(categoryId) {

 		if (categoryId == 2) {
 			$("#thirdParty").show("slow");
 			$("#transportType").show("slow");
 		} else {
 			$("#thirdParty").hide();
 			$("#transportType").hide();
 		}
 	}

 	$(document).ready(function() {

 		var status = "<?php echo $booking_row->status; ?>";
 		var deliverytype_id = "<?php echo $booking_row->deliverytype_id; ?>";
 		var paidtype = "<?php echo $booking_row->paid_type; ?>";
 		var category_id = "<?php echo $booking_row->category_id; ?>";
 		//alert(catid);
 		var thirdpartyTransportType = "<?php echo $booking_row->thirdpartyTransportType; ?>";
 		var hubs_id = "<?php echo $booking_row->hubs_id; ?>";
 		var user_id = "<?php echo $booking_row->user_id; ?>";

 		if (hubs_id != 'NULL') {
 			$("#hubs_id").val(hubs_id);
 		}

 		if (user_id != 'NULL') {
 			$("#user_id").val(user_id);
 		}
 		if (status != 'NULL') {

 			$("#status").val(status);
 		}
 		if (category_id != 'NULL') {
 			$("#category_id").val(category_id);
 		}

 		if (thirdpartyTransportType != 'NULL') {
 			$("#thirdpartyTransportType").val(thirdpartyTransportType);
 		}


 		if (category_id == 2) {
 			$("#thirdParty").show("slow");
 			$("#transportType").show("slow");


 		} else {
 			$("#thirdParty").hide();
 			$("#transportType").hide();
 		}

 		if (deliverytype_id != 'NULL') {
 			$("#deliverytype_id").val(deliverytype_id);
 		}
 		if (paidtype != 'NULL') {
 			$("#paid_type").val(paidtype);
 		}



 	});

 	function getpaymentType(category_id) {
 		$.ajax({
 			type: 'post',
 			url: '<?php echo base_url(); ?>mangement/mangement/getPaymentTypeList',
 			data: {
 				category_id: category_id
 			},
 			success: function(response) {
 				document.getElementById("deliverytype_id").innerHTML = response;
 			}
 		});
 	}

 	function getchangesValue(status) {
 		if (status == "Returend" || status == "PRTO" || status == "DRTO") {
 			var amount = '';
 			$("#collection_amount").val(amount);
 		}
 	}
 </script>