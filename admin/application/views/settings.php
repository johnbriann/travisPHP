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
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="restaurant_name" class="">Restaurant Name</label>
					<input required type="text" id="restaurant_name" name="restaurant_name" class="form-control" placeholder="Restaurant Name" value="<?= $settings['restaurant_name']?>" />
				</div>
			</div>
<?php /** / ?>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="open_time" class="">Open Time</label>
					<input required type="text" id="open_time" name="open_time" class="form-control" value="<?= $settings['open_time']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="close_time" class="">Close Time</label>
					<input required type="text" id="close_time" name="close_time" class="form-control" value="<?= $settings['close_time']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="loyalty_amount" class="">Loyalty Amount</label>
					<input required type="text" id="loyalty_amount" name="loyalty_amount" class="form-control" value="<?= $settings['loyalty_amount']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="loyalty_points" class="">Loyalty Points</label>
					<input required type="text" id="loyalty_points" name="loyalty_points" class="form-control" value="<?= $settings['loyalty_points']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="maps_places_key" class="">Maps Places Key</label>
					<input required type="text" id="maps_places_key" name="maps_places_key" class="form-control" value="<?= $settings['maps_places_key']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="maps_services_key" class="">Maps Services Key</label>
					<input required type="text" id="maps_services_key" name="maps_services_key" class="form-control" value="<?= $settings['maps_services_key']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="map_routes_key" class="">Maps Routes Key</label>
					<input required type="text" id="map_routes_key" name="map_routes_key" class="form-control" value="<?= $settings['map_routes_key']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="firebase_server_key" class="">Firebase Server Key</label>
					<input required type="text" id="firebase_server_key" name="firebase_server_key" class="form-control" value="<?= $settings['firebase_server_key']?>" />
				</div>
			</div>
<?php /**/ ?>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="gst" class="">VAT</label>
					<input required type="number" min="0" step="1" id="gst" name="gst" class="form-control" value="<?= $settings['gst']?>" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="gst_option" class="">VAT Option</label>
					<select required id="gst_option" name="gst_option" class="multiselect-dropdown form-control">
						<option <?= ($settings['gst_option'] == 'inclusive')?'selected':'';?> value="inclusive">Inclusive</option>
						<option <?= ($settings['gst_option'] == 'exclusive')?'selected':'';?> value="exclusive">Exclusive</option>
					</select>
				</div>
			</div>
			
		</div>
		<button type="submit" class="mt-2 btn btn-primary">Update</button>
	</div>
</div>

</form>
<?php $this->load->view('common/cropper');?>