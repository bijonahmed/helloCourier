<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-6">
                                <p>Booking Status update</p>
                            </div>
                            <div class="col-6">
                                <p class="total" style="color: green; font-size: 25px; font-weight: bold; text-align: right;"></p>
                            </div>

                        </div>
                        <form method="POST" action="<?php echo base_url(); ?>booking_update/bookingupdate/findbookingdv">
                            <div class="row">
                                <div class="col-8">
                                    <select class="form-control" name="user_id" id="user_id" required="">
                                        <option value="">Delivery Man </option>
                                        <?php
                                        foreach ($delivery_men as $value) {
                                            ?>
                                            <option value="<?php echo $value->user_id; ?>">
                                                <?php echo $value->full_name; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <button type="submit" id="myBtn" class="btn btn-primary btn-block"><i class="fa fa-search"></i> </button>
                                </div>
                                <div class="col-2">
                                    <?php
                                    if (!empty($user_id)) {
                                        if (!empty($this->session->userdata('role_id') == '5')) { //only access admin.
                                            ?>
                                            <button type="button" onclick="getstats();" class="btn btn-primary btn-block"><i class="fa fa-search-plus"></i> Sending Preview </button>
                                        <?php }
                                    } ?>
                                </div>
                            </div>

                        </form>
                        <center><span><?php echo "If you send . Table row background color change" ; ?></span><br><b>
                                <?php
                                if (!empty($name)) {
                                    echo "Assign To: " . $name->full_name . '-' . $name->mobile_number;
                                }
                                ?></b></center>
                        <div class="table-responsive">
                            <table class="table-sm table-striped" id="item_list">
                                <thead class="thead-dark">
                                    <tr style="font-weight: bold; background-color: #008cff; color: white;">
                                        <td>S.L</td>
                                        <td style=>BookingID</td>
                                        <td class="text-left">Date</td>
                                        <td class="text-left">Company Nane</td>
                                        <td class="text-left">Reciv. Name</td>
                                        <td class="text-left">Reciv. Phone</td>
                                        <td class="text-left">Reciv. Address</td>
                                        <td class="text-left">COD Amt</td>
                                        <td class="text-left">Update COD</td>
                                        <td class="text-left">Select Status for Update Report</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $x = 1;
                                    foreach ($list as $value) {
                                        $query = $this->db->query("SELECT user_id,date,booking_id,reciver_name,reciver_phone,reciver_address,update_cod,booking_cod FROM tbl_booking WHERE booking_id='$value->booking_id'")->row();
                                        $particular = $this->db->query("SELECT full_name,company FROM tbl_user WHERE user_id='$query->user_id' AND status='1'")->row();
                                        //$assignto = $this->db->query("SELECT booking_id,user_id as assignto_id FROM tbl_booking_assignto WHERE booking_id='$query->booking_id' AND status='1'")->row();
                                        //$assintoname= $this->db->query("SELECT full_name FROM tbl_user WHERE user_id='$assignto->assignto_id' AND status='1'")->row();
                                        $statusrow = $this->db->query("SELECT booking_id FROM tbl_status_booking_history WHERE booking_id='$value->booking_id'")->row();
                                        //echo '<pre>';
                                        //print_r($statusrow);
                                        ?>
                                        <?php
                                        if (!empty($statusrow->booking_id)) {
                                            ?>
                                            <tr style="color:white; background-color: blue;" id="change_<?php echo $value->booking_id; ?>">
                                            <?php } else { ?>
                                            <tr id="change_<?php echo $value->booking_id; ?>">			
                                            <?php } ?>
                                            <td class="text-left"><?php echo $x;
                                        $x++; ?></td>
                                            <td class="text-left"><?php if (!empty($query->booking_id)) {
                                            echo $query->booking_id;
                                        }; ?></td>
                                            <td class="text-left"><?php if (!empty($query->date)) {
                                            echo $query->date;
                                        }; ?></td>
                                            <td class="text-left"><?php echo $particular->company; ?></td>
                                            <td class="text-left"><?php
                                                if (!empty($query->reciver_name)) {
                                                    $name = $query->reciver_name;
                                                    $reciName = substr($name, 0, 10) . '...';
                                                    echo $reciName;
                                                }
                                                ?></td>
                                            <td class="text-left"><?php
                                                if (!empty($query->reciver_phone)) {
                                                    echo $query->reciver_phone;
                                                }
                                                ?></td>
                                            <td class="text-left"><?php
                                                if (!empty($query->reciver_address)) {
                                                    $address = $query->reciver_address;
                                                    $string = substr($address, 0, 10) . '...';
                                                    echo $string;
                                                }
                                                ?></td>
                                          
                                            <td class="text-left"><?php
                                            if (!empty($query->booking_cod)) {
                                                echo $query->booking_cod;
                                            }
                                            ?></td>
                                              <td class="text-left"><?php
                                            if (!empty($query->update_cod)) {
                                                echo $query->update_cod;
                                            }
                                            ?></td>

                                            <td class="text-left">
                                                <input type="radio" name="radioGroup_<?php echo $query->booking_id; ?>" id="<?php echo $query->booking_id; ?>" onclick="setStatus(<?php echo $query->booking_id; ?>, 'Deliveried');" />
                                                <label for="radio1" style="background-color: green; padding: 5px;"><span style="color: white;">DV</span></label>
                                                <input type="radio" name="radioGroup_<?php echo $query->booking_id; ?>" id="<?php echo $query->booking_id; ?>" onclick="setStatus(<?php echo $query->booking_id; ?>, 'Returend');" />
                                                <label for="radio2" style="background-color: #fc0303; padding: 5px;"><span style="color: white;">RTO</span></label>
                                                <input type="radio" name="radioGroup_<?php echo $query->booking_id; ?>" id="<?php echo $query->booking_id; ?>" onclick="setStatus(<?php echo $query->booking_id; ?>, 'DRTO');" />
                                                <label for="radio3" style="background-color: #fc5a03; padding: 5px;"><span style="color: white;">DRTO</span></label>
                                                <input type="radio" name="radioGroup_<?php echo $query->booking_id; ?>" id="<?php echo $query->booking_id; ?>" onclick="setStatus(<?php echo $query->booking_id; ?>, 'PRTO');" />
                                                <label for="radio4" style="background-color: #fc9803; padding: 5px;"><span style="color: white;">PRTO</span></label>
                                                <input type="radio" name="radioGroup_<?php echo $query->booking_id; ?>" id="<?php echo $query->booking_id; ?>" onclick="setStatus(<?php echo $query->booking_id; ?>, 'Hold');" />
                                                <label for="radio4" style="background-color: blue; padding: 5px;"><span style="color: white;">HOLD</span></label>
                                            </td>
                                        </tr>
<?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="modal-statusUpdate" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content animated rollIn">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">
                    <div style="font-size: 15px;" class="modal-title">
                        <div id="show_bid"></div>
                    </div>
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" readonly="1" id="delivery_sts" />
                        <input type="hidden" class="form-control" name="devstatus" id="devstatus" />
                        <input type="hidden" id="booking_id" name="booking_id" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-4 col-form-label" id="names">Please write the reason with
                        contact person name</label>
                    <div class="col-sm-5">
                        <textarea name="reason" id="reason" placeholder="Please ride the reason" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row" id="title">
                    <label for="inputPassword" class="col-sm-4 col-form-label">COD Amount</label>
                    <div class="col-sm-5">
                        <input type="text" name="codamount" id="codamount" class="form-control" required="" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block" onclick="bookingStatusSend();"><i class="fa fa-send"></i> Send Admin</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>
                    Close</button>
            </div>
        </div>
    </div>
</div>
<!--message-->
<div class="modal fade" id="message">
    <div class="modal-dialog">
        <div class="modal-content border-primary">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white"><i class="fa fa-send"></i> Message</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="font-size: 20px; font-weight: bold; text-align: center;">Successfully Send..</p>
            </div>
        </div>
    </div>
</div>
<!--End Modal -->
<div class="modal fade" id="sendstatus">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-primary">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white"><i class="fa fa-send"></i> Already Send Booking Status Update</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe style="width: 56vw; height: 30vw; position: relative;" src="<?php echo base_url(); ?>booking_update/bookingupdate/bookingstatusupdate" frameborder="1" allowfullscreen></iframe>
                <p class="total" style="color: green; font-size: 25px; font-weight: bold; text-align: left;"></p>
            </div>
        </div>
    </div>
</div>
<!--end-->
<script>
    function getstats() {
        $('#sendstatus').modal('show');
        calculateAmt();
    }
    function setStatus(booking_id, status) {
        if (confirm('Are you sure confirm send yes click')) {
            // Save it!
            if (status !== 'Deliveried') {
                //console.log(status);
                if (status == 'Hold') {
                    $("#codamount").hide();
                    $("#title").hide();
                } else {
                    $("#codamount").show();
                    $("#title").show();
                }
                $('#modal-statusUpdate').modal('show');
                $("#booking_id").val(booking_id);
                textdata = "Show Booking ID: " + booking_id;
                $("#show_bid").text(textdata);
                $("#delivery_sts").val(status);
                $("#devstatus").val(status);
                $('#modal-statusUpdate').modal('show');
            } else {
                var dataString = 'booking_id=' + booking_id + '&status=' + status;
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "<?php echo base_url(); ?>mangement/mangement/send_status_update",
                    data: dataString,
                    success: function (data) {
                        $("#change_" + booking_id).css("background", "blue");
                        $("#change_" + booking_id).css("color", "white");
                        calculateAmt();
                        $('#message').modal('show');
                        setTimeout(function () {
                            $('#message').modal('hide');
                        }, 1000);
                    }
                });
            }
        }
    }
    function calculateAmt() {
        user_id = $("#user_id").val();
        var dataString = 'user_id=' + user_id;
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: dataString,
            url: "<?php echo base_url(); ?>mangement/mangement/sumcollectionAmount",
            success: function (data) {
                $(".total").text("COD Amount is: " + data.amt + " Tk.");
            }
        });
    }
    function bookingStatusSend() {
        update_cod = $("#codamount").val();
        reason = $("#reason").val();
        //if (update_cod == '' || reason == '') {
        if (reason == '') {
            alert("Please Fuill up reason and COD Amount");
        } else {
            booking_id = $("#booking_id").val();
            status = $("#devstatus").val();
            var dataString = 'booking_id=' + booking_id + '&status=' + status + '&update_cod=' + update_cod +
                    '&reason=' + reason;
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo base_url(); ?>mangement/mangement/send_status_update",
                data: dataString,
                success: function (data) {

                    calculateAmt();
                    $("#change_" + booking_id).css("background", "blue");
                    $("#change_" + booking_id).css("color", "white");
                    $('#modal-statusUpdate').modal('hide');
                    $('#message').modal('show');
                    $("#reason").val("");
                    $("#codamount").val("");
                    $("#booking_id").val("");
                    sts = $("#devstatus").val();
                    $('#message').modal('show');
                    setTimeout(function () {
                        $('#message').modal('hide');
                    }, 1000);
                }
            });
        }
    }
    $(document).ready(function () {
        var user_id = '<?php echo $user_id; ?>';
        if (user_id != 'NULL') {
            $("#user_id").val(user_id);
        }
    });
</script>