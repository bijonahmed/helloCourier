<script src="<?php echo base_url(); ?>resource/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>

<div class="card">
	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>mangement/mangement/insertPost" enctype="multipart/form-data">
		<div class="card-body">
			<h4 class="card-title">
				<?php
                if (isset($post_row->post_id)):
                    ?>
				Edit Post
				<?php
                else:
                    ?>
				Add Post
				<?php
                endif;
                ?>
			</h4>

			<hr>
			<div class="form-group row">
				<label for="fname" class="col-sm-2 text-right control-label col-form-label">Select Menu </label>
				<div class="col-sm-10">
					<select name="menu_id" id="menu_id" style="width: 100%; height:36px;" required="" onChange="ShowSubCategory(this.value);">
						<option value="">Select</option>
						<?php
                        foreach ($menu as $value):
                            ?>
						<option value="<?php echo $value->menu_id; ?>"><?php echo $value->name; ?></option>
						<?php
                        endforeach;
                        ?>

					</select>

				</div>
			</div>


			<div class="form-group row">
				<label for="fname" class="col-sm-2 text-right control-label col-form-label">Select Category </label>
				<div class="col-sm-10">
					<select name="category_id" id="category_id" style="width: 100%; height:36px;">
						<option value="">Select</option>
						<?php
                        foreach ($category as $value):
                            ?>
						<option value="<?php echo $value->category_id; ?>"><?php echo $value->category_name ; ?></option>
						<?php
                        endforeach;
                        ?>

					</select>

				</div>
			</div>

			<div class="form-group row">
				<label for="fname" class="col-sm-2 text-right control-label col-form-label">Post Title</label>
				<div class="col-sm-10">
					<?php
                    if (isset($post_row->post_title)):
                        ?>
					<input type="text" id="post_title" placeholder="" required="" name="post_title" style="width: 100%;" value="<?php echo $post_row->post_title; ?>">
					<?php
                    else:
                        ?>
					<input type="text" id="post_title" placeholder="" required="" name="post_title" style="width: 100%;">
					<?php
                    endif;
                    ?>

				</div>
			</div>

			<div class="form-group row">
				<label for="fname" class="col-sm-2 text-right control-label col-form-label"> Description</label>
				<div class="col-sm-10">
					<?php
                    if (isset($post_row->post_description)):
                        ?>
					<textarea name="post_description" class="form-control"><?php echo $post_row->post_description; ?></textarea>
					<?php
                    else:
                        ?>
					<textarea name="post_description" class="form-control"></textarea>
					<?php
                    endif;
                    ?>

				</div>
			</div>


			<input type="hidden" name="post_id" value="<?php
            if (isset($post_row->post_id)):
                echo $post_row->post_id;
            endif;
            ?>" />

			<div class="form-group row">
				<label for="cono1" class="col-sm-2 text-right control-label col-form-label">Photo Upload</label>
				<div class="col-sm-10">
					<input type="file" name="image" class="form-control" id="image" onchange="Checkfiles()">

					<?php
                    if (isset($post_row->image)):
                        ?>
					<image src="<?php echo base_url(); ?><?php echo $post_row->image; ?>" class="img img-thumbnail" style="height: 200px; width: 250px;">
						<?php
                    endif;
                    ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="cono1" class="col-sm-2 text-right control-label col-form-label">Status</label>
				<div class="col-sm-10">
					<select name="status" id="status" style="width: 100%;" required="">
						<option value="1">Active</option>
						<option value="0">Inactive</option>
					</select>
				</div>
			</div>


			<div class="border-top">
				<div class="card-body">
					<div align="right">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
						<a href="<?php echo base_url(); ?>post/post/post_list" style="text-decoration: none;"><button style="margin-top: 10px;" type="button" class="btn btn-danger btn-lg btn-block">Cancel</button></a>

					</div>
				</div>
			</div>
	</form>
</div>

<script>
	// Image validation
	function Checkfiles() {
		var fup = document.getElementById('image');
		var fileName = fup.value;
		var input = $("#image");
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		if (ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "doc") {
			return true;
		} else {
			confirm("Upload Gif or Jpg images only");
			input.replaceWith(input.val('').clone(true));
		}
	}
	$(document).ready(function() {
		//category_id
		var status = '<?php echo $post_row->status; ?>';
		var menu_id = '<?php echo $post_row->menu_id; ?>';
		var category_id = '<?php echo $post_row->category_id; ?>';

		if (status !== "NULL") {
			$("#status").val(status);
		}
		if (menu_id !== "NULL") {
			$("#menu_id").val(menu_id);
		}
		if (category_id !== "NULL") {
			$("#category_id").val(category_id);
		}

	});
</script>

<script>
	CKEDITOR.replace('post_description');
</script>