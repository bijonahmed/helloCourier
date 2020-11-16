<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<h5 class="card-title">Marketing List</h5>
					</div>
					<div class="col-md-6">
						<div align="right"><button type="button" class="btn btn-primary" onclick="showModal();">Add New Marketing</button></a></div><br>
					</div>
				</div>
				<div class="row">
					<div class="col-8">
						<div align="right">
							<input type="text" id="name" class="search form-control" placeholder="Search.." autofocus>
						</div>
					</div>
					<div class="col-3">
						<select class="form-control" id="status">
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
					</div>
					<div class="col-1">
						<button id="myBtn" onclick="filterDpt();" class="btn btn-primary"><i class="fa fa-search"></i> </button>
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
							<td class="text-left">Company Name</td>
							<td class="text-left">Company Email</td>
							<td class="text-left">Company Web</td>
							<td class="text-left">Company Mobile</td>
							<td class="text-left">Company Address</td>
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
							Marketing
						</div>
					</h5>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>

				</div>
				<!-- Modal body -->

				<div class="form-group row" style="margin-top: 15px;">
					<label for="fname" class="col-sm-2 text-right control-label col-form-label">Company Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="comany_name" required="" name="comany_name" autocomplete="off">
					</div>
				</div>

				<div class="form-group row" style="margin-top: 15px;">
					<label for="fname" class="col-sm-2 text-right control-label col-form-label">Company Mobile</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="company_mobile" required="" name="company_mobile" autocomplete="off" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
					</div>
				</div>

				<div class="form-group row" style="margin-top: 15px;">
					<label for="fname" class="col-sm-2 text-right control-label col-form-label">Company Address</label>
					<div class="col-sm-8">
						<textarea class="form-control" id="company_address" name="company_address"></textarea>
					</div>
				</div>

				<div class="form-group row" style="margin-top: 15px;">
					<label for="fname" class="col-sm-2 text-right control-label col-form-label">Company Email</label>
					<div class="col-sm-8">
						<input type="email" class="form-control" id="company_email" required="" name="company_email" autocomplete="off">
						<input type="hidden" class="form-control" id="marketingId" name="marketingId">
					</div>
				</div>

				<div class="form-group row" style="margin-top: 15px;">
					<label for="fname" class="col-sm-2 text-right control-label col-form-label">Company Web</label>
					<div class="col-sm-8">
						<input type="url" class="form-control" id="company_web" required="" name="company_web" autocomplete="off">

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
		var company_web = $("#company_web").val();
		var company_email = $("#company_email").val();
		var company_mobile = $("#company_mobile").val();
		var comany_name = $("#comany_name").val();


		if (company_web !== "" && company_email !== "" && company_mobile !== "" && comany_name !== "" ) {
			$.ajax({
				type: "POST",
				dataType: 'json',
				url: "<?php echo base_url(); ?>mangement/mangement/insertmkt",
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
					if (exits == 'exits') {
						alreadyexitsValidation();
					}

					filterDpt();
					$("#myModal").modal("hide");

				}
			});
		} else {
			alert("Please write blank fileds.");
		}
		return false; //stop the actual form post !important!
	}

	function showModal() {
		$("#dpt")[0].reset();
		$('#myModal').modal('show');
	}

	function getsId(marketingId) {
		$.ajax({
			url: "<?php echo base_url(); ?>marketing/marketing/edit_mkt_response?marketingId=" + marketingId,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				$('#marketingId').val(json.marketingId);
				$('#comany_name').val(json.comany_name);
				$('#company_mobile').val(json.company_mobile);
				$('#company_address').val(json.company_address);
				$('#company_email').val(json.company_email);
				$('#company_web').val(json.company_web);
				$('#myModal').modal('show');
			}
		});
	}
	$("#name").keyup(function(event) {
		if (event.keyCode === 13) {
			$("#myBtn").click();
		}
	});

	function filterDpt() {
		$('#item_list tbody tr').remove();
		var value = $("#name").val();
		sl = 1;
		$('#loading').html('<img src="<?php echo base_url(); ?>/resource/admin/assets/images/loading.gif"> loading...');
		$.ajax({
			url: "<?php echo base_url(); ?>marketing/marketing/getJsonmkt?name=" + value,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				$('#loading').html(json);
				$.map(json, function(item) {
					var id = "item_list" + item.marketingId;
					var html = "<tr id='" + id + "'>";
					html += "<td>" + sl + "</td>";
					html += "<td class='text-left'>" + item.comany_name + "</td>";
					html += "<td class='text-left'>" + item.company_email + "</td>";
					html += "<td class='text-left'>" + item.company_web + "</td>";
					html += "<td class='text-left'>" + item.company_mobile + "</td>";
					html += "<td class='text-left'>" + item.company_address + "</td>";
					html += "<td class='text-left' onclick=getsId(" + item.marketingId + ")>" + 'Edit' + "</td>";
					html += "</tr>";
					if ($('#' + id).length < 1) {
						$('#form-group-item #item_list tbody').append(html);
						sl++;
					}
				});
			}
		});
	}
	filterDpt();
</script>