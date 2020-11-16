<script src="<?php echo base_url(); ?>resource/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
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
    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/updateLeadPost" enctype="multipart/form-data">
        <div class="card-body">
            <h4 class="card-title">
                <?php
                if (isset($post_row->lead_news_id)):
                    ?>
                    Edit Post
                    <?php
                else:
                    ?>
                    Add Post 
                <?php
                endif;
                ?>
            </h4>

            <hr>
            <div class="form-group row">
                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Category Name </label>
                <div class="col-sm-10">
                    <select class="form-control custom-select" name="category_id" id="category_id" style="width: 100%; height:36px;" required="" onChange="ShowSubCategory(this.value);">
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
                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Sub Category Name</label>
                <div class="col-sm-10">

                    <?php
                    if (isset($post_row->sub_cat_id)):
                        ?>

                        <select class="custom-select" name="sub_cat_id" id="sub_cat_id" style="width: 100%; height:36px;">
                            <option value="">-Select-</option>
                            <?php
                            foreach ($subcategory as $value):
                                ?>
                                <option value="<?php echo $value->sub_cat_id; ?>"><?php echo $value->sub_cat_name; ?></option>
                                <?php
                            endforeach;
                            ?>

                        </select>


                        <?php
                    else:
                        ?>
                        <select class="form-control custom-select" name="sub_cat_id" id="sub_cat_id" style="width: 100%; height:36px;">
                        </select>
                    <?php
                    endif;
                    ?>




                </div>
            </div>
            <div class="form-group row">
                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Post Title</label>
                <div class="col-sm-10">
                    <?php
                    if (isset($post_row->post_title)):
                        ?>
                        <input type="text" class="form-control" id="post_title" placeholder="" required="" name="post_title" value="<?php echo $post_row->post_title; ?>">
                        <?php
                    else:
                        ?>
                        <input type="text" class="form-control" id="post_title" placeholder="" required="" name="post_title">
                    <?php
                    endif;
                    ?>

                </div>
            </div>

            <div class="form-group row">
                <label for="fname" class="col-sm-2 text-right control-label col-form-label">News Description</label>
                <div class="col-sm-10">
                    <?php
                    if (isset($post_row->post_description)):
                        ?>
                        <textarea name="post_description" class="form-control"><?php echo $post_row->post_description; ?></textarea> 
                        <?php
                    else:
                        ?>
                        <textarea name="post_description" class="form-control"></textarea>
                    <?php
                    endif;
                    ?>

                </div>
            </div>


            <input type="hidden" name="lead_news_id" value="<?php
            if (isset($post_row->lead_news_id)):
                echo $post_row->lead_news_id;
            endif;
            ?>"/>

            <div class="form-group row">
                <label for="cono1" class="col-sm-2 text-right control-label col-form-label">Photo Upload</label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" id="image" onchange="Checkfiles()">

                    <?php
                    if (isset($post_row->image)):
                        ?>
                        <image src="<?php echo base_url(); ?><?php echo $post_row->image; ?>" class="img img-thumbnail" style="height: 200px; width: 250px;">
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
                        <a href="<?php echo base_url(); ?>post/post/post_list" style="text-decoration: none;"><button style="margin-top: 10px;" type="button" class="btn btn-danger btn-lg btn-block">Cancel</button></a>

                    </div>
                </div>
            </div>
    </form>
</div>

<script>
    function ShowSubCategory(category_id)
    {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>mangement/mangement/getSubCategory',
            data: {
                category_id: category_id
            },
            success: function (response) {
                document.getElementById("sub_cat_id").innerHTML = response;
            }
        });


    }
    $(document).ready(function () {
        var status = '<?php
                    if (isset($post_row->status)) {
                        echo $post_row->status;
                    }
                    ?>';
        var categoryid = '<?php
                    if (isset($post_row->category_id)) {
                        echo $post_row->category_id;
                    }
                    ?>';

        var sub_cat_id = '<?php
                    if (isset($post_row->sub_cat_id)) {
                        echo $post_row->sub_cat_id;
                    }
                    ?>';

        //alert(sub_cat_id);

        if (status != "NULL") {
            $("#status").val(status);
        }
        if (categoryid != "NULL") {
            $("#category_id").val(categoryid);
        }
        if (categoryid != "NULL") {
            $("#sub_cat_id").val(sub_cat_id);
        }
    });
</script>

<script>
    CKEDITOR.replace('post_description');
</script>
