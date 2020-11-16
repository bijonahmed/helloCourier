<div class="row">
	<div class="col-lg-12">
		<div class="card">

			<div class="card-body">
				<div class="row">
					<div class="col-8">
						<div align="right">
							<input type="text" id="name" class="search form-control"
								placeholder="Search User Name, Phone, Email" autofocus>
						</div>
					</div>
					<div class="col-3" style="display: none;">
						<input type="text" id="role_id" value="2" />
					</div>
					<div class="col-2">
						<select class="form-control" id="status">
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
					</div>
					<div class="col-2">
						<button id="myBtn" onclick="filterUser();" class="btn btn-primary"><i class="fa fa-search"></i>
						</button>
						<a href="<?php echo base_url(); ?>user/user/create_user"><button id="myBtn"
								class="btn btn-primary"><i class="fa fa-plus"></i> </button></a>
					</div>
				</div>
			</div>

			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
						aria-controls="home" aria-selected="true">
						<i class="fa fa-user"></i> User List</a>
				</li>

			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<!--Merchants List-->

					<center>
						<div id="loading"></div>
					</center>
					<div id="form-group-item">
						<table class="table table-hover table-sm table-responsive" id="item_list">
							<thead class="thead-primary">
								<tr>
									<th>#</th>
									<th>SL</th>
									<th>Name</th>
									<th>Company</th>
									<th>Mobile Name</th>
									<th>Email Name</th>
									<th>Role Name</th>
									<th>Status</th>
									<th>Action</th>
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
</div>
</div>
<script>
$("#name").keyup(function(event) {
if (event.keyCode === 13) {
	$("#myBtn").click();
}
});

function filterUser() {
$('#item_list tbody tr').remove();
var value = $("#name").val();
var sts = $("#status").val();
var role_id = $("#role_id").val();
//console.log(sts);
var statuss = ['Inactive', 'Active'];
sl = 1;
$('#loading').html('<img src="<?php echo base_url(); ?>/resource/admin/assets/images/loading.gif"> loading...');
$.ajax({
	url: "<?php echo base_url(); ?>/user/user/getJsonUser?name=" + value + "&status=" + sts + "&role_id=" +
		role_id,
	type: "GET",
	dataType: 'json',
	success: function(json) {
		$('#loading').html(json);
		$.map(json, function(item) {
			//alert(item.dvcharge);
			var id = "item_list" + item.user_id;
			var statuss = ['Inactive', 'Active'];
			var html = "<tr id='" + id + "'>";
			html +=
				"<td class='text-center'><a class='btn-primary text-center' href='<?php echo base_url(); ?>user/user/edit_user_frm/" +
				item.user_id +
				"'><div style='color: black; font-weight: bold;'>EDIT</div></a><a class='btn-primary text-center'></a></td>";
			html += "<td style='width: 1%;'>" + sl + "</td>";
			html += "<td class='text-left'>" + item.full_name + "</td>";
			html += "<td class='text-left'>" + item.company + "</td>";
			html += "<td class='text-left'>" + item.mobile_number + "</td>";
			html += "<td class='text-left'><a href = 'mailto: abc@example.com'>" + item.email + "</a></td>";
			html += "<td class='text-left'>" + item.role_name + "</td>";
			html += "<td class='text-left'>" + statuss[item.status] + "</td>";
			html +=
				"<td class='text-center'><a class='btn-primary text-center' href='<?php echo base_url(); ?>user/user/edit_user_frm/" +
				item.user_id +
				"'><div style='color: black;'><i class='zmdi zmdi-edit'> Edit</i></div></a></td>";
			html += "</tr>";
			if ($('#' + id).length < 1) {
				$('#form-group-item #item_list tbody').append(html);
				sl++;
			}
		});
	}
});
}
filterUser();

function getId(user_id) {
//alert(user_id);
$.ajax({
	type: 'post',
	url: '<?php echo base_url(); ?>user/user/accessPanelForAdmin',
	data: {
		user_id: user_id
	},
	success: function(response) {
		alert("working");
		//document.getElementById("deliverytype_id").innerHTML = response;
	}
});
$("#largesizemodal").modal();
}
</script>