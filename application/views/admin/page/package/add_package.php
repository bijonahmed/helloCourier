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
<center><font color="red">
    <?php
    $message = $this->session->userdata('msg');
    if (isset($message)) {
        echo $message;
        $this->session->unset_userdata('msg');
    }
    ?> </font></center>
<div class="card">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php
                if (isset($packageRow->package_id)):
                    ?>
                    Edit Package
                    <?php
                else:
                    ?>
                    &nbsp;&nbsp;Add Package
                <?php
                endif;
                ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Package Gallery</a>
        </li>

    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <br>


            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/insertPackage">

                
                <?php
                //for edit
                if(!empty($packageRow->package_id)){
                ?>
                
                 <div class="form-group row">
                    <label for="fname" class="col-sm-2 text-right control-label col-form-label">Pack. Category </label>
                    <div class="col-sm-10">
                        <select class="form-control custom-select" name="sub_cat_id" id="edit_sub_cat_id" style="width: 100%; height:36px;" required="">
                           
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
                        <select class="form-control custom-select" name="sub_in_sub_id" id="edit_sub_in_sub_id" style="width: 100%; height:36px;" required="">
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
                
                <?php
                } else{
                ?>
                
                 <div class="form-group row">
                    <label for="fname" class="col-sm-2 text-right control-label col-form-label">Pack. Category </label>
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
                
                <?php
                }
                ?>
               


                <div class="form-group row">
                    <label for="fname" class="col-sm-2 text-right control-label col-form-label">Overview & Details </label>
                    <div class="col-sm-10">
                        <?php
                        if (isset($packageRow->overview)):
                            ?>
                            <textarea class="form-control" required="" id="overview" name="overview"><?php echo $packageRow->overview; ?></textarea>
                            <?php
                        else:
                            ?>
                            <textarea class="form-control" required="" id="overview" name="overview"></textarea>
                        <?php
                        endif;
                        ?>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-2 text-right control-label col-form-label">Package Details</label>
                    <div class="col-sm-10">
                        <?php
                        if (isset($packageRow->details)):
                            ?>
                            <textarea name="details" id="details" class="form-control"><?php echo $packageRow->details; ?></textarea> 
                            <?php
                        else:
                            ?>

                            <textarea name="details" id="details" class="form-control"></textarea> 
                        <?php
                        endif;
                        ?>

                    </div>
                </div>
                <input type="hidden" name="package_id" value="<?php
                if (isset($packageRow->package_id)):
                    echo $packageRow->package_id;
                endif;
                ?>"/>




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
                            <a href="<?php echo base_url(); ?>package/package/" style="text-decoration: none;"><button style="margin-top: 10px;" type="button" class="btn btn-danger btn-lg btn-block">Cancel</button></a>

                        </div>
                    </div>
                </div>


            </form>



        </div>

        <!---------------------------------------------------------Gallery--------------------------------------->


        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/insertPackageGalleryPackages" enctype="multipart/form-data">
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
                            <select class="form-control custom-select" name="sub_cat_id" id="sub_cat_id" style="width: 100%; height:36px;" onchange="getGalleryCheckSubInSub(this.value);" required="">
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
                            <select class="form-control custom-select" name="sub_in_sub_id" id="subinsubid" style="width: 100%; height:36px;" required="">
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
                                <a href="<?php echo base_url(); ?>gallery/gallery/" style="text-decoration: none;"><button style="margin-top: 10px;" type="button" class="btn btn-danger btn-lg btn-block">Cancel</button></a>

                            </div>
                        </div>
                    </div>
            </form>






            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Pack. Category Name</th>
                        <th>Photo name</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($galleryList as $value):
                        ?>
                        <tr>
                            <td><?php echo $value->sub_cat_name; ?></td>
                            <td><?php echo $value->photo_name; ?></td>
                            <td><img src="<?php echo base_url(); ?><?php echo $value->image; ?>" class="img img-thumbnail" style="height: 150px; width: 50%;"/></td>
                            <td>
                                <?php
                                if ($value->status == "1"):
                                    echo "<div style='color: black;'>" . 'Active' . "</div>";
                                else:
                                    echo "<div style='background-color: red; color: white;'>" . 'Inactive' . "</div>";
                                endif;
                                ?></td>
                            <td><a href="<?php echo base_url(); ?>gallery/gallery/edit_galleryfrm/<?php echo $value->gallery_id; ?>" target="_blank"><button type="button" class="btn btn-primary">Edit</button></a>


                        </tr>
                        <?php
                    endforeach;
                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Sub Category Name</th>
                        <th>Photo name</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>  





        </div>


    </div>
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

    function getGalleryCheckSubInSub(sub_cat_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>mangement/mangement/getSubInSubList',
            data: {
                sub_cat_id: sub_cat_id
            },
            success: function (response) {
                document.getElementById("subinsubid").innerHTML = response;
            }
        });

    }

</script>
<script>

    $(document).ready(function () {
        var status = '<?php echo $packageRow->status; ?>';
        var sub_cat_id = '<?php echo $packageRow->sub_cat_id; ?>';
        var sub_in_sub_id = '<?php echo $packageRow->sub_in_sub_id; ?>';

        if (status != 'NULL') {
            $("#status").val(status);
        }

        if (sub_cat_id != 'NULL') {
            $("#edit_sub_cat_id").val(sub_cat_id);
        }
        
          if (sub_cat_id != 'NULL') {
            $("#edit_sub_in_sub_id").val(sub_in_sub_id);
        }

    });


</script>
<script>
    CKEDITOR.replace('details');
    CKEDITOR.replace('overview');
</script>
