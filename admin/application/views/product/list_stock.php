<style>
.dropdown-menu a span{
	margin-left:8px;
}
</style>
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div><?= $page_title?></div>
		</div>
		<div class="page-title-actions">
			<!--<a class="btn btn-info btn-sm btn-shadow mr-3" href="<?= base_url()?>add_deal_product"><i class="fa fa-plus"></i> Add Deal Product</a>-->
			<a class="btn btn-info btn-sm btn-shadow mr-3 pull-right" href="<?= base_url()?>add_stock"><i class="fa fa-plus"></i> Add Product Stock</a>
		</div>
	</div>
</div>
<div class="main-card mb-3 card col-md-12">
	<div class="card-body table-responsive">
		<table style="width: 100%;" id="example" class="mb-0 table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>Sr.</th>
					<th>Name</th>
					<th>Image</th>
					<th>Quantity</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($content_data as $key => $item){ ?>
				<tr>
					<td><?= $key+1?></td>
					<td><?= ucwords(strtolower($item['name']))?></td>
					<td><img src="<?= IMGURL.'uploads/product/small_'.$item['image']?>" /></td>
					<td><?= $item['quantity'];?></td>
					<td>
						<a class="btn btn-success" href="<?= base_url()?>add_stock/<?= $item['id']?>">Add Stock</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>