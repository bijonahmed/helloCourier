<font color="green">
<?php
$message = $this->session->userdata('msg');
if (isset($message)) {
    echo $message;
    $this->session->unset_userdata('msg');
}
?>
</font>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="row">

                    <div class="col-md-12">

                        <center>
                            <font color="red">
                            <?php
                            $message = $this->session->userdata('assign_msg');
                            if (isset($message)) {
                                echo $message;
                                $this->session->unset_userdata('assign_msg');
                            }
                            ?>

                            </font>
                        </center>
                        <p>Booking update</p>
                        <form method="post" action="<?php echo base_url(); ?>mangement/mangement/inserttobookingupdate">
                            <div class="row">

                                <div class="col-4">

                                    <input type="text" id="booking_id" name="booking_id" class="search form-control"
                                           placeholder="Booking Id" autofocus autocomplete="off" required="" onkeyup="checkBookingId(this.value);">

                                </div>
                                <div class="col-4">
                                    <select class="form-control custom-select" name="status" id="status" required="">
                                        <option value="">All Status </option>
                                        <?php
                                        foreach ($status as $value):
                                            ?>
                                            <option value="<?php echo $value->status; ?>"><?php echo $value->display; ?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>

                                <div class="col-4">

                                    <button type="submit" id="myBtn" class="btn btn-primary btn-block"><i
                                            class="fa fa-plus-circle"></i> </button>
                                </div>
                            </div>
                        </form>

                        <br>



                        <form action="<?php echo base_url(); ?>mangement/mangement/updateAssignStatus" method="post">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm" id="item_list">
                                    <thead class="thead-primary">
                                        <tr style="font-weight: bold;">
                                            <td style="width: 1px;" class="text-center"><input type="checkbox"
                                                                                               onclick="$('input[name*=\'booking_id\']').prop('checked', this.checked);" />
                                            </td>
                                            <td style="width: 2px;">S.L</td>
                                            <td class="text-left">Booking ID</td>
                                            <td class="text-left">Status</td>
                                            <td class="text-left">Reciv. Name</td>
                                            <td class="text-left">Reciv. Phone</td>
                                            <td class="text-left">Reciv. Address</td>
                                            <td class="text-left">COD Amount</td>
                                            <td class="text-left">Action</td>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $x = 1;
                                        foreach ($list as $value) {
                                            $query = $this->db->query("SELECT booking_id,reciver_name,reciver_phone,reciver_address,collection_amount FROM tbl_booking WHERE booking_id='$value->booking_id'")->row();
                                            ?>
                                            <tr>
                                                <td><input type=checkbox name='booking_id[]'
                                                           value='<?php echo $query->booking_id; ?>' required="" /></td>
                                                <td class="text-left"><?php
                                                    echo $x;
                                                    $x++;
                                                    ?></td>
                                                <td class="text-left"><?php
                                                    if (!empty($query->booking_id)) {
                                                        echo $query->booking_id;
                                                    };
                                                    ?></td>
                                                <td class="text-left"><?php
                                                    if (!empty($value->status)) {
                                                        echo $value->status;
                                                    };
                                                    ?></td>
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
                                                    if (!empty($query->collection_amount)) {
                                                        echo $query->collection_amount;
                                                    }
                                                    ?></td>
                                                <?php
                                                if (!empty($query->booking_id)) {
                                                    ?>
                                                    <td><a href="<?php echo base_url(); ?>booking_update/bookingupdate/deletebooking/<?php echo $query->booking_id; ?>"
                                                           style="text-decoration: none;"
                                                           onclick="return confirm('Are you sure you want to delete this Booking?');"><i
                                                                class="fa fa-trash"></i></a></td>
                                                        <?php
                                                    }
                                                    ?>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block"
                                    onclick="return confirm('Do you really want to confirm....?');">Confirm</button>

                        </form>


                    </div>

                </div>

            </div>


        </div>
    </div>
</div>
</div>
<style>
    .ui-autocomplete { height: 250px; overflow-y: scroll; overflow-x: hidden;}
</style>


<script>
    $(function () {
        $("#date").datepicker();
        $("#assign_date").datepicker();
    });
    function checkBookingId(booking_id) {
        $('#booking_id').autocomplete({
            'source': function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>assignto/assignto/checkingBookingId?booking_id=" + booking_id,
                    dataType: 'json',
                    contentType: "application/json",
                    success: function (json) {
                        response($.map(json, function (item) {
                            return {
                                label: item['booking_id'],
                                value: item['booking_id'],
                                i: item,
                            }
                        }));
                    }
                });
            },
            'select': function (e, ui) {
                e.preventDefault();
                $(this).val(ui.item['label']);

            }
        });

    }
    function dvupdate() {
        var dvsts = '<?php echo $this->session->userdata('dvsts'); ?>';

        if (dvsts != 'NULL') {
            $("#status").val(dvsts);
        }

    }

    dvupdate();
</script>