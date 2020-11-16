<script src="<?php echo base_url(); ?>resource/assets/libs/jquery/dist/jquery.min.js"></script>
<div class="card">
    
    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/insertDesignation">
        <div class="card-body">
            <h4 class="card-title">Add Depatment</h4>
            <hr>
            <div class="form-group row">
                <label for="fname" class="col-sm-1 text-right control-label col-form-label">Name</label>
                <div class="col-sm-11">
                    <?php
                    if (isset($row->designation_name)):
                        ?>
                        <input type="text" class="form-control" id="designation_name" placeholder="" required="" name="designation_name" autofocus="1" value="<?php echo $row->designation_name; ?>">
                        <?php
                    else:
                        ?>
                        <input type="text" class="form-control" id="designation_name" placeholder="" required="" name="designation_name">
                    <?php
                    endif;
                    ?>
                </div>
            </div>
            <input type="hidden" name="designation_id" value="<?php
            if (isset($row)):
                echo $row->designation_id;
            endif;
            ?>"/>

            <div class="form-group row">
                <label for="cono1" class="col-sm-1 text-right control-label col-form-label">Status</label>
                <div class="col-sm-11">
                    <select class="form-control custom-select" name="status" id="status" style="width: 100%; height:36px;" required="">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <div align="right">  
                        <button type="submit" id="savebtn" class="btn btn-primary btn-lg btn-block">Submit</button>
                        <a href="<?php echo base_url(); ?>employee/employee/getdesignationlist" style="text-decoration: none;"><button style="margin-top: 10px;" type="button" class="btn btn-danger btn-lg btn-block">Cancel</button></a>

                    </div>
                </div>
            </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        var status = '<?php echo $row->status; ?>';
        //alert(status);
        if (status != 'NULL') {
            $("#status").val(status);
        }

    });
</script>