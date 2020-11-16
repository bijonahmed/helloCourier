 <script src="<?php echo base_url(); ?>resource/admin/assets/chart/highcharts.js"></script>
 <script src="<?php echo base_url(); ?>resource/admin/assets/chart/highcharts-3d.js"></script>
 <script src="<?php echo base_url(); ?>resource/admin/assets/chart/exporting.js"></script>
 <script src="<?php echo base_url(); ?>resource/admin/assets/chart/export-data.js"></script>
 <?php
//Courent year
$currentyear= date('Y', strtotime(date("Y-m-d")));
$current_year = $this->db->query("SELECT count(cus_id) as bid FROM tbl_customer_data WHERE 1 AND YEAR(`entry_date`)='$currentyear' group by DATE_FORMAT(entry_date, '%m')")->result();
foreach ($current_year as $v) {
    $currentarr[] = $v->bid;
}
//$current_year = implode(", ", $currentarr);
$c_year = $current_year ? implode(", ", $currentarr) : '0';

?>
 <div class="previous_year-fluid">
 	<?php
    $role_id = $this->session->userdata('role_id');
    if ($role_id == 1) {
        ?>
 	<!--Start Dashboard Content-->
 	<small style="color: green;"><?php echo $this->session->userdata('full_name'); ?>- <?php
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            echo $dt->format('F j, Y, g:i a');
            ?>
 		<div class="row mt-3">
 			<div class="col-12 col-lg-6 col-xl-2">
 				<div class="card bg-pattern-info">
 					<div class="card-body">
 						<a href="<?php echo base_url(); ?>user/user/getUserList">
 							<div class="media">
 								<div class="media-body text-left">
 									<h4 class="text-white count">
 										<?php
                                        if (isset($tmerchant->userid)):
                                            echo $tmerchant->userid;
                                        endif;
                                        ?>
 									</h4>
 									<span class="text-white">User</span>
 								</div>
 								<i class="icon-basket-loaded text-white" style="font-size: 35px;"></i>
 							</div>
 						</a>
 					</div>
 				</div>
 			</div>
 			<div class="col-12 col-lg-6 col-xl-2" style="display:none;">
 				<div class="card bg-pattern-primary">
 					<div class="card-body">
 						<a href="<?php echo base_url(); ?>assignto/assignto/geAssigntoList">
 							<div class="media">
 								<div class="media-body text-left">
 									<h4 class="text-white">
 										Assigned
 									</h4>
 									<span class="text-white">To DV Man</span>
 								</div>

 							</div>
 						</a>
 					</div>
 				</div>
 			</div>
 			<div class="col-12 col-lg-6 col-xl-2" style="display: none;">
 				<div class="card bg-pattern-primary">
 					<div class="card-body">
 						<a href="<?php echo base_url(); ?>assignto/assignto/geAssigntohubList">
 							<div class="media">
 								<div class="media-body text-left">
 									<h4 class="text-white">
 										Assigned
 									</h4>
 									<span class="text-white">To HUB</span>
 								</div>

 							</div>
 						</a>
 					</div>
 				</div>
 			</div>
			 <div class="col-12 col-lg-6 col-xl-2">
 				<div class="card bg-pattern-primary">
 					<div class="card-body">
 						<a href="<?php echo base_url(); ?>pickup/pickup/getpickupList">
 							<div class="media">
 								<div class="media-body text-left">
 									<h4 class="text-white">
 										Pickup
 									</h4>
 									<span class="text-white"><small>List</small></span>
 								</div>

 							</div>
 						</a>
 					</div>
 				</div>
 			</div>
 			<div class="col-12 col-lg-6 col-xl-2">
 				<div class="card bg-pattern-warning">
 					<div class="card-body">
 						<a href="<?php echo base_url(); ?>booking/booking/getbookingList">
 							<div class="media">
 								<div class="media-body text-left">
 									<h4 class="text-white count">
 										<?php
                                        if (isset($all_booking->booking_id)):
                                            echo $all_booking->booking_id;
                                        endif;
                                        ?>
 									</h4>
 									<span class="text-white">Booking</span>
 								</div>
 								<i class="icon-user text-white" style="font-size: 35px;"></i>
 							</div>
 						</a>
 					</div>
 				</div>
 			</div>
 			<div class="col-12 col-lg-6 col-xl-2" style="display: none;">
 				<div class="card bg-pattern-info">
 					<div class="card-body">
 						<a href="<?php echo base_url(); ?>status_update/status_update/statuslist">
 							<div class="media">
 								<div class="media-body text-left">
 									<h4 class="text-white">
 										Status
 									</h4>
 									<span class="text-white">Update</span>
 								</div>
 								<i class="icon-wallet text-white" style="font-size: 35px;"></i>
 							</div>
 						</a>
 					</div>
 				</div>
 			</div>
 			<div class="col-12 col-lg-6 col-xl-2" style="display: none;">
 				<div class="card bg-pattern-primary">
 					<div class="card-body">
 						<a href="<?php echo base_url(); ?>merchant_bill/merchanbill">
 							<div class="media">
 								<div class="media-body text-left">
 									<h4 class="text-white">
 										Bill
 									</h4>
 									<span class="text-white"><small>Merchant</small></span>
 								</div>
 								<i class="icon-wallet text-white" style="font-size: 35px;"></i>
 							</div>
 						</a>
 					</div>
 				</div>
 			</div>
 			<div class="col-12 col-lg-6 col-xl-2" style="display: none;">
 				<div class="card bg-pattern-danger">
 					<div class="card-body">
 						<a href="<?php echo base_url(); ?>expense/expense/getExpense">
 							<div class="media">
 								<div class="media-body text-left">
 									<h4 class="text-white count">
 										<?php
                                        if (isset($today_expense->amount)){
                                         echo $today_expense->amount;   
                                        }else{
                                            echo "0";
                                        }
                                        ?>
 									</h4>
 									<span class="text-white"><small>Today Expense</small></span>
 								</div>
 							</div>
 						</a>
 					</div>
 				</div>
 			</div>

 			<div class="col-12 col-lg-6 col-xl-2" style="display: none;">
 				<div class="card bg-pattern-primary">
 					<div class="card-body">
 						<a href="<?php echo base_url(); ?>report/report/customer_balance">
 							<div class="media">
 								<div class="media-body text-left">
 									<h4 class="text-white">
 										Customer
 									</h4>
 									<span class="text-white"><small>Balance</small></span>
 								</div>

 							</div>
 						</a>
 					</div>
 				</div>
 			</div>
 			<div class="col-12 col-lg-6 col-xl-2" style="display: none;">
 				<div class="card bg-pattern-primary">
 					<div class="card-body">
 						<a href="<?php echo base_url(); ?>report/report/earning_report">
 							<div class="media">
 								<div class="media-body text-left">
 									<h4 class="text-white">
 										Earnining
 									</h4>
 									<span class="text-white"><small>Report</small></span>
 								</div>

 							</div>
 						</a>
 					</div>
 				</div>
 			</div>
 			
 		
			 <div class="col-12 col-lg-6 col-xl-2">
 				<div class="card bg-pattern-danger">
 					<div class="card-body">
 						<a href="<?php echo base_url(); ?>report/report/log_report">
 							<div class="media">
 								<div class="media-body text-left">
 									<h4 class="text-white">
 										Log
 									</h4>
 									<span class="text-white"><small>Report</small></span>
 								</div>

 							</div>
 						</a>
 					</div>
 				</div>
 			</div>
 			<div class="col-12 col-lg-6 col-xl-2">
 				<div class="card bg-pattern-primary">
 					<div class="card-body">
 						<a href="<?php echo base_url(); ?>employee/employee/getemployeelist">
 							<div class="media">
 								<div class="media-body text-left">
 									<h4 class="text-white">
 										Employee
 									</h4>
 									<span class="text-white"><small>List</small></span>
 								</div>

 							</div>
 						</a>
 					</div>
 				</div>
 			</div>
 		</div>
 		<div class="row">
 			<div class="col-lg-12">
 				<div class="card">
 					<div class="card-body">
 						<h5 class="card-title">Last 7 days Booking Status</h5>
 						<div class="table-responsive">
 							<table class="table table-striped table-hover">
 								<thead>
 									<tr>
 										<th scope="col">Day</th>
 										<th scope="col">Count</th>
 									</tr>
 								</thead>
 								<tbody>
 									<?php
                                    foreach ($lastsevenday as $val) {
                                        $day = $this->db->query("SELECT count(entry_date) as dateCount FROM tbl_customer_data WHERE entry_date='$val->entry_date'")->row();
                                        ?>
 									<tr>
 										<td><?php echo date("d-M-Y", strtotime($val->entry_date)); ?></td>
 										<td><span
 												class="badge badge-primary shadow-primary m-1 count"><strong><?php echo $day->dateCount; ?></strong></span>
 										</td>
 									</tr>
 									<?php }
                                    ?>
 								</tbody>
 							</table>
 						</div>
 					</div>
 				</div>
 			</div>

 			<div class="col-lg-12">
 				<div class="card">
 					<div class="card-body">
 						<div class="row">
 							<div class="col-md-12">
 								<div id="current_year"
 									style="min-width: 100%; height: 450px; margin: 0 auto; text-align: center;"></div>
 							</div>
 						</div>
 					</div>
 				</div>
 				<?php
            } elseif ($role_id == 5) {
                ?>
 				<div class="row mt-3">
 					<div class="col-12 col-lg-6 col-xl-2" style="display:none;">
 						<div class="card bg-pattern-danger">
 							<div class="card-body">
 								<a href="<?php echo base_url(); ?>booking_update/bookingupdate">
 									<div class="media">
 										<div class="media-body text-left">
 											<h4 class="text-white">
 												Satus
 											</h4>
 											<span class="text-white">Update</span>
 										</div>
 										<i class="icon-user text-white" style="font-size: 35px;"></i>
 									</div>
 								</a>
 							</div>
 						</div>
 					</div>
 					<div class="col-12 col-lg-6 col-xl-2">
 						<div class="card bg-pattern-primary">
 							<div class="card-body">
 								<a href="<?php echo base_url(); ?>assignto/assignto/geAssigntoList">
 									<div class="media">
 										<div class="media-body text-left">
 											<h4 class="text-white">
 												Assign
 											</h4>
 											<span class="text-white">DV Man</span>
 										</div>
 										<i class="icon-user text-white" style="font-size: 35px;"></i>
 									</div>
 								</a>
 							</div>
 						</div>
 					</div>
 					<div class="col-12 col-lg-6 col-xl-2">
 						<div class="card bg-pattern-warning">
 							<div class="card-body">
 								<a href="<?php echo base_url(); ?>booking/booking/getbookingList">
 									<div class="media">
 										<div class="media-body text-left">
 											<h4 class="text-white">
 												My
 											</h4>
 											<span class="text-white">Booking</span>
 										</div>
 										<i class="icon-user text-white" style="font-size: 35px;"></i>
 									</div>
 								</a>
 							</div>
 						</div>
 					</div>
 				</div>
 				<?php
              } elseif ($role_id == 3) {
                ?>
 				<small style="color: green;"><?php echo $this->session->userdata('full_name'); ?>- <?php
                    $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                    echo $dt->format('F j, Y, g:i a');
                    ?> </small>
 				<style>
 				</style>
 				<div style="color: green; font-size: 18px; font-weight: bold; text-align: center;">
 					<?php echo "Name: " . $this->session->userdata('full_name'); ?><br>Your Delivery :
 					<?php echo count($display_deli_data); ?></div>
 				<div class="card-body">
 					<div class="table-responsive">
 						<div class="table-responsive">
 							<p>Intransit List </p>
 							<table width="100%" border="1.5" class="table-hover">
 								<tr style="color: black;" class="text-primary">
 									<th style="width: 5%;">#</th>
 									<th>Booking Id</th>
 									<th>
 										<center>Sender Email</center>
 									</th>
 									<th>
 										<center>Collection city</center>
 									</th>
 									<th>
 										<center>Rec. Email</center>
 									</th>
 									<th>
 										<center>Delivery city</center>
 									</th>
 								</tr>
 								<?php
                                $x = 1;
                                foreach ($display_deli_data as $value) {
                                    ?>
 								<tr>
 									<td style="width: 5%;"><?php
                                            echo $x;
                                            $x++;
                                            ?></td>
 									<td onclick="getBookingId('<?php echo $value->bookingId; ?>')">
 										<a href="#"> <?php echo $value->bookingId; ?></a></td>
 									<td style="color: green;text-align:center;"><?php echo $value->email; ?></td>
 									<td style="color: green;text-align:center;"><?php echo $value->fcountryName; ?>
 									</td>
 									<td style="color: green;text-align:center;"><?php echo $value->rec_email; ?></td>
 									<td style="color: green;text-align:center;"><?php echo $value->tcountryName; ?>
 									</td>

 								</tr>
 								<?php }
                                ?>
 							</table>
 						</div>

 						<?php
                 } elseif ($role_id == 7) {
                ?>
 						<div class="col-12 col-lg-6 col-xl-2">
 							<div class="card bg-pattern-info">
 								<div class="card-body">
 									<a href="<?php echo base_url(); ?>booking/booking/getpickuplist">
 										<div class="media">
 											<div class="media-body text-left">
 												<h4 class="text-white">
 													Pickup
 												</h4>
 												<span class="text-white">List</span>
 											</div>

 										</div>
 									</a>
 								</div>
 							</div>
 						</div>

 						<?php
                 } elseif ($role_id == 8) {
                ?>

 						<div class="col-12 col-lg-6 col-xl-2">
 							<div class="card bg-pattern-info">
 								<div class="card-body">
 									<a href="<?php echo base_url(); ?>marketing/marketing/getmarketinglist">
 										<div class="media">
 											<div class="media-body text-left">
 												<h4 class="text-white">
 													Marketing
 												</h4>
 												<span class="text-white">List</span>
 											</div>

 										</div>
 									</a>
 								</div>
 							</div>
 						</div>

 						<?php } ?>
 					</div>
 					<!--End Row-->
 				</div>
 				<form method="post" action="<?php echo base_url(); ?>mangement/mangement/deliveryManStatusUpdate"
 					id="statusUpdate">
 					<div class="modal fade" id="modal-statusUpdate">
 						<div class="modal-dialog">
 							<div class="modal-content animated rollIn">
 								<div class="modal-header bg-primary">
 									<h5 class="modal-title text-white">
 										<div style="font-size: 15px;" class="modal-title">
 											<div id="show_bid"></div>
 										</div>
 									</h5>
 									<button type="button" class="close text-white" data-dismiss="modal"
 										aria-label="Close">
 										<span aria-hidden="true">&times;</span>
 									</button>
 								</div>
 								<div class="modal-body">
 									<div class="form-group row">
 										<label for="staticEmail" class="col-sm-4 col-form-label">Status</label>
 										<div class="col-sm-7">
 											<input type="hidden" id="bid" name="booking_id" />
 											<select name="status" id="delivery_sts" required=" class=" form-control"
 												style="width: 100%">
 												<option value="">Select Status</option>
 												<option value="Delivered">Delivered</option>
 											</select>
 										</div>
 									</div>
 									<div class="form-group row">
 										<label for="inputPassword" class="col-sm-4 col-form-label" id="names">Please
 											write the reason with contact person name</label>
 										<div class="col-sm-7">
 											<textarea name="reason" id="reason" placeholder="Please ride the reason"
 												class="form-control"></textarea>
 										</div>
 									</div>
 								</div>
 								<div class="modal-footer">
 									<button type="submit" class="btn btn-secondary"><i class="fa fa-times"></i>
 										Update</button>
 									<button type="button" class="btn btn-secondary" data-dismiss="modal"><i
 											class="fa fa-times"></i>
 										Close</button>
 								</div>
 							</div>
 						</div>
 					</div>
 				</form>

 				<script>
 					function getBookingId(bookingId) {
 						$('#bid').val(bookingId);
 						$('#show_bid').html(bookingId);
 						$('#modal-statusUpdate').modal('show');
 					}
 					// Current Year graphical report
 					Highcharts.chart('current_year', {
 						chart: {
 							type: 'column',
 							options3d: {
 								enabled: true,
 								alpha: 10,
 								beta: 25,
 								depth: 50
 							}
 						},
 						title: {
 							text: 'Current Year Booking - ' + < ? php echo $currentyear; ? >
 						},
 						//subtitle: {
 						//    text: 'GRAPHICAL REPORT'
 						//},
 						plotOptions: {
 							column: {
 								depth: 50
 							}
 						},
 						xAxis: {
 							categories: Highcharts.getOptions().lang.shortMonths,
 							labels: {
 								skew3d: true,
 								style: {
 									fontSize: '20px'
 								}
 							}
 						},
 						yAxis: {
 							title: {
 								text: null
 							}
 						},
 						series: [{
 							name: 'Booking',
 							data: [ < ? php echo $c_year; ? > ]
 						}]
 					});
 					//Counter
 					$('.count').each(function() {
 						$(this).prop('Counter', 0).animate({
 							Counter: $(this).text()
 						}, {
 							duration: 3000,
 							easing: 'swing',
 							step: function(now) {
 								$(this).text(Math.ceil(now));
 							}
 						});
 					});
 				</script>