<?php $uri1 = $this->uri->segment(1);?>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="<?= base_url()?>">Home</a></li>
							<?php if($uri1 == 'manufacturer' || $uri1 == 'brand' || $uri1 == 'category' || $uri1 == 'subcategory'){ ?>
							<li><a href="<?= base_url()?><?= str_replace('ory','orie',$uri1)?>s">All <?= ucwords(str_replace('ory','ories',$uri1))?>s</a></li>
							<li><a href="#"><?= @$paramData['name']?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<form action="<?= base_url()?>search" method="POST">
						<!-- aside Widget -->
						<div class="aside">
							<a href="<?= base_url()?>search" class="btn left-bar-btn"><i class="fa fa-file-o"></i> Reset</a>
							<button type="submit" class="btn left-bar-btn"><i class="fa fa-filter"></i> Filter</button>
						</div>
						<!-- aside Widget -->
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<?php $left_categories = get_categories();?>
							<?php $left_brands = get_brands();?>
							<div class="checkbox-filter">
								<?php foreach($left_categories as $lckey => $left_category){ ?>
								<div class="input-checkbox">
									<input type="checkbox" id="category-<?= $lckey?>" name="category[]">
									<label for="category-<?= $lckey?>">
										<span></span>
										<?= ucwords($left_category['name'])?>
									</label>
								</div>
								<?php } ?>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Brand</h3>
							<div class="checkbox-filter">
								<?php foreach($left_brands as $lbkey => $left_brand){ ?>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-<?= $lbkey?>" name="brand[]">
									<label for="brand-<?= $lbkey?>">
										<span></span>
										<?= strtoupper($left_brand['name'])?>
									</label>
								</div>
								<?php } ?>
							</div>
						</div>
						<!-- /aside Widget -->
						</form>
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							<?php foreach($content_data as $key => $product){ ?>
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img" style="background:url('<?= base_url()?>uploads/product/thumb_<?= $product['image']?>') no-repeat center center; background-size:contain;">
										<img src="<?= base_url()?>assets/images/blank.png" alt="<?= $product['name']?>">
										<div class="product-label">
											<!--<span class="sale">-30%</span>-->
											<span class="new">NEW</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category"><?= ucwords($product['category_name'])?></p>
										<h3 class="product-name"><a href="<?= base_url()?>product/<?= $product['slug']?>"><?= ucwords($product['name'])?></a></h3>
										<h4 class="product-price">$<?= ($product['on_sale']==1)?number_format($product['sale_price'],2):number_format($product['price'],2);?> <?php if($product['on_sale'] == 1){ ?><del class="product-old-price">$<?= number_format($product['price'],2)?></del><?php } ?></h4>
										<?php /** / ?>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
										</div>
										<?php /**/ ?>
									</div>
									<div class="add-to-cart">
										<button type="button" data-href="<?= base_url()?>product/<?= $product['slug']?>" class="add-to-cart-btn"><i class="fa fa-eye"></i> View Detail</button>
									</div>
								</div>
							</div>
							<!-- /product -->
							<?php } ?>
							<div class="clearfix visible-lg visible-md"></div>

							<div class="clearfix visible-sm visible-xs"></div>

							<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>

							<div class="clearfix visible-sm visible-xs"></div>
							<?php if(empty($content_data)){ ?>
								<div style="text-align:center;padding-top:50px;"><h2>Oops!</h2>Couldn't find anything!<br><br><a style="font-size:18px;text-align:center;display: block;" href="<?= base_url()?>categories"><i class="fa fa-search"></i> Search for Products</a></div>
							<?php } ?>
						</div>
						<!-- /store products -->
						<?php /** / ?>
						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
						<?php /**/ ?>
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
<script>
$(document).on('click','.add-to-cart-btn',function(){
	var href = $(this).data('href');
	location.assign(href);
});
</script>