<link rel="stylesheet" href="<?= base_url()?>assets/cropperjs/css/cropper.css">
<link rel="stylesheet" href="<?= base_url()?>assets/cropperjs/css/main.css">
<script src="<?= base_url()?>assets/cropperjs/js/cropper.js"></script>
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div>Add New Deal Product</div>
		</div>
		<div class="page-title-actions">
			<a class="btn btn-info btn-sm btn-shadow mr-3" href="<?= base_url()?>products">Back</a>
        </div>
	</div>
</div>
<?php if($this->session->flashdata('msg')){ ?>
<div class="alert alert-danger"><?= $this->session->flashdata('msg')?></div>
<?php } ?>
<form id="add_user_form" action="<?= base_url()?>home/add_deal_product_process" method="POST" enctype="multipart/form-Data">

<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Product Information</h5>
		<div class="form-row">
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="name_en" class="">Name (en)</label>
					<input required type="text" id="name_en" name="name_en" class="form-control" placeholder="Product Name" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="name_ar" class="">Name (ar)</label>
					<input required type="text" id="name_ar" name="name_ar" class="form-control" placeholder="اسم المنتج" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="price" class="">Price</label>
					<input required type="number" min="0.01" step="0.01" id="price" name="price" class="form-control" placeholder="Price (AED)" />
				</div>
			</div>
			<div class="col-md-12">
				<div class="position-relative form-group">
					<label for="desc_en" class="">Description (ar)</label>
					<textarea required id="desc_en" name="desc_en" rows="1" class="form-control autosize-input" style="max-height: 200px; min-height: 38px; height: 38px;" placeholder="Product Description"></textarea>
				</div>
			</div>
			<div class="col-md-12">
				<div class="position-relative form-group">
					<label for="desc_ar" class="">Description (en)</label>
					<textarea required id="desc_ar" name="desc_ar" rows="1" class="form-control autosize-input" style="max-height: 200px; min-height: 38px; height: 38px;" placeholder="وصف المنتج"></textarea>
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
						<option value="13">Deal Offers</option>
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
						<option value="veg">Veg</option>
						<option value="non-veg">Non-Veg</option>
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
						<option value="<?= $i?>"><?= $i?> min</option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Products In Deal</h5>
				<div class="deal-product-section">
					<div class="form-row" id="deal-product-row-0">
						<div class="form-group col-md-2">
							<input id="quantity-0" class="form-control" name="quantity[]" type="number" placeholder="Quantity (2)" min="1" step="1"/>
						</div>
						<div class="form-group col-md-4">
							<select required id="product_id-0" name="product_id[]" class="form-control">
								<option value="">Choose a product</option>
								<?php foreach($products as $key => $product){ ?>
								<option value="<?= $product['id'];?>"><?= $product['name_en'];?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-md-1">
							<!--<a href="javascript:;" data-id="0" class="delete-deal-product-row btn btn-square btn-danger"><i class="fa fa-trash"></i></a>-->
						</div>
					</div>
				</div>
				<a href="javascript:;" class="create-deal-product-row btn btn-square btn-success"><i class="fa fa-plus"></i> Add Product</a>
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
					<input name="image_hidden" id="image_hidden" type="hidden" value="" />
					<input  type="file" id="image" name="image" class="form-control" onchange="cover_image_change(this,'product','cover')" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<img id="cover_category_image" src="" />
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
					<input name="image_box_hidden" id="image_box_hidden" type="hidden" value="" />
					<input  type="file" id="image_box" name="image_box" class="form-control" onchange="cover_image_change(this,'product','box')" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<img id="box_category_image" src="" />
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
					<input required type="number" min="0" step="1" id="discount" name="discount" class="form-control" placeholder="Discount Dine-in (%)" value="0" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="discount_takeaway" class="">Takeaway</label>
					<input required type="number" min="0" step="1" id="discount_takeaway" name="discount_takeaway" class="form-control" placeholder="Discount Takeaway (%)" value="0" />
				</div>
			</div>
		</div>
		<button type="submit" class="mt-2 btn btn-primary">Create</button>
	</div>
</div>
</form>
<script>
var id_count = 0;
$(document).on('click','.delete-deal-product-row',function(){
	var id = $(this).data('id');
	$('#deal-product-row-'+id).remove();
	id_count--;
});
$(document).on('click','.create-deal-product-row',function(){
	id_count++;
	var $div = '<div class="form-row" id="deal-product-row-'+id_count+'"><div class="form-group col-md-2"><input id="quantity-'+id_count+'" class="form-control" name="quantity[]" type="number" placeholder="Quantity (2)" min="1" step="1"/></div><div class="form-group col-md-4"><select required id="product_id-'+id_count+'" name="product_id[]" class="form-control"><option value="">Choose a product</option><?php foreach($products as $key => $product){ ?><option value="<?= $product['id'];?>"><?= $product['name_en'];?></option><?php } ?></select></div><div class="form-group col-md-1"><a href="javascript:;" data-id="'+id_count+'" class="delete-deal-product-row btn btn-square btn-danger"><i class="fa fa-trash"></i></a></div></div>';
	$('.deal-product-section').append($div);
});
</script>
<?php $this->load->view('common/cropper');?>