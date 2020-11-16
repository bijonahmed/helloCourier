<script src="<?php echo base_url(); ?>resource/assets/libs/jquery/dist/jquery.min.js"></script>
<script>
    // Image validation
    function Checkfiles()
    {
        var fup = document.getElementById('image');
        var fileName = fup.value;
        var input = $("#image");
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if (ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "doc")
        {
            return true;
        }
        else
        {
            confirm("Upload Gif or Jpg images only");
            input.replaceWith(input.val('').clone(true));
        }
    }


</script>
<div class="card">

    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/insertSubInSubCategory" enctype="multipart/form-data">
        <div class="card-body">
            <h4 class="card-title">
                <?php
                if (isset($subcategory_row->sub_in_sub_id)):
                    ?>
                    Edit Sub In Sub Category
                    <?php
                else:
                    ?>
                    Add Sub In Sub Category
                <?php
                endif;
                ?>
            </h4>

            <hr>
            <div class="form-group row">
                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Category Name </label>
                <div class="col-sm-10">
                    <select class="form-control custom-select" name="category_id" id="category_id"  onchange="getSubCategory(this.value);" required="">
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
                <label for="cono1" class="col-sm-2 text-right control-label col-form-label">Sub Category </label>
                <div class="col-sm-10">
<!--                    <select class="form-control" name="sub_cat_id" id="sub_cat_id" style="width: 100%; height:36px;">
                    </select>-->

                    <select class="form-control custom-select" name="sub_cat_id" id="sub_cat_id">
                        <option value="">Select</option>
                        <?php
                        foreach ($subcategoryList as $value):
                            ?>
                            <option value="<?php echo $value->sub_cat_id; ?>"><?php echo $value->sub_cat_name; ?></option>
                            <?php
                        endforeach;
                        ?>

                    </select>
                </div>
            </div>




            <div class="form-group row">
                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Sub In Sub Category Name</label>
                <div class="col-sm-10">
                    <?php
                    if (isset($subcategory_row->sub_in_sub_cat_name)):
                        ?>
                        <input type="text" class="form-control" id="sub_in_sub_cat_name" placeholder="" required="" name="sub_in_sub_cat_name" value="<?php echo $subcategory_row->sub_in_sub_cat_name; ?>">
                        <?php
                    else:
                        ?>
                        <input type="text" class="form-control" id="sub_in_sub_cat_name" placeholder="" required="" name="sub_in_sub_cat_name">
                    <?php
                    endif;
                    ?>

                </div>
            </div>
            <input type="hidden" name="sub_in_sub_id" value="<?php
            if (isset($subcategory_row->sub_in_sub_id)):
                echo $subcategory_row->sub_in_sub_id;
            endif;
            ?>"/>
            <div class="form-group row">
                <label for="cono1" class="col-sm-2 text-right control-label col-form-label">Cover Upload</label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" id="image" onchange="Checkfiles()">

                    <?php
                    if (isset($subcategory_row->image)):
                        ?>
                        <image src="<?php echo base_url(); ?><?php echo $subcategory_row->image; ?>" class="img img-thumbnail" style="height: 200px; width: 250px;">
                        <?php
                    endif;
                    ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="cono1" class="col-sm-2 text-right control-label col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-control custom-select" name="status" id="status" style="width: 100%; height:36px;" required="">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>


            <div class="border-top">
                <div class="card-body">
                    <div align="right">  
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                        <a href="<?php echo base_url(); ?>category/category/getSubInSubCategoryList" style="text-decoration: none;"><button style="margin-top: 10px;" type="button" class="btn btn-danger btn-lg btn-block">Cancel</button></a>

                    </div>
                </div>
            </div>
    </form>
</div>

<script>

    function getSubCategory(category_id)
    {
        // alert(category_id);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>mangement/mangement/getCategoryList',
            data: {
                category_id: category_id
            },
            success: function (response) {
                document.getElementById("sub_cat_id").innerHTML = response;
            }
        });


    }

    $(document).ready(function () {
        var status = '<?php echo $subcategory_row->status; ?>';
        var categoryid = '<?php echo $subcategory_row->category_id; ?>';
        var sub_cat_id = '<?php echo $subcategory_row->sub_cat_id; ?>';
        //alert(categoryid);
        if (status != 'NULL') {
            $("#status").val(status);
        }

        if (categoryid != 'NULL') {
            $("#category_id").val(categoryid);
        }

        if (sub_cat_id != 'NULL') {
            $("#sub_cat_id").val(sub_cat_id);
        }

    });
</script>