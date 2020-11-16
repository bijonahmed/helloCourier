<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">

				<div class="row">
					<div class="col-md-6">
						<h5 class="card-title">Subscribe List</h5>
					</div>
				</div>

				<div class="row">

					<div class="col-11">
						<div align="right">
							<input type="text" id="name" class="search form-control" placeholder="Search Email..."
								autofocus>

						</div>

					</div>
					<div class="col-1">
						<button id="myBtn" onclick="filterSubs();" class="btn btn-primary"><i class="fa fa-search"></i>
						</button>
					</div>

				</div>

			</div>
			<br>
			<center>
				<div id="loading"></div>
			</center>
			<div id="form-group-item" style="width:100%; height:450px; overflow:auto; ">
				<table class="table table-hover table-sm" id="item_list">
					<thead>
						<tr>
							<th>SL.</th>
							<th>Email</th>
							<th>Type</th>
							<th>Packages</th>
							<th>Date</th>

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

	function filterSubs() {
		$('#item_list tbody tr').remove();
		var value = $("#name").val();
		sl = 1;
		$('#loading').html('<img src="http://sampsonresume.com/labs/pIkfp.gif"> loading...');
		$.ajax({
			url: "<?php echo base_url();?>/subscribe/getJsonSubscribe?name=" + value,
			type: "GET",
			dataType: 'json',
			success: function(json) {
				$('#loading').html(json);
				$.map(json, function(item) {
					//console.log(item);
					var id = "item_list" + item.subs_id;
					var html = "<tr id='" + id + "'>";
					html += "<td>" + sl + "</td>";
					html += "<td class='text-left'>" + item.email + "</td>";
					html += "<td class='text-left'>" + item.type + "</td>";
					html += "<td class='text-left'>" + item.packages + "</td>";
					html += "<td class='text-left'>" + item.date + "</td>";
					html += "</tr>";
					if ($('#' + id).length < 1) {
						$('#form-group-item #item_list tbody').append(html);
						sl++;
					}
				});
			}
		});
	}
	filterSubs();
</script>