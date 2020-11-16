<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<input type="text" id="bookingId" name="bookingId" class="search form-control" placeholder="Enter Your Booking Id" autofocus autocomplete="off" required="">
					</div>
					<div class="col-md-2">
						<button id="myBtn" onclick="filterBooking();" class="btn btn-primary btn-block"><i class="fa fa-search"></i> </button>
					</div>
					<div class="col-md-6">
						<button id="myBtn" onclick="showhidendiv();" class="btn btn-primary btn-block"><i class="fa fa-check"></i> Assign By DV Man </button>
					</div>
				</div>
			</div>
			<form name="multiple" id="bookinglistPaidStatus">
				<div class="row">
					<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-body">
									<div class="row" id="find">
										<div class="col-md-6">
											<select class="form-control" name="user_id" id="user_id" required="">
												<option value="">All Delivery Man </option>
												<?php
                                                foreach ($delivery_men as $value):
                                                    ?>
												<option value="<?php echo $value->user_id; ?>"><?php echo $value->full_name; ?>
												</option>
												<?php
                                                endforeach;
                                                ?>
											</select>
										</div>
										<div class="col-md-5">
											<button type="submit" class="btn btn-danger btn btn-block"><i class="fa fa-check"></i> Processing</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="form-group-item" style="width:100%; height:450px; overflow:auto; ">
						<center>
							<div id="loading"></div>
						</center>
						<div class="table-responsive">
							<table class="table table-hover table-sm" id="item_list">
								<thead class="thead-primary">
									<tr>
										<td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'bookingId\']').prop('checked', this.checked);" />
										</td>
										<!-- <td style="width: 5px;">S.L</td> -->
										<td class="text-left">Booking ID</td>
										<td class="text-left">Status</td>
										<td class="text-left">Amount</td>
										<td class="text-left">Rec.Email</td>
										<td class="text-left">Recv.Mobile</td>
										<td class="text-left">F.Country</td>
										<td class="text-left">F.State</td>
										<td class="text-left">T.Country</td>
										<td class="text-left">T.State</td>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="modal fade" id="erormodal" tabindex="-1 aria-hidden=" true" data-delay="1" data-open="2">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- Modal Header -->
				<!-- Modal body -->
				<div class="modal-body">
					<center><b style="color: red; font-size: 25px;"><span id="bookingid_show"></span>
							Sorry already <span id="sts"></span> <br><span id="date"></span></b></center>
				</div>
				<!-- Modal footer -->
			</div>
		</div>
	</div>
	<style>
		.ui-autocomplete {
			height: 250px;
			overflow-y: scroll;
			overflow-x: hidden;
		}
	</style>
	<script>
		$("#bookingId").keyup(function(event) {
			if (event.keyCode === 13) {
				var bookingid = $('#bookingId').val();
				$.ajax({
					url: "<?php echo base_url(); ?>booking/booking/getbookId?bookingid=" + bookingId,
					type: "GET",
					dataType: 'json',
					success: function(json) {
						$("#myBtn").click();
						$('#bookingId').val("");
					}
				});
			}
		});




		$("#bookinglistPaidStatus").submit(function(e) {
			e.preventDefault();
			var user_id = $("#user_id").val();
			var dataString = $(this).serialize() + "&user_id=" + user_id;

			console.log(dataString);
				var sts = $("#status").val();
			if (sts == "1") {
				alert("select status");
				inputboxValidation();
			} else {
				//return false;
				$.ajax({
					type: "POST",
					dataType: 'json',
					url: "<?php echo base_url(); ?>mangement/mangement/insertAssignto",
					data: dataString,
					success: function(data) {
						$('#item_list tbody tr').remove();
						successfullyInsert();
						$('#bookingId').val("");
					}
				});
			}


		});



		function multipleTypeUpdate() {
			//alert("working");
			var userid = $('#user_id').val();
			var bookingId = $('#bookingId').val();

			var dataString = $("#bookinglistPaidStatus").serialize();
			//console.log(userid);
			//return false;
			var sts = $("#status").val();
			if (sts == "1") {
				alert("select status");
				inputboxValidation();
			} else {
				//return false;
				$.ajax({
					type: "POST",
					dataType: 'json',
					url: "<?php echo base_url(); ?>mangement/mangement/insertAssignto",
					data: dataString,
					success: function(data) {
						$('#item_list tbody tr').remove();
						successfullyInsert();
						$('#bookingId').val("");
					}
				});
			}
			// return false; //stop the actual form post !important!
		}

		function filterBooking() {
			//  $('#item_list tbody tr').remove();
			var value = $("#bookingId").val();
			var status = '1'; //$("#status").val();
			if (value !== "") {
				sl = 1;
				$('#loading').html(
					'<img src="<?php echo base_url(); ?>/resource/admin/assets/images/loading.gif"> loading...');
				$.ajax({
					url: "<?php echo base_url(); ?>booking/booking/statusUpdatedata?name=" + value +
						"&status=" + status,
					type: "GET",
					dataType: 'json',
					success: function(json) {
						console.log(json);
						$('#loading').html(json);
						$.map(json, function(item) {
							var id = "item_list_" + item.cus_id;
							var removeBid =  item.cus_id;
							console.log(item);
							var html = "<tr id='" + id + "'>";
							html += "<td ><input type='checkbox' checkbox name='bookingId[]' value='" + item.bookingId + "'>" + "</td>";
							html += "<td onclick=getrowdataId(" + removeBid +
                                    ")> <i class='icon-minus'></i> " + item.bookingId + "</td>";
							html += "<td>" + item.status + "</td>";
							html += "<td>" + '£' + item.result + "</td>";
							html += "<td>" + item.rec_email + "</td>";
							html += "<td>" + item.rec_mobile + "</td>";
							html += "<td>" + item.fcountryName + "</td>";
							html += "<td>" + item.fstate + "</td>";
							html += "<td>" + item.tcountryName + "</td>";
							html += "<td>" + item.tsate + "</td>";
							html += "</tr>";
							if ($('#' + id).length < 1) {
								$('#item_list tbody').append(html);
								//  sl++;
							}
						});
					}
				});
			} else {
				inputboxValidation();
			}
			$('#bookingId').focus();
		}

		function getrowdataId(d) {
			$('#item_list_' + d).remove().css("display", "inline").fadeOut(2000);
		}
		function showhidendiv() {
			// $('#find').show();
			$("#statusModal").modal("show");
		}

	</script>