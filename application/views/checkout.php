<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<form action="<?= base_url()?>home/checkout_process" method="POST">
			<div class="col-md-7">
				<!-- Billing Details -->
				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">Billing address</h3>
					</div>
					<div class="form-group">
						<input required class="input" type="text" name="first_name" placeholder="First Name">
					</div>
					<div class="form-group">
						<input required class="input" type="text" name="last_name" placeholder="Last Name">
					</div>
					<div class="form-group">
						<input class="input" type="text" name="company" placeholder="Comapny (optional)">
					</div>
					<div class="form-group">
						<input required class="input" type="email" name="email" placeholder="Email">
					</div>
					<div class="form-group">
						<input required class="input" type="text" name="phone" id="bphone" placeholder="Telephone">
					</div>
					<div class="form-group">
						<input required class="input" type="text" name="street_address" placeholder="Address">
					</div>
					<div class="form-group">
						<input required class="input" type="text" name="city" placeholder="City">
					</div>
					<div class="form-group">
					  <select required class="form-control" name="state" id="bstate">
						<option value="">Select State</option>
						<?php foreach($states as $key => $state){ ?>
						<option value="<?= $state['code']?>"><?= $state['name']?></option>
						<?php } ?>
					  </select>
					</div>
					<input class="input" type="hidden" name="country" placeholder="Country" value="US">
					<div class="form-group">
						<input required class="input" type="text" name="zip" placeholder="ZIP Code">
					</div>
				</div>
				<!-- /Billing Details -->

				<!-- Shiping Details -->
				<div class="shiping-details">
					<div class="section-title">
						<h3 class="title">Shiping address</h3>
					</div>
					<div class="input-checkbox">
						<input type="checkbox" id="shiping-address">
						<label for="shiping-address">
							<span></span>
							Ship to a diffrent address?
						</label>
						<div class="caption">
							<div class="form-group">
								<input class="input" type="text" name="sfirst_name" id="first_name" placeholder="First Name">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="slast_name" id="last_name" placeholder="Last Name">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="scompany"  id="company" placeholder="Comapny (optional)">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="semail" id="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="sphone" id="phone" placeholder="Telephone">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="sstreet_address" id="street_address" placeholder="Address">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="scity" id="city" placeholder="City">
							</div>
							<div class="form-group">
							  <select required class="form-control" name="sstate" id="state">
								<option value="">Select State</option>
								<?php foreach($states as $key => $state){ ?>
								<option value="<?= $state['code']?>"><?= $state['name']?></option>
								<?php } ?>
							  </select>
							</div>
							<input class="input" type="hidden" name="scountry" placeholder="Country" value="US">
							<div class="form-group">
								<input class="input" type="text" name="szip" id="zip" placeholder="ZIP Code">
							</div>
						</div>
					</div>
				</div>
				<!-- /Shiping Details -->

				<!-- Order notes -->
				<div class="order-notes">
					<textarea class="input" placeholder="Order Notes" name="notes"></textarea>
				</div>
				<!-- /Order notes -->
			</div>

			<!-- Order Details -->
			<div class="col-md-5 order-details">
				<div class="section-title text-center">
					<h3 class="title">Your Order</h3>
				</div>
				<div class="order-summary">
					<div class="order-col">
						<div><strong>PRODUCT</strong></div>
						<div><strong>TOTAL</strong></div>
					</div>
					<div class="order-products">
						<?php $cartitems = $this->cart->contents();?>
						<?php $subtotal=0;if(!empty($cartitems)){ ?>
						<?php foreach($cartitems as $cartkey => $cartitem){ ?>
						<div class="order-col">
							<div><?= $cartitem['name']?></div>
							<div><?= $cartitem['qty']?>x $<?= ($cartitem['on_sale'] == 1)?number_format($cartitem['sale_price'],2):number_format($cartitem['price'],2);?></div>
						</div>
						<?php
						if($cartitem['on_sale'] == 1){
							$subtotal += ($cartitem['sale_price']*$cartitem['qty']);
						}else{
							$subtotal += ($cartitem['price']*$cartitem['qty']);
						}
						?>
						<?php } ?>
						<?php } ?>
					</div>
					<div class="order-col">
						<div><strong>Shiping</strong></div>
						<div>FREE</div>
					</div>
					<div class="order-col">
						<div><strong>Discount</strong></div>
						<div>0%</div>
					</div>
					<div class="order-col">
						<div><strong>TOTAL</strong></div>
						<div><strong class="order-total">$<?= ($this->cart->contents())?number_format($subtotal,2):''; ?></strong></div>
						<input name="order_total" type="hidden" value="<?= ($this->cart->contents())?number_format($subtotal,2):''; ?>" />
						<input name="shipping_amount" type="hidden" value="0.00" />
						<input name="discount_amount" type="hidden" value="0.00" />
					</div>
				</div>
				<div class="payment-method">
					<div class="form-group col-md-12">
						<input required type="text" class="input" name="card_number" id="card-number" placeholder="Card Number" />
					</div>
					<div class="form-group col-md-7">
						<input required type="text" class="input" name="card_expiry" id="card-expiry" placeholder="Card Expiry" />
					</div>
					<div class="form-group col-md-5">
						<input required type="text" class="input" name="card_cvv2" id="card-cvv2" placeholder="CVV2" />
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="input-checkbox">
					<input required type="checkbox" id="terms">
					<label for="terms">
						<span></span>
						I've read and accept the <a target="_blank" href="<?= base_url()?>terms-and-conditions">terms & conditions</a>
					</label>
				</div>
				<button type="submit" class="primary-btn order-submit" style="width:100%;">Place order</button>
			</div>
			</form>
			<!-- /Order Details -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<script>
$('#phone,#bphone').mask('+1(999) 999-9999');
$('#card-number').mask('9999 9999 9999 9999');
$('#card-expiry').mask('99/99');
$('#card-cvv2').mask('999');
$(document).on('change','#bstate',function(){
	var value = $('#bstate').val();
	$('#state').val(value);
});
$(document).on('keyup','input',function(){
	var id = $(this).attr('name');
	var value = $(this).val();
	$('#'+id).val(value);
});
</script>