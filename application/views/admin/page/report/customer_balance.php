<style>
    .zui-table {
        border: solid 1px #DDEEEE;
        border-collapse: collapse;
        border-spacing: 0;
        font: normal 13px Arial, sans-serif;
    }
    .zui-table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
    }
    .zui-table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    .zui-table-highlight tbody tr:hover {
        background-color: #CCE7E7;
    }
    .zui-table-horizontal tbody td {
        border-left: none;
        border-right: none;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="table-responsive" id="testTable">
                <center>
                    <h3>Customer Balance Details</h3>
                </center>
                <div align="center">
                    <button class="btn btn-success"
                            onclick="tableToExcel('testTable', '<?php echo date('d-m-Y') ?> <?php echo $this->session->userdata('full_name') ?>')">
                        Export to excel</button>
                    <br>
                    <h4><?php echo date("d-M-Y"); ?></h4>
                </div>

                <table border="1" class="table-hover zui-table zui-table-horizontal zui-table-highlight">
                    <tr style="color: black;">
                        <th style="width: 2%;">#</th>
                        <th style="width: 15%;">Company Name </th>
                        <th style="width: 10%;">Mobile</th>
                        <th style="width: 10%;text-align: right;">Amount</th>
                    </tr>
                    <?php
                    $x = 1;
                    $totalpayment = 0;
                    foreach ($marchent as $m_val) {
                        ?>
                        <tr style="">
                            <td><?php echo $x;
                    $x++; ?></td>
                            <td><?php echo $m_val->company ?></td>
                            <td><?php echo $m_val->mobile_number; ?></td>
                            <td style="text-align: right;"> <?php
                                $trkRpt = $this->db->query("SELECT tbl_booking.third_party_charge,tbl_booking.category_id,tbl_booking.booking_id,tbl_booking.user_id,tbl_booking.update_cod,tbl_booking.delivery_type,tbl_booking.status FROM `tbl_booking` WHERE paid_type='Unpaid' AND delete_status='0' AND user_id='$m_val->user_id' ")->result();
                                $cod = 0;

                                $out = 0;
                                $sum = 0;
                                foreach ($trkRpt as $value) {
//percent
                                    $percentage = $m_val->commission;
                                    $codamount = $value->update_cod;
                                    $percentResult = ($percentage / 100) * $codamount;
                                    // echo $percentResult;
                                    $collAmount = $value->update_cod;
                                    $deliType = $value->delivery_type;
                                    $pResult = $percentResult;
                                    $totalResult = ($collAmount - $deliType - $pResult);
                                    if ($value->status == "Returend" || $value->status == "PRTO" || $value->status == "Deliveried" || $value->status == "DRTO") {
                                        if ($value->category_id == 2) {
                                            $codAmount = $value->update_cod;
                                            $deliveryCharge = $value->delivery_type + $value->third_party_charge; // Nation Wide
                                            $percentageValue = $percentResult;
                                            $totalResult = ($codAmount - $deliveryCharge - $percentageValue);
                                        } else {
                                            $codAmount = $value->update_cod;
                                            $deliveryCharge = $value->delivery_type; // Not Nationwide (Inter Dhaka city)
                                            $percentageValue = $percentResult;
                                            $totalResult = ($codAmount - $deliveryCharge - $percentageValue);
                                        }
                                        // echo $totalResult."<br>";
                                        $sum += $totalResult;
                                    }
                                }
                                echo $sum;
                                $totalpayment += $sum;
                                ?></td>
                        </tr>
                        <?php }
                    ?>
                    <tr>
                        <td colspan="5" style="color: black;">
                            <div align="right"><b><?php
                    if (isset($totalpayment)) {
                        echo "Total Payment: " . $totalpayment;
                    }
                    ?></b></div>
                        </td>
                    </tr>

                </table>


            </div>


        </div>
    </div>
</div>

<!-- The Modal -->

<script>
// Excel Export
var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,',
        template =
                '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
                                    base64 = function(s) {
return window.btoa(unescape(encodeURIComponent(s)))
},
format = function(s, c) {
    return s.replace(/{(\w+)}/g, function(m, p) {
        return c[p];
    })
}
return function(table, name) {
if (!table.nodeType)
    table = document.getElementById(table)
var ctx = {
    worksheet: name || 'Worksheet',
    table: table.innerHTML
}
window.location.href = uri + base64(format(template, ctx))
}
})()
</script>