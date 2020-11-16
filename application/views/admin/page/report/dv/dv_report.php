<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-title" style="font-size: 18px; color: green;">My Total Delivery : (<?php echo count($totalDv);?>)</p>
                    </div>
                </div>


            </div>
            <center>
                <div id="loading"></div>
            </center>
            <div id="form-group-item" style="width:100%; height:450px; overflow:auto; ">
                <table class="table table-hover table-sm" id="item_list">
                    <thead class="thead-primary">
                        <tr style="background-color: green; color: white;">
                            <td class="text-left">Booking ID</td>
                            <td class="text-left">F.Country</td>
                            <td class="text-left">T.Country</td>
                            <td class="text-left">Recv.Address</td>
                            <td class="text-left">Status</td>
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
function filterCategory() {
    $('#item_list tbody tr').remove();
    var user_id = <?php echo $this->session->userdata('user_id'); ?> ;
    var sl = 1
    //alert(user_id);
    //$('#loading').html('<img src="http://sampsonresume.com/labs/pIkfp.gif"> loading...');
    $.ajax({
        url: "<?php echo base_url(); ?>deliveryreport/deliveryManReport?user_id=" + user_id,
        type: "GET",
        dataType: 'json',
        success: function(json) {
            //$('#loading').html(json);
          //  console.log(json);

            $.map(json, function(item) {
                // open_modal();
                var id = "item_list" + item.bookingId;
                var html = "<tr id='" + id + "'>";
    html += "<td class='text-left'>" + item.bookingId + "</td>";
    //html += "<td class='text-left'>" + item.company + "</td>";
    //html += "<td class='text-left'>" + item.reciver_name + "</td>";
    html += "<td class='text-left'>" + item.fcountryName + "</td>";
    html += "<td class='text-left'>" + item.tcountryName + "</td>";
    html += "<td class='text-left'>" + item.recv_full_address + "</td>";
    html += "<td class='text-left'>" + item.status + "</td>";
                    if ($('#' + id).length < 1) {
                        $('#form-group-item #item_list tbody').append(html);
                        sl++;
                    }
            });
        }
    });
}
filterCategory();

function getsId(booking_id) {
        $.ajax({
            url: "<?php echo base_url(); ?>booking/booking/geteditBookingData?booking_id=" + booking_id,
            type: "GET",
            dataType: 'json',
            success: function(json) {
                //console.log(json);
                $('#bookingid').text("Booking ID:" + booking_id);
                $('#companyName').val(json.company);
                $('#bookingdate').val(json.date);
                $('#reason').val(json.reason);
                $('#delivery_type').val(json.delivery_type);
                $('#paid_type').val(json.paid_type);
                $('#bookingids').val(json.booking_id);
                //$('#user_id').val(json.user_id);
                $('#recivername').val(json.reciver_name);
                $('#deliverytype_id').val(json.deliverytype_id);
                $('#category_id').val(json.category_id);
                $('#third_party_charge').val(json.third_party_charge);
                $('#thirdpartyTransportType').val(json.thirdpartyTransportType);
                $('#reciveraddress').val(json.reciver_address);
                $('#reciverphone').val(json.reciver_phone);
                $('#reciverpackegedes').val(json.reciver_packege_des);
                $('#reciverinstruction').val(json.reciver_instruction);
                //$('#deliveryman').val(json.deliveryman);
                $('#datepicker').val(json.date);
                $('#collectionamount').val(json.collection_amount);
                $('#reasons').val(json.reason);
                $('#statuss').val(json.status);
                $('#paidtypes').val(json.paid_type);
                $('#reciver_address').val(json.reciver_address);
                var category_id = json.category_id;
                if (category_id == 2) {
                    $("#thirdParty").show("slow");
                    $("#transportType").show("slow");
                } else {
                    $("#thirdParty").hide();
                    $("#transportType").hide();
                }

                $('#editModal').modal('show');
            }
        });
    }
</script>