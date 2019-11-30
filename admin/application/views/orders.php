<?php $url = $this->uri->segment(2);?>
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading" style="width:100%;">
			<div style="width:100%;"><?= str_replace('_orders','',$page_title)?>
				<a class="btn btn-primary btn-square pull-right" href="<?= base_url()?>dashboard"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
		</div>
	</div>
</div>
<style>
.first_col {
	display:none !important;
}
</style>
<div class="main-card mb-3 card">
	<div class="card-body">
		<table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th class="first_col">#</th>
					<th>OrderID</th>
					<th>Source</th>
					<th>Type</th>
					<th>Total (AED)</th>
					<th>Waiter</th>
					<th>Table #</th>
					<th>Customer Name</th>
					<th>Order Date/Time</th>
					<?php if($url == 'total_orders' || $url == 'dinein_orders' || $url == 'takeaway_orders' || $url == 'delivery_orders'){ ?>
					<th>Order Status</th>
					<?php } ?>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($orders as $key => $order){ ?>
				<tr>
					<td class="first_col"><?= $key?></td>
					<td><a target="_blank" href="<?= base_url()?>order_detail/<?= $order['id']?>"><?= 'SM-300'.$order['id']?></a></td>
					<td><?php if($order['type'] == 'delivery'){ echo "Customer APP";}else{echo "TABLET";}?></td>
					<td><?= ucwords($order['type'])?></td>
					<td><?= $order['total_charges']?> <sup>AED</sup></td>
					<td><?= $order['first_name'].' '.$order['last_name']?></td>
					<td><?= $order['table_no']?></td>
					<td><?= $order['customer_name']?></td>
					<td><?= date('M d @ h:i a',strtotime($order['order_date']))?></td>
					<?php if($url == 'total_orders' || $url == 'dinein_orders' || $url == 'takeaway_orders' || $url == 'delivery_orders'){ ?>
					<td><?= ucfirst($order['order_status'])?></td>
					<?php } ?>
					<td>
						<?php if($order['accepted'] < 2){ ?>
						<?php if($order['order_status'] != "delivered"){ ?>
						<a class="btn btn-success" href="<?= base_url()?>edit_order_process/<?= $order['id']?>"><i class="fa fa-check"></i> Complete</a>
						<?php } ?>
						<a class="btn btn-primary" target="_blank" href="<?= base_url()?>order_detail_print/<?= $order['id']?>"><i class="fa fa-print"></i> Print</a>
						<?php } ?>
						<a class="btn btn-info" href="<?= base_url()?>order_detail/<?= $order['id']?>"><i class="fa fa-eye"></i> View</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<script>
$(document).ready(function(){
	$('.first_col').css('display','none !important');
});
</script>