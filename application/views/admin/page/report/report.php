<script src="<?php echo base_url(); ?>resource/merchent/assets/js/core/jquery.min.js"></script>
<div class="row">
	<div class="col-lg-12">
        

		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<h5 class="card-title">Report</h5>
					</div>
				</div>
                
                        <form method="post" action="<?php echo base_url(); ?>report/report/my_earning_report">
				<div class="row">
					<div class="col-4">
						<select class="form-control custom-select" name="user_id" id="user_id" required="">
							<option value="">Select All Customer </option>
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

					<div class="col-2">
						<input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" required="">
					</div>
					<div class="col-2">
						<input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" required="">

					</div>
					<div class="col-1">
						<button  type="submit" class="btn btn-primary"><i class="fa fa-search"></i>
						</button>

					</div>
				</div>
                        </form>

			</div>
			<center>
				<div id="loading"></div>
			</center>
			<center style="font-size: 22px; color: green; font-weight: bold;"><?php
                if (isset($name)) {
                    echo "Company : " . $name->company . "<br>";
                }
                if (isset($from_date)) {
                    if (!empty($from_date) && !empty($to_date)) {
                        echo "From : " . date("d-M-Y", strtotime($from_date)) . " TO " . date("d-M-Y", strtotime($to_date)) . "<br>";
                    } else {
                        echo "From : " . date("d-M-Y") . " TO " . date("d-M-Y") . "<br>";
                    }
                }
                if (isset($paid_type)) {
                    echo "Payment Type : " . $paid_type . "<br>";
                }
                ?>
				<button class="btn btn-success" onclick="tableToExcel('testTable', '<?php echo date('d-m-Y') ?> <?php echo $this->session->userdata('full_name') ?>')">
					Export to excel</button>
			</center>
            

			<div class="table-responsive" id="testTable">
				<p style="display: none;"><?php
                if (isset($name)) {
                    echo "Company : " . $name->company . "<br>";
                }
                if (isset($from_date)) {
                    echo "From : " . $from_date . " TO " . $to_date . "<br>";
                }
               
                ?></p>
                <br> 
				<table border="1" style="width: 100%;">
					<tr style="color: black;">
						<th>#</th>
						<th>Date </th>
						<th>Booking ID.</th>
						<th>Customer Name </th>
						<th>Reciver Name</th>
						<th>Reciver Mobile</th>
						<th>Type</th>
						<th>Weight</th>
						<th>Form Location</th>
						<th>To Location</th>
                        <th>Custom Cost</th>
                        <th>Actual Cost</th>
                        <th>Amount</th>
						<th>Status</th>

					</tr>
					<?php
                    if(!empty($earningRpt)){
                    $x = 1;
                    $custom_cost = 0;
                    $actual_cost= 0;
                    $totalAmt= 0;
                    foreach ($earningRpt as $value) {
                        $custom_cost += $value->custom_cost ? $value->custom_cost : 0;
                        $actual_cost += $value->actual_cost ? $value->actual_cost : 0;
                        $totalAmt += $value->totalAmt ? $value->totalAmt : 0;
                        ?>
					<tr>
						<td><?php
                    echo $x;
                    $x++;
                        ?></td>
						<td style="width: 100px;"><?php echo date("d-m-Y", strtotime($value->date)); ?></td>
						<td><?php echo $value->bookingId; ?></td>
						<td><?php echo $value->company; ?></td>
						<td><?php echo $value->recv_name; ?></td>
						<td><?php echo $value->recv_phone; ?></td>
						<td><?php echo $value->rate_type; ?></td>
						<td><?php echo $value->name; ?></td>
                        <td><?php echo $value->frmLocation; ?></td>
                        <td><?php echo $value->toLocation; ?></td>
                        <td style="text-align: right;"><?php echo $value->custom_cost; ?></td>
                        <td style="text-align: right;"><?php echo $value->actual_cost; ?></td>
                        <td style="text-align: right;"><?php echo $value->totalAmt; ?></td>
                        <td><?php echo $value->display; ?></td>

					</tr>
					<?php
                    }
                    }
                    ?>
                    
                    <tr style="color: black;">
						<th>#</th>
						<th>Date </th>
						<th>Booking ID.</th>
						<th>Customer Name </th>
						<th>Reciver Name</th>
						<th>Reciver Mobile</th>
						<th>Type</th>
						<th>Weight</th>
						<th>Form Location</th>
						<th>To Location</th>
                        <th style="text-align: right;"><?php echo $custom_cost ? $custom_cost: 0;?></th>
                        <th style="text-align: right;"><?php echo $actual_cost ? $actual_cost: 0 ;?></th>
                       <th style="text-align: right;"><?php echo $totalAmt ? $totalAmt : 0;?></th>
						<th>Status</th>
                    </tr>
                    
				</table>
			</div>
		 

		</div>
	</div>
</div>

<!-- The Modal -->

<script>
	//  $('#myModal').modal('show');
	$("#name").keyup(function(event) {
		if (event.keyCode === 13) {
			$("#myBtn").click();
		}
	});

	 
	$(window).on('load', function() {
		var user_id = '<?php echo $user_id; ?>';
		var from_date = '<?php echo $from_date; ?>';
		var to_date = '<?php echo $to_date; ?>';
		$('#user_id').val(user_id);
		$('#from_date').val(from_date);
		$('#to_date').val(to_date);
		$("#to_date").datepicker();
		$("#from_date").datepicker();
	});
	// Excel Export
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