<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<br>
<style>
	.modal-open[style] {
		padding-right: 0px !important;
	}

	.modal {
		text-align: center;
	}

	@media screen and (min-width: 768px) {
		.modal:before {
			display: inline-block;
			vertical-align: middle;
			content: " ";
			height: 100%;
		}
	}

	.modal-dialog {
		display: inline-block;
		text-align: left;
		vertical-align: middle;
	}
</style>
<div class="container" style="min-height: 450px;">


<!-- Error Us Modal HTML -->
<div id="success" class="modal fade" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-sm">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" style="background-color: white; color: black;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">
					<center><h3>Successful</h3></center>
				</h4>
			</div>
			<div class="modal-body" style="background-color: white; color: black;">
				<center style="font-size: 20px; color: black;">
	<p class="success" style="color: black;">Your booking has been confirmed. Check your email for detials.</p>
				</center>
			</div>
			<div class="modal-footer" style="background-color: white;">
				<button type="button" class="btn btn-info btn-block" data-dismiss="modal" onclick="redirectpage();">OK</button>
			</div>
		</div>

	</div>
</div>

</div>

<script>
    function redirectpage(){
        window.location.href = '<?php echo base_url();?>';
    }
$( document ).ready(function() {
    $('#success').modal('show');
});

</script>


