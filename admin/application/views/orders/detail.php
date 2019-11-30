<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div>OrderID - SP-300<?= $order['id']?> - $<?= $order['order_total']?></div>
			<div style="right: 0; position: absolute;">
				<a class="btn btn-primary btn-square" href="<?= base_url().'orders'?>"><i class="fa fa-arrow-left"></i> Back</a>
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
							<td><img width="100" src="<?= IMGURL.'assets/images/default-user.jpg'?>" /></td>
						</tr>
						<tr>
							<th>Full Name</th>
							<td><?= $customer['first_name'].' '.$customer['last_name']?></td>
						</tr>
						<tr>
							<th>Email Address</th>
							<td><?= $customer['email']?></td>
						</tr>
						<tr>
							<th>Phone #</th>
							<td><?= $customer['phone']?></td>
						</tr>
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
							<td><?= 'SP-O300'.$order['id']?></td>
						</tr>
						<tr>
							<th>Order Date-Time</th>
							<td><?= date('M d @ h:i a',strtotime($order['order_date']))?></td>
						</tr>
						<tr>
							<th>Dispatch/Serving Date-Time</th>
							<td><?= date('M d @ h:i a',strtotime($order['shipping_date']))?></td>
						</tr>
						<tr>
							<th>Delivery/Complete Date-TIme</th>
							<td><?= date('M d @ h:i a',strtotime($order['delivery_date']))?></td>
						</tr>
						<tr>
							<th>Order Status</th>
							<td><?= ucwords($order['order_status'])?></td>
						</tr>
						<?php if($order['returned'] == 1){ ?>
						<tr>
							<th>Return Date-TIme</th>
							<td><?= date('M d @ h:i a',strtotime($order['returned_date']))?></td>
						</tr>
						<tr>
							<th>Tracking ID</th>
							<td><?= $order['return_tracking_id']?></td>
						</tr>
						<tr>
							<th>Return Reason</th>
							<td><?= $order['return_reason']?></td>
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
					<th>Price ($)</th>
					<th>Quantity</th>
					<th>Sub-Total</th>
				</tr>
				<?php foreach($items as $key => $item){ ?>
				<tr>
					<td><?= $key+1?></td>
					<td><?= ucwords($item['name'])?></td>
					<td>$<?= $item['item_price']?></td>
					<td><?= $item['item_quantity']?></td>
					<td>$<?= $item['subtotal']?></td>
				</tr>
				<?php } ?>
		</table>
	</div>
</div>