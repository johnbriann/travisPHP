<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div><?= $page_title?></div>
		</div>
		<div class="page-title-actions">
			<a class="btn btn-info btn-sm btn-shadow mr-3" href="<?= base_url()?>stock">Back</a>
        </div>
	</div>
</div>
<?php if($this->session->flashdata('msg')){ ?>
<div class="alert alert-danger"><?= $this->session->flashdata('msg')?></div>
<?php } ?>
<form id="add_product_form" action="<?= base_url()?>home/add_stock_process" method="POST" enctype="multipart/form-Data">
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Product Information</h5>
		<div class="form-row">
			<div class="col-md-8">
				<div class="position-relative form-group">
					<label for="product_id" class="">Product Name</label>
					<select required id="product_id" name="product_id" class="multiselect-dropdown form-control">
						<option value="">Select Product</option>
						<?php foreach($products as $key => $product){ ?>
						<option <?= (isset($product_id) && $product_id == $product['id'])?'selected':'';?> value="<?= $product['id'];?>"><?= ucwords($product['name']);?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="quantity" class="">Stock Available</label>
					<input required type="number" step="1" id="quantity" name="quantity" class="form-control" placeholder="Stock Available" />
				</div>
			</div>
		</div>
		<button type="submit" class="mt-2 btn btn-primary">Add</button>
	</div>
</div>
</form>