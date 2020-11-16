<center><font color="red">
    <?php
    $message = $this->session->userdata('msg');
    if (isset($message)) {
        echo $message;
        $this->session->unset_userdata('msg');
    }
    ?> </font></center>
<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <h5 class="card-title">Package List</h5>              
            </div>

            <div class="col-md-6">
                <div align="right" style="margin-right: 15px;"><a href="<?php echo base_url(); ?>package/package/add_package"><button type="button" class="btn btn-primary">Add New Package</button></a></div><br>
            </div>


        </div>

        <div class="table-responsive">
            <table id="zero_config" class="table table-hover">
                <thead>
                    <tr>
                        <th>Pack. Category Name</th>
                          <th>Pack. Sub Category Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($packageList as $value):
                        ?>
                        <tr>
                            <td><?php echo $value->sub_cat_name; ?></td>
                              <td><?php echo $value->sub_in_sub_cat_name; ?></td>
                            <td>
                                <?php
                                if ($value->status == "1"):
                                    echo "<div style='color: black;'>" . 'Active' . "</div>";
                                else:
                                    echo "<div style='background-color: red; color: white;'>" . 'Inactive' . "</div>";
                                endif;
                                ?></td>
                            <td><a href="<?php echo base_url(); ?>package/package/edit_package_frm/<?php echo $value->package_id; ?>"><button type="button" class="btn btn-primary">Edit</button></a>


                        </tr>
                        <?php
                    endforeach;
                    ?>

                </tbody>
                <tfoot>
                    <tr>
                       <th>Pack. Category Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>

