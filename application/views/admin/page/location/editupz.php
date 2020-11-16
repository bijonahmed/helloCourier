<div class="card">
    <center><font color="red">
        <?php
        $message = $this->session->userdata('msg');
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('msg');
        }
        ?> </font></center>


    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/UpdateUpz">
        <div class="card-body">
            <h4 class="card-title">Upz/Area </h4>
            <hr>
              <div class="form-group row">
                            <label for="email1" class="col-sm-1 text-right control-label col-form-label">Division</label>
                            <div class="col-sm-11">
                                <select class="" name="division_id" id="division_id" style="width: 100%; height:36px;" required="" onChange="getDistrictList(this.value);">
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
                     <select class="" name="district_id" id="district_id" style="width: 100%; height:36px;">
                                    <option value="">Select</option>
                                    <?php
                                    foreach ($districtList as $value):
                                        ?>
                                        <option value="<?php echo $value->district_id; ?>"><?php echo $value->district_name; ?></option>
                                        <?php
                                    endforeach;
                                    ?>

                                </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="fname" class="col-sm-1 text-right control-label col-form-label">Upz/Area Name</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" id="upozilla_name" placeholder="" required="" name="upozilla_name" autofocus="1" value="<?php echo $upz_row->upozilla_name;?>">
                    <input type="hidden" class="form-control" id="upozilla_name" placeholder="" required="" name="upozilla_id" autofocus="1" value="<?php echo $upz_row->upozilla_id;?>">
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
    <script src="<?php echo base_url(); ?>resource/assets/libs/jquery/dist/jquery.min.js"></script>
<script>
    
    $(document).ready(function () {
  
    var district_id = <?php echo $upz_row->district_id; ?>;
      $('#district_id').val(district_id);

    var division_id = <?php echo $upz_row->division_id; ?>;
    $('#division_id').val(division_id);

});


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