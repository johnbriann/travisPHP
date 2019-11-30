<link rel="stylesheet" href="<?= base_url()?>assets/cropperjs/css/cropper.css">
<link rel="stylesheet" href="<?= base_url()?>assets/cropperjs/css/main.css">
<script src="<?= base_url()?>assets/cropperjs/js/cropper.js"></script>
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div>Edit Product</div>
		</div>
		<div class="page-title-actions">
			<a class="btn btn-info btn-sm btn-shadow mr-3" href="<?= base_url()?>products">Back</a>
        </div>
	</div>
</div>
<?php if($this->session->flashdata('msg')){ ?>
<div class="alert alert-danger"><?= $this->session->flashdata('msg')?></div>
<?php } ?>
<form id="add_user_form" action="<?= base_url()?>home/edit_product_process/<?= $product['id']?>" method="POST" enctype="multipart/form-Data">

<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Product Information</h5>
		<div class="form-row">
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="name_en" class="">Name (en)</label>
					<input required type="text" id="name_en" name="name_en" class="form-control" placeholder="Product Name" value="<?= $product['name_en']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="name_ar" class="">Name (ar)</label>
					<input required type="text" id="name_ar" name="name_ar" class="form-control" placeholder="اسم المنتج" value="<?= $product['name_ar']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="price" class="">Price</label>
					<input required type="number" min="0.01" step="0.01" id="price" name="price" class="form-control" placeholder="Price (AED)" value="<?= $product['price']?>" />
				</div>
			</div>
			<div class="col-md-12">
				<div class="position-relative form-group">
					<label for="desc_en" class="">Description (ar)</label>
					<textarea required id="desc_en" name="desc_en" rows="1" class="form-control autosize-input" style="max-height: 200px; min-height: 38px; height: 38px;" placeholder="Product Description"><?= $product['desc_en']?></textarea>
				</div>
			</div>
			<div class="col-md-12">
				<div class="position-relative form-group">
					<label for="desc_ar" class="">Description (en)</label>
					<textarea required id="desc_ar" name="desc_ar" rows="1" class="form-control autosize-input" style="max-height: 200px; min-height: 38px; height: 38px;" placeholder="وصف المنتج"><?= $product['desc_ar']?></textarea>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Category Information</h5>
				<div class="form-row">
					<select required id="category_id" name="category_id" class="multiselect-dropdown form-control">
						<option value="">Select Categories</option>
						<?php foreach($categories as $key => $category){ ?>
						<option <?= ($product['category_id'] == $category['id'])?'selected':'';?> value="<?= $category['id'];?>"><?= ucwords($category['name_en']);?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Product Classification</h5>
				<div class="form-row">
					<select required id="classification" name="classification" class="multiselect-dropdown form-control">
						<option value="">Select Classification</option>
						<option <?= ($product['classification'] == 'veg')?'selected':'';?> value="veg">Veg</option>
						<option <?= ($product['classification'] == 'non-veg')?'selected':'';?> value="non-veg">Non-Veg</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Product Preperation Time</h5>
				<div class="form-row">
					<select required id="prep_time" name="prep_time" class="multiselect-dropdown form-control">
						<option value="">Select Time</option>
						<?php for($i=0;$i<=120;$i++){ ?>
						<option <?= ($product['prep_time'] == $i)?'selected':'';?> value="<?= $i?>"><?= $i?> min</option>
						<?php } ?>
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
					<input name="image_hidden" id="image_hidden" type="hidden" value="<?= $product['image']?>" />
					<input  type="file" id="image" name="image" class="form-control" onchange="cover_image_change(this,'product','cover')" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<img id="cover_category_image" src="<?= base_url()?>uploads/product/small_<?= $product['image']?>" />
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
					<input name="image_box_hidden" id="image_box_hidden" type="hidden" value="<?= $product['image_box']?>" />
					<input  type="file" id="image_box" name="image_box" class="form-control" onchange="cover_image_change(this,'product','box')" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<img id="box_category_image" src="<?= base_url()?>uploads/product/small_<?= $product['image_box']?>" />
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Discounts</h5>
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="discount" class="">Dine-in</label>
					<input required type="number" min="0" step="1" id="discount" name="discount" class="form-control" placeholder="Discount Dine-in (%)" value="<?= $product['discount']?>" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="discount_takeaway" class="">Takeaway</label>
					<input required type="number" min="0" step="1" id="discount_takeaway" name="discount_takeaway" class="form-control" placeholder="Discount Takeaway (%)" value="<?= $product['discount_takeaway']?>" />
				</div>
			</div>
		</div>
		<button type="submit" class="mt-2 btn btn-primary">Update</button>
	</div>
</div>
</form>
<?php $this->load->view('common/cropper');?>