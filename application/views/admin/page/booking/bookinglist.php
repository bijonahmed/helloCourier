
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-6 col-md-3">
						<input type="text" id="name" class="search form-control" placeholder="Search... Booking Id, date,Company Name, Reciver Name, Reciver Phone" autofocus>
					</div>
					<div class="col-6 col-md-3"><select class="form-control" name="status" id="status" >
							<option value="1">Select Status</option>
							<?php
                            foreach ($delivery_status as $value) {
                                ?>
							<option value="<?php echo $value->status; ?>"><?php echo $value->display; ?></option>
							<?php
                            }
                            ?>
						</select></div>
					<div class="col-6 col-md-3">
						<select class="form-control" id="paid_type">
							<option selected="selected" value="">Payment Type</option>
							<option value="Unpaid">Unpaid</option>
							<option value="Paid">Paid</option>
						</select>
					</div>
					<div class="col-6 col-md-3">
						<input type="text" id="user_id" name="user_id" class="search form-control" placeholder="Enter you merchent mame....." autofocus autocomplete="off" required="" onkeyup="getMerchentId(this.value);">
						<input type="hidden" id="userid" name="userid">
					</div>
				</div><br>
				<div class="row">
					<?php
						$roleid= $this->session->userdata('role_id');
						if($roleid==1){
						
					?>
					<div class="col-6 col-md-3">
						<select class="form-control custom-select" name="hubs_id" id="hubs_id">
							<option value="">Select Hubs </option>
							<?php
                            foreach ($hublist as $value):
                                ?>
							<option value="<?php echo $value->hubs_id; ?>" style="background-color: <?php echo $value->color; ?>; color: black;">
								<?php echo $value->hubsname; ?></option>
							<?php
                            endforeach;
                            ?>
						</select>
					</div>
					<?php } ?>
					
					<div class="col-6 col-md-3">
						<input type="text" name="b_date" id="b_date" class="form-control" value="<?php echo date("d-m-Y"); ?>">
					</div>
					<div class="col-6 col-md-3">
						<select class="form-control" name="deliveryman" id="deliveryman" required>
							<option value="">Select Delivery Man</option>
							<?php
                            foreach ($delivery_men as $value):
                                ?>
							<option value="<?php echo $value->full_name; ?>"><?php echo $value->full_name .'['.$value->hubsname.']';?>
							</option>
							<?php
                            endforeach;
                            ?>
						</select>
					</div>
					<div class="col-6 col-md-3">
						<button id="myBtn" onclick="filterBooking();" class="btn btn-primary"><i class="fa fa-search"></i> </button>
						<button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> </button>
						<button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Book Now </button>
					</div>
				</div>
				<br>
				<center>
					Total Booking <span class="badge badge-primary badge-pill">(<?php
                        echo $total_booking->booking_id;
                        ?>)</span>
					Total Paid <span class="badge badge-info badge-pill">(<?php
                        echo $total_paid->paid;
                        ?>)</span>
					Total Unpaid <span class="badge badge-danger badge-pill"> (<?php
                        echo $total_unpaid->unpaid;
                        ?>)</span>
					Total Waiting Pickup <span class="badge badge-danger badge-pill">(<?php
                        echo $total_watingpickup->watingpick;
                        ?>)</span>
					<span class="badge badge-danger badge-pill" onclick="copyClipboard();">(Copy Booking Table
						Data)</span>
					<?php if ($role_id == 1) { ?>
					<button class="btn btn-primary" data-toggle="modal" data-target="#paidtype"><i class="fa fa-money"></i> </button>
					<?php } ?>
				</center>
			</div>
			<center>
				<div id="loading"></div>
			</center>
			<form name="multiple" method="post" id="bookinglistPaidStatus">
				<!-- Paid type -->
				<div class="modal fade" id="paidtype" tabindex="-1 aria-hidden=" true" data-delay="1" data-open="2">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header bg-primary">
								<h4 class="modal-title" style="color: black;">Paid Type</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<!-- Modal body -->
							<div class="modal-body">
								<h1>
									<center><b>Process To Paid</b></center>
								</h1>
							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-danger btn-lg btn-block" onclick="multipleTypeUpdate();"><i class="fa fa-check"></i> Process</button>
							</div>
						</div>
					</div>
				</div>
				<div id="form-group-item" style="width:100%; height:450px; overflow:auto; background-color:#6f046e; color:white;">
					<table class="table table-hover table-sm" id="item_list">
						<thead class="thead-primary">
							<tr>
								<td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'bookingId\']').prop('checked', this.checked);" /></td>
								<td style="width: 5px;">S.L</td>
								<td class="text-left">Booking ID</td>
								<td class="text-left">Status</td>
								<td class="text-left">Paid Type</td>
								<td class="text-left">Date</td>
								<td class="text-left">Company Name</td>
								<td class="text-left">Rece. Name</td>
								<td class="text-left">Assign By</td>
								<td class="text-left">Hubs</td>
								<td class="text-left">Amount</td>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog center modal-lg">
		<div class="modal-content animated">
			<!-- Modal Header -->
			<div class="modal-header bg-primary">
				<h5 class="modal-title text-white">
					<div style="font-size: 15px;" class="modal-title">
						Entry Booking From
					</div>
				</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- Modal body -->
			<form method="post" action="" id="booking">
				<div class="row" style="padding: 5px;">
					<div class="col-sm-6">
						<div class="form-group" style="display: none;">
							<label for="uname" style="color: black;font-weight: bold;">Select Your Hubs:</label>
							<select name="hubs_id" id="hubs_id" style="width: 100%;">
								<?php
                                foreach ($hublist as $value) {
                                    ?>
								<option value="<?php echo $value->hubs_id; ?>"><?php echo $value->hubsname; ?>
								</option>
								<?php }; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="uname" style="color: black;font-weight: bold;">Receive Date:</label>
							<input type="text" name="date" id="date" value="<?php echo date("d-m-Y"); ?>" style="width: 100%;">
						</div>
						<div class="form-group">
							<label for="uname" style="color: black;font-weight: bold;">Merchant:</label>
							<select class="selectpicker user_id" name="user_id" data-size="15" data-live-search="true" data-title="Type Your Merchent" id="state_list" data-width="100%" onchange="getDvCharge(this.value)">
								<?php
                                foreach ($marchent as $value):
                                    ?>
								<option value="<?php echo $value->user_id; ?>">
									<?php echo $value->company . ' [' . $value->full_name . ']' . ' -' . $value->mobile_number . ''; ?>
								</option>
								<?php
                                endforeach;
                                ?>
							</select>
						</div>
						<div class="form-group">
							<label for="uname" style="color: black;font-weight: bold;">Phone:</label>
							<input type="text" maxlength="11" name="reciver_phone" placeholder="Phone" id="reciver_phone" size="1" class="inputs" onchange="getNumber(this.value);" style="width: 100%;" autocomplete="off">
							<p id="previewNumber" style="font-size:20px; font-weight: bold;color: green;text-align: center;"></p>
						</div>
						<div class="form-group">
							<label for="uname" style="color: black;font-weight: bold;">Receiver Name:</label>
							<input type="text" placeholder=" Name" name="reciver_name" id="reciver_name" required="" style="width: 100%;" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="uname" style="color: black;font-weight: bold;">Address:</label>
							<input type="text" placeholder=" Address" id="reciver_address" name="reciver_address" required="" style="width: 100%;">
						</div>
						<div class="form-group">
							<label for="uname" style="color: black;font-weight: bold;">Package Des:</label>
							<input type="text" placeholder=" Package Des" name="reciver_packege_des" required="" style="width: 100%;">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="uname" style="color: black;font-weight: bold;">Instruction:</label>
							<input type="text" placeholder=" Instruction" id="reciver_instruction" name="reciver_instruction" value="N/A" style="width: 100%;" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="uname" style="color: black;font-weight: bold;">Merchent Order Id:</label>
							<input type="text" placeholder="Merchent Order Id" name="marchent_order_id" id="marchent_order_id" value="N/A" style="width: 100%;" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="uname" style="color: black;font-weight: bold;"> COD Amount:</label>
							<input type="text" placeholder="Booking COD Amount" name="booking_cod" id="booking_cod" style="width: 100%;" onkeyup="codAmount(this.value)" autocomplete="off">
						</div>
						<div class="form-group" style="display: none;">
							<label for="uname" style="color: black;font-weight: bold;">Update COD Amount:</label>
							<input type="text" placeholder="COD Amount" name="update_cod" id="update_cod" style="width: 100%;" autocomplete="off" onkeyup="if (/\D/g.test(this.value))
                                                                    this.value = this.value.replace(/\D/g, '')">
						</div>
						<div class="form-group">
							<label for="uname" style="color: black;font-weight: bold;">Category:</label>
							<select name="category_id" id="category_id" required onchange="getcategoryId(this.value);" style="width: 100%;">
								<?php
                                foreach ($categoryList as $value) {
                                    if ($value->category_id == 1) {
                                        ?>
								<option value="<?php echo $value->category_id; ?>" selected>
									<?php echo $value->category_name; ?></option>
								<?php } else {
                                        ?>
								<option value="<?php echo $value->category_id; ?>"><?php echo $value->category_name; ?>
								</option>
								<?php
                                    }
                                };
                                ?>
							</select>
						</div>
						<div class="form-group" id="thirdParty" style="display: none;">
							<label for="uname" style="color: black;font-weight: bold;">3rd Party Charge:</label>
							<input type="text" class="form-control" id="third_party_charge" name="third_party_charge" autofocus="1" style="width: 100%;" autocomplete="off">
						</div>
						<div class="form-group" id="transportType" style="display: none;">
							<label for="uname" style="color: black;font-weight: bold;">Transport Type:</label>
							<select name="thirdpartyTransportType" id="thirdpartyTransportType" style="width: 100%;">
								<option value="">Select Transport Type</option>
								<option value="SA Paribahan">SA Paribahan</option>
								<option value="Sundarban">Sundarban</option>
							</select>
						</div>
						<div class="form-group">
							<label for="uname" style="color: black;font-weight: bold;">Delivery Charge:</label>
							<input type="text" placeholder="Delivery Charge" name="delivery_type" id="delivery_type" style="width: 100%;" autocomplete="off">
						</div>
						<span id="showupdate_cod" style="font-size: 35px; color: black; font-weight: bold;"></span><br>
						<span id="lastBookingId" style="font-size: 35px; color: black; font-weight: bold;"></span>
					</div>
				</div>
				<button type="button" id="button" class="btn btn-primary btn-lg btn-block" onclick="storeEntryFrom();">Save
					& New</button>
			</form>
		</div>
		<!-- Modal footer -->
	</div>
