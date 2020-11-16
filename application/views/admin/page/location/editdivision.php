<div class="card">
    <center><font color="red">
        <?php
        $message = $this->session->userdata('msg');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('msg');
        }
        ?> </font></center>


    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/updateDivision">
        <div class="card-body">
            <h4 class="card-title">Edit Division </h4>
            <div class="form-group row">
                <label for="fname" class="col-sm-1 text-right control-label col-form-label">Division Name</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" id="division_name" placeholder="" required="" value="<?php echo $division_row->division_name;?>" name="division_name" autofocus="1">
                    <input type="hidden" class="form-control" id="division_name" placeholder="" required="" value="<?php echo $division_row->division_id;?>" name="division_id" autofocus="1">
                </div>
            </div>
            
        </div>
        <div class="border-top">
            <div class="card-body">
                <div align="right">  
                    <button type="submit" id="savebtn" class="btn btn-primary btn-lg btn-block">Submit</button>
                    <button type="button" onclick="cancelList();" class="btn btn-danger btn-lg btn-block">Cancel</button>

                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function cancelList()
{
    var answer = confirm("Are you back ?")
    if (answer) {
        window.location.assign("<?php echo base_url(); ?>location/location/division_list");
    }
}
    </script>