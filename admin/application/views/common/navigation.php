<?php 
$uri = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);
$uri3 = $this->uri->segment(3);
if($uri == 'index.php'){
	$uri = $this->uri->segment(2);
	$uri2 = $this->uri->segment(3);
	$uri3 = $this->uri->segment(4);
}
// echo $uri;exit;
?>
<div class="app-sidebar sidebar-shadow">
	<div class="app-header__logo">
		<div class="logo-src"><img src="<?= base_url()?>assets/images/logo-black.png" style="width:40px;" /></div>
		<div class="header__pane ml-auto">
			<div>
				<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>
	</div>
	<div class="app-header__mobile-menu">
		<div>
			<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
		</div>
	</div>
	<div class="app-header__menu">
		<span>
			<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
				<span class="btn-icon-wrapper">
					<i class="fa fa-ellipsis-v fa-w-6"></i>
				</span>
			</button>
		</span>
	</div>
	<div class="scrollbar-sidebar">
		<div class="app-sidebar__inner">
			<ul class="vertical-nav-menu">
				<li class="app-sidebar__heading">Main Menu</li>
				<li class="<?= ($uri == 'dashboard')?'mm-active':'';?>">
					<a href="<?= base_url()?>dashboard" aria-expanded="false">
						<i class="metismenu-icon fa fa-angle-right"></i>Dashboard
					</a>
				</li>
				<li class="<?= ($uri == 'pages' || $uri == 'homepage_slider')?'mm-active':'';?>">
					<a href="javascript:;" aria-expanded="true">
						<i class="metismenu-icon fa fa-angle-right"></i>Pages
						<i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
					</a>
					<ul class="mm-collapse">
						<li>
							<a href="<?= base_url()?>homepage_slider" class="<?= ($uri == 'homepage_slider')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Homapage Slider
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>pages/about-us" class="<?= ($uri2 == 'about-us')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>About Us
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>pages/our-services" class="<?= ($uri2 == 'our-services')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Our Services
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>pages/contact-us" class="<?= ($uri2 == 'contact-us')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Contact Us
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>pages/privacy-policy" class="<?= ($uri2 == 'privacy-policy')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Privacy Policy
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>pages/terms-and-conditions" class="<?= ($uri2 == 'terms-and-conditions')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Terms & Conditions
							</a>
						</li>
					</ul>
				</li>
				<li class="<?= ($uri == 'customers')?'mm-active':'';?>">
					<a href="<?= base_url()?>customers" aria-expanded="false">
						<i class="metismenu-icon fa fa-angle-right"></i>Customers
					</a>
				</li>
				<li class="<?= ($uri == 'manufacturers' || $uri == 'brands' || $uri == 'categories' || $uri == 'products')?'mm-active':'';?>">
					<a href="javascript:;" aria-expanded="false">
						<i class="metismenu-icon fa fa-angle-right"></i>Products
						<i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
					</a>
					<ul class="mm-collapse">
						<li>
							<a href="<?= base_url()?>manufacturers" class="<?= ($uri2 == 'manufacturers')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Manufacturers
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>brands" class="<?= ($uri2 == 'brands')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Brands
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>categories" class="<?= ($uri2 == 'categories')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Categories
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>subcategories" class="<?= ($uri2 == 'subcategories')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Subcategories
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>products" class="<?= ($uri2 == 'products')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Products
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>stock" class="<?= ($uri2 == 'stock')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Products Inventory
							</a>
						</li>
					</ul>
				</li>
				<li class="<?= ($uri == 'orders')?'mm-active':'';?>">
					<a href="javascript:;" aria-expanded="true">
						<i class="metismenu-icon fa fa-angle-right"></i>Orders
						<i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
					</a>
					<ul class="mm-collapse">
						<li>
							<a href="<?= base_url()?>orders/pending" class="<?= ($uri2 == 'pending')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Pending
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>orders/dispatched" class="<?= ($uri2 == 'dispatched')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Dispatched
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>orders/delivered" class="<?= ($uri2 == 'delivered')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Delivered
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>orders/incomplete" class="<?= ($uri2 == 'incomplete')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Incomplete
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>orders/returned" class="<?= ($uri2 == 'returned')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Returned
							</a>
						</li>
						<!--<li>
							<a href="<?= base_url()?>orders/canceled" class="<?= ($uri2 == 'canceled')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Canceled
							</a>
						</li>-->
						
					</ul>
				</li>
				<li class="<?= ($uri == 'settings')?'mm-active':'';?>">
					<a href="javascript:;" aria-expanded="true">
						<i class="metismenu-icon fa fa-angle-right"></i>Settings
						<i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
					</a>
					<ul class="mm-collapse">
						<li>
							<a href="<?= base_url()?>settings" class="<?= ($uri == 'settings')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Shop Settings
							</a>
						</li>
						<!--<li>
							<a href="<?= base_url()?>users/waiters" class="<?= ($uri2 == 'waiters')?'mm-active':'';?>">
								<i class="metismenu-icon"></i>Locations
							</a>
						</li>-->
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>