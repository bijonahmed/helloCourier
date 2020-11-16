<font color="green">
<?php
$message = $this->session->userdata('msg');
if (isset($message)) {
    echo $message;
    $this->session->unset_userdata('msg');
}
?>
</font>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">Merchant List </h5>
                    </div>

                    <div class="col-md-6">
                        <div align="right" style="margin-right: 15px;"><a href="<?php echo base_url(); ?>user/user/create_user"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Create User</button></a></div><br>

                    </div>
                </div>

                <div class="row">

                    <div class="col-5">
                        <div align="right">
                            <input type="text" id="name" class="search form-control" placeholder="Search User Name, Phone, Email,Company" autofocus>

                        </div>

                    </div>
                    <div class="col-3">
                        <select class="form-control" id="role_id" name="role_id">
                            <option value="">Select Role</option>
                            <?php
                            foreach ($userrole as $value) {
                                ?>
                                <option value="<?php echo $value->role_id; ?>"><?php echo $value->role_name; ?></option>
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

                    <div class="col-1">

                        <button id="myBtn" onclick="filterUser();" class="btn btn-primary"><i class="fa fa-search"></i> </button>
                    </div>

                </div>

            </div>
            <br>
            <center>
                <div id="loading"></div>
            </center>
            <div id="form-group-item">
                <table class="table table-hover table-sm table-responsive" id="item_list">
                    <thead class="thead-primary">
                        <tr>
                            <th>#</th>
                            <th>SL</th>
                            <th>User Name</th>
                            <th>Dv Charge</th>
                            <th>Commission</th>
                            <th>Mobile Name</th>
                            <th>Email Name</th>
                            <th>Address</th>
                            <th>Role Name</th>
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

<!-- Large Size Modal -->
<button class="btn btn-primary m-1" data-toggle="modal" data-target="#largesizemodal">Large Size Modal</button>
<!-- Modal -->
<div class="modal fade" id="largesizemodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white"><i class="fa fa-check-square-o"></i>Merchent Dashboard</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <iframe src="<?php echo base_url(); ?>user/user/accessPanel" width="100%" height="100%"></iframe>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>

            </div>
        </div>
    </div>
</div>
<script>
    $("#name").keyup(function (event) {
        if (event.keyCode === 13) {
            $("#myBtn").click();
        }
    });
    function filterUser() {
        $('#item_list tbody tr').remove();
        var value = $("#name").val();
        var sts = $("#status").val();
        var role_id = $("#role_id").val();
        //console.log(sts);
        var statuss = ['Inactive', 'Active'];
        sl = 1;
        $('#loading').html('<img src="<?php echo base_url(); ?>/resource/admin/assets/images/loading.gif"> loading...');
        $.ajax({
            url: "<?php echo base_url(); ?>/user/user/getJsonUser?name=" + value + "&status=" + sts + "&role_id=" + role_id,
            type: "GET",
            dataType: 'json',
            success: function (json) {
                $('#loading').html(json);
                $.map(json, function (item) {
                    var id = "item_list" + item.user_id;
                    //$("#cound_id").text(item.userid);
                    var statuss = ['Inactive', 'Active'];
                    var html = "<tr id='" + id + "'>";
                    html += "<td class='text-center'><a class='btn-primary text-center' href='<?php echo base_url(); ?>user/user/edit_user_frm/" + item.user_id + "'><div style='color: black; font-weight: bold;'>EDIT</div></a><a class='btn-primary text-center'></a></td>";
                    html += "<td style='width: 1%;'>" + sl + "</td>";
                    if (item.user_id == 52) {
                        html += "<td style='background-color: red; color: white;' class='text-left'>" + item.full_name + '[<b>' + item.company + '</b>]' + "</td>";
                    } else {
                        html += "<td class='text-left'>" + item.full_name + '[<b>' + item.company + '</b>]' + "</td>";
                    }

                    html += "<td class='text-left'>" + item.dvcharge + "</td>";
                    if (item.commission === 'undefined') {
                        html += "<td class='text-left'>" + '0' + "</td>";
                    } else {
                        html += "<td class='text-left'>" + item.commission + '%' + "</td>";
                    }
                    html += "<td class='text-left'>" + item.mobile_number + "</td>";
                    html += "<td class='text-left'>" + item.email + "</td>";
                    html += "<td class='text-left'>" + item.address + "</td>";
                    html += "<td class='text-left'>" + item.role_name + "</td>";
                    html += "<td class='text-left'>" + statuss[item.status] + "</td>";
                    html += "<td class='text-center'><a class='btn-primary text-center' href='<?php echo base_url(); ?>user/user/edit_user_frm/" + item.user_id + "'><div style='color: black;'><i class='zmdi zmdi-edit'> Edit</i></div></a></td>";
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


    function getId(user_id) {
        //alert(user_id);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>user/user/accessPanelForAdmin',
            data: {
                user_id: user_id
            },
            success: function (response) {
                alert("working");
                //document.getElementById("deliverytype_id").innerHTML = response;
            }
        });


        $("#largesizemodal").modal();


    }
</script>