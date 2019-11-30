<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div><?= $page_title?></div>
		</div>
		<div class="page-title-actions">
			<a class="btn btn-info btn-sm btn-shadow mr-3" href="<?= base_url()?>add_brand"><i class="fa fa-plus"></i> Add Brand</a>
        </div>
	</div>
</div>
<div class="main-card mb-3 card">
	<div class="card-body">
		<table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>Sr.</th>
					<th>Name</th>
					<th>Image</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($content_data as $key => $item){ ?>
				<tr>
					<td><?= $key+1?></td>
					<td><?= ucwords($item['name'])?></td>
					<td><img src="<?= IMGURL.'uploads/brand/small_'.$item['image']?>" width="50" /></td>
					<td><?= ($item['status']==1)?'Active':'Inactive';?></td>
					<td>
						<a href="<?= base_url()?>edit_brand/<?= $item['id']?>">Edit</a>
						<a href="<?= base_url()?>delete_brand/<?= $item['id']?>">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>