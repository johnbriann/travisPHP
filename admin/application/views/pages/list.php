<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div><?= $page_title?></div>
		</div>
		<!--<div class="page-title-actions">
			<a class="btn btn-info btn-sm btn-shadow mr-3" href="<?= base_url()?>add_category"><i class="fa fa-plus"></i> Add Category</a>
        </div>-->
	</div>
</div>
<div class="main-card mb-3 card">
	<div class="card-body">
		<table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>Sr.</th>
					<th>Page Title</th>
					<th>Page Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($content_data as $key => $item){ ?>
				<tr>
					<td><?= $key+1?></td>
					<td><?= ucwords($item['page_title'])?></td>
					<td><img src="<?= IMGURL.'uploads/page/small_'.$item['page_image']?>" width="50" /></td>
					<td>
						<a href="<?= base_url()?>pages/<?= $item['page_slug']?>">Edit</a>
						<!--<a href="<?= base_url()?>delete_category/<?= $item['id']?>">Delete</a>-->
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>