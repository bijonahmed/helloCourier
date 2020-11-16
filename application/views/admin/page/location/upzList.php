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
						<h5 class="card-title">Upazilla List</h5>
					</div>

					<div class="col-md-6">
						<div align="right" style="margin-right: 15px;"><a href="<?php echo base_url(); ?>location/location/create_upz"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> </button></a></div><br>

					</div>
				</div>

				<div class="row">

					<div class="col-8">
						<div align="right">
							<input type="text" id="name" class="search form-control" placeholder="Search upazilla Name..." autofocus>

						</div>

					</div>

					<div class="col-3">
						<select class="form-control" id="status">
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>

					</div>

					<div class="col-1">
						<button id="myBtn" onclick="filterUpz();" class="btn btn-primary"><i class="fa fa-search"></i> </button>
					</div>

				</div>

			</div>
			<br>
			<center>
				<div id="loading"></div>
			</center>
			<div id="form-group-item">
				<table class="table table-hover table-sm table-fixed" id="item_list">
					<thead >
						<tr>
                            <th>SL.</th>
							<th>Division Name</th>
							<th>District Name</th>
							<th>Upz/Area Name</th>
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


<script>
	$("#name").keyup(function(event) {
		if (event.keyCode === 13) {
			$("#myBtn").click();
		}
	});

	function filterUpz() {
		$('#item_list tbody tr').remove();
		var value = $("#name").val();

		sl = 1;
		$('#loading').html('<img src="http://sampsonresume.com/labs/pIkfp.gif"> loading...');
		$.ajax({
			url: "<?php echo base_url();?>/location/Location/getJsonUpz?name=" + value ,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				$('#loading').html(json);
				$.map(json, function(item) {
					var id = "item_list" + item.upozilla_id;
					var html = "<tr id='" + id + "'>";
					html += "<td>" + sl + "</td>";
					html += "<td class='text-left'>" + item.division_name + "</td>";
					html += "<td class='text-left'>" + item.district_name + "</td>";
                    html += "<td class='text-left'>" + item.upozilla_name + "</td>";
					html += "<td class='text-center'><a class='btn-primary text-center' href='<?php echo base_url(); ?>location/location/upz_list_frm/" + item.upozilla_id + "'><div style='color: black;'><i class='zmdi zmdi-edit'> Edit</i></div></a></td>";
					html += "</tr>";
					if ($('#' + id).length < 1) {
						$('#form-group-item #item_list tbody').append(html);
						sl++;
					}

				});

			}
		});
	}
	filterUpz();
</script>