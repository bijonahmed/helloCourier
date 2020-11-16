<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>

//
            let modalId = $('#image-gallery');
            $(document)
            .ready(function () {

            loadGallery(true, 'a.thumbnail');
                    //This function disables buttons when needed
                            function disableButtons(counter_max, counter_current) {
                            $('#show-previous-image, #show-next-image')
                                    .show();
                                    if (counter_max === counter_current) {
                            $('#show-next-image')
                                    .hide();
                            } else if (counter_current === 1) {
                            $('#show-previous-image')
                                    .hide();
                            }
                            }

                    /**
                     *
                     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
                     * @param setClickAttr  Sets the attribute for the click handler.
                     */

                    function loadGallery(setIDs, setClickAttr) {
                    let current_image,
                            selector,
                            counter = 0;
                            $('#show-next-image, #show-previous-image')
                            .click(function () {
                            if ($(this)
                                    .attr('id') === 'show-previous-image') {
                            current_image--;
                            } else {
                            current_image++;
                            }

                            selector = $('[data-image-id="' + current_image + '"]');
                                    updateGallery(selector);
                            });
                            function updateGallery(selector) {
                            let $sel = selector;
                                    current_image = $sel.data('image-id');
                                    $('#image-gallery-title')
                                    .text($sel.data('title'));
                                    $('#image-gallery-image')
                                    .attr('src', $sel.data('image'));
                                    disableButtons(counter, $sel.data('image-id'));
                            }

                    if (setIDs == true) {
                    $('[data-image-id]')
                            .each(function () {
                            counter++;
                                    $(this)
                                    .attr('data-image-id', counter);
                            });
                    }
                    $(setClickAttr)
                            .on('click', function () {
                            updateGallery($(this));
                            });
                    }
                    });
// build key actions
                    $(document)
                    .keydown(function (e) {
                    switch (e.which) {
                    case 37: // left
                            if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
                    $('#show-previous-image')
                            .click();
                    }
                    break;
                            case 39: // right
                            if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
                    $('#show-next-image')
                            .click();
                    }
                    break;
                            default:
                            return; // exit this handler for other keys
                    }
                    e.preventDefault(); // prevent the default action (scroll / move caret)
                    });</script>

<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Media File..
    </button>
    <center><font color="red">
        <?php
        $message = $this->session->userdata('msg');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('msg');
        }
        ?> </font></center>
    <hr>
    <!-- Modal -->
    <form id="form1" class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/insertMediaFile" enctype="multipart/form-data">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalLabel"> Update Image.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="card-body">


                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" id="inputFile" class="form-control"/>
                                    <small style="color: red; font-weight: bold;">Must be upload Maximum 2MB</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select class="form-control custom-select" name="status" id="status" style="width: 100%; height:36px;" required="">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <img id="image_upload_preview" class="thumbnail" style="height: 300px; width: 450px; margin-left: -10px;" alt="" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <?php
        foreach ($list as $value) {
            ?>
            <div class="col-lg-4 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="<?php echo base_url(); ?><?php echo $value->image ?>"
                   data-target="#image-gallery">
                    <img class="img-thumbnail" style="width: 100%; height: 80%;"
                         src="<?php echo base_url(); ?><?php echo $value->image ?>"
                         alt="<?php echo $value->name; ?>">
                </a>
                <center><?php echo $value->name; ?><br>
                    <p style="display: none;" class="copyableInput grey49" id="<?php echo $value->media_id; ?>"><?php echo "http://traveltimesbd.com/" . $value->image; ?></p>
                    <button class="copyableInputButton" onclick="copyToClipboard('<?php echo $value->media_id; ?>')">Copy</button>
                </center>
            </div>
            <?php
        }
        ?>




    </div>


    <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="image-gallery-title"></h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                    </button>

                    <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>

                    function copyToClipboard(target) {
                    var element = document.getElementById(target);
                            var text = element.innerHTML;
                            CopyToClipboard(text);
                            alert("Copy Image Url.");
                    }

            function CopyToClipboard (text) {
            // Copies a string to the clipboard. Must be called from within an 
            // event handler such as click. May return false if it failed, but
            // this is not always possible. Browser support for Chrome 43+, 
            // Firefox 42+, Safari 10+, Edge and IE 10+.
            // IE: The clipboard feature may be disabled by an administrator. By
            // default a prompt is shown the first time the clipboard is 
            // used (per session).
            if (window.clipboardData && window.clipboardData.setData) {
            // IE specific code path to prevent textarea being shown while dialog is visible.
            return clipboardData.setData("Text", text);
            } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
            var textarea = document.createElement("textarea");
                    textarea.textContent = text;
                    textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in MS Edge.
                    document.body.appendChild(textarea);
                    textarea.select();
                    try {
                    return document.execCommand("copy"); // Security exception may be thrown by some browsers.
                    } catch (ex) {
            console.warn("Copy to clipboard failed.", ex);
                    return false;
            } finally {
            document.body.removeChild(textarea);
            }
            }
            }

</script>
<script>
            function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();
                    reader.onload = function (e) {
                    $('#image_upload_preview').attr('src', e.target.result);
                    }

            reader.readAsDataURL(input.files[0]);
            }
            }

            $("#inputFile").change(function () {
            readURL(this);
            });
</script>