<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div>Products</div>
		</div>
		<div class="page-title-actions">
			<a class="btn btn-info btn-sm btn-shadow mr-3" href="<?= base_url()?>add_deal_product"><i class="fa fa-plus"></i> Add Deal Product</a>
			<a class="btn btn-info btn-sm btn-shadow mr-3" href="<?= base_url()?>add_product"><i class="fa fa-plus"></i> Add Product</a>
        </div>
	</div>
</div>
<div class="main-card mb-3 card">
	<div class="card-body">
		<table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>Sr.</th>
					<th>Name (en)</th>
					<th>Name (ar)</th>
					<th>Category</th>
					<th>Image</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($products as $key => $product){ ?>
				<tr>
					<td><?= $key+1?></td>
					<td><?= ucwords(strtolower($product['name_en']))?></td>
					<td style="text-align:right;"><?= $product['name_ar']?></td>
					<td><?= ucwords(strtolower($product['category_name']))?></td>
					<td><img src="<?= base_url().'uploads/product/small_'.$product['image']?>" /></td>
					<td><?= ucwords($product['status']);?></td>
					<td>
						<a href="<?= base_url()?>edit_product/<?= $product['id']?>">Edit</a>
						<a href="<?= base_url()?>delete_product/<?= $product['id']?>">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>