<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div><?= $page_title?></div>
		</div>
		<div class="page-title-actions">
			<a class="btn btn-info btn-sm btn-shadow mr-3" href="<?= base_url()?>add_user"><i class="fa fa-plus"></i> Add User</a>
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
					<th>Username</th>
					<th>Email</th>
					<th>Phone</th>
					<?php if($this->uri->segment(2) == 'customers'){ ?>
					<th>Area</th>
					<th>Address</th>
					<?php } ?>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($users as $key => $user){ ?>
				<tr>
					<td><?= $key+1?></td>
					<td><?= $user['first_name'].' '.$user['last_name']?></td>
					<td><?= $user['username']?></td>
					<td><?= $user['email']?></td>
					<td><?= ($user['country_code'] > 0)?'+'.$user['country_code'].$user['phone']:$user['phone'];?></td>
					<?php if($this->uri->segment(2) == 'customers'){ ?>
					<td>
					<?= ($user['area'] != "")?$user['area']	:'';?>
					</td>
					<td>
						<?= ($user['building_name'] != "")?$user['building_name'].', ':'';?>
						<?= ($user['house_flat'] != "")?$user['house_flat'].', ':'';?>
						<?= ($user['address'] != "")?$user['address'].', ':'';?>
						<?= ($user['address2'] != "")?$user['address2'].', ':'';?>
						<?= ($user['city'] != "")?$user['city'].', ':'';?>
						<?= ($user['extra_direction'] != "")?'<br><b>Extra Direction:</b> '.$user['extra_direction']:'';?>
					</td>
					<?php } ?>
					<td><?= ucwords($user['status']);?></td>
					<td>
						<!--<a href="<?= base_url()?>edit_user/<?= $user['id']?>">Edit</a>-->
						<a href="<?= base_url()?>delete_user/<?= $user['id']?>">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>