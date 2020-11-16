<?php $row = $this->db->query("SELECT * FROM tbl_global_setting")->row(); ?>
<style>
	.inner-baner {
		background: url(<?php echo base_url();
		?><?php echo $row->bn_image;
		?>);
	}

	.well {
		min-height: 20px;
		padding: 19px;
		margin-bottom: 20px;
		background-color: #720675;
		border: 1px solid #e3e3e3;
		border-radius: 4px;
		-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
		box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
	}

	.modal-open[style] {
		padding-right: 0px !important;
	}

	.modal {
		text-align: center;
	}

	@media screen and (min-width: 768px) {
		.modal:before {
			display: inline-block;
			vertical-align: middle;
			content: " ";
			height: 100%;
		}
	}

	.modal-dialog {
		display: inline-block;
		text-align: left;
		vertical-align: middle;
	}

	.text {
		background-color: #04336b;
		color: white;
		font-size: 16px;
		padding: 16px 32px;
	}
</style>

<section class="page-title inner-baner">
	<div class="container">
		<h2><?php echo $title;?></h2>
		<ul class="bread-crumb clearfix">
			<li><i class="fa fa-home"></i> <a href="<?php echo base_url();?>">Home</a></li>
			<li class="active"><?php echo $title;?></li>
		</ul>
	</div>
</section>
<!--End Page Title-->

<section class="sec-pad">
	<div class="container ptb">
		<div class="row">
			<center>Payment online via CashEnvoy or PayPal</center><br>
			<div class="col-md-4">
				<div class="well">
					<p style="color:black;"><?php 
 if(isset($setting->payOffline)){
	echo $setting->payOffline;
 }
 ?></p>
				</div>
			</div>

			<div class="col-md-8">
				<fieldset>
					<hr class="colorgraph">
					<p id="msg" style="color: red; font-size: 20px; font-weight: bold;"></p>
					<div class="form-group">
						<label>Full Name</label>
						<input type="text" class="form-control" placeholder="Full Name" required="" id="full_name"
							name="full_name">
					</div>

					<!------>
					<div class="form-group">
						<label>Mobile Number</label>
						<input type="text" class="form-control" required="" placeholder="Mobile" name="mobile_number"
							id="mobile_number">
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" placeholder="Email" required="" id="email"
							name="email">
					</div>

					<div class="form-group">
						<label>Amount</label>
						<input type="text" class="form-control numbervalidation" placeholder="Amount" name="amount"
							onchange="getwayPassAmt(this.value);">
					</div>
					<button class="btn btn-primary btn-block" onclick="checkvalidation();">Proced</button>
				</fieldset>

			</div>

		</div>
	</div>

</section>
<div id="error_address" class="modal fade">
	<div class="modal-dialog modal-sm">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #ff0505;; color: white;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">
					<center>Warning</center>
				</h4>
			</div>
			<div class="modal-body" style="background-color: #ff0505;">
				<center style="font-size: 20px; color: white; font-weight: bold;">Fill up all blank input boxes .
				</center>
			</div>
			<div class="modal-footer" style="background-color: #ff0505;">
				<button type="button" class="btn btn-info btn-block" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
<div id="myModal" class="modal fade" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #720675;; color: white;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Payment</h4>
			</div>

			<div class="row" style=" padding:50px; text-align:center;">

				<div class="col-md-6">
					<form method="post" action="#">
						<button class="btn btn-block btn-lg" style="background-color: #720675; color:white;">Pay Now
							Cashenvoy</button>
					</form>
				</div>
				<div class="col-md-6">
					<form method="post" action="<?php echo base_url();?>home/buy">
						<input type="hidden" id="paypal_amt" name="amount" />
						<button class="btn btn-block btn-lg" style="background-color: #720675; color:white;">Pay Now
							Paypal</button>
						<br>
					</form>
				</div>

			</div>
			<div class="modal-footer">
				<div class="row">

					<div class="col-sm-12 text-right">
						<button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<script src="<?php echo base_url(); ?>resource/fronted/plugins/jquery.min.js"></script>
<script>
	function getwayPassAmt(amt) {
		$('#paypal_amt').val(amt);
	}
	$('.numbervalidation').keyup(function() {
		var val = $(this).val();
		if (isNaN(val)) {
			val = val.replace(/[^0-9\.]/g, '');
			if (val.split('.').length > 2)
				val = val.replace(/\.+$/, "");
		}
		$(this).val(val);
	});

	function checkvalidation() {
		var full_name = $("#full_name").val();
		var mobile_number = $("#mobile_number").val();
		var email = $("#email").val();
		var amount = $("#amount").val();
		if (full_name == "" || mobile_number == "" || email == "" || amount == "") {
			$('#error_address').modal('show');
		} else {
			$('#myModal').modal('show');
		}
	}
</script>