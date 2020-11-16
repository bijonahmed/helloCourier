<div class="row">
    
	<div class="col-lg-12">
        	<h5 class="card-title">Log Report List</h5>
		<div class="card">
			 
			<div id="form-group-item" style="width:100%; height:500px; overflow:auto; ">
				<table class="table table-hover table-sm" id="item_list">
					<thead class="thead-primary">
						<tr>
							<td class="text-center">S.L</td>
							<td class="text-left">User Name</td>
                            <td class="text-left">Role</td>
                            <td class="text-left">Action</td>
                            <td class="text-left">Details</td>
                            <td class="text-left">Date & Time</td>
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
	function filterMenu() {
		$('#item_list tbody tr').remove();
		var value = $("#name").val();
		var sts = $("#status").val();
		//console.log(sts);
		var statuss = ['Inactive', 'Active'];
		sl = 1;
		$('#loading').html('<img src="<?php echo base_url(); ?>resource/admin/assets/images/loading.gif"> loading...');
		$.ajax({
			url: "<?php echo base_url(); ?>report/report/getLogReport",
			type: "GET",
			dataType: 'json',
			success: function(json) {
                console.log(json);
				$('#loading').html(json);
				$.map(json, function(item) {
					var id = "item_list" + item.logId;
					var html = "<tr id='" + id + "'>";
					html += "<td>" + sl + "</td>";
					html += "<td class='text-left'>" + item.full_name + "</td>";
					html += "<td class='text-left'>" + item.role_name + "</td>";
					html += "<td class='text-left'>" + item.action + "</td>";
                    html += "<td class='text-left'>" + item.details + "</td>";
                    html += "<td class='text-left'>" + item.date_time  + "</td>";
					html += "</tr>";
					if ($('#' + id).length < 1) {
						$('#form-group-item #item_list tbody').append(html);
						sl++;
					}
				});
			}
		});
	}
	filterMenu();
</script>