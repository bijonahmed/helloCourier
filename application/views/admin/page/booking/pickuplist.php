<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-6 col-md-3">
						Search Email, Country
						<input type="text" id="name" class="search form-control"
							placeholder="Search... Email, Country, Number..." autofocus>
					</div>
					<div class="col-6 col-md-3">
						From Date
						<input type="text" name="f_date" id="f_date" class="form-control"
							value="<?php echo date("d-m-Y", strtotime("-3 day")); ?>">
					</div>
					<div class="col-6 col-md-3">
						To Date
						<input type="text" name="t_date" id="t_date" class="form-control"
							value="<?php echo date("d-m-Y"); ?>">
					</div>
					<div class="col-6 col-md-2">
						<br>
						<button id="myBtn" onclick="filterPickup();" class="btn btn-primary btn-block"><i
								class="fa fa-search"></i> Search</button>

					</div>

					<div class="col-6 col-md-1"><br>
						<button class="btn btn-primary" onclick="copyClipboard();"><i class="fa fa-copy"></i></button>
					</div>

				</div><br>
				<div class="row" style="display: none;">
					<div class="col-6 col-md-3">
						<button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i
								class="fa fa-plus"></i> </button>

					</div>

				</div>

			</div>

			<center>
				<div id="loading"></div>

			</center>

			<div id="form-group-item"
				style="width:100%; height:450px; overflow:auto; background-color:#6f046e; color:white;">
				<table class="table table-hover table-sm" id="item_list">
					<thead class="thead-primary">
						<tr>
							<td style="width: 5px;">S.L</td>
							<td class="text-left">Date</td>
							<td class="text-left">Sender Name</td>
							<td class="text-left">Sender Email</td>
							<td class="text-left">Form Location</td>
							<td class="text-left">To Location</td>
							<td class="text-left">Receiver Name</td>
							<td class="text-left">Receiver Email</td>
							<td class="text-left">Receiver Number</td>

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
<div class="modal fade" id="editModal">
	<div class="modal-dialog right modal-lg">
		<div class="modal-content animated">
			<!-- Modal Header -->
			<div class="modal-header bg-primary">
				<h5 class="modal-title text-white">
					<div style="font-size: 18px; font-weight: bold; color: yellow;" class="modal-title">
						Pickup Information
						<div id="bookingId"></div>
					</div>
				</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- Modal body -->
			<form class="form-horizontal" id="booking_update">
				<div class="row" style="padding: 10px;">
					<br>
					<div class="col-md-6">
						<div class="form-group">
							<label for="uname">Sender Name:</label><br>
							<input type="text" autofocus="1" id="senderName" name="senderName" style="width:100%;">
							<input type="hidden" id="pickupId" name="pickupId" style="width:100%;">
						</div>
						<div class="form-group">
							<label for="uname">Sender email:</label><br>
							<input type="text" id="senderEmail" name="senderEmail" style="width:100%;">
						</div>
						<div class="form-group">
							<label for="uname">Sender Contact Number:</label><br>
							<div class="form-group">
								<input type="text" id="senderPhone" name="senderPhone" style="width:100%;"></div>
						</div>
						<div class="form-group">
							<label for="uname">Type:</label><br>
							<div class="form-group">
								<input type="text" id="rate_type" name="rate_type" style="width:100%;" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="uname">Form Location:</label><br>
							<div class="form-group">
								<input type="text" id="frmLocation" name="frmLocation" style="width:100%;" readonly>
							</div>
						</div>

						<div class="form-group">
							<label for="uname">To Location:</label><br>
							<div class="form-group">
								<input type="text" id="toLocation" name="toLocation" style="width:100%;" readonly>
							</div>
						</div>

					</div>
					<div class="col-md-6">

						<div class="form-group">
							<label for="uname">Receiver Name:</label><br>
							<input type="text" id="receiverName" name="receiverName" style="width:100%;">
						</div>

						<div class="form-group">
							<label for="uname">Receiver Email:</label><br>
							<input type="text" id="receiverEmail" name="receiverEmail" style="width:100%;">
						</div>

						<div class="form-group">
							<label for="uname">Receiver Contact number:</label><br>
							<input type="text" id="receiverContact" name="receiverContact" style="width:100%;">
						</div>

						<div class="form-group">
							<label for="uname">Product Content:</label><br>
							<input type="text" id="productContant" name="productContant" style="width:100%;">
						</div>

						<div class="form-group">
							<label for="uname">Cost Of Shipment :</label><br>
							<input type="text" id="costofShipment" name="cost" style="width:100%;" readonly>
						</div>

						<div class="form-group">
							<label for="uname">Receiver Address:</label><br>
							<textarea id="receiverAddress" name="receiverAddress"
								style="width:100%; height: 50px;"></textarea>
						</div>

						<div class="form-group">
							<label for="uname">Note:</label><br>
							<textarea id="writeanote" name="writeanote" style="width:100%; height: 50px;"></textarea>
						</div>
						<button class="btn btn-primary btn-block" type="button"
							onclick="updateEntryFrom();">Update</button><br>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>
