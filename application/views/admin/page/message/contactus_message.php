<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">


                <div class="container">
                    <p>Contact Us List</p><hr>
                    <?php
                    foreach ($contact as $value) {
                        ?>
                        
                        Date: <?php echo date("d-m-Y", strtotime($value->sending_date)); ?><br>
                        From Email : <?php echo $value->frm_email; ?><br>
                        Sender Name : <?php echo $value->fullname; ?><br>
                        Phone Number :<?php echo $value->phonenumber; ?><br>
                        
                        
                        <div class="card bg-primary text-white">
                            <div class="card-body"> 
                                <p>Message : <?php echo $value->message; ?> </p>
                            </div>
                        </div>
                    <?php } ?>


                </div>





            </div>

        </div>


    </div>
</div>

</div>


