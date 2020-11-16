<script src="<?php echo base_url(); ?>resource/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
<script>
    // Image validation
    function Checkfiles()
    {

        var fup = document.getElementById('fileUpload');
        var fileName = fup.value;
        var input = $("#fileUpload");
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if (ext == "png" || ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "doc")
        {
            return true;
        }
        else
        {
            confirm("Upload Gif or Jpg images only");
            input.replaceWith(input.val('').clone(true));
        }
    }
    /*
     function validationImage() {
     
     var fileUpload = $("#fileUpload")[0];
     var input = $("#fileUpload");
     //Check whether HTML5 is supported.
     if (typeof (fileUpload.files) != "undefined") {
     //Initiate the FileReader object.
     var reader = new FileReader();
     //Read the contents of Image File.
     reader.readAsDataURL(fileUpload.files[0]);
     reader.onload = function (e) {
     //Initiate the JavaScript Image object.
     var image = new Image();
     //Set the Base64 string return from FileReader as source.
     image.src = e.target.result;
     image.onload = function () {
     //Determine the Height and Width.
     var height = this.height;
     var width = this.width;
     if (height > 403 || width > 1012) {
     alert("Height 403px and Width 1012px not image dimenstion.");
     input.replaceWith(input.val('').clone(true));
     return false;
     }
     //alert("valid");
     return true;
     };
     }
     } else {
     alert("This browser does not support HTML5.");
     return false;
     }
     }
     */
</script>
<div class="card">
    <center><font color="red">
        <?php
        $message = $this->session->userdata('msg');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('msg');
        }
        ?> </font></center>
    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/updatePackagesGallery" enctype="multipart/form-data">
        <div class="card-body">
            <h4 class="card-title">
                <?php
                if (isset($galleryRow->gallery_id)):
                    ?>
                    Edit Package Gallery
                    <?php
                else:
                    ?>
                    Add Package Gallery
                <?php
                endif;
                ?>
            </h4>

            <hr>
            <div class="form-group row">
                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Pack.Category </label>
                <div class="col-sm-10">
                    <select class="form-control custom-select" name="sub_cat_id" id="sub_cat_id" style="width: 100%; height:36px;" onchange="getCheckSubInSub(this.value);" required="">
                        <option value="">Select</option>
                        <?php
                        foreach ($subCatList as $value):
                            ?>
                            <option value="<?php echo $value->sub_cat_id; ?>"><?php echo $value->sub_cat_name; ?></option>
                            <?php
                        endforeach;
                        ?>

                    </select>

                </div>
            </div>

            <div class="form-group row">
                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Pack.Sub Category </label>
                <div class="col-sm-10">
                    <select class="form-control custom-select" name="sub_in_sub_id" id="sub_in_sub_id" style="width: 100%; height:36px;" required="">
                        <option value="">Select</option>
                        <?php
                        foreach ($subInSubcategoryList as $value):
                            ?>
                            <option value="<?php echo $value->sub_in_sub_id; ?>"><?php echo $value->sub_in_sub_cat_name; ?></option>
                            <?php
                        endforeach;
                        ?>

                    </select>

                </div>
            </div>


            <div class="form-group row">
                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Photo Name</label>
                <div class="col-sm-10">
                    <?php
                    if (isset($galleryRow->photo_name)):
                        ?>
                        <input type="text" class="form-control" id="photo_name" placeholder="" required="" name="photo_name" value="<?php echo $galleryRow->photo_name; ?>">
                        <?php
                    else:
                        ?>
                        <input type="text" class="form-control" id="photo_name" placeholder="" required="" name="photo_name">
                    <?php
                    endif;
                    ?>

                </div>
            </div>

            <div class="form-group row">
                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Photo Short Description</label>
                <div class="col-sm-10">
                    <?php
                    if (isset($galleryRow->photo_short_details)):
                        ?>
                        <textarea class="form-control" required="" name="photo_short_details"><?php echo $galleryRow->photo_short_details; ?></textarea>
                        <?php
                    else:
                        ?>
                        <textarea class="form-control" required="" name="photo_short_details"></textarea>
                    <?php
                    endif;
                    ?>

                </div>
            </div>


            <input type="hidden" name="gallery_id" value="<?php
            if (isset($galleryRow->gallery_id)):
                echo $galleryRow->gallery_id;
            endif;
            ?>"/>



            <div class="form-group row">
                <label for="cono1" class="col-sm-2 text-right control-label col-form-label">Photo Upload</label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" id="fileUpload" onchange="Checkfiles();
                            validationImage();">
                    <div style="color: red;"><small>Please upload image heigh 403px and Width 1012px</small></div>
                    <?php
                    if (isset($galleryRow->image)):
                        ?>
                        <image src="<?php echo base_url(); ?><?php echo $galleryRow->image; ?>" class="img img-thumbnail" style="height: 200px; width: 250px;">
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
                        <a href="<?php echo base_url(); ?>package/package/add_package" style="text-decoration: none;"><button style="margin-top: 10px;" type="button" class="btn btn-danger btn-lg btn-block">Cancel</button></a>

                    </div>
                </div>
            </div>
    </form>
</div>
<script>
    function getCheckSubInSub(sub_cat_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>mangement/mangement/getSubInSubList',
            data: {
                sub_cat_id: sub_cat_id
            },
            success: function (response) {
                document.getElementById("sub_in_sub_id").innerHTML = response;
            }
        });

    }
</script>
<script>

    $(document).ready(function () {
        var status = '<?php echo $galleryRow->status; ?>';
        var sub_cat_id = '<?php echo $galleryRow->sub_cat_id; ?>';
        var sub_in_sub_id = '<?php echo $galleryRow->sub_in_sub_id; ?>';

        //alert(categoryid);
        if (status != 'NULL') {
            $("#status").val(status);
        }

        if (sub_cat_id != 'NULL') {
            $("#sub_cat_id").val(sub_cat_id);
        }

        if (sub_cat_id != 'NULL') {
            $("#sub_in_sub_id").val(sub_in_sub_id);
        }

    });


</script>
<script>
    CKEDITOR.replace('details');
</script>