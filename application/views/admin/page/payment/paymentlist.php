<style>
	body {
		font-family: "Arial Black", Gadget, sans-serif font-size: 15px;
		color: #020202;
		letter-spacing: 1px;
	}

	.btn-light {
		color: #212529;
		background-color: #fff;
		border-color: #080909;
	}

	.modal-lg {

		-webkit-transform: translate(0, -50%);
		-o-transform: translate(0, -50%);
		transform: translate(0, -50%);
		margin: 0 auto;

	}
</style>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-6 col-md-2">
						Status
						<select id="status" style="width:100%;" class="search form-control">
							<?php
                                foreach ($status as $value):
                                    ?>
							<option value="<?php echo $value->status_id; ?>" selected="selected">
								<?php echo $value->display ; ?></option>
							<?php
                                endforeach;
                                ?>
						</select>
					</div>
					<div class="col-6 col-md-2">
						From Date
						<input type="text" name="f_date" id="f_date" class="form-control" value="<?php echo date("d-m-Y", strtotime("-3 day")); ?>">
					</div>
					<div class="col-6 col-md-2">
						To Date
						<input type="text" name="t_date" id="t_date" class="form-control" value="<?php echo date("d-m-Y"); ?>">
					</div>
					<div class="col-6 col-md-3">
						<br>
						<button id="myBtn" onclick="filterBooking();" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>

						<button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>
					</div>

				</div>
			</div>
			<center>
				<div id="loading"></div>
			</center>
			<div id="form-group-item" style="width:100%; height:450px; overflow:auto; background-color:#6f046e; color:white;">
				<table class="table table-hover table-sm" id="item_list">
					<thead class="thead-primary">
						<tr>
							<td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'bookingId\']').prop('checked', this.checked);" /></td>
							<td style="width: 5px;">S.L</td>
							<td class="text-left">Date</td>
							<td class="text-left">Customer Name</td>
							<td class="text-left">Customer Mobile</td>
							<td class="text-left">Type of Payment</td>
							<td class="text-left">Amount</td>
							<td class="text-left">Status</td>
							<td class="text-left">Edit</td>

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
<!--start edit modal -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog right modal-lg">
		<div class="modal-content animated">
			<!-- Modal Header -->
			<div class="modal-header bg-primary">
				<h5 class="modal-title text-white">
					<div style="font-size: 18px; font-weight: bold; color: yellow;" class="modal-title">
						Customer Payment

					</div>
				</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- Modal body -->
			<form method="post" id="booking">
				<div class="row" style="padding: 10px;">
					<br>
					<div class="col-md-6">

						<div class="form-group">
							<label for="uname">Customer:</label>
							<select class="user_id" name="user_id" id="user_id" style="width: 100%;" required>
								<option value="" selected="selected">Select</option>
								<?php
                                foreach ($marchent as $value):
                                    ?>
								<option value="<?php echo $value->user_id; ?>">
									<?php echo $value->company . ' [' . $value->full_name . ']' . ' -' . $value->mobile_number . ''; ?>
								</option>
								<?php
                                endforeach;
                                ?>
							</select>
						</div>


						<div class="form-group">
							<label for="uname">Type of payment:</label>
							<select name="typeofpayment" id="typeofpayment" style="width:100%;" required>
								<option value="" selected="selected">Select</option>
								<option value="Cashenvoy">Cashenvoy</option>
								<option value="PayPal">PayPal</option>
								<option value="Cash">Cash</option>
								<option value="Bank Payment">Bank Payment</option>
								<option value="Others">Others</option>
							</select>
						</div>

					</div>

					<div class="col-md-6">
						<input type="hidden" name="entry_date" id="entry_date" value="<?php echo date("Y-m-d");?>" />
						<input type="hidden" name="customer_payment_id" id="customer_payment_id" />
						
						

						<div class="form-group">
							<label for="uname">Amount:</label>
							<input type="text" id="amount" name="amount" style="width:100%;" required>
						</div>
						<div class="form-group">
							<label for="uname">Status:</label>
							<select name="status_id" id="status_id" style="width:100%;">
								<option selected="selected">Select</option>
								<?php
                                foreach ($status as $value):
                                    ?>
								<option value="<?php echo $value->status_id; ?>">
									<?php echo $value->display ; ?>
								</option>
								<?php
                                endforeach;
                                ?>
							</select>
						</div>
						<div class="form-group">
							<label for="uname">Note:</label>
							<textarea id="note" name="note" style="width:100%; height: 50px;"></textarea>
						</div>
						<button class="btn btn-primary btn-block" type="button" onclick="storeEntryFrom();">Save</button><br>
					</div>

				</div>
		</div>
		</form>
	</div>
