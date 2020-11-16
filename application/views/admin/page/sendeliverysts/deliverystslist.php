<font color="green">
	<?php
    $message = $this->session->userdata('msg');
    if (isset($message)) {
        echo $message;
        $this->session->unset_userdata('msg');
    }
    ?>
</font>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<h5 class="card-title">Delivery Status</h5>
							</div>
						</div>
						<center>
							<font color="red">
								<?php
                                $message = $this->session->userdata('assign_msg');
                                if (isset($message)) {
                                    echo $message;
                                    $this->session->unset_userdata('assign_msg');
                                }
                                ?>
							</font>
						</center>
						<br>
						<div class="row">
							<div class="col-6">
								<select class="form-control custom-select" name="user_id" id="deliveryman_id" required="">
									<?php foreach ($delivery_men as $value):
                    ?>
									<option value="<?php echo $value->user_id; ?>"><?php echo $value->full_name; ?></option>
									<?php  endforeach;    ?>
								</select>
							</div>
							<div class="col-2">
								<input type="text" name="date" id="date" class="form-control" value="<?php echo date("d-m-Y"); ?>">
							</div>
							<div class="col-2">
								<button class="btn btn-primary" type="button" onclick="get()"><i class="fa fa-search"></i> </button>
							</div>
						</div>
						<br>
						<form action="<?php echo base_url(); ?>mangement/mangement/updateBookingStatus" method="post">
							<div id="form-group-item" style="width:100%; height:450px; overflow:auto; ">
								<table class="table table-hover table-sm" id="item_list">
									<thead class="thead-primary">
										<tr>
									   <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'booking_id\']').prop('checked', this.checked);" /></td>
											<td style="width: 5px;">S.L</td>
											<td class="text-left">Booking ID</td>
                      <td class="text-left">Send COD Amt</td>
											<td class="text-left">Send Status</td>
											<td class="text-left">Reciv.Name</td>
											<td class="text-left">Reciv.Phone</td>
											<td class="text-left">Reciv.Address</td>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Do you really want to confirm....?');">Approved Booking Status</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script>
	// show Delivery Table
	$(function() {
		$("#date").datepicker();
	});
	function get() {
		$('#item_list tbody tr').remove();
		var status = '1';
		var deliveryman_id = $("#deliveryman_id").val();
		var b_date = $("#date").val();
		//console.log(sts);
		//var statuss = ['Booked', 'Waiting for Pickup/Picked','Waiting for Pickup/Picked','Delay/Returend/Deliveried'];
		sl = 1;
		$('#loading').html('<img src="http://sampsonresume.com/labs/pIkfp.gif"> loading...');
		$.ajax({
			url: "<?php echo base_url(); ?>sendeliverysts/deliverysts/jsonDeliverymanData?deliveryman_id=" + deliveryman_id + "&b_date=" + b_date + "&status=" + status,
			type: "GET",
			dataType: 'json',
			success: function(json) {
			$('#loading').html(json);
			$.map(json, function(item) {
			var id = "item_list" + item.booking_id;
			var html = "<tr id='" + id + "'>";
			html += "<td><input type=checkbox name='booking_id[]' value=" + item.booking_id + "></td>";
			html += "<td class='text-center'>" + sl + "</td>";
			html += "<td class='text-left'><a target='_blank' href='<?php echo base_url(); ?>booking/booking/edit_booking_frm/" + item.booking_id + "'>" + item.booking_id + "</td>";
			html += "<td><input class='text-right' type='text' name='send_collection_amount[]' value=" + item.send_collection_amount + "></td>";
			html += "<td><input class='text-right' readonly type='text' name='send_delivery_status[]' value=" + item.send_delivery_status + "></td>";
			html += "<td class='text-left' >" + item.reciver_name + "</td>";
			html += "<td class='text-left' >" + item.reciver_phone + "</td>";
			html += "<td class='text-left' >" + item.reciver_address + "</td>";
			html += "</tr>";
		if ($('#' + id).length < 1) {
			$('#form-group-item #item_list tbody').append(html);
			sl++;
		}
				});
			}
		});
	}
</script>
