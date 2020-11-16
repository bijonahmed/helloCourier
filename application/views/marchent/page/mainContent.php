<script src="<?php echo base_url(); ?>resource/merchent/assets/js/core/jquery.min.js"></script>
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

	.card-stats .card-header .card-category:not([class*="text-"]) {
		color: #000;
		font-size: 14px;
	}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header card-header-success card-header-icon">
						<div class="card-icon">
							<i class="material-icons">store</i>
						</div>
						<p class="card-category">Total Shipment </p>
						<h3 class="card-title"><?php
                            if (isset($trkRpt)) {
                                echo count($trkRpt);
                            }
                            ?></h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons">date_range</i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header card-header-danger card-header-icon">
						<div class="card-icon">
							<i class="material-icons">info_outline</i>
						</div>
						<p class="card-category">Total Payment</p>
						<h3 class="card-title"><?php echo $paymentamt->amount;?></h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons">local_offer</i> 
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header card-header-info card-header-icon">
						<div class="card-icon">
							<i class="material-icons">info_outline</i>
						</div>
						<p class="card-category" style="color: red; font-weight: bold;">Due</p>
						<h3 class="card-title" id="output_due"></h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons">update</i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6" style="display: none;">
				<div class="card card-stats">
					<div class="card-header card-header-info card-header-icon">
						<div class="card-icon">
							<i class="material-icons">info_outline</i>
						</div>
						<p class="card-category">Payment History</p>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons">update</i> <a href="<?php echo base_url(); ?>marchent/paymentHistory">Get details</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card" style="margin-top: -10px;">
			<center>

				Person Name: <?php echo $this->session->userdata('full_name'); ?>,
				Company : <?php echo $this->session->userdata('company'); ?>,
				Mobile: <?php echo $this->session->userdata('mobile_number'); ?><br>
			</center>
			<center>
				<button class="btn btn-primary" data-toggle="modal" href="#book"> Schedule Pickup</button>
				<button class="btn btn-success" onclick="tableToExcel('testTable', '<?php echo date('d-m-Y') ?> <?php echo $this->session->userdata('full_name') ?>')">
					Export</button>
				<a href="<?php echo base_url();?>marchent/updateProfile"><button class="btn btn-info" style="font-weight: bold;"> Profile Update</button></a>
			</center>
			<div class="row">
				<div class="col-md-12">

					<div class="card-body">
						<div class="table-responsive">
							<table width="100%" height="49" class="table table-hover" id="testTable" style="width: 100%;">
								<tr style="color: black;">
									<th width="6%" height="21">#</th>
									<th width="11%">Booking ID </th>
									<th width="11%">Date</th>
									<th width="14%">Customer Name</th>
									<th width="17%">Reciver Name</th>
									<th width="13%">Reciver Mobile</th>
									<th width="11%">Rate Type</th>
									<th width="7%">Weight</th>
									<th width="8%">Status</th>
									<th width="8%">Amount</th>
									<th width="6%" style="display: none;">Action</th>
								</tr>
								<?php
                            $x = 1;
                            $cod = 0;
                            $sum = 0;
                            $out = 0;
                            $insurace = 1;
                            foreach ($trkRpt as $value) {
                                $sum+=$value->show_cost;
                                ?>
								<tr>
									<td height="20"><?php  echo $x; $x++; ?></td>
									<td><b><?php echo $value->bookingId; ?></b></td>
									<td><?php echo date("d-m-Y", strtotime($value->date)); ?></td>
									<td><?php echo $value->company; ?></td>
									<td><?php echo $value->recv_name; ?></td>
									<td><?php echo $value->recv_phone; ?></td>
									<td><?php echo $value->rate_type; ?></td>
									<td><?php echo $value->name; ?></td>
									<td><?php echo $value->display; ?></td>
									<td style="background-color: #c0c1c2; font-weight: bold; text-align: center;"><?php echo $value->show_cost; ?></td>
									<?php
                                        if ($value->status == "1") {
                                            ?>
									<td style="display: none;"><a href="<?php echo base_url(); ?>marchent/updateMyBooking/<?php echo $value->booking_id; ?>">Edit</a></td>
									<?php
                                            }else{
                                            ?>
									<td style="display: none;">--</td>
									<?php }?>
									<td><a href="<?php echo base_url(); ?>marchent/convertPdf/<?php echo $value->booking_id; ?>" style="display: none;">Print</a></td>
								</tr>
								<?php
                            }
                            ?>
							</table>

							Total:<div align="right" style="font-size: 20px; font-weight: bold;" id="totalResult">
								<?php echo (float) $sum; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<form method="post" action="<?php echo base_url(); ?>mangement/mangement/save_bookingUser" id="booking">
	<div class="modal" id="book">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Now Booking</h4>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
					<div class="login-wrap text-center">
						<div class="login-form clrbg-before">
							<!--   start-->
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
									<button class="btn btn-primary btn-block" type="submit" onclick="bookingaddeditfrm();">Save</button><br>
								</div>
							</div>
							<!--  end-->
						</div>
					</div>
				</div>
				<!-- Modal footer -->
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">
	
	
	
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

	$(function() {
		$("#intpartner").hide();
		$("#intwaybillno").hide();
		
			var totalPayment = "<?php echo $paymentamt->amount;?>";
			var serviceCharge = "<?php echo $sum; ?>";
			var result = parseFloat(serviceCharge - totalPayment);
			$("#output_due").html(result);
			//console.log(result);
			
		
	});

	//excel
	var tableToExcel = (function() {
		var uri = 'data:application/vnd.ms-excel;base64,',
			template =
			'<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
			base64 = function(s) {
				return window.btoa(unescape(encodeURIComponent(s)))
			},
			format = function(s, c) {
				return s.replace(/{(\w+)}/g, function(m, p) {
					return c[p];
				})
			}
		return function(table, name) {
			if (!table.nodeType)
				table = document.getElementById(table)
			var ctx = {
				worksheet: name || 'Worksheet',
				table: table.innerHTML
			}
			window.location.href = uri + base64(format(template, ctx))
		}
	})()
</script>