</div>
<!--start edit modal -->
<div class="modal fade" id="editModal">
	<div class="modal-dialog right modal-lg">
		<div class="modal-content animated">
			<!-- Modal Header -->
			<div class="modal-header bg-primary">
				<h5 class="modal-title text-white">
					<div style="font-size: 18px; font-weight: bold; color: yellow;" class="modal-title">
						<div id="bookingid"></div>
						<div id="codsview"></div>
					</div>
				</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- Modal body -->
			<form class="form-horizontal" id="booking_update">
				<div class="row" style="padding: 10px;">
					<br>
					<div class="col-sm-6">
						<input type="hidden" name="user_id" id="m_id">
						<div class="form-group" style="display: none;">
							<label for="uname">Select your hubs:</label><br>
							<select name="hubs_id" id="hubs_id" required style="width:100%;">
								<?php
                                foreach ($hublist as $value) {
                                    ?>
								<option value="<?php echo $value->hubs_id; ?>"><?php echo $value->hubsname; ?>
								</option>
								<?php }; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="uname">Sender/Merchent:</label><br>
							<input type="text" readonly autofocus="1" id="companyName" style="width:100%;">
						</div>
						<div class="form-group">
							<label for="uname">Booking Date:</label><br>
							<input type="text" readonly autofocus="1" id="bookingdate" style="width:100%;">
						</div>
						<div class="form-group">
							<label for="uname">Receiver Name:</label><br>
							<div class="form-group"><input type="text" id="recivername" placeholder="" required="" name="reciver_name" style="width:100%;"></div>
						</div>
						<div class="form-group">
							<label for="uname">Receiver Address:</label><br>
							<div class="form-group">
								<textarea id="reciveraddress" placeholder="" required="" name="reciver_address" autofocus="1" style="width:100%; height: 50px;"></textarea></div>
						</div>
						<div class="form-group">
							<label for="uname">Receiver Phone:</label><br>
							<input type="text" id="reciverphone" placeholder="" required="" name="reciver_phone" autofocus="1" style="width:100%;">
						</div>
						<div class="form-group">
							<label for="uname">Receiver Pak. Description:</label><br>
							<input type="text" id="reciverpackegedes" placeholder="" required="" name="reciver_packege_des" autofocus="1" style="width:100%;">
						</div>
						<?php
                        if ($role_id == 1) {
                            ?>
						<div class="form-group">
							<label for="uname">Status</label><br>
							<select name="status" id="statuss" required="" style="width:100%;" onchange="getchangesValue(this.value);">
								<?php
                                    foreach ($delivery_status as $value) {
                                        ?>
								<option value="<?php echo $value->status; ?>"><?php echo $value->display; ?>
								</option>
								<?php }
                                    ?> </select>
						</div>
						<?php
                        }
                        ?>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="uname">Receiver Instruction:</label><br>
							<input type="text" id="reciverinstruction" placeholder="" required="" name="reciver_instruction" autofocus="1" style="width: 100%;" />
						</div>
						<div class="form-group">
							<label for="uname" style="color: red; font-weight: bold;">COD Amount:</label><br>
							<input type="text" id="bookingcod" placeholder="" required="" style="width: 100%; font-weight: bold; color: white;background-color: black;" readonly />
						</div>
						<div class="form-group">
							<label for="uname" style="color: red; font-weight: bold;">Update COD:</label><br>
							<input type="text" id="updatecod" placeholder="" required="" name="update_cod" style="width: 100%;" onkeyup="if (/\D/g.test(this.value))
                                                                    this.value = this.value.replace(/\D/g, '')" />
						</div>
						<div class="form-group">
							<label for="uname">Receiver Date:</label><br>
							<input type="text" name="date" id="datepicker" style="width: 100%;" />
							<input type="hidden" name="booking_id" id="bookingids" />
						</div>
						<div class="form-group">
							<label for="uname">Category:</label><br>
							<select name="category_id" id="cat_id" required onchange="getcategoryId(this.value);" style="width: 100%;">
								<option value="">Select Category</option>
								<?php
                                foreach ($categoryList as $value):
                                    ?>
								<option value="<?php echo $value->category_id; ?>">
									<?php echo $value->category_name; ?></option>
								<?php
                                endforeach;
                                ?>
							</select>
						</div>
						<div class="form-group" style="display: none;" id="transport_Type">
							<label for="uname">Transport Type:</label><br>
							<select name="thirdpartyTransportType" id="thirdparty_TransportType" style="width: 100%;">
								<option value="">Select Transport Type</option>
								<option value="SA Paribahan">SA Paribahan</option>
								<option value="Sundarban">Sundarban</option>
							</select>
						</div>
						<div class="form-group" style="display: none;" id="third_party">
							<label for="uname">3rd Party Charge:</label><br>
							<input type="text" id="thirdpartycharge" name="third_party_charge" style="width: 100%;">
						</div>
						<?php
                        if ($role_id == 1) {
                            ?>
						<div class="form-group">
							<label for="uname">Delivery Charge:</label>
							<input type="text" placeholder="Delivery Charge" name="delivery_type" id="dvcharnge" autocomplete="off" style="width: 100%;">
						</div>
						<div class="form-group">
							<label for="uname">Merchant Order ID:</label>
							<input type="text" id="mar_order_id" placeholder="" required="" name="marchent_order_id" autofocus="1" style="width: 100%;" />
						</div>
						<div class="form-group">
							<label for="uname">Reason:</label><br>
							<textarea type="text" id="reasons" name="reason" style="width: 100%; height: 50px;"" /></textarea>
                            </div>
                            <div class=" form-group">
                                <label for="uname">Paid Type:</label><br>
                                <select name="paid_type" id="paidtypes" required="" style="width: 100%;">
                                    <option value="Unpaid">Unpaid</option>
                                    <option value="Paid">Paid</option>
                                </select>
                            </div>
                        <?php } ?>
                        <button type="button" class="btn btn-primary btn-block" onclick="updateEntryFrom();"><i
                                class="fa fa-plus"></i> <?php
                            if ($role_id == 1) {
                                ?> Update<?php } else { ?> Send to admin <?php } ?></button>
                    </div>
                </div>
            </form>
            <!-- Modal footer -->
        </div>
    </div>
