<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<h5 class="card-title">Designation List</h5>
					</div>
					<div class="col-md-6">
						<!--<div align="right" style="margin-right: 15px;"><a href="<?php // echo base_url(); ?>employee/employee/create_designation"><button type="button" class="btn btn-primary">Add New Designation</button></a></div><br>-->
						<div align="right"><button type="button" class="btn btn-primary" onclick="showModal();">Add New Designation</button></a></div><br>
					</div>
				</div>
				<div class="row">
					<div class="col-8">
						<div align="right">
							<input type="text" id="name" class="search form-control" placeholder="Search..." autofocus>
						</div>
					</div>
					<div class="col-3">
						<select class="form-control" id="status">
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
					</div>
					<div class="col-1">
						<button id="myBtn" onclick="filterDesignation();" class="btn btn-primary"><i class="fa fa-search"></i> </button>
					</div>
				</div>
			</div>
			<br>
			<center>
				<div id="loading"></div>
			</center>
			<div id="form-group-item" style="width:100%; height:450px; overflow:auto; ">
				<table class="table table-hover table-sm" id="item_list">
					<thead class="thead-primary">
						<tr>
							<td class="text-center">S.L</td>
							<td class="text-left">Designation</td>
							<td class="text-left">Status</td>
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
<form method="post" id="dpt">
	<div class="modal fade" id="myModal">
		<div class="modal-dialog center modal-lg">
			<div class="modal-content animated">
				<!-- Modal Header -->
				<div class="modal-header bg-primary">
					<h5 class="modal-title text-white">
						<div style="font-size: 15px;" class="modal-title">
							Designation
						</div>
					</h5>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>

				</div>
				<!-- Modal body -->
				<div class="form-group row" style="margin-top: 15px;">
					<label for="fname" class="col-sm-2 text-right control-label col-form-label">Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="designation_name" placeholder="" required="" name="designation_name" autofocus="1" autocomplete="off">
						<input type="hidden" class="form-control" id="designation_id" name="designation_id">
					</div>
				</div>

				<div class="form-group row">
					<label for="cono1" class="col-sm-2 text-right control-label col-form-label">Status</label>
					<div class="col-sm-8">
						<select name="status" id="status" style="width: 100%;" required="">
							<option value="1" selected=" selected">Active</option>
							<option value="0">Inactive</option>
						</select>
					</div>
				</div>

				<button type="button" id="addedit_frm" class="btn btn-primary btn-lg btn-block" onclick="updateEntryFrom();">Save & New</button>
			</div>
		</div>
	</div>
</form>
<script>
	function updateEntryFrom() {
		var dataString = $("#dpt").serialize();
		var statuschk = $("#status").val();
		var dpt_name = $("#dpt_name").val();
		if (statuschk !== "" && dpt_name !== "") {
			$.ajax({
				type: "POST",
				dataType: 'json',
				url: "<?php echo base_url(); ?>mangement/mangement/insertDesignation",
				cache: false,
				data: dataString,
				success: function(data) {
                    console.log(data);
					var save = data.save;
					var exits = data.exits;
					var update = data.update;
                    
					if (save == 'save') {
						successfullyInsert();
					}
					if (update == 'update') {
						successfullyUpdate();
					}
					if (exits == 'exits') {
						alreadyexitsValidation();
					}
					filterDesignation();
					$("#myModal").modal("hide");
					
				}
			});
		} else {
			alert("Please write Designation");
		}
		return false; //stop the actual form post !important!
	}

	function showModal() {
		$("#dpt")[0].reset();
		$('#myModal').modal('show');
	}
	$("#name").keyup(function(event) {
		if (event.keyCode === 13) {
			$("#myBtn").click();
		}
	});

	function getsId(designation_id) {
		$.ajax({
			url: "<?php echo base_url(); ?>employee/employee/edit_designation_response?designation_id=" + designation_id,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				$('#designation_name').val(json.designation_name);
				$('#designation_id').val(json.designation_id);
				$('#status').val(json.status);
				$('#myModal').modal('show');
			}
		});
	}

	function filterDesignation() {
		$('#item_list tbody tr').remove();
		var value = $("#name").val();
		var sts = $("#status").val();
		//console.log(sts);
		var statuss = ['Inactive', 'Active'];
		sl = 1;
		$('#loading').html('<img src="<?php echo base_url(); ?>/resource/admin/assets/images/loading.gif"> loading...');
		$.ajax({
			url: "<?php echo base_url(); ?>/employee/employee/getJsondesignation?name=" + value + "&status=" + sts,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				$('#loading').html(json);
				$.map(json, function(item) {
					var id = "item_list" + item.designation_id;
					var html = "<tr id='" + id + "'>";
					html += "<td>" + sl + "</td>";
					html += "<td class='text-left'>" + item.designation_name + "</td>";
					html += "<td class='text-left'>" + statuss[item.status] + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.designation_id + ")>" + 'Edit' + "</td>";
					html += "</tr>";
					if ($('#' + id).length < 1) {
						$('#form-group-item #item_list tbody').append(html);
						sl++;
					}
				});
			}
		});
	}
	filterDesignation();
</script>