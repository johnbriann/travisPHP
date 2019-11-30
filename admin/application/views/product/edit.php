<link rel="stylesheet" href="<?= base_url()?>assets/cropperjs/css/cropper.css">
<link rel="stylesheet" href="<?= base_url()?>assets/cropperjs/css/main.css">
<script src="<?= base_url()?>assets/cropperjs/js/cropper.js" type="text/javascript"></script>
<!-- include dropzone script & style -->
<link rel="stylesheet" href="<?= base_url()?>assets/css/dropzone.css" />
<script src="<?= base_url()?>assets/js/dropzone.js" type="text/javascript"></script>
<!-- Chosen Select -->
<link rel="stylesheet" href="<?= base_url()?>assets/css/chosen.css" />
<script src="<?= base_url()?>assets/js/chosen.jquery.js" type="text/javascript"></script>
<?php $hidden_id = $content_data['id'];?>
<style>
.col-md-6 .col-md-10,.col-md-6 .col-md-2{
	float:left;
}
.delete-product-image{
	position: absolute;
    top: -10px;
    right: -10px;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    padding: 0;
    margin: 0;
    font-size: 12px;
}
/********************Chosen*******************/

/********************Button 1*******************/
.switch {
  position: relative;
  display: block;
  width: 60px;
  height: 34px;
right: 15px; top: 15px; position: absolute;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div><?= $page_title?></div>
		</div>
		<div class="page-title-actions">
			<a class="btn btn-info btn-sm btn-shadow mr-3" href="<?= base_url()?>products">Back</a>
        </div>
	</div>
</div>
<?php if($this->session->flashdata('msg')){ ?>
<div class="alert alert-danger"><?= $this->session->flashdata('msg')?></div>
<?php } ?>
<form id="add_product_form" action="<?= base_url()?>home/edit_product_process/<?= $content_data['id']?>" method="POST" enctype="multipart/form-Data">
<input name="hidden_id" type="hidden" value="<?= $hidden_id?>" />
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Product Information</h5>
		<div class="form-row">
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="name" class="">Name</label>
					<input required type="text" id="name" name="name" class="form-control" placeholder="Product Name" value="<?= $content_data['name']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="price" class="">Price ($)</label>
					<input required type="number" min="0.01" step="0.01" id="price" name="price" class="form-control" placeholder="Price ($)" value="<?= $content_data['price']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="sale_price" class="">Sale Price ($)</label>
					<input required type="number" min="0.01" step="0.01" id="sale_price" name="sale_price" class="form-control" placeholder="Sale Price ($)" value="<?= $content_data['sale_price']?>" />
				</div>
			</div>
			<div class="col-md-12">
				<div class="position-relative form-group">
					<label for="short_description" class="">Product Short Description</label>
					<textarea required id="short_description" name="short_description" rows="3" class="form-control autosize-input" placeholder="Product Short Description"><?= $content_data['short_description']?></textarea>
				</div>
			</div>
			<div class="col-md-12">
				<div class="position-relative form-group">
					<label for="description" class="">Product Description</label>
					<textarea required id="description" name="description" rows="5" class="form-control autosize-input" placeholder="Product Description"><?= $content_data['description']?></textarea>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Manufacturer</h5>
				<div class="form-row">
					<select required id="manufacturer_id" name="manufacturer_id" class="multiselect-dropdown form-control">
						<option value="">Select Manufacturer</option>
						<?php foreach($manufacturers as $key => $manufacturer){ ?>
						<option <?= ($content_data['manufacturer_id'] == $manufacturer['id'])?'selected':'';?> value="<?= $manufacturer['id'];?>"><?= ucwords($manufacturer['name']);?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Brand</h5>
				<div class="form-row">
					<select required id="brand_id" name="brand_id" class="multiselect-dropdown form-control">
						<option value="">Select Brand</option>
						<?php foreach($brands as $key => $brand){ ?>
						<option <?= ($content_data['brand_id'] == $brand['id'])?'selected':'';?> value="<?= $brand['id'];?>"><?= ucwords($brand['name']);?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Category</h5>
				<div class="form-row">
					<select required id="category_id" name="category_id" class="multiselect-dropdown form-control">
						<option value="">Select Category</option>
						<?php foreach($categories as $key => $category){ ?>
						<option <?= ($content_data['category_id'] == $category['id'])?'selected':'';?> value="<?= $category['id'];?>"><?= ucwords($category['name']);?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Subcategory</h5>
				<div class="form-row">
					<select required id="subcategory_id" name="subcategory_id" class="multiselect-dropdown form-control">
						<option value="">Select Subcategory</option>
						<?php foreach($subcategories as $key => $subcategory){ ?>
						<option <?= ($content_data['subcategory_id'] == $subcategory['id'])?'selected':'';?> value="<?= $subcategory['id'];?>"><?= ucwords($subcategory['name']);?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Featured?</h5>
				<div class="form-row">
					<label class="switch"><input name="featured" type="checkbox" <?= ($content_data['featured'] == 1)?'checked':'';?> /><span class="slider round"></span></label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">On Sale?</h5>
				<div class="form-row">
					<label class="switch"><input name="on_sale" type="checkbox" <?= ($content_data['on_sale'] == 1)?'checked':'';?> /><span class="slider round"></span></label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Active Status</h5>
				<div class="form-row">
					<label class="switch"><input name="status" type="checkbox" <?= ($content_data['status'] == 1)?'checked':'';?> /><span class="slider round"></span></label>
				</div>
			</div>
		</div>
	</div>
</div>
<!--<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Product Main Image</h5>
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
</div>-->
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Product Sizes</h5>
		<div class="form-row">
			<div class="col-md-12">
				<div class="position-relative form-group">
					<select name="sizes[]" data-placeholder="Choose Product Sizes" class="chosen-select" multiple tabindex="4">
						 <option value=""></option>
						<?php foreach($sizes as $key => $size){ ?>
						<option <?= (in_array($size['id'],$product_sizes,TRUE))?'selected':'';?> value="<?= $size['id']?>"><?= $size['name']?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Product Colors</h5>
		<div class="form-row">
			<div class="col-md-12">
				<div class="position-relative form-group">
					<select name="colors[]" data-placeholder="Choose Product Colors" class="chosen-select" multiple tabindex="4">
						 <option value=""></option>
						<?php foreach($colors as $key => $color){ ?>
						<option <?= (in_array($color['id'],$product_colors,TRUE))?'selected':'';?> value="<?= $color['id']?>"><?= $color['name']?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
	</div>
</div>
<?php /** / ?>
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Product Colors <a href="javascript:;" class="btn btn-primary pull-right add-new-color"><i class="fa fa-plus"></i></a></h5>
		<div class="clearfix"></div>
		<div style="border-bottom:1px solid #ccc;margin-top:5px;margin-bottom:15px;"></div>
		<div class="clearfix"></div>
		<div class="color-div">

			<?php foreach($product_colors as $key => $pcolor){ ?>
			<div class="form-row color-form-row-<?= $key?>" data-id="<?= $key?>">
				<div class="col-md-3">
					<div class="position-relative form-group">
						<select name="colors[]" data-placeholder="Choose Product Sizes" class="chosen-select" tabindex="4">
							 <option value=""></option>
							<?php foreach($colors as $key => $color){ ?>
							<option <?= ($pcolor['color_id'] == $color['id'])?'selected':'';?> value="<?= $color['id']?>"><?= $color['name']?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-md-10">
						<div class="position-relative form-group">
							<input type="hidden" name="color_image_<?= $key?>" value="<?= ($pcolor['type'] == 'image')?$pcolor['image']:'';?>" />
							<input type="file" class="form-control color-file-input" name="color_image_<?= $key?>" id="color-file-input-<?= $key?>" data-id="<?= $key?>" onchange="change_color_image(this)" />
						</div>
					</div>
					<div class="col-md-2">
						<div class="position-relative form-group">
							<div style="border:1px solid #ccc;<?php if($pcolor['type'] == 'image'){ ?>background:url('<?= IMGURL.'uploads/product/'.$pcolor['image'];?>') no-repeat center center; background-size:cover;<?php }else{ ?>background:#<?= ($pcolor['type'] == 'color')?str_replace('#','',$pcolor['image']):'fff';?>;<?php } ?>" id="color-image-<?= $key?>">
								<img style="width:100%;" src="<?= base_url()?>assets/images/blank.png" />
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="position-relative form-group">
						<input type="text" name="color_hex_<?= $key?>" maxlength="7" class="form-control color-hex-input" id="color-hex-input-<?= $key?>" data-id="<?= $key?>" placeholder="e.g #000" value="<?= ($pcolor['type'] == 'color')?$pcolor['image']:'';?>" />
					</div>
				</div>
				<div class="col-md-1">
					<div class="position-relative form-group">
						<a href="javascript:;" class="btn btn-danger delete-color-div" data-id="<?= $key?>"><i class="fa fa-trash"></i></a>
					</div>
				</div>
			</div>
			<?php } ?>

		</div>
	</div>
</div>
<?php /**/ ?>
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Product Specifications <a href="javascript:;" class="btn btn-primary pull-right add-new-specification"><i class="fa fa-plus"></i></a></h5>
		<div class="clearfix"></div>
		<div style="border-bottom:1px solid #ccc;margin-top:5px;margin-bottom:15px;"></div>
		<div class="clearfix"></div>
		<div class="specification-div">
<?php /**/ ?>
			<?php foreach($product_specifications as $key => $feature){ ?>
			<div class="form-row specification-form-row-<?= $key?>" data-id="<?= $key?>">
				<div class="col-md-5">
					<div class="position-relative form-group">
						<input type="text" name="specification_type[]" class="form-control" placeholder="e.g Capacity" value="<?= $feature['feature']?>" />
					</div>
				</div>
				<div class="col-md-5">
					<div class="position-relative form-group">
						<input type="text" name="specification_value[]" class="form-control" placeholder="e.g 100" value="<?= $feature['value']?>" />
					</div>
				</div>
				<div class="col-md-1">
					<div class="position-relative form-group">
						<a href="javascript:;" class="btn btn-danger delete-specification-div" data-id="<?= $key?>"><i class="fa fa-trash"></i></a>
					</div>
				</div>
			</div>
			<?php } ?>
<?php /**/ ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Warranty Type</h5>
				<div class="form-row">
					<select  id="warranty_type" name="warranty_type" class="multiselect-dropdown form-control">
						<option value="">Select Warranty Type</option>
						<?php foreach($warranty_types as $key => $warranty_type){ ?>
						<option <?= ($content_data['warranty_type'] == $warranty_type['id'])?'selected':'';?> value="<?= $warranty_type['id'];?>"><?= ucwords($warranty_type['warranty_type']);?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Warranty Limit</h5>
				<div class="form-row">
					<select  id="warranty_limit" name="warranty_limit" class="multiselect-dropdown form-control">
						<option value="">Select Warranty Limit</option>
						<?php foreach($warranty_limits as $key => $warranty_limit){ ?>
						<option <?= ($content_data['warranty_limit'] == $warranty_limit['id'])?'selected':'';?> value="<?= $warranty_limit['id'];?>"><?= ucwords($warranty_limit['warranty_limit']);?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Product Main Image</h5>
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="image_box" class="">Select Image</label>
					<input name="image_box_hidden" id="image_box_hidden" type="hidden" value="small_<?= $content_data['image']?>" />
					<input  type="file" id="image" name="image_box" class="form-control" onchange="cover_image_change(this,'product','box')" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<img id="box_image" src="<?= ($content_data['image'] != '')?IMGURL.'uploads/product/small_'.$content_data['image']:base_url().'assets/images/default.jpg';?>" />
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Product Images</h5>
		<div class="form-row">
			<div class="col-md-12">
				<form id="form" action="./" method="POST">
					<div id="myDropzone" class="dropzone"></div>
				</form>
				<button type="button" id="dropzoneSubmit" class="uk-button uk-button-primary" style="display:none;">Submit</button>
			</div>
		</div>
		<div class="form-row" style="margin-top:15px;">
			<?php foreach($product_images as $key => $image){ ?>
			<div class="col-md-1 image-div-<?= $image['id']?>">
				<div style="position:relative;background:url('<?= IMGURL?>uploads/product/small_<?= $image['image']?>') no-repeat center center; background-size:cover;">
					<img style="width:100%" src="<?= base_url()?>assets/images/blank.png" />
					<a class="btn btn-danger delete-product-image" href="javascript:;" data-id="<?= $image['id']?>"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<div class="main-card mb-3 card">
	<div class="card-body">
		<button type="submit" class="mt-2 btn btn-primary pull-right" form="add_product_form">Update</button>
	</div>
</div>
<script>
/*----chosen----*/
$(".chosen-select").chosen({disable_search_threshold: 10});
/*----chosen----*/
/*----color----*/
var color_count = '<?= count($product_colors)+1?>';
$('.add-new-color').on('click',function(){
	var div = '<div class="form-row color-form-row-'+color_count+'" data-id="'+color_count+'">				<div class="col-md-3">					<div class="position-relative form-group">						<select name="colors[]" data-placeholder="Choose Product Sizes" class="chosen-select" tabindex="4">							 <option value=""></option>							<?php foreach($colors as $key => $color){ ?>							<option value="<?= $color['id']?>"><?= $color['name']?></option>							<?php } ?>						</select>					</div>				</div>				<div class="col-md-6">					<div class="col-md-10">						<div class="position-relative form-group">							<input type="file" class="form-control color-file-input" name="color_image_'+color_count+'" id="color-file-input-'+color_count+'" data-id="'+color_count+'" onchange="change_color_image(this)" />						</div>					</div>					<div class="col-md-2">						<div class="position-relative form-group">							<div style="border:1px solid #ccc;background:url(\'<?= base_url()?>assets/images/default.jpg\') no-repeat center center; background-size:cover;" id="color-image-'+color_count+'">								<img style="width:100%;" src="<?= base_url()?>assets/images/blank.png" />							</div>						</div>					</div>				</div>				<div class="col-md-2">					<div class="position-relative form-group">						<input type="text" name="color_hex_'+color_count+'" maxlength="7" class="form-control color-hex-input" id="color-hex-input-'+color_count+'" data-id="'+color_count+'" placeholder="e.g #000" />					</div>				</div>				<div class="col-md-1">					<div class="position-relative form-group">						<a href="javascript:;" class="btn btn-danger delete-color-div" data-id="'+color_count+'"><i class="fa fa-trash"></i></a>					</div>				</div>			</div>';
	$('.color-div').append(div);
	$(".chosen-select").chosen({disable_search_threshold: 10});
	color_count++;
});
$(document).on('click','.delete-color-div',function(){
	var id = $(this).data('id');
	$('.color-form-row-'+id).remove();
});
function change_color_image(input){
	var file_input = input;
	var id = $(file_input).attr('data-id');
	if (file_input.files && file_input.files[0]){
		$('#color-hex-input-'+id).val('');
		var reader = new FileReader();
		reader.onload = function (e){
			$('#color-image-'+id).css('background',"url('"+e.target.result+"') no-repeat center center");
			$('#color-image-'+id).css('background-size', 'cover');
		}
		reader.readAsDataURL(file_input.files[0]);
	}
}
$('.color-hex-input').on('keyup',function(){
	var id = $(this).data('id');
	var value = $('#color-hex-input-'+id).val();
	if(value.length > 3){
		$('#color-file-input-'+id).val(null);
		if(value.includes("#")){
			$('#color-image-'+id).css('background',value);
		}else{
			$('#color-image-'+id).css('background','#'+value);
		}

	}
});
/*----color----*/
/*----specification----*/
var specification_count = '<?= count($product_specifications)+1?>';
$('.add-new-specification').on('click',function(){
	var div = '<div class="form-row specification-form-row-'+specification_count+'" data-id="'+specification_count+'">				<div class="col-md-5">					<div class="position-relative form-group">						<input type="text" name="specification_type[]" class="form-control" placeholder="e.g Capacity" />					</div>				</div>				<div class="col-md-5">					<div class="position-relative form-group">						<input type="text" name="specification_value[]" class="form-control" placeholder="e.g 100" />					</div>				</div>				<div class="col-md-1">					<div class="position-relative form-group">						<a href="javascript:;" class="btn btn-danger delete-specification-div" data-id="'+specification_count+'"><i class="fa fa-trash"></i></a>					</div>				</div>			</div>';
	$('.specification-div').append(div);
	specification_count++;
});
$(document).on('click','.delete-specification-div',function(){
	var id = $(this).data('id');
	$('.specification-form-row-'+id).remove();
});
/*----specification----*/
/*----delete image----*/
$(document).on('click','.delete-product-image',function(){
	var id = $(this).data('id');
		$.ajax({
			url: '<?= base_url()?>home/delete_product_image',
			type: 'POST',
			data: {'id' : id},
			success: function(response){
				if(response != 0){
					$('.image-div-'+id).remove();
				}else{
					alert('Something went wrong');
				}
			}
		});
});
/*----delete image----*/
</script>
<script>
/*----DROPZONE----*/
Dropzone.autoDiscover = false;
// init dropzone on id (form or div)
$(document).ready(function() {
	var myDropzone = new Dropzone("#myDropzone", {
		url: "<?= base_url()?>home/add_product_images/<?= $hidden_id?>",
		paramName: "file",
		autoProcessQueue: true,
		uploadMultiple: true, // uplaod files in a single request
		parallelUploads: 100, // use it with uploadMultiple
		maxFilesize: 5, // MB
		maxFiles: 30,
		acceptedFiles: ".jpg, .jpeg, .png, .gif, .pdf",
		addRemoveLinks: true,
		// Language Strings
		dictFileTooBig: "File is to big ({{filesize}}mb). Max allowed file size is {{maxFilesize}}mb",
		dictInvalidFileType: "Invalid File Type",
		dictCancelUpload: "Cancel",
		dictRemoveFile: "Remove",
		dictMaxFilesExceeded: "Only {{maxFiles}} files are allowed",
		dictDefaultMessage: "<h2>Drop files here to upload</h2>",
	});
});
/*
Dropzone.options.myDropzone = {
	// The setting up of the dropzone
	init: function() {
		var myDropzone = this;
		// First change the button to actually tell Dropzone to process the queue.
		$("#dropzoneSubmit").on("click", function(e) {
			// Make sure that the form isn't actually being sent.
			e.preventDefault();
			e.stopPropagation();
			
			if (myDropzone.files != "") {
				myDropzone.processQueue();
			} else {
				$("#myDropzone").submit();
			}
		});
		// on add file
		this.on("addedfile", function(file) {
			// console.log(file);
		});
		// on error
		this.on("error", function(file, response) {
			// console.log(response);
		});
		// on start
		this.on("sendingmultiple", function(file) {
			 // console.log(file);
		});
		// on success
		this.on("successmultiple", function(file) {
			// submit form
			$("#form").submit();
		});
	}
};
*/
/*----DROPZONE----*/
</script>
<?php $this->load->view('common/cropper');?>