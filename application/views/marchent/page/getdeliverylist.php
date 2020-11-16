<div class="card">
    <div style="text-align: center;">
        <a href="<?php echo base_url();?>marchent"><button class="btn btn-danger">Home</button></a>
        <button class="btn btn-success"
                onclick="tableToExcel('testTable', '<?php echo date('d-m-Y') ?> <?php echo $this->session->userdata('full_name') ?>')">
            Export to excel</button>
                    
            
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="table-responsive">

                <table border="1" class="table" id="testTable">
                    <tr style="color: black;">
                        <th>#</th>
                        <th>Date </th>
                        <th>Book. Num.</th>
                        <th>Book To </th>
                        <th>Address</th>
                        <th>Reason</th>
                        <th>Phone</th>
                        <th>COD Amount</th>
                        <th>Pay Type</th>
                        <th>Status</th>

                    </tr>
                    <?php
                    $x = 1;
                    $sum = 0;
                    foreach ($data as $value) {
                        $sum += $value->update_cod;
                        ?>
                        <tr>
                            <td><?php
                                echo $x;
                                $x++;
                                ?></td>
                            <td style="width: 100px;"><?php echo date("d-m-Y", strtotime($value->date)); ?></td>
                            <td><?php echo $value->bookingId; ?></td>
                            <td><?php echo $value->reciver_name; ?></td>
                            <td><?php echo $value->reciver_address; ?></td>
                            <td><?php echo $value->reason; ?></td>
                            <td><?php echo $value->reciver_phone; ?></td>
                            <td><?php echo $value->update_cod; ?></td>
                            <td><?php
                                if ($value->paid_type) {
                                    echo $value->paid_type;
                                } else {
                                    echo "---";
                                }
                                ;
                                ?></td>
                            <?php
                            if ($value->status == "Deliveried") {
                                ?>
                                <td style="color: green;"><?php echo $value->status; ?></td>
                                <?php
                            } elseif ($value->status == "Returend") {
                                ?>
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
                <?php echo "Total COD Amount: " . number_format($sum); ?>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">
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
