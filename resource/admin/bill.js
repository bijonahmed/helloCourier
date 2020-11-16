  function multipleTypeUpdate() {
            var dataString = $("#bookinglistPaidStatus").serialize();
            console.log(dataString);
            //return false;
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/mangement/mangement/update_multiple_paid",
                data: dataString,
                success: function (data) {
                    $('#paidtype').modal('hide');
                    // filterBooking();
                    successfullyUpdate();

                }
            });
            return false; //stop the actual form post !important!

        }



        function updateEntryFrom() {
            var dataString = $("#booking_update").serialize();
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/mangement/mangement/updateBooking",
                cache: false,
                data: dataString,
                success: function (data) {

                    $("#editModal").modal("hide");
                    successfullyUpdate();
                    //window.location.href = "<?php echo base_url(); ?>merchant_bill/merchanbill/getuserId";
                }

            });
            return false; //stop the actual form post !important!
        }

        function getParticularInfo(booking_id) {


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
                    $('#bookingids').val(json.booking_id);
                    $('#recivername').val(json.reciver_name);
                    $('#deliverytype_id').val(json.deliverytype_id);
                    $('#mar_order_id').val(json.marchent_order_id);
                    $('#reciveraddress').val(json.reciver_address);
                    $('#reciverphone').val(json.reciver_phone);
                    $('#reciverpackegedes').val(json.reciver_packege_des);
                    $('#reciverinstruction').val(json.reciver_instruction);
                    $('#datepicker').val(json.date);
                    $('#updatecod').val(json.update_cod);
                    $('#bookingcod').val(json.booking_cod);
                    $('#editModal').modal('show');

                }

            });


        }


        $('.count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });

        function codupdate(cod) {
            $("#booking_cod").val(cod);
        }
        $(document).ready(function () {
            var value = $("#totalResult").text();
            $("#showunpaidCodAmt").text("Unpaid COD:" + value);
        });

        //  $('#myModal').modal('show');
        $("#user_id").keyup(function (event) {
            if (event.keyCode === 13) {
                $("#myBtn").click();
                // alert("asdf");
            }
        });

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

        function getMerchentId(user_id) {
            $('#user_id').autocomplete({
                'source': function (request, response) {
                    $.ajax({
                        url: "/user/user/checkingUserId?user_id=" + user_id,
                        dataType: 'json',
                        contentType: "application/json",
                        success: function (json) {
                            response($.map(json, function (item) {
                                return {
                                    label: item['company'],
                                    mobile_number: item['mobile_number'],
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

        function currentPageReload() {
            location.reload();

        }