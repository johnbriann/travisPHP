<style>
div.btn-icon{
	position:relative;
}
div.btn-icon a i{
	position: absolute;
    right: 8px;
    top: -10px;
    font-size: 20px;
	color:#333;
}
</style>
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div>Modifiers</div>
		</div>
	</div>
</div>
<form action="<?= base_url()?>home/add_modifier_process" method="POST">
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Add New Modifier</h5>
		<div class="form-row">
			<div class="col-md-3">
				<div class="position-relative form-group">
					<label for="name_en" class="">Modifier Name</label>
					<input required type="text" id="name_en" name="name_en" class="form-control"placeholder="Modifier Name" />
				</div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
					<label for="price" class="">Modifier Price (AED)</label>
					<input  type="number" min="0.00" step="0.01" id="price" name="price" class="form-control"placeholder="Modifier Price" />
				</div>
			</div>
		</div>
		<button type="submit" class="mt-2 btn btn-primary">Create</button>
	</div>
</div>
</form>
<div class="main-card mb-3 card">
	<div class="card-body">
		<?php foreach($modifiers as $key => $modifier){ ?>
		<div class="btn-wide mb-2 mr-2 btn-icon btn-icon-right btn-pill btn btn-warning btn-lg"><?= ucwords($modifier['name_en'])?> (<?= $modifier['price']?><sup>AED</sup>) <a href="<?= base_url().'home/delete_modifier/'.$modifier['id']?>"><i class="fa fa-times"></i></a></div>
		<?php } ?>
	</div>
</div>