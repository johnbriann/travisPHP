<!-- HEADER -->
<header>
	<!-- TOP HEADER -->
	<div id="top-header">
		<div class="container">
			<ul class="header-links pull-left">
				<li><a href="#"><i class="fa fa-phone"></i> +<?= $settings['shop_phone']?></a></li>
				<li><a href="#"><i class="fa fa-envelope-o"></i> <?= $settings['shop_email']?></a></li>
				<li><a href="#"><i class="fa fa-map-marker"></i> <?= $settings['shop_address']?></a></li>
			</ul>
			<ul class="header-links pull-right">
				<?php if($this->session->userdata('id')){ ?>
				<li><a href="<?= base_url()?>my_account"><i class="fa fa-user-o"></i> My Account</a></li>
				<li><a href="<?= base_url()?>logout"><i class="fa fa-lock"></i> Logout</a></li>
				<?php }else{ ?>
				<li><a href="javascript:;" id="topbar-login-btn"><i class="fa fa-lock"></i> Login / Register</a></li>
				<?php } ?>
				
			</ul>
		</div>
	</div>
	<!-- /TOP HEADER -->

	<!-- MAIN HEADER -->
	<div id="header">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- LOGO -->
				<div class="col-md-3">
					<div class="header-logo">
						<a href="<?= base_url()?>" class="logo">
							<img src="<?= base_url()?>assets/images/<?= $settings['shop_logo']?>" alt="<?= $settings['shop_name']?>">
						</a>
					</div>
				</div>
				<!-- /LOGO -->

				<!-- SEARCH BAR -->
				<div class="col-md-6">
					<div class="header-search">
						<form action="<?= base_url()?>search" method="GET">
							<select class="input-select" name="c" id="top-categories-dropdown">
								<option value="all">All Categories</option>
								<?php foreach($all_categories as $ckey => $top_category){ ?>
								<option value="<?= $top_category['slug']?>"><?= ucwords($top_category['name'])?></option>
								<?php } ?>
							</select>
							<input class="input" placeholder="Search here" name="q" />
							<button type="submit" class="search-btn">Search</button>
						</form>
					</div>
				</div>
				<!-- /SEARCH BAR -->

				<!-- ACCOUNT -->
				<div class="col-md-3 clearfix">
					<div class="header-ctn">
<?php /** / ?>
						<!-- Wishlist -->
						<div>
							<a href="#">
								<i class="fa fa-heart-o"></i>
								<span>Your Wishlist</span>
								<div class="qty">2</div>
							</a>
						</div>
						<!-- /Wishlist -->
<?php /**/ ?>
						<!-- Cart -->
						<?php $cartitems = $this->cart->contents();?>
						<div class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<i class="fa fa-shopping-cart"></i>
								<span>Your Cart</span>
								<div class="qty topbar-cart-qty <?php if(empty($cartitems)){ ?>hidden<?php } ?>"><?= count($cartitems)?></div>
							</a>
							<div class="cart-dropdown">
								<div class="cart-list topbar-cart-list">
									<?php $subtotal=0;if(!empty($cartitems)){ ?>
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
								</div>
								<div class="cart-summary">
									<h5>SUBTOTAL: $<span class="topbar-cart-subtotal"><?= number_format($subtotal)?></span></h5>
								</div>
								<div class="cart-btns">
									<a href="<?= base_url()?>cart">View Cart</a>
									<a href="<?= (!empty($cartitems))?base_url().'checkout':'#';?>">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
						<!-- /Cart -->

						<!-- Menu Toogle -->
						<div class="menu-toggle">
							<a href="#">
								<i class="fa fa-bars"></i>
								<span>Menu</span>
							</a>
						</div>
						<!-- /Menu Toogle -->
					</div>
				</div>
				<!-- /ACCOUNT -->
			</div>
			<!-- row -->
		</div>
		<!-- container -->
	</div>
	<!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->