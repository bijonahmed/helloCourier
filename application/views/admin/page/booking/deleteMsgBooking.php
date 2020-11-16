<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-body">
                <!-- Default Size Modal -->
                <center><h1>Delete Booking ID: <?php echo strip_tags(trim($booking_id)); ?></h1></center>
                <!-- Modal -->
                <div class="modal fade" id="defaultsizemodal" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="fa fa-remove"></i> Booking ID: <?php echo strip_tags(trim($booking_id)); ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>booking/booking/deleteBookings">
                                <div class="modal-body">
                                    <input type="hidden" name="booking_id" value="<?php echo strip_tags(trim($booking_id)); ?>"/>    
                                    <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-remove"></i> DELETE</button>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <a class="btn btn-secondary btn-block" onclick="backOption()"><i class="fa fa-times"></i> BACK</a>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div><!--End Row-->
<script type="text/javascript">
    $(window).on('load', function () {
        $('#defaultsizemodal').modal('show');

    });
function backOption(){
    
    window.location.href = "<?php echo base_url();?>booking/booking/getbookingList";
}

</script>