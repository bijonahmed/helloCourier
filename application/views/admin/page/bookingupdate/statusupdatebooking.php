<style>#customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }

</style><table class="table-sm table-striped"id="customers"style="width: 100%;"><thead class="thead-dark"><tr style="font-weight: bold; background-color: #008cff; color: white;"><td>S.L</td><td>BookingID</td><td class="text-left">COD Amount</td><td class="text-left">Select Status for Update Report</td></tr></thead><tbody><?php
        $x = 1;

        foreach ($checksts as $v) {
            ?><tr><td class="text-left"><?php
            echo $x;
            $x++;
            ?></td><td class="text-left"><?php
                    if (!empty($v->booking_id)) {
                        echo $v->booking_id;
                    }

                    ;
                    ?></td><td class="text-left"><?php
                        if (!empty($v->update_cod)) {
                            echo $v->update_cod;
                        }

                        ;
                        ?></td><td class="text-left"><?php if ($v->status == "Deliveried") {
                            ?><input type="radio"name="radioGroup_<?php echo $v->booking_id; ?>"id="<?php echo $v->booking_id; ?>"checked="checked"/><label for="radio1"style="background-color: green; padding: 5px;"><span style="color: white;">DV</span></label><?php
                    } else {
                        ?><input type="radio"name="radioGroup_<?php echo $v->booking_id; ?>"id="<?php echo $v->booking_id; ?>"/><label for="radio1"style="background-color: green; padding: 5px;"><span style="color: white;">DV</span></label><?php
                    }
                    ?><?php if ($v->status == "Returend") {
                        ?><input type="radio"name="radioGroup_<?php echo $v->booking_id; ?>"id="<?php echo $v->booking_id; ?>"checked="checked"/><label for="radio2"style="background-color: #fc0303; padding: 5px;"><span style="color: white;">RTO</span></label><?php
                    } else {
                        ?><input type="radio"name="radioGroup_<?php echo $v->booking_id; ?>"id="<?php echo $v->booking_id; ?>"/><label for="radio2"style="background-color: #fc0303; padding: 5px;"><span style="color: white;">RTO</span></label><?php
                    }
                    ?><?php if ($v->status == "DRTO") {
                        ?><input type="radio"name="radioGroup_<?php echo $v->booking_id; ?>"id="<?php echo $v->booking_id; ?>"checked="checked"/><label for="radio3"style="background-color: #fc5a03; padding: 5px;"><span style="color: white;">DRTO</span></label><?php
                    } else {
                        ?><input type="radio"name="radioGroup_<?php echo $v->booking_id; ?>"id="<?php echo $v->booking_id; ?>"/><label for="radio3"style="background-color: #fc5a03; padding: 5px;"><span style="color: white;">DRTO</span></label><?php
                    }
                    ?><?php if ($v->status == "PRTO") {
                        ?><input type="radio"name="radioGroup_<?php echo $v->booking_id; ?>"id="<?php echo $v->booking_id; ?>"checked="checked"/><label for="radio4"style="background-color: #fc9803; padding: 5px;"><span style="color: white;">PRTO</span></label><?php
                    } else {
                        ?><input type="radio"name="radioGroup_<?php echo $v->booking_id; ?>"id="<?php echo $v->booking_id; ?>"/><label for="radio4"style="background-color: #fc9803; padding: 5px;"><span style="color: white;">PRTO</span></label><?php
                    }
                    ?><?php if ($v->status == "Hold") {
                        ?><input type="radio"name="radioGroup_<?php echo $v->booking_id; ?>"id="<?php echo $v->booking_id; ?>"checked="checked"/><label for="radio4"style="background-color: blue; padding: 5px;"><span style="color: white;">HOLD</span></label><?php
                    } else {
                        ?><input type="radio"name="radioGroup_<?php echo $v->booking_id; ?>"id="<?php echo $v->booking_id; ?>"/><label for="radio4"style="background-color: blue; padding: 5px;"><span style="color: white;">HOLD</span></label><?php
                    }
                    ?></td></tr><?php
        }
        ?></tbody></table>