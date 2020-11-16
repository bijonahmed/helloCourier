
<div class="bd-example bd-example-tabs">
    <nav class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="home" aria-expanded="true">User Details</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="profile" aria-expanded="false">Change Password</a>

    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" aria-expanded="true">

            <div class="card">
                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/saveUserRecord" enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-title">Edit User Registration</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fname" placeholder="" required="" name="full_name" autofocus="1" value="<?php echo $user_row->full_name; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Mobile</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="lname" required="" name="mobile_number" value="<?php echo $user_row->mobile_number; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control"  required="" id="lname" name="email" value="<?php echo $user_row->email; ?>">
                            </div>
                        </div>
                   
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-2 text-right control-label col-form-label">User Role</label>
                            <div class="col-sm-10">
                                <select class="" name="role_id" id="role_id" style="width: 100%; height:36px;" required="">
                                    <option value="">Select</option>
                                    <?php
                                    foreach ($userrole as $value):
                                        ?>
                                        <option value="<?php echo $value->role_id; ?>"><?php echo $value->role_name; ?></option>
                                        <?php
                                    endforeach;
                                    ?>

                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-2 text-right control-label col-form-label">User Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="user_name" id="cono1" value="<?php echo $user_row->user_name; ?>" required="">
                                <input type="hidden" class="form-control" name="user_id" id="cono1" value="<?php echo $user_row->user_id; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cono1" class="col-sm-2 text-right control-label col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="" id="status" name="status" style="width: 100%; height:36px;" required="">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="cono1" class="col-sm-2 text-right control-label col-form-label">Photo</label>
                            <div class="col-sm-10">
                                <input type="file" name="image" id="image">
                            </div>
                        </div>


                        <div class="border-top">
                            <div class="card-body">
                                <div align="right">  
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button><br>
                                   <a href="<?php echo base_url();?>user/user/getUserList"><button type="button" onclick="cancelList();" class="btn btn-danger btn-lg btn-block">Cancel</button></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>





        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" aria-expanded="false">
            <div class="card">
                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/updateUserPass">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-1 text-right control-label col-form-label">Password</label>
                            <div class="col-sm-11">
                                <input type="password" class="form-control"  name="password" id="cono1" required="">
                                 <input type="hidden" class="form-control" name="user_id" id="cono1" value="<?php echo $user_row->user_id; ?>">
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <div align="right">  
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button><br>
                                    <a href="<?php echo base_url();?>user/user/getUserList"><button type="button" onclick="cancelList();" class="btn btn-danger btn-lg btn-block">Cancel</button></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    
    <script src="<?php echo base_url(); ?>resource/assets/libs/jquery/dist/jquery.min.js"></script>
    <script>
$(document).ready(function () {
    var statusdata = '<?php echo $user_row->status; ?>';
    $('#status').val(statusdata);
    
    var role_id= '<?php echo $user_row->role_id; ?>';
    $('#role_id').val(role_id);
    
    
});
function cancelList()
{
    var answer = confirm("Are you back ?")
    if (answer) {
        window.location.assign("<?php echo base_url(); ?>dashboard/dashboard");
    }
}
    </script>
    