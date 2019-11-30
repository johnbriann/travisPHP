<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div><?= $page_title?></div>
		</div>
		<div class="page-title-actions">
			<!--<a class="btn btn-info btn-sm btn-shadow mr-3" href="<?= base_url()?>add_user"><i class="fa fa-plus"></i> Add User</a>-->
        </div>
	</div>
</div>
<div class="main-card mb-3 card">
	<div class="card-body">
		<table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>Sr.</th>
					<th>Full Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Total Orders</th>
					<th>Email Verified</th>
					<th>Status</th>
					<!--<th>Action</th>-->
				</tr>
			</thead>
			<tbody>
				<?php foreach($content_data as $key => $user){ ?>
				<tr>
					<td><?= $key+1?></td>
					<td><?= $user['first_name'].' '.$user['last_name']?></td>
					<td><?= $user['email']?></td>
					<td><?= $user['phone']?></td>
					<td><?= $user['total_orders']?></td>
					<td><?= ($user['email_verify']==1)?'Verified':'-';?></td>
					<td><?= ($user['status']==1)?'Active':'Inactive';?></td>
					<!--<td>
						<a href="<?= base_url()?>edit_user/<?= $user['id']?>">Edit</a>
						<a href="<?= base_url()?>delete_user/<?= $user['id']?>">Delete</a>
					</td>-->
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>