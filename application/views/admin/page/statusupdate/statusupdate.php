<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" id="booking_id" name="booking_id" class="search form-control"
                               placeholder="Enter Your Booking Id" autofocus autocomplete="off" required="">

                        <div style="display: none;">

                            <button id="myBtn" onclick="filterBooking();" class="btn btn-primary btn-block"><i
                                    class="fa fa-search"></i> </button>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <button id="myBtn" onclick="showhidendiv();" class="btn btn-primary btn-block"><i
                                class="fa fa-check"></i> Status Update</button>

                    </div>
                </div>

            </div>

            <form name="multiple" method="post" id="bookinglistPaidStatus">
                <div class="row">


                    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
 <center><span>Only for Deliveried booking status</span></center>
                                    <div class="row" id="find">
                                        <div class="col-md-5" id="stats">
                                            <select name="status" id="status" style="width: 100%;">
                                            <option value="">Select Status</option>
                                            <option value="Deliveried">Deliveried</option>
                                           </select>

                                        </div>
                                        <div class="col-md-5">
                                            <button type="button" class="btn btn-danger btn btn-block" onclick="multipleTypeUpdate();"><i
                                                    class="fa fa-check"></i> Process</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="form-group-item" style="width:100%; height:450px; overflow:auto; ">
                        <center>
                            <div id="loading"></div>
                        </center>
                        <table class="table table-hover table-sm" id="item_list">
                            <thead class="thead-primary">
                                <tr>
                                    <td style="width: 1px;" class="text-center"><input type="checkbox"
                                                                                       onclick="$('input[name*=\'bookingId\']').prop('checked', this.checked);" />
                                    </td>
                                    <!-- <td style="width: 5px;">S.L</td> -->
                                    <td class="text-left">Booking ID</td>
                                    <td class="text-left">Status</td>
                                     <td class="text-left">Amount</td>
                                    
                                    <td class="text-left">Date</td>
                                    <td class="text-left">Company Name</td>
                                    <td class="text-left">Rece. Name</td>
                                    <td class="text-left">Assign By</td>
                                    <td class="text-left">Hubs</td>
                                   <td class="text-left">Paid Type</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>

            </form>
        </div>
    </div>
    <style>
        .ui-autocomplete {
            height: 250px;
            overflow-y: scroll;
            overflow-x: hidden;
        }
    </style>

    <script>

$("#booking_id").keyup(function (event) {
    if (event.keyCode === 13) {
        $("#myBtn").click();
        $('#booking_id').val("");
    }
});


function multipleTypeUpdate() {
    var dataString = $("#bookinglistPaidStatus").serialize();
    //console.log(dataString);
    var sts = $("#status").val();
    if (sts == "") {
        inputboxValidation();
    } else {
        //return false;
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "<?php echo base_url(); ?>mangement/mangement/update_status",
            data: dataString,
            success: function (data) {
                $('#item_list tbody tr').remove();
                successfullyInsert();
                $('#booking_id').val("");
            }
        });
    }
    return false; //stop the actual form post !important!

}

function filterBooking() {
    //  $('#item_list tbody tr').remove();
    var value = $("#booking_id").val();
    var status = 'In transit';//$("#status").val();
    if (value !== "") {
        sl = 1;
        $('#loading').html(
                '<img src="<?php echo base_url(); ?>/resource/admin/assets/images/loading.gif"> loading...');
        $.ajax({
            url: "<?php echo base_url(); ?>booking/booking/statusUpdatedata?name=" + value +
                    "&status=" +
                    status,
            type: "GET",
            dataType: 'json',
            success: function (json) {

                $('#loading').html(json);
                $.map(json, function (item) {

                    var id = "item_list_" + item.booking_id;
                    var html = "<tr id='" + id + "'>";
                    html +=
                            "<td ><input type='checkbox' checkbox name='bookingId[]' value='" +
                            item.booking_id + "'>" + "</td>";
                    html += "<td onclick=getsId(" + item.booking_id +
                            ")> <i class='icon-minus'></i>" + item.booking_id + "</td>";

                    if (item.status == "Deliveried") {
                        var sts = "<span style='color:green'>" + item.status + "</span>";
                    } else if (item.status == "Returend") {
                        var sts = "<span style='color:red'>" + item.status + "</span>";
                    } else if (item.status == "In transit") {
                        var sts = "<span style='color:blue'>" + item.status + "</span>";
                    } else if (item.status == "PRTO") {
                        var sts = "<span style='color:red'>" + item.status + "</span>";
                    } else if (item.status == "DRTO") {
                        var sts = "<span style='color:red'>" + item.status + "</span>";
                    } else if (item.status == "Waiting for Pickup") {
                        var sts = "<span style='color:pink'>" + item.status + "</span>";
                    } else {
                        var sts = "<span>" + item.status + "</span>";
                    }

                    html += "<td>" + sts + "</td>";
                    html += "<td>" + item.update_cod + "</td>";
                    html += "<td>" + item.date + "</td>";
                    html += "<td>" + item.company + "</td>";
                    html += "<td>" + item.reciver_name + "</td>";
                    html += "<td>" + item.deliveryman + "</td>";
                    html += "<td>" + item.hubsname + "</td>";
                     html += "<td>" + item.paid_type + "</td>";
                    html += "</tr>";
                    if ($('#' + id).length < 1) {
                        $('#form-group-item #item_list tbody').append(html);
                        //  sl++;
                    }
                });
            }
        });
    } else {
        inputboxValidation();
    }

    $('#booking_id').focus();
}

function getsId(booking_id) {
    $('#item_list_' + booking_id).remove().css("display", "inline").fadeOut(2000);
}

function showhidendiv() {
    // $('#find').show();
    $("#statusModal").modal("show");
}
    </script>