<script>
    function codAmount(cod) {
        $("#update_cod").val(cod);
        $("#showupdate_cod").text("COD: " + cod);
    }
    $(function () {
        $("#date").datepicker();
        $("#b_date").datepicker();
        $("#datepicker").datepicker();
    });
    //  $('#myModal').modal('show');
    $("#name").keyup(function (event) {
        if (event.keyCode === 13) {
            $("#myBtn").click();
        }
    });
    function multipleTypeUpdate() {
        var dataString = $("#bookinglistPaidStatus").serialize();
        //console.log(dataString);
        //return false;
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "<?php echo base_url(); ?>mangement/mangement/update_multiple_paid",
            data: dataString,
            success: function (data) {
                $('#paidtype').modal('hide');
                filterBooking();
                successfullyUpdate();
            }
        });
        return false; //stop the actual form post !important!
    }
    function storeEntryFrom() {
        var user_id = $('.user_id').attr('class'); //$("#userid").val();
        var reciver_name = $("#reciver_name").val();
        var reciver_phone = $("#reciver_phone").val();
        var dataString = $("#booking").serialize();
        if (user_id !== '' && reciver_name !== '' && reciver_phone !== '' && update_cod !== '') {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo base_url(); ?>mangement/mangement/save_booking_admin",
                data: dataString,
                success: function (data) {
                    //console.log(data);
                    $("#lastBookingId").text("Booking ID:-" + data);
                    //$("#delivery_type").val(response.dvcharge);
                    filterBooking();
                    clearformAllfiled();
                    successfullyInsert();
                }
            });
            return false; //stop the actual form post !important!
        } else {
            // alert("Please check blank filed or dropdow.");
            inputboxValidation();
        }
    }
    function clearformAllfiled() {
        //alert("test");
        var reciverpackegedes = "";
        // var reciverinstruction = "";
        //var mar_order_id = ""; 
        var collectionamount = "";
        var thirdpartycharge = "";
        var reciveraddress = "";
        var recivername = "";
        var reciverphone = "";
        var bookingcod = "";
        $('#reciver_packege_des').val(reciverpackegedes);
        $('#booking_cod').val(bookingcod);
        //$('#marchent_order_id').val(mar_order_id);
        $('#update_cod').val(collectionamount);
        $('#third_party_charge').val(thirdpartycharge);
        $('#reciver_address').val(reciveraddress);
        $('#reciver_name').val(recivername);
        $('#reciver_phone').val(reciverphone);
        //clearvalue();
    }
    function updateEntryFrom() {
        var dataString = $("#booking_update").serialize();
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "<?php echo base_url(); ?>mangement/mangement/updateBooking",
            cache: false,
            data: dataString,
            success: function (data) {
            var save = data.save;
            var update = data.update;
            if (save == 'save') {
             successfullyInsert();
            }
            if (update == 'update') {
             successfullyUpdate();
            }
            filterBooking();
            $("#editModal").modal("hide");
            }
        });
        return false; //stop the actual form post !important!
    }
    function filterBooking() {
        $('#item_list tbody tr').remove();
        var value = $("#name").val();
        var sts = $("#status").val();
        var user_id = $("#userid").val();
        var paid_type = $("#paid_type").val();
        var b_date = $("#b_date").val();
        var deliveryman = $("#deliveryman").val();
        var hubs_id = $("#hubs_id").val();
        //console.log(sts);
        //var statuss = ['Booked', 'Waiting for Pickup/Picked','Waiting for Pickup/Picked','Delay/Returend/Deliveried'];
        sl = 1;
        $('#loading').html(
                '<img src="<?php echo base_url(); ?>/resource/admin/assets/images/loading.gif"> loading...');
        $.ajax({
            url: "<?php echo base_url(); ?>booking/booking/getjsondata?name=" + value + "&status=" + sts +
                    "&user_id=" + user_id + "&paid_type=" + paid_type + "&b_date=" + b_date + "&deliveryman=" +
                    deliveryman + "&hubs_id=" + hubs_id,
            type: "GET",
            dataType: 'json',
            success: function (json) {
                $('#loading').html(json);
                $.map(json, function (item) {
                    console.log(item);
                    // open_modal();
                    var id = "item_list" + item.booking_id;
                    var html = "<tr id='" + id + "'>";
                    html += "<td ><input type='checkbox' checkbox name='bookingId[]' value='" + item.booking_id + "'>" + "</td>";
					
					var roleid= "<?php echo $this->session->userdata('role_id');?>";
					if(roleid=='1'){
                    html += "<td style='background-color: #f44336;color: black;text-align: center; text-decoration: none; display: inline-block;'><a style='width: 5px;background-color: #f44336;color: black;text-align: center; text-decoration: none; display: inline-block;' href='<?php echo base_url(); ?>booking/booking/deleteBooking/" +
                            item.booking_id + "'>" + sl + "</td>";
					}else{
						 html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + sl + "</td>";
				    }		
							
                    //html += "<td class='text-left' onclick=getsId(" + item.booking_id + ") title='click here'><b>" + 'update' + "</b>"; // update row
					if(roleid=='1'){
                    html += "<td class='text-left'> <i class='icon-plus' onclick=getsId(" + item.booking_id + ") title='click here'></i> <a target='_blank' href='<?php echo base_url(); ?>booking/booking/edit_booking_frm/" + item.booking_id + "'>" + item.booking_id + "</td>";
					}else{
						 html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + item.booking_id + "</td>";
					}
                    html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + item.status + "</td>";
                    html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + item.paid_type + "</td>";
                    html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + item.date + "</td>";
                    html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + item.company + "</td>";
                    html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + item.reciver_name + "</td>";
                    html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + item.deliveryman + "</td>";
                    html += "<td class='text-left' onclick=getsId(" + item.booking_id + ")>" + item.hubsname + "</td>";
                    html += "<td class='text-left'><a href='<?php echo base_url(); ?>booking/booking/edit_booking_frm/" +
                            item.booking_id + "'>" + item.update_cod + "</td>";
                    html += "</tr>";
                    if ($('#' + id).length < 1) {
                        $('#form-group-item #item_list tbody').append(html);
                        sl++;
                    }
                });
            }
        });
    }
    filterBooking();
    // for edit using function
    function getsId(booking_id) {
        $.ajax({
            url: "<?php echo base_url(); ?>booking/booking/geteditBookingData?booking_id=" + booking_id,
            type: "GET",
            dataType: 'json',
            success: function (json) {
                $('#user_id').val(json.user_id);
                $('#bookingid').text("Booking ID:" + booking_id + " - COD:" + json.update_cod);
                // $('#codsview').text("COD:" +json.update_cod);
                $('#companyName').val(json.company);
                $('#bookingdate').val(json.date);
                $('#reason').val(json.reason);
                $('#dvcharnge').val(json.delivery_type);
                $('#hubsid').val(json.hubs_id);
                $('#m_id').val(json.user_id);
                //$('#paid_type').val(json.paid_type);
                $('#bookingids').val(json.booking_id);
                //$('#user_id').val(json.user_id);
                $('#recivername').val(json.reciver_name);
                $('#deliverytype_id').val(json.deliverytype_id);
                $('#mar_order_id').val(json.marchent_order_id);
                //$('#category_id').val(json.category_id);
                $('#cat_id').val(json.category_id);
                $('#thirdpartycharge').val(json.third_party_charge);
                $('#thirdparty_TransportType').val(json.thirdpartyTransportType);
                $('#reciveraddress').val(json.reciver_address);
                $('#reciverphone').val(json.reciver_phone);
                $('#reciverpackegedes').val(json.reciver_packege_des);
                $('#reciverinstruction').val(json.reciver_instruction);
                $('#datepicker').val(json.date);
                $('#updatecod').val(json.update_cod);
                //console.log(json.booking_cod);
                $('#bookingcod').val(json.booking_cod);
                $('#reasons').val(json.reason);
                $('#statuss').val(json.status);
                $('#paidtypes').val(json.paid_type);
                $('#reciver_address').val(json.reciver_address);
                var cat_id = json.category_id;
                if (cat_id == 2) {
                    $("#third_party").show("slow");
                    $("#transport_Type").show("slow");
                } else {
                    $("#third_party").hide();
                    $("#transport_Type").hide();
                }
                $('#editModal').modal('show');
            }
        });
    }
    function getchangesValue(status) {
        if (status == "Returend" || status == "PRTO" || status == "DRTO") {
            var amount = '0';
            $("#updatecod").val(amount);
        }
    }
    // copy excel
    function copyClipboard() {
        var elm = document.getElementById("form-group-item");
        // for Internet Explorer
        if (document.body.createTextRange) {
            var range = document.body.createTextRange();
            range.moveToElementText(elm);
            range.select();
            document.execCommand("Copy");
            alert("Copied all booking to clipboard");
        } else if (window.getSelection) {
            // other browsers
            var selection = window.getSelection();
            var range = document.createRange();
            range.selectNodeContents(elm);
            selection.removeAllRanges();
            selection.addRange(range);
            document.execCommand("Copy");
            alert("Copied all booking to clipboard");
        }
    }
    function getcategoryId(categoryId) {
        if (categoryId == 2) {
            $("#thirdParty").show("slow");
            $("#transportType").show("slow");
            $("#transport_Type").show("slow");
            $("#third_party").show("slow");
        } else {
            $("#thirdParty").hide();
            $("#transportType").hide();
            $("#transport_Type").hide();
            $("#third_party").hide();
        }
    }
    function getDvCharge(user_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>mangement/mangement/getDeliveryChnarge',
            dataType: 'json',
            data: {
                user_id: user_id
            },
            success: function (response) {
                $("#delivery_type").val(response.dvcharge);
            }
        });
    }
    function getMerchentId(user_id) {
        $('#user_id').autocomplete({
            'source': function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>user/user/checkingUserId?user_id=" + user_id,
                    dataType: 'json',
                    contentType: "application/json",
                    success: function (json) {
                        response($.map(json, function (item) {
                            return {
                                label: item['company'],
                                value: item['user_id'],
                                i: item,
                            }
                        }));
                    }
                });
            },
            'select': function (e, ui) {
                e.preventDefault();
                $(this).val(ui.item['label']);
                $("#userid").val(ui.item['value']);
            }
        });
    }
    function getNumber(mobileNumber) {
        //alert(mobileNumber);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>mangement/mangement/checkMobileNumber',
            dataType: 'json',
            data: {
                mobileNumber: mobileNumber
            },
            success: function (response) {
                $('#reciver_name').val(response.reciver_name);
                $('#reciver_address').val(response.reciver_address);
            }
        });
    }
    </script>