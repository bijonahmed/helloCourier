<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="container">
					Global Setting
					<hr>
					<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/updatesetting" enctype="multipart/form-data">


						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label for="formGroupExampleInput">Handaling fee standard</label>
									<input type="text" class="form-control" id="standardfee" name="standardfee" value="<?php echo $data->standardfee; ?>" placeholder="Enter your handaling free standard">
								</div>
								<div class="form-group">
									<label for="formGroupExampleInput">Company Name</label>
									<input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $data->company_name; ?>">
								</div>
								<div class="form-group">
									<label for="formGroupExampleInput">Company Phone</label>
									<input type="tel" class="form-control" id="compnay_phone" name="compnay_phone" value="<?php echo $data->compnay_phone; ?>">
								</div>
								<div class="form-group">
									<label for="formGroupExampleInput2">Company Email</label>
									<input type="text" class="form-control" id="company_email" name="company_email" value="<?php echo $data->company_email; ?>">
								</div>

								<div class="form-group">
									<label for="formGroupExampleInput2">Download App Link</label>
									<input type="text" class="form-control" id="download_app_link" name="download_app_link" value="<?php echo $data->download_app_link; ?>">
								</div>

								<div class="form-group">
									<label for="formGroupExampleInput2">Year in buisness</label>
									<input type="text" class="form-control" id="businessYear" name="businessYear" value="<?php echo $data->businessYear; ?>">
								</div>


								<div class="form-group">
									<label for="formGroupExampleInput">Happy Users</label>
									<input type="text" class="form-control" id="happyUser" name="happyUser" value="<?php echo $data->happyUser; ?>">
								</div>


								<div class="form-group">
									<label for="formGroupExampleInput2">Vehicles</label>
									<input type="text" class="form-control" id="Vehicles" name="Vehicles" value="<?php echo $data->Vehicles; ?>">
								</div>


								<div class="form-group">
									<label for="formGroupExampleInput2">Logistics</label>
									<input type="text" class="form-control" id="branches" name="branches" value="<?php echo $data->branches; ?>">
								</div>
								<div class="form-group">
									<label for="formGroupExampleInput">Copyright</label>
									<input type="text" class="form-control" id="copyright" name="copyright" value="<?php echo $data->copyright; ?>">
								</div>

								<div class="form-group">
									<label for="formGroupExampleInput2">Meta Keyword</label>
									<textarea class="form-control" name="meta_keyword" id="meta_keyword"><?php echo $data->meta_keyword; ?></textarea>
								</div>


								<div class="form-group">
									<label for="formGroupExampleInput2">Meta Description</label>
									<textarea class="form-control" name="meta_description" id="meta_description"><?php echo $data->meta_description; ?></textarea>
								</div>

								<div class="form-group">
									<label for="formGroupExampleInput2">Add Insurance</label>
									<input type="text" class="form-control" id="add_insurance" name="add_insurance" value="<?php echo $data->add_insurance; ?>">
								</div>

								<div class="form-group">
									<label for="formGroupExampleInput2">Packaging</label>
									<input type="text" class="form-control" id="packaging" name="packaging" value="<?php echo $data->packaging; ?>">
								</div>

								<div class="form-group">
									<label for="formGroupExampleInput2">Express Delivery</label>
									<input type="text" class="form-control" id="express_delivery" name="express_delivery" value="<?php echo $data->express_delivery; ?>">
								</div>
								
								<div class="form-group">
									<label for="formGroupExampleInput2">Company Info</label>
									<input type="text" class="form-control" id="company_details" name="company_details" value="<?php echo $data->company_details; ?>">
								</div>
								<div class="form-group">
									<label for="formGroupExampleInput2">Company Short Description</label>
									<textarea class="form-control" name="company_short_descirption" id="company_short_descirption"><?php echo $data->company_short_descirption; ?></textarea>
								</div>

							</div>


							<div class="col-md-6">
							<div class="form-group">
									<label for="formGroupExampleInput2">Company Address</label>
									<textarea class="form-control" id="company_address" name="company_address"><?php echo $data->company_address; ?></textarea>
								</div>
								<div class="form-group">
									<label for="formGroupExampleInput2">Pay Offline</label>
									<textarea class="form-control" id="payOffline" name="payOffline"><?php echo $data->payOffline; ?></textarea>
								</div>
								<div class="form-group">
									<label for="formGroupExampleInput2">Google Map Embedded</label>
									<textarea class="form-control" name="google_map_embeded_code" id="google_map_embeded_code"><?php echo $data->google_map_embeded_code; ?></textarea>
								</div>


								<div class="form-group">
									<label for="formGroupExampleInput">Company Fax</label>
									<input type="text" class="form-control" id="company_fax" name="company_fax" value="<?php echo $data->company_fax; ?>">
								</div>
								<div class="form-group">
									<label for="formGroupExampleInput2">Company Web</label>
									<input type="text" class="form-control" id="company_web" name="company_web" value="<?php echo $data->company_web; ?>">
								</div>



								<div class="form-group">
									<label for="formGroupExampleInput2">Facebook Link</label>
									<input type="text" class="form-control" id="facebook_link" name="facebook_link" value="<?php echo $data->facebook_link; ?>">
								</div>

								<div class="form-group">
									<label for="formGroupExampleInput2">Facebook App ID</label>
									<input type="text" class="form-control" id="facebook_page_id" name="facebook_page_id" value="<?php echo $data->facebook_page_id; ?>">
								</div>

								<div class="form-group">
									<label for="formGroupExampleInput2">Twitter</label>
									<input type="text" class="form-control" id="twitter_url" name="twitter_url" value="<?php echo $data->twitter_url; ?>">
								</div>

								<div class="form-group">
									<label for="formGroupExampleInput2">Linkedin</label>
									<input type="text" class="form-control" id="linkdin_url" name="linkdin_url" value="<?php echo $data->linkdin_url; ?>">
								</div>

								<div class="form-group">
									<label for="formGroupExampleInput2" style="color: red; flex-weight:bold;"> Input the
										confirmation message for client</label>
									<textarea type="text" class="form-control" id="sendingmsg" name="sendingmsg"><?php echo $data->sendingmsg; ?></textarea>
								</div>


							</div>


							<div class="row" style="margin-left: 5px;">
								<div class="col-md-6">
									<div class="form-group">
										<label for="formGroupExampleInput2" style="font-weight: bold;">Company Logo
											(50x147)</label>
										<br>
										<center><img src="<?php echo base_url(); ?><?php echo $data->image; ?>" class="rounded" style="height: 100px; width: 250px;"></center>
										<input type="file" name="image" class="form-control" id="image" onchange="Checkfiles()">

									</div>

									<div class="form-group">
										<label for="formGroupExampleInput2" style="font-weight: bold;">Footer Up Image
											(176x567)</label>
										<br>
										<center><img src="<?php echo base_url(); ?><?php echo $data->footer_top_image; ?>" class="rounded" style="height: 100px; width: 250px;"></center>
										<input type="file" name="footer_top_image" class="form-control" id="footer_top_image">
										<div class="form-group">
											<label for="formGroupExampleInput2" style="font-weight: bold;">Banner
												Image</label>
											<br>
											<center><img src="<?php echo base_url(); ?><?php echo $data->bn_image; ?>" class="rounded" style="height: 100px; width: 250px;"></center>
											<input type="file" name="bn_image" class="form-control" id="bn_image" onchange="Checkfiles()">

										</div>
									</div>

								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="formGroupExampleInput2" style="font-weight: bold;">Why Choose Us
											Image</label>
										<br>
										<center><img src="<?php echo base_url(); ?><?php echo $data->why_choose_img; ?>" class="rounded" style="height: 100px; width: 250px;"></center>
										<input type="file" name="why_choose_img" class="form-control" id="why_choose_img" onchange="Checkfiles()">

									</div>

									<div class="form-group">
										<label for="formGroupExampleInput2" style="font-weight: bold;">Are you ready to
											move background </label>
										<br>
										<center><img src="<?php echo base_url(); ?><?php echo $data->readytobgimg; ?>" class="rounded" style="height: 100px; width: 250px;"></center>
										<input type="file" name="readytobgimg" class="form-control" id="readytobgimg" onchange="Checkfiles()">

									</div>




								</div>
							</div>


							<button type="submit" id="savebtn" class="btn btn-primary btn-lg btn-block">Save</button>
						</div>
					</form>

				</div>

			</div>

		</div>


	</div>
</div>

</div>
<script>
	CKEDITOR.replace('company_address');
	CKEDITOR.replace('payOffline');
	// Image validation
	function Checkfiles() {
		var fup = document.getElementById('image');
		var fileName = fup.value;
		var input = $("#image");
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		if (ext == "png" || ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext ==
			"JPG" || ext == "doc") {
			return true;
		} else {
			// confirm("Upload Gif or Jpg images only");
			input.replaceWith(input.val('').clone(true));
		}
	}
</script>