<script src="<?php echo base_url(); ?>resource/assets/libs/jquery/dist/jquery.min.js"></script>
<script>
    // Image validation
    function Checkfiles()
    {
        var fup = document.getElementById('fileUpload');
        var input = $("#fileUpload");
        var fileName = fup.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if (ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "doc")
        {
            return true;
        } else
        {
            confirm("Upload Gif or Jpg images only");
            input.replaceWith(input.val('').clone(true));
        }
    }

    function _validationImage() {

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
                    if (height > 461 || width > 1042) {
                        alert("Height 461px and Width 1042px not image dimenstion.");
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


</script>
<div class="card">
    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/insertSlider" enctype="multipart/form-data" >
        <div class="card-body">
            <?php
            if (isset($slider_row->title)):
                ?>
                <h4 class="card-title">Edit Slider</h4>
                <?php
            else:
                ?>
                <h4 class="card-title">Add Slider</h4>
            <?php
            endif;
            ?>
            <hr>
            <div class="form-group row">
                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Slider Title</label>
                <div class="col-sm-10">
                    <?php
                    if (isset($slider_row->title)):
                        ?>
                        <input type="text" class="form-control" id="title" placeholder="" required="" name="title" autofocus="1" value="<?php echo $slider_row->title; ?>">
                        <?php
                    else:
                        ?>
                        <input type="text" class="form-control" id="title" placeholder="" required="" name="title" autofocus="1">
                    <?php
                    endif;
                    ?>
                </div>
            </div>



            <div class="form-group row">
                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Sort</label>
                <div class="col-sm-10">
                    <?php
                    if (isset($slider_row->sort)):
                        ?>
                        <input type="text" class="form-control" id="sort" placeholder="" name="sort" autofocus="1" value="<?php echo $slider_row->sort; ?>">
                        <?php
                    else:
                        ?>
                        <input type="text" class="form-control" id="sort" placeholder="" name="sort" autofocus="1">
                    <?php
                    endif;
                    ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Slider Description</label>
                <div class="col-sm-10">
                    <?php
                    if (isset($slider_row->title)):
                        ?>
                        <input type="text" class="form-control" id="description" placeholder="" required="" name="description" autofocus="1" value="<?php echo $slider_row->description; ?>">
                        <?php
                    else:
                        ?>
                        <input type="text" class="form-control" id="description" placeholder="" required="" name="description" autofocus="1">
                    <?php
                    endif;
                    ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="cono1" class="col-sm-2 text-right control-label col-form-label">Photo Upload</label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" id="fileUpload" onchange="Checkfiles();validationImage();">
                    <small style="color: red;">Please upload image heigh 2517 x 903 px</small><br>

                    <?php
                    if (isset($slider_row->image)):
                        ?>
                        <image src="<?php echo base_url(); ?><?php echo $slider_row->image; ?>" class="img img-thumbnail" style="height: 200px; width: 250px;">
                        <?php
                    endif;
                    ?>
                </div>
            </div>



            <input type="hidden" name="slider_id" value="<?php
                    if (isset($slider_row)):
                        echo $slider_row->slider_id;
                    endif;
                    ?>"/>

            <div class="form-group row">
                <label for="cono1" class="col-sm-2 text-right control-label col-form-label">Slider Status</label>
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
                        <button type="submit" id="upload" class="btn btn-primary btn-lg btn-block">Submit</button>
                        <a href="<?php echo base_url(); ?>slider/slider" style="text-decoration: none;"><button style="margin-top: 10px;" type="button" class="btn btn-danger btn-lg btn-block">Cancel</button></a>

                    </div>
                </div>
            </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        var status = '<?php echo $slider_row->status; ?>';
        //alert(status);
        if (status != 'NULL') {
            $("#status").val(status);
        }

    });
</script>