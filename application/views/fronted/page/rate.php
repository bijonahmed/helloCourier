    <!--Page Title-->
    <section class="page-title inner-baner">
    	<div class="container">
    		<h2>Rate</h2>
    		<ul class="bread-crumb clearfix">
    			<li><a href="<?php echo base_url();?>">Home</a></li>
    			<li class="active">Rate</li>
    		</ul>
    	</div>
    </section>
    <!--End Page Title-->
    <div class="sections-wrapper">
    	<div class="container">

    		<div class="row">

    			<div class="col-md-12">
    				<fieldset>
    					<br>
    					<h2>Calculate Rate</h2>
    					<hr class="colorgraph">
    				 
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
    						<label>Weight </label>
    						<select style="width:100%;" name="rate_id" id="rate_id" onchange="getRateCost(this.value);">
						<option selected="selected">Select</option>
					</select>
    					</div>

    					<!------>
    				 
    					<div class="form-group">
						<center><span id="show_cost" style="font-size: 25px; font-weight: bold;"></span></center>
    					</div>
    				
    				</fieldset>
    				<br>
    			</div>

    		</div>

    	</div>
    </div>
    <script>
function validation(value) {
		$.ajax({
			type: 'post',
			url: '<?php echo base_url();?>home/getLocationValue',
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
				$("#show_cost").text("Total = NGN " + response);
			}
		});
	}
    </script>