</div>
<script>
	function storeEntryFrom() {
		var user_id = $('.user_id').attr('class'); //$("#userid").val();
		var amount = $("#amount").val();
		var typeofpayment = $("#typeofpayment").val();
		var dataString = $("#booking").serialize();
		if (user_id !== '' && amount !== '' && typeofpayment !== '') {
			$.ajax({
				type: "POST",
				dataType: 'json',
				url: "<?php echo base_url(); ?>mangement/mangement/save_payment",
				data: dataString,
				success: function(data) {
					//console.log(data);
					$("#lastBookingId").text("Booking ID:-" + data);
					//$("#delivery_type").val(response.dvcharge);
					filterBooking();
					 $('#booking')[0].reset();
					successfullyInsert();
				}
			});
			return false; //stop the actual form post !important!
		} else {
			// alert("Please check blank filed or dropdow.");
			inputboxValidation();
		}
	}


	//  $('#myModal').modal('show');
	$("#name").keyup(function(event) {
		if (event.keyCode === 13) {
			$("#myBtn").click();
		}
	});

	function filterBooking() {
		$('#item_list tbody tr').remove();
		var value = $("#name").val();
		var f_date = $("#f_date").val();
		var t_date = $("#t_date").val();
		var status = $("#status").val();
		sl = 1;
		$('#loading').html(
			'<img src="<?php echo base_url(); ?>/resource/admin/assets/images/loading.gif"> loading...');
		$.ajax({
			url: "<?php echo base_url(); ?>customer_payment/customerpayment/getcustomerpayment?name=" + value + "&f_date=" + f_date +
				"&t_date=" + t_date + "&status=" + status,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				$('#loading').html(json);
				$.map(json, function(item) {
					//console.log(item.onlinePayment);
					var id = "item_list" + item.customer_payment_id;
					var html = "<tr id='" + id + "'>";
					html += "<td ><input type='checkbox' checkbox name='bookingId[]' value='" + item.customer_payment_id + "'>" + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.customer_payment_id + ")>" + sl + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.customer_payment_id + ")>" + item.entry_date + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.customer_payment_id + ")>" + item.company + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.customer_payment_id + ")>" + item.mobile_number + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.customer_payment_id + ")>" + item.typeofpayment + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.customer_payment_id + ")>" + item.amount + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.customer_payment_id + ")>" + item.display + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.customer_payment_id + ")>" + 'Edit' + "</td>";
					
					 
					if ($('#' + id).length < 1) {
						$('#form-group-item #item_list tbody').append(html);
						sl++;
					}
				});
			}
		});
	}
	filterBooking();
	  $(function () {
        $("#f_date").datepicker();
        $("#t_date").datepicker();
 
    });
	// for edit using function
	function getsId(customer_payment_id) {
		$.ajax({
			url: "<?php echo base_url(); ?>customer_payment/customerpayment/geteditcustomerData?customer_payment_id=" + customer_payment_id,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				$('#ratetype').val(json.rate_type);
				$('#user_id').val(json.user_id);
				$('#customer_payment_id').val(json.customer_payment_id);
				$('#typeofpayment').val(json.typeofpayment);
				$('#amount').val(json.amount);
				$('#status_id').val(json.status_id);
				$('#note').val(json.note);
				$('#myModal').modal('show');
			}
		});
	}

	// copy excel
	function copyClipboard() {
		var elm = document.getElementById("form-group-item");
		// for Internet Explorer
		if (document.body.createTextRange) {
			var range = document.body.createTextRange();
			range.moveToElementText(elm);
			range.select();
			document.execCommand("Copy");
			alert("Copied all booking to clipboard");
		} else if (window.getSelection) {
			// other browsers
			var selection = window.getSelection();
			var range = document.createRange();
			range.selectNodeContents(elm);
			selection.removeAllRanges();
			selection.addRange(range);
			document.execCommand("Copy");
			alert("Copied all booking to clipboard");
		}
	}
</script>