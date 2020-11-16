<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<h5 class="card-title">Rate List</h5>
					</div>
					<div class="col-md-6">
						<div align="right"><button type="button" class="btn btn-primary" onclick="showModal();">Add New</button></a></div><br>
					</div>
				</div>
				<div class="row">
					<div class="col-8">
						<div align="right">
							<input type="text" id="search_value" class="search form-control" placeholder="Search..." autofocus>
						</div>
					</div>
					<div class="col-3">
						<select name="rate_type" id="rate_type" required="" class="form-control">
							<option value="Domestic">Domestic</option>
							<option value="International">International</option>
						</select>
					</div>
					<div class="col-1">
						<button id="myBtn" onclick="filterRate();" class="btn btn-primary"><i class="fa fa-search"></i> </button>
					</div>
				</div>
			</div>
			<br>
			<center>
				<div id="loading"></div>
			</center>
			<div id="form-group-item" style="width:100%; height:450px; overflow:auto; background-color:#6f046e; color:white;">
				<table class="table table-hover table-sm" id="item_list">
					<thead class="thead-primary">
						<tr>
							<td class="text-center">S.L</td>
							<td class="text-left">ID</td>
							<td class="text-left">Name</td>
							<td class="text-left">From Location</td>
							<td class="text-left">To Location</td>
							<td class="text-left">Cost</td>
							<td class="text-left">Zone</td>
							<td class="text-center">Action</td>
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
<form method="post" id="rateFrm">
	<div class="modal fade" id="myModal">
		<div class="modal-dialog center modal-lg">
			<div class="modal-content animated">
				<!-- Modal Header -->
				<div class="modal-header bg-primary">
					<h5 class="modal-title text-white">
						<div style="font-size: 15px;" class="modal-title">
							Rate Entry
						</div>
					</h5>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!-- Modal body -->

				<div class="form-group row" style="margin-top: 20px;">
					<label for="cono1" class="col-sm-3 text-right control-label col-form-label">Rate Type</label>
					<div class="col-sm-8">
						<select name="rate_type" id="ratetype" style="width: 100%;" required="" onchange="validation(this.value);">
							<option selected=" selected">Select</option>
							<option value="Domestic">Domestic</option>
							<option value="International">International</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
					<div class="col-sm-8">
						<input type="text" id="name" style="width: 100%;" required="" name="name" autofocus="1" autocomplete="off">
						<input type="hidden" class="form-control" id="rate_id" name="rate_id">
					</div>
				</div>
				<div class="form-group row">
					<label for="fname" class="col-sm-3 text-right control-label col-form-label">From Location</label>
					<div class="col-sm-8">
						<select name="frmLocation" id="frmLocation" style="width: 100%; height:36px;">
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="fname" class="col-sm-3 text-right control-label col-form-label">To Location</label>
					<div class="col-sm-8">
						<select name="toLocation" id="toLocation" style="width: 100%; height:36px;">
						</select>
					</div>
				</div>


				<div class="form-group row">
					<label for="fname" class="col-sm-3 text-right control-label col-form-label">Cost</label>
					<div class="col-sm-8">
						<input type="text" id="cost" style="width: 100%;" required="" name="cost" autocomplete="off">
					</div>
				</div>

				<div class="form-group row">
					<label for="fname" class="col-sm-3 text-right control-label col-form-label">Zone</label>
					<div class="col-sm-8">
						<input type="text" id="zone" style="width: 100%;" placeholder="" required="" name="zone">
					</div>
				</div>

				<button type="button" id="addedit_frm" class="btn btn-primary btn-lg btn-block" onclick="updateEntryFrom();">Save & New</button>
			</div>
		</div>
	</div>
