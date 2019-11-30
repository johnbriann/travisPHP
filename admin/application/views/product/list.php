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
			<a class="btn btn-info btn-sm btn-shadow mr-3 pull-right" href="<?= base_url()?>add_product"><i class="fa fa-plus"></i> Add Product</a>
		</div>
	</div>
</div>
	<form class="form row" action="<?= base_url()?>products" method="POST">
		<div class="form-group col-md-3">
			<label>Manufacturer</label>
			<select id="manufacturer_id" name="manufacturer_id" class="form-control">
				<option value="">Select Manufacturer</option>
				<?php foreach($manufacturers as $key => $manufacturer){ ?>
				<option <?= ($manufacturer['id'] == $manufacturer_id)?'selected':'';?> value="<?= $manufacturer['id'];?>"><?= ucwords($manufacturer['name']);?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group col-md-3">
			<label>Brand</label>
			<select id="brand_id" name="brand_id" class="form-control">
				<option value="">Select Brand</option>
				<?php foreach($brands as $key => $brand){ ?>
				<option <?= ($brand['id'] == $brand_id)?'selected':'';?> value="<?= $brand['id'];?>"><?= ucwords($brand['name']);?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group col-md-3">
			<label>Category</label>
			<select id="category_id" name="category_id" class="form-control">
				<option value="">Select Category</option>
				<?php foreach($categories as $key => $category){ ?>
				<option <?= ($category['id'] == $category_id)?'selected':'';?> value="<?= $category['id'];?>"><?= ucwords($category['name']);?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group col-md-3">
			<label>Subcategory</label>
			<select id="subcategory_id" name="subcategory_id" class="form-control">
				<option value="">Select Subcategory</option>
				<?php foreach($subcategories as $key => $subcategory){ ?>
				<option <?= ($subcategory['id'] == $subcategory_id)?'selected':'';?> value="<?= $subcategory['id'];?>"><?= ucwords($subcategory['name']);?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group col-md-12">
			<button class="mb-2 mr-2 btn btn-primary btn-sm pull-right" type="submit">Search</button>
		</div>
	</form>
<div class="main-card mb-3 card col-md-12">
	<div class="card-body table-responsive">
		<table style="width: 100%;" id="example" class="mb-0 table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>Sr.</th>
					<th>Name</th>
					<th>Image</th>
					<th>Origin</th>
					<th>Price</th>
					<th>Status</th>
					<th>Stock</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($content_data as $key => $item){ ?>
				<tr>
					<td><?= $key+1?></td>
					<td>
					<?= ucwords(strtolower($item['name']))?><br><br>
					<?php if($item['featured'] == 1){ ?>
						<a href="javascript:;" class="mb-2 mr-2 badge badge-info">Featured</a>
					<?php } ?>
					<?php if($item['on_sale'] == 1){ ?>
						<br><a href="javascript:;" class="mb-2 mr-2 badge badge-warning">On Sale</a>
					<?php } ?>
					</td>
					<td><img src="<?= IMGURL.'uploads/product/small_'.$item['image']?>" /></td>
					<td>
						<b>Manufacturer: </b><a href="<?= base_url()?>products/manufacturer/<?= $item['manufacturer_slug']?>"><?= ucwords(strtolower($item['manufacturer_name']))?></a><br>
						<b>Brand: </b><a href="<?= base_url()?>products/brand/<?= $item['brand_slug']?>"><?= ucwords(strtolower($item['brand_name']))?></a><br>
						<b>Category: </b><a href="<?= base_url()?>products/category/<?= $item['category_slug']?>"><?= ucwords(strtolower($item['category_name']))?></a><br>
						<b>Subcategory: </b><a href="<?= base_url()?>products/subcategory/<?= $item['subcategory_slug']?>"><?= ucwords(strtolower($item['subcategory_name']))?></a>
					</td>
					<td><?= number_format($item['price'],2);?></td>
					<td><?= ($item['status']==1)?'Active':'Inactive';?></td>
					<td><?= $item['stock'];?></td>
					<td style="vertical-align: top;">
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Action
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item text-info" href="<?= base_url()?>edit_product/<?= $item['id']?>"><i class="fa fa-edit"></i> <span>Edit</span></a>
								<a class="dropdown-item text-success" href="<?= base_url()?>add_stock/<?= $item['id']?>"><i class="fa fa-plus"></i> <span>Add Stock</span></a>
								<?php if($item['featured'] == 1){ ?>
								<a class="dropdown-item text-default" href="<?= base_url()?>edit_product/<?= $item['id']?>/featured/0"><i class="fa fa-times"></i> <span>Remove Featured</span></a>
								<?php }else{ ?>
								<a class="dropdown-item text-warning" href="<?= base_url()?>edit_product/<?= $item['id']?>/featured/1"><i class="fa fa-star"></i> <span>Make Featured</span></a>
								<?php } ?>
								<?php if($item['on_sale'] == 1){ ?>
								<a class="dropdown-item text-default" href="<?= base_url()?>edit_product/<?= $item['id']?>/on_sale/0"><i class="fa fa-times"></i> <span>Remove On Sale</span></a>
								<?php }else{ ?>
								<a class="dropdown-item text-success" href="<?= base_url()?>edit_product/<?= $item['id']?>/on_sale/1"><i class="fa fa-file"></i> <span>Make On Sale</span></a>
								<?php } ?>
								<a class="dropdown-item text-danger" href="<?= base_url()?>delete_product/<?= $item['id']?>"><i class="fa fa-trash"></i> <span>Delete</span></a>
								
							</div>
						</div>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>