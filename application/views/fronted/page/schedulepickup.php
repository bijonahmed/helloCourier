    <!--Page Title-->
    <section class="page-title inner-baner">
    	<div class="container">
    		<h2><?php echo $title;?></h2>
    		<ul class="bread-crumb clearfix">
    			<li><a href="<?php echo base_url();?>">Home</a></li>
    			<li class="active"><?php echo $title;?></li>
    		</ul>
    	</div>
    </section>
    <!--End Page Title-->
    <div class="sections-wrapper">
    	<div class="container">
    		<form method="POST" action="<?php echo base_url(); ?>mangement/mangement/savePickupSchedule">
    			<div class="row">
    				<br>

    				<center>
    					<h3>
    						<font color="green">
    							<?php
                        $message = $this->session->userdata('pickup_msg');
                        if (isset($message)) {
                            echo $message;
                            $this->session->unset_userdata('pickup_msg');
                        }
                        ?>

    						</font>
    					</h3>
    				</center>

    				<h2>Schedule Pickup</h2>
    				<hr class="colorgraph">
    				<div class="col-md-6">
    					<fieldset>
    						<div class="form-group">
    							<label>Sender Name</label>
    							<input type="text" class="form-control" placeholder="Sender Name" required=""
    								id="senderName" name="senderName">
    						</div>

    						<div class="form-group">
    							<label>Sender email</label>
    							<input type="email" class="form-control" placeholder="Sender email" required=""
    								id="senderEmail" name="senderEmail">
    						</div>

    						<div class="form-group">
    							<label>Sender Contact Number</label>
    							<input type="text" class="form-control" placeholder="Sender Contact Number" required=""
    								id="senderPhone" name="senderPhone">
    						</div>

    						<div class="form-group">
    							<label>Type</label>
    							<select name="rate_type" id="ratetype" style="width: 100%;" required=""
    								onchange="validation(this.value); ">
    								<option selected="selected">Select</option>
    								<option value="Domestic">Domestic</option>
    								<option value="International">International</option>
    							</select>

    						</div>

    						<div class="form-group">
    							<label>Form Location</label>
								<select name="frmLocation" id="frmLocation" style="width: 100%; height:36px;">
						<option>Select</option>
					</select>
    						</div>

    						<div class="form-group">
    							<label>To Location</label>
								<select name="toLocation" id="toLocation" style="width: 100%; height:36px;"
						onchange="checkWeightList(this.value);">
						<option>Select</option>
					</select>
    						</div>

							<div class="form-group">
						<p>Weight</p>
    					<select style="width:100%;" name="rate_id" id="rate_id" onchange="getRateCost(this.value);">
						<option selected="selected">Select</option>
								</select>
    					</div>
						<div class="form-group">
    						<label>Cost</label>
    						<input type="text" class="form-control" required="" id="show_cost" name="cost" readonly>
    						<input type="hidden" name="pickup_date" value="<?php echo date("Y-m-d");?>" />
    					</div>

    					</fieldset>
    					<br>
    				</div>

    				<div class="col-md-6">
    				

    					<div class="form-group">
    						<label>Receiver Name</label>
    						<input type="text" class="form-control" placeholder="Receiver email" required=""
    							id="receiverName" name="receiverName">
    						<input type="hidden" name="pickup_date" value="<?php echo date("Y-m-d");?>" />
    					</div>

    					<div class="form-group">
    						<label>Receiver Email</label>
    						<input type="text" class="form-control" placeholder="Receiver email" required=""
    							id="receiverEmail" name="receiverEmail">
    					</div>

    					<div class="form-group">
    						<label>Receiver Contacct number</label>
    						<input type="text" class="form-control" placeholder="Receiver Contacct number" required=""
    							id="receiverContact" name="receiverContact">
    					</div>

    					<div class="form-group">
    						<label>Product Content</label>
    						<input type="text" class="form-control" placeholder="Product Content" required=""
    							id="productContant" name="productContant">
    					</div>
    				
    					<div class="form-group">
    						<label>Receiver Address</label>
    						<textarea type="text" class="form-control" placeholder="Receiver Address" required=""
    							id="receiverAddress" name="receiverAddress"></textarea>
    					</div>

    				</div>

    			</div>
    			<br>
    			<button class="btn btn-primary btn-block">Submit</button>
    			<br>
    	</div>
    	</form>
    </div>
    <script>
function validation(value) {
	$.ajax({
		type: 'post',
		url: '<?php echo base_url();?>home/getschedulePackType',
		data: {
			value: value
		},
		success: function(response) {
			document.getElementById("frmLocation").innerHTML = response;
			document.getElementById("toLocation").innerHTML = response;
		}
	});
}

function checkWeightList(toLocation) {
	var frmLocation = $("#frmLocation").val();
	$.ajax({
		type: 'get',
		url: '<?php echo base_url();?>home/checkRateCostList',
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
		url: '<?php echo base_url();?>home/checkRateCost',
		data: {
			rate_id: rate_id
		},
		success: function(response) {
			$("#show_cost").val(response);
		}
	});
}
    </script>