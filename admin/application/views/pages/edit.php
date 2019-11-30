<link rel="stylesheet" href="<?= base_url()?>assets/cropperjs/css/cropper.css">
<link rel="stylesheet" href="<?= base_url()?>assets/cropperjs/css/main.css">
<script src="<?= base_url()?>assets/cropperjs/js/cropper.js"></script>
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div><?= $page_title?> - <?= $content_data['page_title']?></div>
		</div>
		<div class="page-title-actions">
			<a class="btn btn-info btn-sm btn-shadow mr-3" href="<?= base_url()?>categories">Back</a>
        </div>
	</div>
</div>
<?php if($this->session->flashdata('msg')){ ?>
<div class="alert alert-danger"><?= $this->session->flashdata('msg')?></div>
<?php } ?>
<form id="add_user_form" action="<?= base_url()?>home/edit_page_process/<?= $content_data['id']?>" method="POST" enctype="multipart/form-Data">
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title"></h5>
		<div class="form-row">
			<div class="col-md-12">
				<div class="position-relative form-group">
					<label for="name" class="">Name</label>
					<input required type="text" id="name" name="name" class="form-control" placeholder="Name" value="<?= $content_data['page_title']?>" />
				</div>
			</div>
			<div class="col-md-12">
				<div class="position-relative form-group">
					<label for="name" class="">Page Content</label>
					<textarea cols="80" id="edi" name="description" rows="10"><?= html_entity_decode(htmlspecialchars_decode($content_data['page_description']))?></textarea>
				</div>
			</div>
			<!--
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="status" class="">Status</label>
					<select required id="status" name="status" class="multiselect-dropdown form-control">
						<option <?= ($content_data['status'] == 1)?'selected':'';?> value="active">Active</option>
						<option <?= ($content_data['status'] == 0)?'selected':'';?> value="inactive">In-Acrive</option>
					</select>
				</div>
			</div>
			-->
		</div>
	</div>
</div>
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Image</h5>
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="image" class="">Select Image</label>
					<input name="image_hidden" id="image_hidden" type="hidden" value="<?= $content_data['page_image']?>" />
					<input type="file" id="image" name="image" class="form-control" onchange="cover_image_change(this,'page','cover')" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<img id="cover_image" src="<?= IMGURL?>uploads/page/small_<?= $content_data['page_image']?>" />
				</div>
			</div>
		</div>
		<button type="submit" class="mt-2 btn btn-primary">Update</button>
	</div>
	
</div>
<!--<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Image</h5>
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="image" class="">Select Image</label>
					<input name="image_box_hidden" id="image_box_hidden" type="hidden" value="<?= $content_data['image']?>" />
					<input  type="file" id="image" name="image" class="form-control" onchange="cover_image_change(this,'category','box')" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<img id="box_image" src="<?= base_url()?>uploads/category/small_<?= $content_data['image']?>" />
				</div>
			</div>
		</div>
		<button type="submit" class="mt-2 btn btn-primary">Update</button>
	</div>
</div>-->
</form>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('edi',{
	allowedContent : true
});
</script>
<?php $this->load->view('common/cropper');?>