</form>
<script>
	function validation(value) {
		$.ajax({
			type: 'post',
			url: '<?php echo base_url();?>mangement/mangement/getDomesticValue',
			data: {
				value: value
			},
			success: function(response) {
				document.getElementById("frmLocation").innerHTML = response;
				document.getElementById("toLocation").innerHTML = response;
			}
		});
	}

	function getsId(rate_id) {

		$.ajax({
			url: "<?php echo base_url(); ?>category/category/edit_rate_info?rate_id=" + rate_id,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				//validation(json.rate_type);
				selectedFrmLocation(json.rate_type, json.frmLocation);
				selectedtoLocation(json.rate_type, json.toLocation);

				$('#name').val(json.name);
				$('#cost').val(json.cost);
				$('#zone').val(json.zone);
				$('#ratetype').val(json.rate_type);
				$('#rate_id').val(json.rate_id);
				$('#myModal').modal('show');
			}
		});
	}

	function selectedFrmLocation(rate_type, frmLocation) {
		$.ajax({
			type: 'post',
			url: '<?php echo base_url();?>mangement/mangement/getFrmLocationEdit',
			data: {
				rate_type: rate_type,
				frmLocation: frmLocation
			},
			success: function(response) {
				document.getElementById("frmLocation").innerHTML = response;
				//document.getElementById("toLocation").innerHTML = response;
			}
		});
	}

	function selectedtoLocation(rate_type, toLocation) {
		$.ajax({
			type: 'post',
			url: '<?php echo base_url();?>mangement/mangement/getToLocationEdit',
			data: {
				rate_type: rate_type,
				toLocation: toLocation
			},
			success: function(response) {
				document.getElementById("toLocation").innerHTML = response;
			}
		});
	}

	function updateEntryFrom() {
		var dataString = $("#rateFrm").serialize();
		var name = $("#name").val();
		var cost = $("#cost").val();
		if (name !== "" && cost !== "") {
			$.ajax({
				type: "POST",
				dataType: 'json',
				url: "<?php echo base_url(); ?>mangement/mangement/insertRate",
				cache: false,
				data: dataString,
				success: function(data) {
					var save = data.save;
					var exits = data.exits;
					var update = data.update;
					if (save == 'save') {
						successfullyInsert();
					}
					if (update == 'update') {
						successfullyUpdate();
					}

					filterRate();
					$("#myModal").modal("hide");
				}
			});
		} else {
			alert("Please write category name");
		}
		return false; //stop the actual form post !important!
	}

	function showModal() {
		$("#rateFrm")[0].reset();
		$('#myModal').modal('show');
	}
	$("#name").keyup(function(event) {
		if (event.keyCode === 13) {
			$("#myBtn").click();
		}
	});

	function filterRate() {
		$('#item_list tbody tr').remove();
		var search_value = $("#search_value").val();
		var rate_type = $("#rate_type").val();
		sl = 1;
		$('#loading').html('<img src="<?php echo base_url(); ?>/resource/admin/assets/images/loading.gif"> loading...');
		$.ajax({
			url: "<?php echo base_url(); ?>category/Category/getJsonRate?name=" + search_value + "&rate_type=" + rate_type,
			type: "GET",
			dataType: 'json',
//			 beforeSend: function() {
//        // setting a timeout
//$('#loading').hide();
//    }
			success: function(json) {
			$('#loading').hide();
				$.map(json, function(item) {
					var id = "item_list" + item.rate_id;
					var html = "<tr id='" + id + "'>";
					html += "<td  onclick=getsId(" + item.rate_id + ")>" + sl + ". Edit " + "</td>";
						html += "<td class='text-left' >" + item.rate_id + "</td>";
					html += "<td class='text-left' >" + item.name + "</td>";
					html += "<td class='text-left'>" + item.frmLocation + "</td>";
					html += "<td class='text-left'>" + item.toLocation + "</td>";
					html += "<td class='text-left'>" + item.cost + "</td>";
					if (item.zone == 0) {
						html += "<td class='text-left'>" + '-' + "</td>";
					} else {
						html += "<td class='text-left'>" + item.zone + "</td>";
					}
					html += "<td class='text-left'>" + item.rate_type + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.rate_id + ")>" + 'Edit' + "</td>";
					html += "</tr>";
					if ($('#' + id).length < 1) {
						$('#form-group-item #item_list tbody').append(html);
						sl++;
					}
				});
			}
		});
	}
	filterRate();
</script>