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

                                <p class="total" style="color: green; font-size: 25px; font-weight: bold; text-align: right;"><?php
                                    if ($cod) {
                                        echo "COD Amount is: " . $cod->codamount . " Tk";
                                    };
                                    ?></p>
                            </div>
                        </div>
                        <center>
                            <font color="green" style="font-size: 25px; font-weight: bold;">
                            <?php
                            $message = $this->session->userdata('updatemsg');
                            if (isset($message)) {
                                echo $message;
                                $this->session->unset_userdata('updatemsg');
                            }
                            ?>

                            </font>
                        </center>
                        <form method="GET" action="<?php echo base_url(); ?>booking_update/bookingupdate/checkstatusUpdate">
                            <div class="row">
                                <div class="col-4">
                                    <select style="width: 100%" name="hubs_id" id="hubs_id" required="">
                                        <option value="" selected="selected">All Hub </option>
                                        <?php
                                        foreach ($hubrole as $value):
                                            ?>
                                            <option value="<?php echo $value->hubs_id; ?>"><?php echo $value->hubsname; ?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select style="width: 100%" name="user_id" id="user_id">
                                        <option value="" selected="selected">Select Delivery Man</option>
                                        <?php
                                        foreach ($delivery_men as $value):
                                            ?>
                                            <option value="<?php echo $value->user_id; ?>"><?php echo $value->full_name; ?>
                                            </option>
                                            <?php
                                        endforeach;
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
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </form>
                        <hr>


                        <form action="<?php echo base_url(); ?>mangement/mangement/update_multiple_status" method="POST">
                            <input type="hidden" id="hubsid" name="hubs_id" value="<?php echo $hubs_id; ?>"/>
                            <input type="hidden" id="userid" name="user_id" value="<?php echo $user_id; ?>"/>
                            <div class="row">
                                <div class="col-md-6">  
                                     <div align="left"><a href="#" onclick="currentpagereload();" ;><i class="fa fa-refresh"></i>Reload</a></div>
                                </div>
                                <div class="col-md-6">
                                     <div align="right"><button type="submit" class="btn btn-primary btn-info"><i class="fa fa-edit"></i></button></div>
                                </div>
                            </div>
                          
                           
                            <div class="table-responsive">
                                <table class="table-sm table-striped" id="customers" style="width: 100%;">
                                    <thead class="thead-dark">
                                        <tr style="font-weight: bold; background-color: #008cff; color: white;">
                                            <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'booking_id\']').prop('checked', this.checked);" /></td>
                                            <td>S.L</td>
                                            <td>BookingID</td>
                                            <td>Date</td>
                                            <td>Company</td>
                                            <td>Name</td>
                                            <td>Phone</td>
                                            <td>Reason</td>
                                            <td>Address</td>
                                            <td class="text-left">COD</td>
                                            <td class="text-left">Update COD</td>
                                            <td class="text-left">Select Status for Update Report</td>
                                        </tr>
                                    </thead>
                                    <tbody><?php
                                        $x = 1;

                                        foreach ($checksts as $v) {
                                            ?><tr>
                                                <td>

                                                    <input type="hidden" name="bookingId[]" value="<?php echo $v->booking_id; ?>"/>
                                                    <input type='checkbox' checkbox name='booking_id[]' value="<?php echo $v->booking_id; ?>" />
                                                </td>
                                                <td class="text-left"><?php
                                                    echo $x;
                                                    $x++;
                                                    ?></td>
                                                <td class="text-left"><?php echo $v->booking_id; ?></td>
                                                <td class="text-left"><?php echo date("d-m-Y", strtotime($v->date)); ?></td>
                                                <td class="text-left"><?php echo $v->company; ?></td>
                                                <td class="text-left"><?php echo $v->reciver_name; ?></td>
                                                <td class="text-left"><?php echo $v->reciver_phone; ?></td>
                                                <td class="text-left"><?php echo $v->reason; ?></td>
                                                <td class="text-left"><?php
                                                    if (!empty($v->reciver_address)) {
                                                        $address = $v->reciver_address;
                                                        $string = substr($address, 0, 20) . '...';
                                                        echo $string;
                                                    };
                                                    ?></td>

                                                <td class="text-left"><?php echo $v->update_cod ? $v->update_cod : ""; ?></td>
                                                <td class="text-left"><?php echo $v->booking_cod ? $v->booking_cod : ""; ?></td>
                                                <td class="text-left"><?php if ($v->status == "Deliveried") {
                                                        ?><input type="radio" name="radioGroup_<?php echo $v->booking_id; ?>" id="<?php echo $v->booking_id; ?>" checked="checked" onclick="setStatus(<?php echo $v->booking_id; ?>, 'Deliveried');"><label for="radio1" style="background-color: green; padding: 5px;"><span style="color: white;">DV</span></label><?php
                                                    } else {
                                                        ?><input type="radio" name="radioGroup_<?php echo $v->booking_id; ?>" id="<?php echo $v->booking_id; ?>" /><label for="radio1" style="background-color: green; padding: 5px;"><span style="color: white;" onclick="setStatus(<?php echo $v->booking_id; ?>, 'Deliveried');">DV</span></label><?php
                                                    }
                                                    ?><?php if ($v->status == "Returend") {
                                                        ?><input type="radio" name="radioGroup_<?php echo $v->booking_id; ?>" id="<?php echo $v->booking_id; ?>" checked="checked" onclick="setStatus(<?php echo $v->booking_id; ?>, 'Returend');" /><label for="radio2" style="background-color: #fc0303; padding: 5px;"><span style="color: white;">RTO</span></label><?php
                                                    } else {
                                                        ?><input type="radio" name="radioGroup_<?php echo $v->booking_id; ?>" id="<?php echo $v->booking_id; ?>" />
                                                        <label for="radio2" style="background-color: #fc0303; padding: 5px;"><span style="color: white;" onclick="setStatus(<?php echo $v->booking_id; ?>, 'Returend');">RTO</span></label><?php
                                                    }
                                                    ?><?php if ($v->status == "DRTO") {
                                                        ?><input type="radio" name="radioGroup_<?php echo $v->booking_id; ?>" id="<?php echo $v->booking_id; ?>" checked="checked" onclick="setStatus(<?php echo $v->booking_id; ?>, 'DRTO');" /><label for="radio3" style="background-color: #fc5a03; padding: 5px;"><span style="color: white;">DRTO</span></label><?php
                                                    } else {
                                                        ?><input type="radio" name="radioGroup_<?php echo $v->booking_id; ?>" id="<?php echo $v->booking_id; ?>" /><label for="radio3" style="background-color: #fc5a03; padding: 5px;"><span style="color: white;" onclick="setStatus(<?php echo $v->booking_id; ?>, 'DRTO');">DRTO</span></label><?php
                                                    }
                                                    ?><?php if ($v->status == "PRTO") {
                                                        ?><input type="radio" name="radioGroup_<?php echo $v->booking_id; ?>" id="<?php echo $v->booking_id; ?>" checked="checked" /><label for="radio4" style="background-color: #fc9803; padding: 5px;"><span style="color: white;" onclick="setStatus(<?php echo $v->booking_id; ?>, 'PRTO');">PRTO</span></label><?php
                                                    } else {
                                                        ?><input type="radio" name="radioGroup_<?php echo $v->booking_id; ?>" id="<?php echo $v->booking_id; ?>" /><label for="radio4" style="background-color: #fc9803; padding: 5px;"><span style="color: white;" onclick="setStatus(<?php echo $v->booking_id; ?>, 'PRTO');">PRTO</span></label><?php
                                                    }
                                                    ?><?php if ($v->status == "Hold") {
                                                        ?><input type="radio" name="radioGroup_<?php echo $v->booking_id; ?>" id="<?php echo $v->booking_id; ?>" checked="checked" /><label for="radio4" style="background-color: blue; padding: 5px;" onclick="setStatus(<?php echo $v->booking_id; ?>, 'Hold');"><span style="color: white;">HOLD</span></label><?php
                                                    } else {
                                                        ?><input type="radio" name="radioGroup_<?php echo $v->booking_id; ?>" id="<?php echo $v->booking_id; ?>" /><label for="radio4" style="background-color: blue; padding: 5px;"><span style="color: white;" onclick="setStatus(<?php echo $v->booking_id; ?>, 'Hold');">HOLD</span></label><?php
                                                    }
                                                    ?></td>
                                            </tr><?php
                                        }
                                        ?></tbody>
                                </table>
                            </div>
                        </form>
                        <hr>
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
                <button type="submit" class="btn btn-primary btn-block" onclick="bookingStatusSend();"><i class="fa fa-send"></i> Update</button>
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

<script>
    function currentpagereload() {
        location.reload();
    }

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
        var hubs_id = '<?php echo $hubs_id; ?>';
        if (user_id != 'NULL') {
            $("#user_id").val(user_id);
        }
        if (hubs_id != 'NULL') {
            $("#hubs_id").val(hubs_id);
        }
    });
    $('#hubs_id').change(function () {
        var hubs_id = $(this).val();
        $('#hubsid').val(hubs_id);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>mangement/mangement/getdvman',
            data: {
                hubs_id: hubs_id
            },
            success: function (response) {
                document.getElementById("user_id").innerHTML = response;
            }
        });
    });
    $('#user_id').change(function () {
        var user_id = $(this).val();
        $('#userid').val(user_id);
    });
</script>