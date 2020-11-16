<style>
.upload-btn-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
}
.btn {
    border: 2px solid gray;
    color: gray;
    background-color: white;
    padding: 8px 20px;
    border-radius: 8px;
    font-size: 20px;
    font-weight: bold;
}
.upload-btn-wrapper input[type=file] {
    font-size: 100px;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
}
</style>

<div class="modal" id="updateUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Profile</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="tabs">
                    <ul>
                        <li><a href="#tabs-1">Profile</a></li>
                        <li><a href="#tabs-2">Change Password</a></li>
                    </ul>
                    <div id="tabs-1">
                        <div class="login-wrap text-center">
                            <form method="post" action="<?php echo base_url(); ?>marchent/update_user" id="user_row"
                                enctype="multipart/form-data">
                                <div class="login-form clrbg-before">
                                    <span>Name</span>
                                    <div class="form-group">
                                        <input type="text" placeholder=" Name" name="full_name" class="form-control"
                                            required="" value="<?php echo $user_row->full_name; ?>">
                                        <input type="hidden" name="user_id" class="form-control"
                                            value="<?php echo $user_row->user_id; ?>">
                                    </div>
                                    <span>Company</span>
                                    <div class="form-group">
                                        <input type="text" placeholder="Company" name="company" class="form-control"
                                            required="" value="<?php echo $user_row->company; ?>">
                                    </div>
                                    <span>Mobile</span>
                                    <div class="form-group"><input type="text" placeholder=" Address"
                                            name="mobile_number" required="" class="form-control"
                                            required="" value="<?php echo $user_row->mobile_number; ?>"></div>
                                    <span> Email ID </span>
                                    <div class="form-group"><input type="text" placeholder="email" name="email"
                                            class="form-control" required="" value="<?php echo $user_row->email; ?>">
                                    </div>
                         
                                     
                                    <span> Address</span>
                                    <div class=" form-group"><input type="text" placeholder="address" name="address"
                                            class="form-control" value="<?php echo $user_row->address; ?>"></div>
                                    <span> Username </span>
                                    <div class="form-group">
                                        <input type="text" placeholder="user_name" name="user_name" class="form-control"
                                            value="<?php echo $user_row->user_name; ?>"></div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                    name="image">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                    Photo</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="tabs-2">
                        <form method="post" action="<?php echo base_url(); ?>marchent/update_user" id="user_row"
                            enctype="multipart/form-data">
                            <div class="login-form clrbg-before">
                                <span>New Password</span>
                                <div class="form-group">
                                    <input type="password" placeholder=" Enter your New Password" name="password" class="form-control"
                                        required="">
                                    <input type="hidden" name="user_id" class="form-control"
                                        value="<?php echo $user_row->user_id; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            <!-- Modal footer -->
        </div>
    </div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(function() {
    $("#tabs").tabs();
    $('#updateUser').modal('show');
});
</script>
<script src="<?php echo base_url(); ?>resource/merchent/assets/js/core/jquery.min.js"></script>