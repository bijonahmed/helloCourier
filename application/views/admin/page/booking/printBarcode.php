<style type="text/css">
	.Estilo2 {
		color: #000000;
		font-weight: bold;
	}

	.Estilo3 {
		font-family: Arial, Helvetica, sans-serif
	}

	.Estilo8 {
		font-size: 10
	}

	.Estilo10 {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;
	}

	.Estilo13 {
		font-size: 12
	}

	body {
		font-family: "Arial Black", Gadget, sans-serif font-size: 15px;
		color: #000;
		letter-spacing: 1px;
	}
</style>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-2">
					</div>
					<div class="col-lg-8">
						<div align="right" style="padding: 10px;"><a href="#" onclick="printDiv('printableArea')"><i aria-hidden="true" class="fa fa-print"></i> Print</a></div><br>
						<div id="printableArea">
							<table width="510" border="0" align="center" style="padding: 20px;">
								<tr>
									<td colspan="2">
										<div align="center">
											<small> <img src="<?php echo base_url();?><?php echo $company->image;?>" alt="company logo" style="height: 100px; width: 150px;"><br>
												Email: <?php echo $company->company_email;?>, Web: <?php echo $company->company_web;?><br>Tel: <?php echo $company->compnay_phone;?></small>
											<hr>
										</div>
									</td>
								</tr>
								<tr>
									<td width="259" bgcolor="#CCCCCC">
										<div align="center" class="Estilo3"><span class="Estilo2">FROM LOCATION: <?php echo $row->frmLocation;?></span></div>
									</td>
									<td width="235" bgcolor="#CCCCCC">
										<div align="center" class="Estilo3"><span class="Estilo2">TO LOCATION: <?php echo $row->toLocation;?></span></div>
									</td>
								</tr>
							
								<tr>
									<td>Type:  </td>
									<td><b><?php echo $row->rate_type;?></b></td>
								</tr>
								<tr>
									<td>Amount:  </td>
									<td><b><?php echo $row->totalAmt;?></b></td>
								</tr>
								 
								<tr>
									<td colspan="2"><strong>Reciver Information: </strong></td>
								</tr>
								<tr>
									<td colspan="2">
										<p>Reciver Name: <?php echo $row->recv_name;?>,<br>
										Reciver Email: <?php echo $row->recv_email;?>,<br>
										Reciver Mobile: <?php echo $row->recv_phone;?></p>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<div align="center">
											<span class="Estilo8"></span>
											<table width="498" border="0">
												<tr>
													<td width="242">
														<div align="left"><span class="Estilo8">&nbsp;&nbsp;&nbsp; TRACKING#<br />
																<img src="<?php echo base_url();?>booking/booking/set_barcode/<?php echo $row->bookingId;?>" alt="barcode" /> </span></div>
													</td>
													<td width="240">
														<div align="right"><img src="<?php echo base_url();?>booking/booking/set_qrcode/<?php echo $row->bookingId;?>" alt="qrcode"></div>
													</td>
												</tr>
											</table>
											<small>Printing Date: <?php echo date('Y-m-d');?></small>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="2">&nbsp;</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-2">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script>
	// Print
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}
</script>