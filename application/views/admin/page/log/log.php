
<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <h5 class="card-title">Log List</h5>              
            </div>



        </div>

        <div class="table-responsive">
            <table id="zero_config" class="table table-hover">
                <thead>
                    <tr style="background-color: black;color: white; font-weight: bold;">
                        <th>User Name</th>
                        <th>Action</th>
                        <th>Details</th>
                        <th>Date & Time</th>
                        <th>IP</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($log_list as $value):
                        ?>

                        <?php if ($value->action == "Failed"): ?>
                            <tr style="background-color: red; color: white;">
                                <td><?php echo ""; ?></td>
                                <td><?php echo $value->action; ?></td>
                                <td><?php echo $value->details; ?></td>
                                <td><?php echo $value->date_time; ?></td>
                                <td><?php echo $value->ip; ?></td>
                            </tr>
                            <?php
                        else:
                            ?>
                            <tr style="background-color: green; color: white;">
                                <td><?php echo $value->full_name; ?></td>
                                <td><?php echo $value->action; ?></td>
                                <td><?php echo $value->details; ?></td>
                                <td><?php echo $value->date_time; ?></td>
                                <td><?php echo $value->ip; ?></td>
                            </tr>

                        <?php
                        endif;
                        ?>
                        <?php
                    endforeach;
                    ?>

                </tbody>
                <tfoot>
                    <tr style="background-color: black;color: white; font-weight: bold;">
                        <th>User Name</th>
                        <th>Action</th>
                        <th>Details</th>
                        <th>Date & Time</th>
                        <th>IP</th>

                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>
