<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<?php $cartitems = $this->cart->contents();?>
			<table id="cart" class="table table-hover table-condensed">
				<thead>
					<tr>
						<th style="width:50%">Product</th>
						<th style="width:10%">Price</th>
						<th style="width:8%">Quantity</th>
						<th style="width:22%" class="text-center">Subtotal</th>
						<th style="width:10%"></th>
					</tr>
				</thead>
				<tbody>
				<?php $subtotal=0;if(!empty($cartitems)){ ?>
				<form action="<?= base_url()?>home/update_cart" method="POST">
					<?php foreach($cartitems as $cartkey => $cartitem){ ?>
					<input name="cart[<?= $cartitem['id']?>][rowid]" type="hidden" value="<?= $cartitem['rowid']?>" />
					<tr>
						<td data-th="Product">
							<div class="row">
								<div class="col-sm-2 hidden-xs"><img src="<?= base_url()?>uploads/product/small_<?= $cartitem['image']?>" alt="<?= $cartitem['name']?>" class="img-responsive"/></div>
								<div class="col-sm-10">
									<h4 class="nomargin"><a href="<?= base_url()?>product/<?= $cartitem['slug']?>"><?= $cartitem['name']?></a></h4>
									<?php if($cartitem['color'] > 0){
									$color = $this->db->where('id',$cartitem['color'])->get('color')->row_array();?>
									<p><b>Color: </b><?= ucwords($color['name'])?></p>	
									<?php } ?>
									<?php if($cartitem['size'] > 0){
									$size = $this->db->where('id',$cartitem['size'])->get('size')->row_array();?>
									<p><b>Color: </b><?= ucwords($size['name'])?></p>	
									<?php } ?>
								</div>
							</div>
						</td>
						<td data-th="Price">$<?= ($cartitem['on_sale'] == 1)?number_format($cartitem['sale_price'],2):number_format($cartitem['price'],2);?></td>
						<td data-th="Quantity">
							<input type="number" class="form-control text-center" name="cart[<?= $cartitem['id']?>][qty]" value="<?= $cartitem['qty']?>" />
						</td>
						<td data-th="Subtotal" class="text-center">$<?= number_format($cartitem['subtotal'])?></td>
						<td class="actions" data-th="">
							<button type="submit" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
							<a href="<?= base_url()?>home/remove_from_cart/<?= $cartitem['rowid']?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					<?php 
					if($cartitem['on_sale'] == 1){
						$subtotal += ($cartitem['sale_price']*$cartitem['qty']);
					}else{
						$subtotal += ($cartitem['price']*$cartitem['qty']);
					}
					// $subtotal += $cartitem['subtotal'];
					?>
					<?php } ?>
				</tbody>
				<?php }else{ ?>
					<tr>
						<td colspan="5"><h4 style="text-align: center; padding: 10px 0;">Your Cart is Empty</h4></td>
					</tr>
					<?php } ?>
				<tfoot>
					<tr class="visible-xs">
						<td class="text-center"><strong>Total $<?= number_format($subtotal)?></strong></td>
					</tr>
					<tr>
						<td><a href="<?= base_url()?>categories" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
						<td colspan="2" class="hidden-xs"></td>
						<td class="hidden-xs text-center"><strong>Total $<?= number_format($subtotal)?></strong></td>
						
						<td><?php if(!empty($cartitems)){ ?><a href="<?= base_url()?>checkout" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a><?php } ?></td>
					</tr>
				</tfoot>
			</table>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->