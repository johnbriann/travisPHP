<?php if(isset($ajax_cart)){ ?>
<?php $subtotal=0;$cartitems = $this->cart->contents();
if(!empty($cartitems)){ ?>
<?php foreach($cartitems as $cartkey => $cartitem){ ?>
<div class="product-widget">
	<div class="product-img">
		<img src="<?= base_url()?>uploads/product/small_<?= $cartitem['image']?>" alt="<?= $cartitem['name']?>" />
	</div>
	<div class="product-body">
		<h3 class="product-name"><a href="<?= base_url()?>product/<?= $cartitem['slug']?>"><?= $cartitem['name']?></a></h3>
		<h4 class="product-price"><span class="qty"><?= $cartitem['qty']?>x</span>$<?= number_format($cartitem['price'])?></h4>
	</div>
	<!--<button class="delete"><i class="fa fa-close"></i></button>-->
</div>
<?php $subtotal += $cartitem['subtotal'];} ?>
<?php }else{ ?>
<p>Your Cart is Empty</p>
<?php } ?>
<?php } ?>