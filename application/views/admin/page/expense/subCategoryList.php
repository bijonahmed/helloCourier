<font color="green">
	<?php
        $message = $this->session->userdata('msg');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('msg');
        }
        ?>
</font>

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">

				<div class="row">
					<div class="col-md-6">
						<h5 class="card-title">Expense Sub Category List</h5>
					</div>

					<div class="col-md-6">
						<div align="right" style="margin-right: 15px;"><a href="<?php echo base_url(); ?>expense/category/sub_create_category"><button type="button" class="btn btn-primary">Add</button></a></div><br>

					</div>
				</div>

				<div class="row">

					<div class="col-8">
						<div align="right">
							<input type="text" id="name" class="search form-control" placeholder="Search Sub Category..." autofocus>

						</div>

					</div>

					<div class="col-3">
						<select class="form-control" id="status">
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>

					</div>

					<div class="col-1">
						<button id="myBtn" onclick="filterSubCategory();" class="btn btn-primary"><i class="fa fa-search"></i> </button>
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
							<td class="text-left">Category</td>
                            <td class="text-left">Sub Category</td>
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


<script>
	$("#name").keyup(function(event) {
		if (event.keyCode === 13) {
			$("#myBtn").click();
		}
	});
	function filterSubCategory() {
		$('#item_list tbody tr').remove();
		var value = $("#name").val();
		var sts = $("#status").val();
		//console.log(sts);
		var statuss = ['Inactive', 'Active'];
		sl = 1;
		$('#loading').html('<img src="<?php echo base_url(); ?>/resource/admin/assets/images/loading.gif"> loading...');
		$.ajax({
			url: "<?php echo base_url();?>expense/Category/getJsonSubCategory?name=" + value + "&status=" + sts,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				$('#loading').html(json);
				$.map(json, function(item) {
					var id = "item_list" + item.sub_cat_id;
					var html = "<tr id='" + id + "'>";
					html += "<td>" + sl + "</td>";
					html += "<td class='text-left'>" + item.category_name + "</td>";
                    html += "<td class='text-left'>" + item.sub_cat_name + "</td>";
					html += "<td class='text-left'>" + statuss[item.status] + "</td>";
					html += "<td class='text-center'><a class='btn-primary text-center' href='<?php echo base_url(); ?>expense/Category/edit_subcategory_frm/" + item.sub_cat_id + "'><div style='color: black;'><i class='zmdi zmdi-edit'> Edit</i></div></a></td>";
					html += "</tr>";
					if ($('#' + id).length < 1) {
						$('#form-group-item #item_list tbody').append(html);
						sl++;
					}

				});

			}
		});
	}
	filterSubCategory();
</script>