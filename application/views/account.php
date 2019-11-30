<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view('common/header');?>
		<?php $this->load->view('common/header_scripts');?>
	</head>
	<body>
		<?php $pageData['settings'] = get_settings();?>
		<?php $pageData['all_categories'] = get_categories();?>
		<!--Lower Header Section -->
		<?php $this->load->view('common/top_bar',$pageData);?>
<style>
.tab-content>.tab-pane {
    padding: 25px 10px;
    border: 1px solid #ccc;
}
</style>		
		<!-- Body Section -->
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<h2>My Account</h2>
					<div class="col-md-12">
						<ul class="nav nav-tabs nav-justified">
							<li class="active"><a data-toggle="tab" href="#orders">My Orders</a></li>
							<li><a data-toggle="tab" href="#profile">Profile</a></li>
						</ul>

						<div class="tab-content">
							<div id="orders" class="tab-pane fade in active">
								<div class="table-responsive">
									<table class="table table-bordered">
										<tr>
											<th>Order ID</th>
											<th>Total Charges</th>
											<th>Order Date</th>
											<th>Order Status</th>
											<th>Action</th>
										</tr>
										<?php foreach($orderData as $okey => $order){ ?>
										<tr style="background:#ccc;">
											<td>SP-300<?= $order['id']?></td>
											<td>$<?= $order['order_total']?></td>
											<td><?= date('M d @ h:i a',strtotime($order['order_date']))?></td>
											<td><?= ucwords($order['order_status'])?></td>
											<td>
											<?php if($order['returned'] == 1){ ?>
											<a class="btn btn-danger btn-sm">Disputed</a>
											<?php }elseif($order['order_status'] == 'delivered'){ ?>
											<a class="btn btn-warning dispute-btn" href="javascript:;" data-id="<?= $order['id']?>"><i class="fa fa-times"></i> Dispute</a>
											<?php } ?>
											</td>
										</tr>
										<tr>
										<td colspan="5">
										<?php if(isset($order['items'])){ ?>
											<table class="table table-bordered">
												<tr>
													<th>Sr #</th>
													<th>Item</th>
													<th>Price ($)</th>
													<th>Quantity</th>
													<th>Sub-Total</th>
												</tr>
												<?php foreach($order['items'] as $key => $item){ ?>
												<tr>
													<td><?= $key+1?></td>
													<td><?= ucwords($item['name'])?></td>
													<td>$<?= $item['item_price']?></td>
													<td><?= $item['item_quantity']?></td>
													<td>$<?= $item['subtotal']?></td>
												</tr>
												<?php } ?>
											</table>
										<?php } ?>
										</td>
										</tr>
										<?php } ?>
									</table>
								</div>
							</div>
							<div id="profile" class="tab-pane fade">
								<form action="<?= base_url()?>home/update_profile" method="POST">
									<div class="form-group col-md-6">
										<label>First Name</label>
										<input required name="first_name" id="first_name" placeholder="First Name" type="text" class="form-control" value="<?= $customerData['first_name']?>" />
									</div>
									<div class="form-group col-md-6">
										<label>Last Name</label>
										<input required name="last_name" id="last_name" placeholder="Last Name" type="text" class="form-control" value="<?= $customerData['last_name']?>" />
									</div>
									<div class="form-group col-md-6">
										<label>Email Address</label>
										<input required readonly name="email" id="email" placeholder="Email Address" type="text" class="form-control" value="<?= $customerData['email']?>" />
									</div>
									<div class="form-group col-md-6">
										<label>Phone</label>
										<input required name="phone" id="phone" placeholder="Phone" type="text" class="form-control" value="<?= $customerData['phone']?>" />
									</div>
									<input type="submit" value="Update" class="btn btn-primary" />
								</form>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
<!-- Modal -->
<div id="return-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Return Order</h4>
			</div>
			<form action="<?= base_url()?>home/return_order" method="POST" id="dispute-form">
				<input name="order_id" id="return_order_id" type="hidden" value="0" />
				<div class="modal-body">
					<p>Tell us in detail, the issue with the order. Legal resons will be considered. All illegal reason will be denied and order will be sent back to owner.</p>
					<div class="form-group">
						<label>Tracking ID</label>
						<input required name="tracking_id" id="tracking_id" placeholder="Tracking ID" type="text" class="form-control" />
					</div>
					<div class="form-group">
						<label>Reason</label>
						<textarea required rows="4" name="return_reason" id="return_reason" placeholder="Reason" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default cancel-return" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-warning return-okay">Return</button>
				</div>
			</form>
		</div>
	</div>
</div>
		<!--Footer-->
		<?php $this->load->view('common/footer',$pageData);?>

		<?php $this->load->view('common/footer_scripts',$pageData);?>
<script>
$(document).on('click','.cancel-return',function(){
	$('#return_reason').val('');
	$('#tracking_id').val('');
	$('#return_order_id').val('0');
});
$(document).on('click','.return-okay',function(){
	$('.return-okay').attr('disabled',true);
	var validate = 0;
	var tracking_id = $('#tracking_id').val();
	var return_reason = $('#return_reason').val();
	var return_order_id = $('#return_order_id').val();
	if(tracking_id != "" && return_reason != "" && return_order_id > 0){
		$('#dispute-form')[0].submit();
	}else{
		alert('Fields are required');
		$('.return-okay').removeAttr('disabled');
	}
	
});
$(document).on('click','.dispute-btn',function(){
	$this = $(this);
	var order_id = $this.data('id');
	$('#return_order_id').val(order_id);
	$('#return-modal').modal('show');
});
</script>
	</body>
</html>