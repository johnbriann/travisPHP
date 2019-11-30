<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div>Categories</div>
		</div>
		<!----><div class="page-title-actions">
			<a class="btn btn-info btn-sm btn-shadow mr-3" href="<?= base_url()?>add_category"><i class="fa fa-plus"></i> Add Category</a>
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
					<th>Image</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($categories as $key => $category){ ?>
				<tr>
					<td><?= $key+1?></td>
					<td><?= ucwords($category['name_en'])?></td>
					<td style="text-align:right;"><?= $category['name_ar']?></td>
					<td><img src="<?= base_url().'uploads/category/small_'.$category['image_box']?>" width="50" /></td>
					<td><?= ucwords($category['status']);?></td>
					<td>
						<a href="<?= base_url()?>edit_category/<?= $category['id']?>">Edit</a>
						<a href="<?= base_url()?>delete_category/<?= $category['id']?>">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>