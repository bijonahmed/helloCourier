<div class="card">
    <form class="form-horizontal" method="post"
        action="<?php echo base_url(); ?>mangement/mangement/insertDeliveryType">
        <div class="card-body">
            <h4 class="card-title"> Delivery Type</h4>
            <hr>
            <div class="form-group row">
                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Category</label>
                <div class="col-sm-10">

                    <select class="form-control custom-select" name="category_id" id="category_id"
                        style="width: 100%; height:36px;" required="">
                        <option value="">Select</option>
                        <?php
                        foreach ($categoryList as $value):
                            ?>
                        <option value="<?php echo $value->category_id; ?>"><?php echo $value->category_name; ?></option>
                        <?php
                        endforeach;
                        ?>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Price</label>
                <div class="col-sm-10">
                    <?php
                    if (isset($row->price)):
                        ?>
                    <input type="number" class="form-control" id="price" placeholder="" required="" name="price"
                        autofocus="1" value="<?php echo $row->price; ?>">
                    <?php
                    else:
                        ?><input type="number" class="form-control" id="price" placeholder="" required="" name="price"
                        autofocus="1">
                    <?php
                    endif;
                    ?>
                </div>
            </div>



            <input type="hidden" name="deliverytype_id" value="<?php
            if (isset($row)):
                echo $row->deliverytype_id;
            endif;
            ?>" />
        </div>

        <div class="border-top">
            <div class="card-body">
                <div align="right">
                    <button type="submit" id="savebtn" class="btn btn-primary btn-lg btn-block">Submit</button>
                    <a href="<?php echo base_url(); ?>deliverytype/deliverytype/getDeliveryList"
                        style="text-decoration: none;"><button style="margin-top: 10px;" type="button"
                            class="btn btn-danger btn-lg btn-block">Cancel</button></a>

                </div>
            </div>
        </div>
    </form>
</div>

<script>
$(document).ready(function() {
    var category_id = '<?php echo $row->category_id; ?>';
    if (category_id != 'NULL') {
        $("#category_id").val(category_id);
    }
});
</script>