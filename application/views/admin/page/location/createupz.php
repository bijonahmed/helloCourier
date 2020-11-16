<div class="card">
    <center><font color="red">
        <?php
        $message = $this->session->userdata('msg');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('msg');
        }
        ?> </font></center>


    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/saveUpz">
        <div class="card-body">
            <h4 class="card-title">Upz/Area </h4>
            <hr>
            <div class="form-group row">
                <label for="email1" class="col-sm-1 text-right control-label col-form-label">Division</label>
                <div class="col-sm-11">
                    <select class="select2 form-control custom-select" name="division_id" id="division_id" style="width: 100%; height:36px;" required="" onChange="getDistrictList(this.value);">
                        <option value="">Select</option>
                        <?php
                        foreach ($divisionList as $value):
                            ?>
                            <option value="<?php echo $value->division_id; ?>"><?php echo $value->division_name; ?></option>
                            <?php
                        endforeach;
                        ?>

                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="cono1" class="col-sm-1 text-right control-label col-form-label">District </label>
                <div class="col-sm-11">
                    <select class="select2 form-control custom-select" name="district_id" id="district_id" style="width: 100%; height:36px;">
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="fname" class="col-sm-1 text-right control-label col-form-label">Upz/Area Name</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" id="upozilla_name" placeholder="" required="" name="upozilla_name" autofocus="1">
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


    function getDistrictList(divisionId)
    {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>mangement/mangement/getdistrictList',
            data: {
                divisionId: divisionId
            },
            success: function (response) {
                document.getElementById("district_id").innerHTML = response;
            }
        });


    }
    function cancelList()
    {
        var answer = confirm("Are you back ?")
        if (answer) {
            window.location.assign("<?php echo base_url(); ?>location/location/upz_list");
        }
    }
</script>