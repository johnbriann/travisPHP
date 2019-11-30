<link rel="stylesheet" href="<?= base_url()?>assets/cropperjs/css/cropper.css">
<link rel="stylesheet" href="<?= base_url()?>assets/cropperjs/css/main.css">
<script src="<?= base_url()?>assets/cropperjs/js/cropper.js"></script>
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div>Settings</div>
		</div>
		<div class="page-title-actions">
			<a class="btn btn-info btn-sm btn-shadow mr-3" href="<?= base_url()?>categories">Back</a>
        </div>
	</div>
</div>
<?php if($this->session->flashdata('msg')){ ?>
<div class="alert alert-danger"><?= $this->session->flashdata('msg')?></div>
<?php } ?>
<form id="add_user_form" action="<?= base_url()?>home/update_settings" method="POST" enctype="multipart/form-Data">
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title"></h5>
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="shop_logo" class="">Shop Logo</label>
					<br>
					<img src="<?= ($content_data['shop_logo'] != "")?IMGURL.'assets/images/'.$content_data['shop_logo']:IMGURL.'assets/img/logo.png';?>" />
					<br>
					<input type="file" id="shop_logo" name="shop_logo" class="form-control" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="shop_footer_logo" class="">Shop Footer Logo</label>
					<br>
					<img src="<?= ($content_data['shop_footer_logo'] != "")?IMGURL.'assets/images/'.$content_data['shop_footer_logo']:IMGURL.'assets/img/footer_logo.png';?>" />
					<br>
					<input type="file" id="shop_footer_logo" name="shop_footer_logo" class="form-control" />
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="shop_name" class="">Shop Name</label>
					<input required type="text" id="shop_name" name="shop_name" class="form-control" placeholder="Shop Name" value="<?= $content_data['shop_name']?>" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="shop_email" class="">Shop Email</label>
					<input required type="text" id="shop_email" name="shop_email" class="form-control" placeholder="Shop Email" value="<?= $content_data['shop_email']?>" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="shop_website" class="">Shop Website</label>
					<input required type="text" id="shop_website" name="shop_website" class="form-control" placeholder="Shop Website" value="<?= $content_data['shop_website']?>" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="shop_phone" class="">Shop Phone</label>
					<input required type="text" id="shop_phone" name="shop_phone" class="form-control" placeholder="Shop Phone" value="<?= $content_data['shop_phone']?>" />
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="shop_fax" class="">Shop Fax</label>
					<input required type="text" id="shop_fax" name="shop_fax" class="form-control" placeholder="Shop Fax" value="<?= $content_data['shop_fax']?>" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="shop_address" class="">Shop Address</label>
					<input required type="text" id="shop_address" name="shop_address" class="form-control" placeholder="Shop Address" value="<?= $content_data['shop_address']?>" />
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="position-relative form-group">
					<label for="shop_description" class="">Shop Description</label>
					<textarea rows="5" id="shop_description" name="shop_description" class="form-control" placeholder="Shop Description" ><?= $content_data['shop_description']?></textarea>
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="shop_fb" class="">Facebook</label>
					<input required type="text" id="shop_fb" name="shop_fb" class="form-control" placeholder="Shop Facebook" value="<?= $content_data['shop_fb']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="shop_tw" class="">Twitter</label>
					<input required type="text" id="shop_tw" name="shop_tw" class="form-control" placeholder="Shop Twitter" value="<?= $content_data['shop_tw']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="shop_in" class="">Instagram</label>
					<input required type="text" id="shop_in" name="shop_in" class="form-control" placeholder="Shop Instagram" value="<?= $content_data['shop_in']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="shop_li" class="">LinkedIn</label>
					<input required type="text" id="shop_li" name="shop_li" class="form-control" placeholder="Shop LinkedIn" value="<?= $content_data['shop_li']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="shop_gp" class="">gPlus</label>
					<input required type="text" id="shop_gp" name="shop_gp" class="form-control" placeholder="Shop gPlus" value="<?= $content_data['shop_gp']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="shop_yt" class="">Youtube</label>
					<input required type="text" id="shop_yt" name="shop_yt" class="form-control" placeholder="Shop Youtube" value="<?= $content_data['shop_yt']?>" />
				</div>
			</div>
			
		</div>
		<button type="submit" class="mt-2 btn btn-primary">Update</button>
	</div>
</div>
</form>
<?php $this->load->view('common/cropper');?>