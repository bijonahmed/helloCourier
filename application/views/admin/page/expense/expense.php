<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" style="background-color: green;">
                        <h5 class="card-title" style="color: white;">Expense</h5>
                    </div>
                </div>
                <br>
                <form method="post" action="#">
                    <div class="row">
                        <div class="col-sm">
                            <input type="text" name="from_date" id="from_date" placeholder="From Date" required=""
                                autocomplete="off" style="width: 100%;">
                        </div>
                        <div class="col-sm">
                            <input type="text" name="to_date" id="to_date" placeholder="To Date" required=""
                                autocomplete="off" style="width: 100%;">
                        </div>
                        <div class="col-sm">
                            <select name="categoryid" id="categoryid" style="width: 100%;"
                                onchange="getsubCategorySearch(this.value)">
                                <option value="">Select Category </option>
                                <?php
                            foreach ($category as $value):
                                ?>
                                <option value="<?php echo $value->category_id; ?>"
                                    style="background-color: <?php echo $value->category_name; ?>; color: green;">
                                    <?php echo $value->category_name; ?></option>
                                <?php
                            endforeach;
                            ?>
                            </select>
                        </div>
                        <!-- <div class="col-sm">
                            <select name="subcatid" id="subcatid" style="width: 100%;">
                                <option value="">Select Sub Category</option>
                            </select>
                        </div> -->
                        <div class="col-sm">
                            <select name="hubsId" id="hubsId" style="display:none;">
                                <option value="">Select Hubs </option>
                                <?php
                            foreach ($hublist as $value):
                                ?>
                                <option value="<?php echo $value->hubs_id; ?>">
                                    <?php echo $value->hubsname; ?></option>
                                <?php
                            endforeach;
                            ?>
                            </select>
                        </div>

                        <div class="col-sm">
                            <button type="button" class="btn btn-primary btn-block" onclick="filter();"><i
                                    class="fa fa-search"></i>
                        </div>
                        <div class="col-sm">
                            <button type="button" class="btn btn-primary btn-block" onclick="addExpenses();"><i
                                    class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <p id="totalAmunt" style="text-align: right; color: green; font-size: 20px; font-weight: bold;">
                        </p>
                    </div>
                </div>
                <div id="form-group-item" style="width:100%; height:450px; overflow:auto; ">

                    <table class="table table-hover table-sm" id="item_list">
                        <thead class="thead-primary" style="background-color:#6f046e; color:white;">
                            <tr>
                                <td style="width: 5px;">S.L</td>
                                <td class="text-left">Date</td>
                                <td class="text-left">Category</td>
                                <!-- <td class="text-left">Sub Category</td> -->
                                <td class="text-left">Customer Name</td>
                                <td class="text-left">Employee Name</td>
                                <td class="text-left">Hubs</td>
                                <td class="text-left">Amount</td>
                                <td class="text-left">Description</td>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="myModal">
                <div class="modal-dialog center modal-lg">
                    <div class="modal-content animated">
                        <!-- Modal Header -->
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white">
                                <div style="font-size: 15px;" class="modal-title">
                                    Expense
                                </div>
                            </h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form method="post" action="" id="expense">
                            <div class="row" style="padding: 5px;">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="uname" style="color: green;font-weight: bold;">Entry Date:</label>
                                        <input type="text" name="date" id="date" value="<?php echo date("d-m-Y"); ?>"
                                            style="width: 100%;">
                                    </div>
                                    <div class="form-group">
                                        <label for="uname" style="color: green;font-weight: bold;">Category:</label>
                                        <select name="category_id" id="category_id" required="" style="width: 100%;"
                                            onChange="getsubCategory(this.value);">
                                            <option value="">Select Category </option>
                                            <?php
                            foreach ($category as $value):
                                ?>
                                            <option value="<?php echo $value->category_id; ?>"
                                                style="background-color: <?php echo $value->category_name; ?>; color: green;">
                                                <?php echo $value->category_name; ?></option>
                                            <?php
                            endforeach;
                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group" id="employee" style="display: none;">
                                        <label for="uname" style="color: green;font-weight: bold;">
                                            Employee:</label>
                                        <select class="employee" name="employeeid" id="employeeid" style="width: 100%;">
                                            <option value="">All Employee</option>
                                            <?php
                            foreach ($allemployee as $value):
                                ?>
                                            <option value="<?php echo $value->employeeid; ?>">
                                                <?php echo $value->employeename.' ['.$value->mobile_number.']'; ?>
                                            </option>
                                            <?php
                            endforeach;
                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group" id="merchentid" style="display: none;">
                                        <label for="uname" style="color: green;font-weight: bold;">
                                            All Customer:</label>
                                        <select class="employee" name="user_id" id="user_id" style="width: 100%;">
                                            <option value="">All Customer</option>
                                            <?php
                            foreach ($allmerchent as $value):
                                ?>
                                            <option value="<?php echo $value->user_id; ?>">
                                                <?php echo $value->company.' ['.$value->mobile_number.']'; ?></option>
                                            <?php
                            endforeach;
                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group" style="display:none;">
                                        <label for="uname" style="color: green;font-weight: bold;">Select Hubs:</label>
                                        <select name="hubs_id" id="hubsid" style="width: 100%;">
                                            <option value="">Select Hubs </option>
                                            <?php
                            foreach ($hublist as $value):
                                ?>
                                            <option value="<?php echo $value->hubs_id; ?>">
                                                <?php echo $value->hubsname; ?></option>
                                            <?php
                            endforeach;
                            ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <input type="hidden" name="expense_id" id="expense_id">
                                    <label for="uname" style="color: green;font-weight: bold;">Amount:</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="Amount" id="amount" name="amount" required=""
                                            style="width: 100%;"
                                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                    </div>

                                    <div class="form-group">
                                        <label for="uname" style="color: green;font-weight: bold;">Description:</label>
                                        <textarea type="text" placeholder=" Description" id="description"
                                            name="description" value="N/A" style="width: 100%;" rows="7"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="button" class="btn btn-primary btn-lg btn-block"
                                onclick="SaveFrom();">Save
                                & New</button>
                        </form>
                    </div>
                    <!-- Modal footer -->
                </div>
            </div>
            <script>
                //Start List
                function filter() {
                    $('#item_list tbody tr').remove();
                    var date = $("#date").val();
                    var category_id = $("#categoryid").val();
                    //var sub_cat_id = $("#subcatid").val();
                    var from_date = $("#from_date").val();
                    var to_date = $("#to_date").val();
                    var hubs_id = $("#hubsId").val();
                    //console.log(sts);
                    //var statuss = ['Booked', 'Waiting for Pickup/Picked','Waiting for Pickup/Picked','Delay/Returend/Deliveried'];
                    sl = 1;
                    $('#loading').html(
                        '<img src="<?php echo base_url(); ?>/resource/admin/assets/images/loading.gif"> loading...');
                    $.ajax({
                        url: "<?php echo base_url(); ?>expense/expense/getexpenseList?date=" + date +
                            "&category_id=" + category_id + "&from_date=" + from_date + "&to_date=" + to_date +
                            "&hubs_id=" + hubs_id,
                        type: "GET",
                        dataType: 'json',
                        success: function(json) {
                            console.log(json);
                            $('#loading').html(json);
                            sum = 0;
                            $.map(json, function(item) {
                                // open_modal();
                                var id = "item_list" + item.expense_id;
                                var html = "<tr id='" + id + "'>";
                                html += "<td class='text-left'> " + sl + "</td>";
                                html += "<td class='text-left' onclick=getsId(" + item.expense_id +
                                    ")>" + item.date + "</td>";
                                html += "<td class='text-left' onclick=getsId(" + item.expense_id +
                                    ")>" + item.category_name + "</td>";
                                // html += "<td class='text-left' onclick=getsId(" + item.expense_id +
                                //     ")>" + item.sub_cat_name + "</td>";
                                html += "<td class='text-left' onclick=getsId(" + item.expense_id +
                                    ")>" + item.company + "</td>";
                                html += "<td class='text-left' onclick=getsId(" + item.expense_id +
                                    ")>" + item.employeename + "</td>";
                                html += "<td class='text-left' onclick=getsId(" + item.expense_id +
                                    ")>" + item.hubsname + "</td>";
                                html += "<td class='text-left' onclick=getsId(" + item.expense_id +
                                    ")>" + item.amount + "</td>";
                                html += "<td class='text-left' onclick=getsId(" + item.expense_id +
                                    ")>" + item.description + "</td>";
                                html += "</tr>";
                                sum += parseInt(item.amount);
                                // console.log(sum);
                                if ($('#' + id).length < 1) {
                                    $('#form-group-item #item_list tbody').append(html);
                                    sl++;
                                }
                            });
                            $('#totalAmunt').text("Total Sum:" + sum);
                            //console.log("Total Sum:" + sum);
                        }
                    });
                }
                filter();
                //End List
                function getsubCategory(category_id) {
                    if (category_id == 1) {
                        //$('#subcatids').hide();
                        $('#employee').show();
                    } else {
                        $('#employee').hide();
                        //$("#subcatids").show();
                    }
                    if (category_id == 3) {
                        // $("#subcatids").hide();
                        $('#employee').hide();
                        $('#merchentid').show();
                    } else {
                        $('#merchentid').hide();
                    }
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url(); ?>mangement/mangement/getSubcategoryExpense',
                        data: {
                            category_id: category_id
                        },
                        success: function(response) {
                            document.getElementById("sub_cat_id").innerHTML = response;
                        }
                    });
                }

                function getsubCategorySearch(category_id) {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url(); ?>mangement/mangement/getSubcategoryExpense',
                        data: {
                            category_id: category_id
                        },
                        success: function(response) {
                            document.getElementById("subcatid").innerHTML = response;
                        }
                    });
                }

                function SaveFrom() {
                    category_id = $("#category_id").val();
                    amount = $("#amount").val();
                    description = $("#category_id").val();
                    employeeid = $("#employeeid").val();
                    hubs_id = $("#hubsid").val();
                    if (category_id == "" || amount == "" || description == "") {
                        //alert("Please Enter Input");
                        inputboxValidation();
                    } else {
                        var dataString = $("#expense").serialize();
                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: "<?php echo base_url(); ?>mangement/mangement/save_expense",
                            data: dataString,
                            success: function(data) {
                                // $('#expense')[0].reset();
                                successfullyInsert();
                                filter();
                                $('#amount').val("");
                                $('#description').val("");
                                $("#amount").focus();
                                $("#employeeid").val("");
                                $("#user_id").val("");
                            }
                        });
                    }
                }

                function getsId(expense_id) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>expense/expense/geteditexpenseData?expense_id=" +
                            expense_id,
                        type: "GET",
                        dataType: 'json',
                        success: function(json) {
                            if (json.category_id == 1) {
                                $('#subcatids').hide();
                                $('#employee').show();
                            } else {
                                $('#employee').hide();
                                $("#subcatids").show();
                            }
                            if (json.category_id == 3) {
                                $("#subcatids").hide();
                                $('#employee').hide();
                                $('#merchentid').show();
                            } else {
                                $('#merchentid').hide();
                            }
                            $('#date').val(json.date);
                            $('#category_id').val(json.category_id);
                            $('#hubsid').val(json.hubs_id);
                            $('#sub_cat_id').val(json.sub_cat_id);
                            $('#amount').val(json.amount);
                            $('#user_id').val(json.user_id);
                            $('#description').val(json.description);
                            $('#expense_id').val(json.expense_id);
                            $('#employeeid').val(json.employeeid);
                            $('#myModal').modal('show');
                        }
                    });
                }
                $(document).ready(function() {
                    $("#to_date").datepicker();
                    $("#from_date").datepicker();
                    $("#date").datepicker();
                });

                function addExpenses() {
                    $('#expense')[0].reset();
                    $('#myModal').modal('show');
                }
            </script>