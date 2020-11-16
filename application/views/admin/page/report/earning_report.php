<script src="<?php echo base_url(); ?>resource/merchent/assets/js/core/jquery.min.js"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">Earning Report</h5>
                    </div>
                </div>
                <form method="post" action="<?php echo base_url(); ?>report/report/setdeliveryReport">
                    <div class="row">
                        <div class="col-2">
                            <input type="text" name="from_date" id="from_date" class="form-control"
                                   placeholder="From Date" required="" autocomplete="off">
                        </div>
                        <div class="col-2">
                            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date"
                                   required="" autocomplete="off">

                        </div>
                        <div class="col-3">
                            <select class="form-control" name="user_id" id="userid">
                                <option value="">Select Merchent</option>
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


                        <div class="col-3">
                            <select class="form-control" name="delivery_man_id" id="delivery_man_id">
                                <option value="">Select Delivery Man</option>
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
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i>
                            </button>

                        </div>
                    </div>
                </form>

            </div>

            <center style="font-size: 22px; color: green; font-weight: bold;"><?php
                if (isset($from_date)) {
                    if (!empty($from_date) && !empty($to_date)) {
                        echo "From : " . date("d-M-Y", strtotime($from_date)) . " TO " . date("d-M-Y", strtotime($to_date)) . "<br>";
                    } else {
                        echo "From : " . date("d-M-Y") . " TO " . date("d-M-Y") . "<br>";
                    }
                }
                ?></center>
            <center><a href="#"
                       onclick="tableToExcel('testTable', '<?php echo date('d-m-Y') ?> <?php echo $this->session->userdata('full_name') ?>')">
                    Export to excel</a></center>

            <div class="table-responsive" id="testTable">
                <p style="display: none;"><?php
                    if (isset($from_date)) {
                        echo "From : " . $from_date . " TO " . $to_date . "<br>";
                    }
                    ?></p>

                <center>
                    Total Booking <span class="badge badge-primary badge-pill">(<?php
                        echo count($earningRpt);
                        ?>)</span>
                    Total COD <span class="badge badge-info badge-pill" id="showCODAmount"></span>
                    Total DV Charge <span class="badge badge-danger badge-pill" id="showdvCharge"></span>
                    Total Comission<span class="badge badge-danger badge-pill" id="showPercent"></span>
                    Total Earning<span class="badge badge-danger badge-pill" id="showEarning"></span>

                </center>

                <table border="1" class="table-hover" style="width: 100%;">
                    <tr style="color: black;">
                        <th width="38" style="background-color: #e6f9ff; color: black; text-align: right;">#</th>
                        <th width="113" style="background-color: #ccf2ff; color: black; text-align: center;">Booking ID</th>
                        <th width="129" style="background-color: #b3ecff; color: black; text-align: center;">Status</th>
                        <th width="129" style="background-color: #99e6ff; color: black; text-align: center;">Payment Status</th>
                        <th width="100" style="background-color: #80dfff; color: black; text-align: center;">Date</th>
                        <th width="387" style="background-color: #66d9ff; color: black; text-align: center;">Marchent</th>

                        <th width="149" style="background-color: #0099cc; color: white;">COD Amount</th>
                        <th width="149" style="background-color: #007399; color: white;">Dv.Charge</th>
                        <th width="149" style="background-color: #004d66; color: white;"><center>%</center></th>

                    </tr>
                    <?php
                    $x = 1;
                    $tdelivery = 0;
                    $totalCODAmount = 0;
                    $totaldvChanges = 0;
                    $totalPercent = 0;
                    foreach ($earningRpt as $value) {
                        if ($value->category_id == 2) {
                            $tdelivery += $value->delivery_type;
                        } else {
                            $tdelivery += $value->delivery_type;
                        }

                        $totalCODAmount += $value->update_cod;
                        if ($value->category_id == 2) {
                            $totaldvChanges += $value->delivery_type;
                        } else {
                            $totaldvChanges += $value->delivery_type;
                        }
                        if (!empty($find_deliveryman->user_id)) {
                            
                        }
                        ?>
                        <tr onclick="getBookingId(<?php echo $value->booking_id; ?>);">
                            <td style="background-color: #e6f9ff; color: black; text-align: right;"><?php
                                echo $x;
                                $x++;
                                ?></td>
                            <td style="background-color: #ccf2ff; color: black; text-align: center;"><?php echo $value->booking_id; ?></td>
                            <td style="background-color: #b3ecff; color: black; text-align: center;"><?php echo $value->status; ?></td>
                            <td style="background-color: #99e6ff; color: black; text-align: center;"><?php echo $value->paid_type; ?></td>
                            <td style="width: 100px; background-color: #80dfff; color: black; text-align: right;"><?php echo date("d-M-Y", strtotime($value->date)); ?></td>
                            <td style="width: 100px; background-color: #66d9ff; color: black; text-align: center;"><?php echo $value->company . '(' . $value->commission . '%)'; ?></td>

                            <td style="background-color: #0099cc; color: white; text-align: right;">
                                <?php echo number_format($value->update_cod); ?></td>
                            <td style="text-align: right; background-color: #007399; color: white;">
                                <?php
                                if ($value->category_id == 2) {
                                    echo number_format($value->delivery_type);
                                } else {
                                    echo number_format($value->delivery_type);
                                }
                                ?></td>
                            <td style="text-align: right; background-color: #004d66; color: white;"><?php
                                $percentage = $value->commission;
                                $codamount = $value->update_cod;
                                $percentResult = ($percentage / 100) * $codamount;
                                echo $percentResult;
                                $totalPercent += $percentResult;
                                ?></td>
                        </tr>
<?php } ?>

                </table>
            </div>

            <div align="right" style="font-size: 20px; font-weight: bold; display: none;">
                <input type="text" id="totalCODAmount" value="<?php echo number_format($totalCODAmount); ?>" />
                <input type="text" id="totalDvCharge" value="<?php echo number_format($totaldvChanges); ?>" />
                <input type="text" id="totalPercehnt" value="<?php echo number_format($totalPercent); ?>" />
                <input type="text" id="totalearning"
                       value="<?php echo number_format($totaldvChanges + $totalPercent); ?>" />
            </div>



        </div>
    </div>


    <script>
        function updateEntryFrom() {
            var dataString = $("#booking_update").serialize();
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo base_url(); ?>mangement/mangement/updateBooking",
                cache: false,
                data: dataString,
                success: function (data) {
                    $("#editModal").modal("hide");
                    setTimeout(function () {
                        alert("Successfully Update Booking");
                    }, 200);
                }
            });
            return false; //stop the actual form post !important!
        }


        function getcategoryId(categoryId) {
            if (categoryId == 2) {
                $("#thirdParty").show("slow");
                $("#transportType").show("slow");
            } else {
                $("#thirdParty").hide();
                $("#transportType").hide();
            }
        }


        function getpaymentType(category_id) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>mangement/mangement/getPaymentTypeList',
                data: {
                    category_id: category_id
                },
                success: function (response) {
                    document.getElementById("deliverytype_id").innerHTML = response;
                }
            });
        }

        //  $('#myModal').modal('show');
        $("#name").keyup(function (event) {
            if (event.keyCode === 13) {
                $("#myBtn").click();
            }
        });

        $(window).on('load', function () {

            var condition = '<?php echo $condition; ?>';
            if (condition == 0) {
                $("#to_date").datepicker();
                $("#from_date").datepicker();
                var user_id = "";
                var delivery_id = "";
                $('#delivery_man_id').val(delivery_id);
                $('#userid').val(user_id);

            } else if (condition == 1) {
                var from_date = '<?php echo $from_date; ?>';
                var to_date = '<?php echo $to_date; ?>';
                var user_id = '<?php echo $user_id; ?>';
                var delivery_id = '<?php echo $delivery_id; ?>';
                $("#to_date").datepicker();
                $("#from_date").datepicker();
                $('#from_date').val(from_date);
                $('#to_date').val(to_date);
                $('#userid').val(user_id);
                $('#delivery_man_id').val(delivery_id);
            }
            codAmount = $('#totalCODAmount').val();
            $('#showCODAmount').text(codAmount);

            dvCharge = $('#totalDvCharge').val();
            $('#showdvCharge').text(dvCharge);

            tPercent = $('#totalPercehnt').val();
            $('#showPercent').text(tPercent);

            tearning = $('#totalearning').val();
            $('#showEarning').text(tearning);

            //totalearning
        });

        var tableToExcel = (function () {
            var uri = 'data:application/vnd.ms-excel;base64,'
                    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
                    , base64 = function (s) {
                        return window.btoa(unescape(encodeURIComponent(s)))
                    }
            , format = function (s, c) {
                return s.replace(/{(\w+)}/g, function (m, p) {
                    return c[p];
                })
            }
            return function (table, name) {
                if (!table.nodeType)
                    table = document.getElementById(table)
                var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
                window.location.href = uri + base64(format(template, ctx))
            }
        })()
    </script>