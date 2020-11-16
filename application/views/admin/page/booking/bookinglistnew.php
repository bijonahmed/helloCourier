<style>
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
					<div class="col-6 col-md-3">
						Search Email, Country
						<input type="text" id="name" class="search form-control" placeholder="Search... Booking ID" autofocus>
					</div>
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
							<td class="text-left">Booking ID</td>
							<td class="text-left">Customer Name</td>
							<td class="text-left">Reciver Name</td>
							<td class="text-left">Reciver Mobile</td>
							<td class="text-left">Rate Type</td>
							<td class="text-left">Weight</td>
							<td class="text-left">Status</td>
							<td class="text-left">Print</td>
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
						Booking
						<span id="lastBookingId" style="font-size: 12px; color: yellow; font-weight: bold;"></span>
					</div>
				</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- Modal body -->
			<form method="post" action="" id="booking">
				<div class="row" style="padding: 10px;">
					<br>
					<div class="col-md-4">
						<div class="form-group">
							<label for="uname">Type:</label><br>
							<select name="rate_type" id="ratetype" style="width: 100%;" required="" onchange="validation(this.value); ">
								<option selected="selected">Select</option>
								<option value="Domestic">Domestic</option>
								<option value="International">International</option>
							</select>
							<input type="hidden" id="booking_id" name="booking_id" style="width:100%;">
						</div>
						<div class="form-group">
							<label for="uname">Customer:</label>
							<select class=" user_id" name="user_id" id="user_id" style="width: 100%;">
								<option selected="selected">Select</option>
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
					<div class="col-md-4">
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
						<div class="form-group" style="font-size: 28px; font-weight: bold; color: green;">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="uname">Cost:</label>
							<input type="text" id="show_cost" name="show_cost" style="width:100%;" readonly>
						</div>
						<div class="form-group">
							<label for="uname">Custom Cost:</label>
							<input type="text" id="custom_cost" name="custom_cost" style="width:100%;" value="0" onkeyup="customCost(this.value);">
						</div>
						<div class="form-group">
							<label for="uname">Total:</label>
							<input type="text" id="totalAmt" name="totalAmt" style="width:100%;" readonly>
						</div>
						<div class="form-group">
							<label for="uname">Input Actual Cost:</label>
							<input type="text" id="actual_cost" name="actual_cost" style="width:100%;">
						</div>
						<div class="form-group">
							<label for="uname">Status:</label>
							<select name="status_id" id="status_id" style="width:100%;">
								<option value="">Select</option>
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
						<button class="btn btn-primary btn-block" type="button" onclick="bookingaddeditfrm();">Update</button><br>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>
<script>
	function customCost(customCost) {
		var totalAmt = $("#totalAmt").val();
		var result = parseFloat(customCost) + parseFloat(totalAmt);
		$("#totalAmt").val(result);
	}
	function checkWeightList(toLocation) {
		var frmLocation = $("#frmLocation").val();
		$.ajax({
			type: 'get',
			url: '<?php echo base_url();?>mangement/mangement/checkRateCostList',
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
			url: '<?php echo base_url();?>mangement/mangement/checkRateCost',
			data: {
				rate_id: rate_id
			},
			success: function(response) {
				$("#show_cost").val(response);
				$("#totalAmt").val(response);
			}
		});
	}
	function validation(value) {
		//checkRateType(value)
		if (value == "International") {
			$("#intpartner").show();
			$("#intwaybillno").show();
		} else {
			$("#intpartner").hide();
			$("#intwaybillno").hide();
		}
		$.ajax({
			type: 'post',
			url: '<?php echo base_url();?>mangement/mangement/getLocationValue',
			data: {
				value: value
			},
			success: function(response) {
				document.getElementById("frmLocation").innerHTML = response;
				document.getElementById("toLocation").innerHTML = response;
			}
		});
	}
	function bookingaddeditfrm() {
		var user_id = $('.user_id').attr('class'); //$("#userid").val();
		var recv_name = $("#recv_name").val();
		var recv_phone = $("#recv_phone").val();
		var actual_cost = $("#actual_cost").val();
		var status_id = $("#status_id").val();
		var dataString = $("#booking").serialize();
		if (user_id !== '' && recv_name !== '' && recv_phone !== '' && actual_cost !== '' && status_id !== '') {
			$.ajax({
				type: "POST",
				dataType: 'json',
				url: "<?php echo base_url(); ?>mangement/mangement/save_booking_admin",
				data: dataString,
				success: function(data) {
					//console.log(data.bookingId);
					$("#lastBookingId").text("Booking ID:-" + data.lastBookingId);
					filterBooking();
					clearformAllfiled();
					var save = data.save;
					var update = data.update;
					if (save == 'save') {
						successfullyInsert();
					}
					if (update == 'update') {
						successfullyUpdate();
						$('#myModal').modal('hide');
					}
				}
			});
			return false; //stop the actual form post !important!
		} else {
			// alert("Please check blank filed or dropdow.");
			inputboxValidation();
		}
	}
	function clearformAllfiled() {
		$('#recv_name').val("");
		$('#recv_phone').val("");
		$('#recv_email').val("");
		$('#recv_address').val("");
		$('#partner').val("");
		$('#wayBillNo').val("");
		$('#productContent').val("");
		$('#show_cost').val("");
		$('#rate_id').val("");
		$('#actual_cost').val("");
		$('#totalAmt').val("");
		$('#custom_cost').val("");
		$('#note').val("");
	}
	$(function() {
		$("#date").datepicker();
		$("#f_date").datepicker();
		$("#t_date").datepicker();
		$("#datepicker").datepicker();
	});
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
			url: "<?php echo base_url(); ?>booking/booking/getjsondata?name=" + value + "&f_date=" + f_date +
				"&t_date=" + t_date + "&status=" + status,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				$('#loading').html(json);
				$.map(json, function(item) {
					//console.log(item.onlinePayment);
					var id = "item_list" + item.booking_id;
					var html = "<tr id='" + id + "'>";
					html += "<td ><input type='checkbox' checkbox name='bookingId[]' value='" + item.booking_id + "'>" + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + sl + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + item.date + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + item.bookingId + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + item.company + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + item.recv_name + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + item.recv_phone + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + item.rate_type + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + item.name + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + item.display + "</td>";
					html +=
						"<td class='text-left'><a href='<?php echo base_url(); ?>booking/booking/printBookingData/" +
						item.booking_id + "'>" + 'Print' + "</td>";
					html += "</tr>";
					if ($('#' + id).length < 1) {
						$('#form-group-item #item_list tbody').append(html);
						sl++;
					}
				});
			}
		});
	}
	filterBooking();
	$("#intpartner").hide();
	$("#intwaybillno").hide();
	// for edit using function
	function getsId(booking_id) {
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
	}
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