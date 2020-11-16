<font color="green">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">Delivery Man Assign To Hub  List </h5>
                    </div>

                   
                </div>

                <div class="row">

                    <div class="col-4">
                        <div align="right">
                            <input type="text" id="name" class="search form-control" placeholder="Search User Name, Phone" autofocus>

                        </div>

                    </div>
                    <div class="col-3">
                        <select class="form-control" id="hubsid" name="hubs_id">
                            <option value="">Select Hubs</option>
                            <?php
                            foreach ($hublist as $value) {
                                ?>
                                <option value="<?php echo $value->hubs_id; ?>"><?php echo $value->hubsname; ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </div>

                    <div class="col-3">
                        <select class="form-control" id="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>

                    </div>

                    <div class="col-2">
                        <button id="myBtn" onclick="filterUser();" class="btn btn-primary"><i class="fa fa-search"></i> </button>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i
                                    class="fa fa-plus"></i> </button>
                    </div>

                </div>

            </div>
            <br>
            <center>
                <div id="loading"></div>
            </center>
            <div id="form-group-item">
                <table class="table" id="item_list" style="width: 100%;">
                    <thead class="thead-primary" style="width: 100%;">
                        <tr>
                          
                            <th>SL</th>
                            <th>Hubs Name</th>
                            <th>Dv Man Name</th>
                            <th>Dv Man Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content animated rollIn">
            <!-- Modal Header -->


            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">
                    <div style="font-size: 15px;" class="modal-title">
                        Delivery Man Assign To Hubs
                    </div>
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal body -->
            <form method="post" action="" id="assigndvman">
                <div class="modal-body">

                    <div class="login-wrap text-center">


                        <span>Select Your Hubs</span>

                        <div class="form-group">
                    <input type="hidden" name="dv_assign_id" id="dv_assign_id"/>
                                    
                            <select class="form-control" name="hubs_id" id="hubs_id" required>
                                <option value="">Select Hubs</option>
                                <?php
                                foreach ($hublist as $value) {
                                    ?>
                                    <option value="<?php echo $value->hubs_id; ?>"><?php echo $value->hubsname; ?>
                                    </option>

                                <?php }; ?>
                            </select>

                        </div>


                        <span>Select Delivery Man</span>

                        <div class="form-group">
                            <select class="form-control" name="user_id" id="user_id" required>
                                <option value="">Select Delivery Man</option>
                                <?php
                                foreach ($dvman as $value) {
                                    ?>
                                    <option value="<?php echo $value->user_id; ?>"><?php echo $value->full_name . '[' . $value->mobile_number . ']'; ?>
                                    </option>

                                <?php }; ?>
                            </select>

                        </div>
                    </div>
                </div>
                <button type="button" id="button" class="btn btn-primary btn-lg btn-block"
                        onclick="storeEntryFrom();">Save
                    & New</button>
            </form>
        </div>
        <!-- Modal footer -->
    </div>
</div>

<script>
    function storeEntryFrom() {

        var hubs_id = $("#hubs_id").val();
        var user_id = $("#user_id").val();

        var dataString = $("#assigndvman").serialize();
        //console.log(dataString);
        if (hubs_id !== '' || user_id !== '') {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo base_url(); ?>mangement/mangement/saveDvmanAssignToHubs",
                data: dataString,
                success: function (data) {
                  alert(data);
                  filterUser();
                  
                }
            });
            return false; //stop the actual form post !important!
        } else {
            alert("Please select Hubs / Delivery Man.");
        }
    }

    $("#name").keyup(function (event) {
        if (event.keyCode === 13) {
            $("#myBtn").click();
        }
    });
    function filterUser() {
        $('#item_list tbody tr').remove();
        var value = $("#name").val();
        var sts = $("#status").val();
        var hubs_id = $("#hubsid").val();
        //console.log(sts);
        var statuss = ['Inactive', 'Active'];
        sl = 1;
        $('#loading').html('<img src="<?php echo base_url(); ?>/resource/admin/assets/images/loading.gif"> loading...');
        $.ajax({
            url: "<?php echo base_url(); ?>/user/user/getDvManlist?name=" + value + "&status=" + sts + "&hubs_id=" + hubs_id,
            type: "GET",
            dataType: 'json',
            success: function (json) {
                $('#loading').html(json);
                $.map(json, function (item) {
                    var id = "item_list" + item.user_id;
                    //$("#cound_id").text(item.userid);
                    var statuss = ['Inactive', 'Active'];
                    html = "<tr id='" + id + "'>";
                    html += "<td class='text-left'>" + sl + "</td>";
                    html += "<td class='text-left'>" + item.hubsname + "</td>";
                    html += "<td class='text-left'>" + item.full_name + "</td>";
                    html += "<td class='text-left'>" + item.mobile_number + "</td>";
                  
                    html += "<td class='text-left'>" + statuss[item.status] + "</td>";
                    html += "<td class='text-left' onclick=getsId(" + item.dv_assign_id + ")>" +'Edit' + "</td>";
                    html += "</tr>";
                    if ($('#' + id).length < 1) {
                        $('#form-group-item #item_list tbody').append(html);
                        sl++;
                    }

                });

            }
        });
    }
    filterUser();
    function getsId(dv_assign_id) {
            $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>user/user/finddvmanIds',
            dataType: 'json',
            data: {
                dv_assign_id: dv_assign_id
            },
            success: function (response) {
              //console.log(response.hubs_id);
             $("#hubs_id").val(response.hubs_id);
             $("#user_id").val(response.user_id);
             $("#dv_assign_id").val(response.dv_assign_id);
            }
        });


        $("#myModal").modal();


    }
</script>