<script>
	function updateEntryFrom() {
		var dataString = $("#booking_update").serialize();
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "<?php echo base_url(); ?>mangement/mangement/updatePickup",
			cache: false,
			data: dataString,
			success: function(data) {
				successfullyUpdate();
				filterPickup();
				$("#editModal").modal("hide");
			}
		});
		return false; //stop the actual form post !important!
	}

	function RecivgetState(country_id) {
		$.ajax({
			type: 'post',
			url: '<?php echo base_url(); ?>home/getallStatefrm',
			data: {
				country_id: country_id
			},
			success: function(response) {
				document.getElementById("receiverStateId").innerHTML = response;
			}
		});
	}

	function getState(country_id) {
		$.ajax({
			type: 'post',
			url: '<?php echo base_url(); ?>home/getallStatefrm',
			data: {
				country_id: country_id
			},
			success: function(response) {
				document.getElementById("pickupStateId").innerHTML = response;
			}
		});
	}
	$(function() {
		$("#date").datepicker();
		$("#f_date").datepicker();
		$("#t_date").datepicker();
		$("#datepicker").datepicker();
		filterPickup();
	});
	//  $('#myModal').modal('show');
	$("#name").keyup(function(event) {
		if (event.keyCode === 13) {
			$("#myBtn").click();
		}
	});

	function filterPickup() {
		$('#item_list tbody tr').remove();
		var value = $("#name").val();
		var f_date = $("#f_date").val();
		var t_date = $("#t_date").val();
		sl = 1;
		$('#loading').html(
			'<img src="<?php echo base_url(); ?>/resource/admin/assets/images/loading.gif"> loading...');
		$.ajax({
			url: "<?php echo base_url(); ?>pickup/pickup/getjsondata?name=" + value + "&f_date=" + f_date +
				"&t_date=" + t_date,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				$('#loading').html(json);
				$.map(json, function(item) {
					//	console.log(item.onlinePayment);
					var id = "item_list" + item.pickupId;
					var html = "<tr id='" + id + "'>";
					html += "<td class='text-left' onclick=getsId(" + item.pickupId + ")>" + sl +
						'. Edit ' + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.pickupId + ")>" + item
						.pickup_date + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.pickupId + ")>" + item
						.senderName + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.pickupId + ")>" + item
						.senderEmail + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.pickupId + ")>" + item
						.frmLocation + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.pickupId + ")>" + item
						.toLocation + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.pickupId + ")>" + item
						.receiverName + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.pickupId + ")>" + item
						.receiverEmail + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.pickupId + ")>" + item
						.receiverContact + "</td>";
					html += "</tr>";
					if ($('#' + id).length < 1) {
						$('#form-group-item #item_list tbody').append(html);
						sl++;
					}
				});
			}
		});
	}
	filterPickup();
	// for edit using function
	function getsId(pickupId) {
		//getperceldata(pickupId);
		$.ajax({
			url: "<?php echo base_url(); ?>pickup/pickup/geteditBookingData?pickupId=" + pickupId,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				//console.log(json);
				$('#pickupId').val(json.pickupId);
				$('#senderName').val(json.senderName);
				$('#pickupAddress').val(json.pickupAddress);
				$('#rate_type').val(json.rate_type);
				$('#frmLocation').val(json.frmLocation);
				$('#toLocation').val(json.toLocation);
				$('#senderEmail').val(json.senderEmail);
				$('#senderPhone').val(json.senderPhone);
				$('#productContant').val(json.productContant);
				$('#costofShipment').val(json.cost);
				$('#receiverName').val(json.receiverName);
				$('#receiverAddress').val(json.receiverAddress);
				$('#receiverEmail').val(json.receiverEmail);
				$('#receiverContact').val(json.receiverContact);
				$('#weightOfpck').val(json.weightOfpck);
				$('#writeanote').val(json.writeanote);
				$('#editModal').modal('show');
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
			alert("Copied all Pickup to clipboard");
		}
	}
</script>