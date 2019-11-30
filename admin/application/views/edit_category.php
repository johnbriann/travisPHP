<link rel="stylesheet" href="<?= base_url()?>assets/cropperjs/css/cropper.css">
<link rel="stylesheet" href="<?= base_url()?>assets/cropperjs/css/main.css">
<script src="<?= base_url()?>assets/cropperjs/js/cropper.js"></script>
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div>Edit Catergory</div>
		</div>
		<div class="page-title-actions">
			<a class="btn btn-info btn-sm btn-shadow mr-3" href="<?= base_url()?>categories">Back</a>
        </div>
	</div>
</div>
<?php if($this->session->flashdata('msg')){ ?>
<div class="alert alert-danger"><?= $this->session->flashdata('msg')?></div>
<?php } ?>
<form id="add_user_form" action="<?= base_url()?>home/edit_category_process/<?= $category['id']?>" method="POST" enctype="multipart/form-Data">
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Category Information</h5>
		<div class="form-row">
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="name_en" class="">Name (en)</label>
					<input required type="text" id="name_en" name="name_en" class="form-control" placeholder="Name (en)" value="<?= $category['name_en']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="name_ar" class="">Name (ar)</label>
					<input required type="text" id="name_ar" name="name_ar" class="form-control" placeholder="Name (ar)" value="<?= $category['name_ar']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="name_ar" class="">Name (ar)</label>
					<select required id="status" name="status" class="multiselect-dropdown form-control">
						<option <?= ($category['status'] == 'active')?'selected':'';?> value="active">Active</option>
						<option <?= ($category['status'] == 'inactive')?'selected':'';?> value="inactive">In-Acrive</option>
					</select>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Detail Screen Image</h5>
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="image" class="">Select Image</label>
					<input name="image_hidden" id="image_hidden" type="hidden" value="<?= $category['image']?>" />
					<input type="file" id="image" name="image" class="form-control" onchange="cover_image_change(this,'category','cover')" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<img id="cover_category_image" src="<?= base_url()?>uploads/category/small_<?= $category['image']?>" />
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Listing Screen Image</h5>
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="image_box" class="">Select Image</label>
					<input name="image_box_hidden" id="image_box_hidden" type="hidden" value="<?= $category['image_box']?>" />
					<input  type="file" id="image_box" name="image_box" class="form-control" onchange="cover_image_change(this,'category','box')" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<img id="box_category_image" src="<?= base_url()?>uploads/category/small_<?= $category['image_box']?>" />
				</div>
			</div>
		</div>
		<button type="submit" class="mt-2 btn btn-primary">Update</button>
	</div>
</div>
</form>
<?php $this->load->view('common/cropper');?>