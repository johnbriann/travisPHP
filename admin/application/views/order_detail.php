<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<?php if($order['type']=='delivery'){$icon='delivery-icon.png';}elseif($order['type']=='takeaway'){$icon='takeaway-icon.png';}elseif($order['type']=='dine-in'){$icon='dinein-icon.png';}else{$icon='blank.png';}?>
			<div>OrderID - SM-300<?= $order['id']?> - <?= $order['total_charges']?> <sup>AED</sup> <img src="<?= base_url()?>assets/images/<?= $icon?>" style="width:50px" /></div>
			<div style="right: 0; position: absolute;">
				<a class="btn btn-primary btn-square" href="<?= (isset($_SERVER['HTTP_REFERER']))?$_SERVER['HTTP_REFERER']:base_url().'dashboard'?>"><i class="fa fa-arrow-left"></i> Back</a>
				<?php if($order['accepted'] == 0){ ?>
				<a class="btn btn-success btn-square" href="<?= base_url()?>edit_order_process/<?= $order['id']?>/accept/detail"><i class="fa fa-check"></i> Accept</a>
				<a class="btn btn-danger btn-square" href="<?= base_url()?>edit_order_process/<?= $order['id']?>/reject/detail"><i class="fa fa-times"></i> Reject</a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Customer Information</h5>
				<table  class="table table-hover table-striped table-bordered">
						<tr>
							<th></th>
							<td><img width="100" src="<?= base_url().'uploads/user/'.$customer['image']?>" /></td>
						</tr>
						<tr>
							<th>Full Name</th>
							<td><?= $order['customer_name']?></td>
						</tr>
						<tr>
							<th>Email Address</th>
							<td><?= $order['customer_email']?></td>
						</tr>
						<tr>
							<th>Phone #</th>
							<td><?= '+971'.str_replace('971','',$order['customer_phone'])?></td>
						</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Order Type Information</h5>
				<table class="table table-hover table-striped table-bordered">
				<?php if($order['type'] == 'delivery'){ ?>
						<tr>
							<th>Rider Name</th>
							<td><?= $rider['first_name'].' '.$rider['last_name']?></td>
						</tr>
						<tr>
							<th>Building Name / Building No.</th>
							<td><?= $order['customer_building_name']?></td>
						</tr>
						<tr>
							<th>Area</th>
							<td><?= $order['customer_area']?></td>
						</tr>
						<tr>
							<th>House / Flat</th>
							<td><?= $order['customer_house_flat']?></td>
						</tr>
						<tr>
							<th>Street Address</th>
							<td><?= $order['customer_address']?></td>
						</tr>
						<tr>
							<th>Sub-Street Address</th>
							<td><?= $order['customer_address2']?></td>
						</tr>
						<tr>
							<th>Extra Direction</th>
							<td><?= $order['customer_extra_direction']?></td>
						</tr>
				<?php }elseif($order['type'] == 'dine-in'){ ?>
						<tr>
							<th>Waiter Name</th>
							<td><?= $waiter['first_name'].' '.$waiter['last_name']?></td>
						</tr>
						<tr>
							<th>Table #</th>
							<td><?= $order['table_no']?></td>
						</tr>
						<tr>
							<th>PAX #:</th>
							<td><?= $order['pax_no']?></td>
						</tr>
				<?php }elseif($order['type'] == 'takeaway'){ ?>
						<tr>
							<th>Waiter Name</th>
							<td><?= $waiter['first_name'].' '.$waiter['last_name']?></td>
						</tr>
						<tr>
							<th>Vehicle #</th>
							<td><?= $order['customer_vehicle_no']?></td>
						</tr>
				<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Order Information</h5>
				<table class="table table-hover table-striped table-bordered">
						<tr>
							<th>Order ID</th>
							<td><?= 'SM-O300'.$order['id']?></td>
						</tr>
						<tr>
							<th>Order Type</th>
							<td><?= ucwords($order['type'])?></td>
						</tr>
						<tr>
							<th>Order Date-Time</th>
							<td><?= date('M d @ h:i a',strtotime($order['order_date']))?></td>
						</tr>
						<tr>
							<th>Dispatch/Serving Date-Time</th>
							<td><?= date('M d @ h:i a',strtotime($order['order_date']))?></td>
						</tr>
						<tr>
							<th>Delivery/Complete Date-TIme</th>
							<td><?= date('M d @ h:i a',strtotime($order['order_date']))?></td>
						</tr>
						<tr>
							<th>Order Status</th>
							<td><?= ucwords($order['order_status'])?></td>
						</tr>
						<?php if($order['order_status'] == 'rejected' || $order['order_status'] == 'canceled'){ ?>
						<tr>
							<th>Reason</th>
							<td><?= $order['reason']?></td>
						</tr>
						<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="main-card mb-3 card">
	<div class="card-body">
	<h5 class="card-title">Order Items</h5>
		<table  class="table table-hover table-striped table-bordered">
				<tr>
					<th>Sr #</th>
					<th>Item</th>
					<th>Price (AED)</th>
					<th>Quantity</th>
					<th>Sub-Total</th>
					<th>Mods</th>
					<th>Comments</th>
				</tr>
				<?php foreach($items as $key => $item){ ?>
				<tr>
					<td><?= $key+1?></td>
					<td><?= ucwords($item['name_en'])?></td>
					<td><?= $item['unit_price']?> <sup>AED<sup></td>
					<td><?= $item['quantity']?></td>
					<td><?= $item['total_price']?> <sup>AED<sup></td>
					<td>
						<?php if($item['mod'] == 'no'){
							echo "-";
						}else{
							foreach($item['mods'] as $mkey => $mod){
								echo '- ';
								echo ucwords($mod['type'].' '.$mod['modifier']).' - '.$mod['price'].' <sup>AED</sup>';
								echo '<br>';
							}
						}?>
					</td>
					<td><?= $item['comments']?></td>
				</tr>
				<?php } ?>
		</table>
	</div>
</div>