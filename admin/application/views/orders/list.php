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
					<th>Total ($)</th>
					<?php if($this->uri->segment(2) != 'returned'){ ?>
					<th>Discount</th>
					<?php } ?>
					<th>Customer Name</th>
					<th>Order Date/Time</th>
					<?php if($this->uri->segment(2) == 'returned'){ ?>
					<th>Return Date/Time</th>
					<th>Reason</th>
					<?php }else{ ?>
					<th>Order Status</th>
					<th>Action</th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach($orders as $key => $order){ ?>
				<tr>
					<td class="first_col"><?= $key?></td>
					<td><a target="_blank" href="<?= base_url()?>order_detail/<?= $order['id']?>"><?= 'SP-300'.$order['id']?></a></td>
					<td>$<?= $order['order_total']?></td>
					<?php if($this->uri->segment(2) != 'returned'){ ?>
					<td><?= ($order['discount']>0)?'Yes':'No';?></td>
					<?php } ?>
					<td><?= $order['first_name'].' '.$order['last_name']?></td>
					<td><?= date('M d @ h:i a',strtotime($order['order_date']))?></td>
					<?php if($this->uri->segment(2) == 'returned'){ ?>
					<td><?= date('M d @ h:i a',strtotime($order['returned_date']))?></td>
					<td><?= $order['return_reason']?></td>
					<?php }else{ ?>
					<td><?= ucfirst($order['order_status'])?></td>
					<td>
						<a class="btn btn-success" href="<?= base_url()?>edit_order_process/<?= $order['id']?>/complete"><i class="fa fa-check"></i> Complete</a>
						<a class="btn btn-info" href="<?= base_url()?>order_detail/<?= $order['id']?>"><i class="fa fa-eye"></i> View</a>
					</td>
					<?php } ?>
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