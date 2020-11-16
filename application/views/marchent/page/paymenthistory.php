<script src="<?php echo base_url(); ?>resource/merchent/assets/js/core/jquery.min.js"></script>

<script>
    $(function () {
    $("#txtFromDate").datepicker();
    $("#txtToDate").datepicker();
    });</script>
<style>
    #testTable {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #testTable td, #testTable th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #testTable tr:nth-child(even){background-color: #f2f2f2;}

    #testTable tr:hover {background-color: #ddd;}

    #testTable th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }

</style>
<div class="content">
    <div class="container-fluid">

        <div class="card" >

            <div class="row">
                <div class="container">
                    <center>
                        <form name="paymenthistory" method="post" action="<?php echo base_url(); ?>marchent/searchPaymenthistory">
                            From: <input type="text" required="1" id="txtFromDate" name="txtFromDate" value="<?php
                            if (isset($from)) {
                                echo date("d-m-Y", strtotime($from));
                            }
                            ?>" />
                            To: <input type="text" required="1" id="txtToDate" name="txtToDate" value="<?php
                            if (isset($to)) {
                                echo date("d-m-Y", strtotime($to));
                            }
                            ?>" />

                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </center>
                </div>
            </div>


        </div>






        <div class="card"  style="margin-top: -10px;">

            <center>
              <a href="<?php echo base_url();?>marchent"><button class="btn btn-danger">Home</button></a>
                <button  class="btn btn-success"  onclick="tableToExcel('testTable', '<?php echo date('d-m-Y') ?> <?php echo $this->session->userdata('full_name') ?>')" > Export to excel</button>
                <br>
                <?php
                if (isset($from)) {
                    echo " From : " . date("d-m-Y", strtotime($from));
                }

                if (isset($to)) {
                    echo " To : " . date("d-m-Y", strtotime($to));
                }
                ?>
            </center>


            <div class="card-body">
                <div class="table-responsive">
                    <div class="table-responsive">

                        <table  border="1" class="table" id="testTable">
                            <tr style="color: black;">
                                <th>#</th>
                                <th>Date </th>
                                <th>Book. Num.</th>
                                <th>Book To </th>
                                <th>Address</th>
                                <th>Reason</th>
                                <th>Contact</th>
                                <th>COD Amount</th>
                                <th>Delivery Changes</th>
                                <th>Insurance (1%)</th>
                                <th>Rec. Amt</th>
                                <th>Pay Type</th>
                                <th>Status</th>
                            </tr>
                            <?php
                            $x = 1;
                            $cod = 0;
                            $deliRetuResult = 0;
                            $out = 0;
                            $insurace = 1;
                            foreach ($trkRpt as $value) {
                                ?>
                                <tr>
                                    <td><?php
                                        echo $x;
                                        $x++;
                                        ?></td>
                                    <td style="width: 100px;" ><?php echo date("d-m-Y", strtotime($value->date)); ?></td>
                                    <td><?php echo $value->booking_id; ?></td>
                                    <td><?php echo $value->reciver_name; ?></td>
                                    <td><?php echo $value->reciver_address; ?></td>
                                    <td><?php echo $value->reason; ?></td>
                                    <td><?php echo $value->reciver_phone; ?></td>
                                    <td><?php echo $value->update_cod; ?></td>
                                    <td><?php echo number_format($value->delivery_type); ?></td>
                                    <td><?php
                                        $percentage = 1;
                                        $codamount = $value->update_cod;
                                        $percentResult = ($percentage / 100) * $codamount;
                                        echo $percentResult;
                                        $collAmount = $value->update_cod;
                                        $deliType = $value->delivery_type;
                                        $pResult = $percentResult;
                                        $totalResult = ($collAmount - $deliType - $pResult);
                                        ?></td>
                                    <td><?php
                                        if (!empty($value->status !== "Deliveried" && $value->status !== "Returend" && $value->status !== "PRTO" && $value->status !== "DRTO")) {
                                            echo $totalResult = ($value->update_cod - $value->delivery_type);
                                        } else {

                                            $result = $value->update_cod - $value->delivery_type;
                                            $deliRetuResult += $value->update_cod - $value->delivery_type - $pResult;
                                            if ($value->status == "Returend") {
                                                echo $value->update_cod - $value->delivery_type;
                                            } else {
                                                echo $totalResult;
                                            }
                                        }
                                        ?></td>
                                    <td><?php
                                        if ($value->paid_type) {
                                            echo $value->paid_type;
                                        } else {
                                            echo "---";
                                        }
                                        ;
                                        ?></td>
                                    <?php if ($value->status == "Deliveried") { ?>
                                        <td style="color: green;"><?php echo $value->status; ?></td>
                                    <?php } elseif ($value->status == "Returend") { ?>
                                        <td style="color: green;"><?php echo $value->status; ?></td>
                                        <?php
                                    } elseif ($value->status == "PRTO") {
                                        ?>
                                        <td style="color: blue;"><?php echo $value->status; ?></td>
                                        <?php
                                    } elseif ($value->status == "DRTO") {
                                        ?>
                                        <td style="color: black;"><?php echo $value->status; ?></td>
                                        <?php
                                    } else {
                                        ?>
                                        <td><?php echo $value->status; ?></td>
                                        <?php
                                    }
                                    ?>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                    Total:<div align="right" style="font-size: 20px; font-weight: bold;" id="totalResult">
                        <?php echo (float) $deliRetuResult; ?>
                    </div>

                </div>
            </div>
        </div>



    </div>
</div>


                            <script type="text/javascript">
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