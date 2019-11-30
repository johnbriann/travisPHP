<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="<?= base_url()?>">Home</a></li>
					<?php if($content_data['manufacturer_name'] != ''){ ?>
					<li><a href="<?= base_url().'manufacturer/'.$content_data['manufacturer_slug']?>"><?= ucwords($content_data['manufacturer_name'])?></a></li>
					<?php } ?>
					<?php if($content_data['brand_name'] != ''){ ?>
					<li><a href="<?= base_url().'brand/'.$content_data['brand_slug']?>"><?= ucwords($content_data['brand_name'])?></a></li>
					<?php } ?>
					<?php if($content_data['category_name'] != ''){ ?>
					<li><a href="<?= base_url().'category/'.$content_data['category_slug']?>"><?= ucwords($content_data['category_name'])?></a></li>
					<?php } ?>
					<?php if($content_data['subcategory_name'] != ''){ ?>
					<li><a href="<?= base_url().'subcategory/'.$content_data['subcategory_slug']?>"><?= ucwords($content_data['subcategory_name'])?></a></li>
					<?php } ?>
					<li class="active"><?= $content_data['name']?></li>
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
			<!-- Product main img -->
			<div class="col-md-5 col-md-push-2">
				<div id="product-main-img">
					<div class="product-preview" style="background:url('<?= base_url()?>uploads/product/<?= $content_data['image']?>') no-repeat center center; background-size:contain;">
						<img src="<?= base_url()?>uploads/product/<?= $content_data['image']?>" alt="blank">
					</div>
					<?php foreach($content_data['pictures'] as $key => $pic){ ?>
					<div class="product-preview" style="background:url('<?= base_url()?>uploads/product/<?= $pic['image']?>') no-repeat center center; background-size:contain;">
						<img src="<?= base_url()?>uploads/product/<?= $pic['image']?>" alt="blank">
					</div>
					<?php } ?>
				</div>
			</div>
			<!-- /Product main img -->

			<!-- Product thumb imgs -->
			<div class="col-md-2  col-md-pull-5">
				<div id="product-imgs">
					<div class="product-preview" style="background:url('<?= base_url()?>uploads/product/small_<?= $content_data['image']?>') no-repeat center center; background-size:contain;">
						<img src="<?= base_url()?>assets/images/blank.png" alt="blank">
					</div>
					<?php foreach($content_data['pictures'] as $key => $pic){ ?>
					<div class="product-preview" style="background:url('<?= base_url()?>uploads/product/small_<?= $pic['image']?>') no-repeat center center; background-size:contain;">
						<img src="<?= base_url()?>assets/images/blank.png" alt="blank">
					</div>
					<?php } ?>
				</div>
			</div>
			<!-- /Product thumb imgs -->

			<!-- Product details -->
			<div class="col-md-5">
				<div class="product-details">
					<h2 class="product-name"><?= $content_data['name']?></h2>
					<?php /** / ?>
					<div>
						<div class="product-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
						</div>
						<a class="review-link" href="#">10 Review(s) | Add your review</a>
					</div>
					<?php /**/ ?>
					<div>
						<h3 class="product-price">$<?= ($content_data['on_sale']==1)?number_format($content_data['sale_price'],2):number_format($content_data['price'],2);?> <?php if($content_data['on_sale'] == 1){ ?><del class="product-old-price">$<?= number_format($content_data['price'],2)?></del><?php } ?></h3>
						<!--<span class="product-available">In Stock</span>-->
					</div>
					<p><?= $content_data['short_description']?></p>

					<div class="product-options">
						<?php if(!empty($sizes)){ ?>
						<label>
							Size
							<select class="input-select" id="cart-size">
								<option value="">Choose</option>
								<?php foreach($sizes as $skey => $size){ ?>
								<option value="<?= $size['id']?>"><?= $size['name']?></option>
								<?php } ?>
							</select>
						</label>
						<?php }else{ ?>
						<input id="cart-size" type="hidden" value="0" />
						<?php } ?>
						<?php if(!empty($colors)){ ?>
						<label>
							Color
							<select class="input-select" id="cart-color">
								<option value="">Choose</option>
								<?php foreach($colors as $ckey => $color){ ?>
								<option value="<?= $color['id']?>"><?= $color['name']?></option>
								<?php } ?>
							</select>
						</label>
						<?php }else{ ?>
						<input id="cart-color" type="hidden" value="0" />
						<?php } ?>
					</div>

					<div class="add-to-cart">
						<div class="qty-label">
							Qty
							<div class="input-number" >
								<input type="number" id="cart-qty" value="1" />
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
						</div>
						<button class="add-to-cart-btn" id="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
					</div>
					<?php /** / ?>
					<ul class="product-btns">
						<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
						<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
					</ul>
					<?php /**/ ?>
					<ul class="product-links">
						<li>Manufacturer:</li>
						<?php if($content_data['manufacturer_name'] != ''){ ?>
						<li><a href="<?= base_url().'manufacturer/'.$content_data['manufacturer_slug']?>"><?= ucwords($content_data['manufacturer_name'])?></a></li>
						<?php } ?>
					</ul>
					<ul class="product-links">
						<li>Brand:</li>
						<?php if($content_data['brand_name'] != ''){ ?>
						<li><a href="<?= base_url().'brand/'.$content_data['brand_slug']?>"><?= ucwords($content_data['brand_name'])?></a></li>
						<?php } ?>

					</ul>
					<ul class="product-links">
						<li>Category:</li>
						<?php if($content_data['category_name'] != ''){ ?>
						<li><a href="<?= base_url().'category/'.$content_data['category_slug']?>"><?= ucwords($content_data['category_name'])?></a></li>
						<?php } ?>

					</ul>
					<ul class="product-links">
						<li>Subcategory:</li>
						<?php if($content_data['subcategory_name'] != ''){ ?>
						<li><a href="<?= base_url().'subcategory/'.$content_data['subcategory_slug']?>"><?= ucwords($content_data['subcategory_name'])?></a></li>
						<?php } ?>
					</ul>
					<?php /** / ?>
					<ul class="product-links">
						<li>Share:</li>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-envelope"></i></a></li>
					</ul>
					<?php /**/ ?>
				</div>
			</div>
			<!-- /Product details -->

			<!-- Product tab -->
			<div class="col-md-12">
				<div id="product-tab">
					<!-- product tab nav -->
					<ul class="tab-nav">
						<li class="active"><a data-toggle="tab" href="#desc-tab">Description</a></li>
						<?php if(!empty($content_data['features'])){ ?>
						<li><a data-toggle="tab" href="#specs-tab">Specifications</a></li>
						<?php } ?>
					</ul>
					<!-- /product tab nav -->

					<!-- product tab content -->
					<div class="tab-content">
						<!-- tab1  -->
						<div id="desc-tab" class="tab-pane fade in active">
							<div class="row">
								<div class="col-md-12">
									<p><?= $content_data['description']?></p>
								</div>
							</div>
						</div>
						<!-- /tab1  -->
						<?php if(!empty($content_data['features'])){ ?>
						<!-- tab2  -->
						<div id="specs-tab" class="tab-pane fade in">
							<div class="row">
								<div class="col-md-12">
									<table class="table table-bordered table-striped table-hover" style="width: 350px; margin: 0 auto;">
										<?php foreach($content_data['features'] as $fkey => $feature){ ?>
										<tr>
											<th><?= $feature['feature']?></th>
											<td><?= $feature['value']?></td>
										</tr>
										<?php } ?>
									</table>
								</div>
							</div>
						</div>
						<!-- /tab2  -->
						<?php } ?>
					</div>
					<!-- /product tab content  -->
				</div>
			</div>
			<!-- /product tab -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<?php if(!empty($related_products)){ ?>
<!-- Section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title text-center">
					<h3 class="title">Related Products</h3>
				</div>
			</div>
			<?php foreach($related_products as $rpkey => $rproduct){ ?>
			<!-- product -->
			<div class="col-md-3 col-xs-6">
				<div class="product">
					<div class="product-img" style="background:url('<?= base_url()?>uploads/product/thumb_<?= $rproduct['image']?>') no-repeat center center; background-size:contain;">
						<img src="<?= base_url()?>assets/images/blank.png" alt="<?= $rproduct['name']?>">
						<!--<div class="product-label">
							<span class="sale">-30%</span>
						</div>-->
					</div>
					<div class="product-body">
						<p class="product-category"><?= ucwords($rproduct['category_name'])?></p>
						<h3 class="product-name"><a href="<?= base_url()?>product/<?= $rproduct['slug']?>"><?= ucwords($rproduct['name'])?></a></h3>
						<h4 class="product-price">$<?= ($rproduct['on_sale']==1)?number_format($rproduct['sale_price'],2):number_format($rproduct['price'],2);?> <?php if($rproduct['on_sale'] == 1){ ?><del class="product-old-price">$<?= number_format($rproduct['price'],2)?></del><?php } ?></h4>
						<?php /** / ?>
						<div class="product-rating">
						</div>
						<div class="product-btns">
							<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
							<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
							<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
						</div>
						<?php /**/ ?>
					</div>
					<div class="add-to-cart">
						<button type="button" class="add-to-cart-btn"><i class="fa fa-eye"></i> View Detail</button>
					</div>
				</div>
			</div>
			<!-- /product -->
			<?php } ?>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /Section -->
<?php } ?>
<input id="cart-pid" type="hidden" value="<?= $content_data['id']?>" />
<input id="cart-name" type="hidden" value="<?= $content_data['name']?>" />
<input id="cart-slug" type="hidden" value="<?= $content_data['slug']?>" />
<input id="cart-image" type="hidden" value="<?= $content_data['image']?>" />
<input id="cart-on_sale" type="hidden" value="<?= $content_data['on_sale']?>" />
<input id="cart-price" type="hidden" value="<?= $content_data['price']?>" />
<input id="cart-sale_price" type="hidden" value="<?= $content_data['sale_price']?>" />
<input id="cart-xprice" type="hidden" value="<?= ($content_data['on_sale'] == 1)?$content_data['sale_price']:$content_data['price'];?>" />
<script>
$(document).on('click','#add-to-cart-btn',function(){
	<?php if($this->session->userdata('id')){ ?>
	$('#add-to-cart-btn').attr('disabled',true);
	$('#cart-size').addClass('red-border');
	$('#cart-color').addClass('red-border');
	var validate = 0;
	var pid = $('#cart-pid').val();
	var name = $('#cart-name').val();
	var slug = $('#cart-slug').val();
	var image = $('#cart-image').val();
	var price = $('#cart-price').val();
	var on_sale = $('#cart-on_sale').val();
	var sale_price = $('#cart-sale_price').val();
	var size = $('#cart-size').val();
	var color = $('#cart-color').val();
	var qty = $('#cart-qty').val();
	if(size == ""){
		validate = 1;
		$('#cart-size').addClass('red-border');
	}
	if(color == ""){
		validate = 1;
		$('#cart-color').addClass('red-border');
	}
	if(validate == 0){
		$.ajax({
			url: '<?= base_url()?>home/add_to_cart',
			type: 'POST',
			data: {'pid' : pid, 'name' : name, 'slug' : slug, 'image' : image, 'size' : size, 'color' : color, 'qty' : qty, 'price' : price, 'on_sale' : on_sale, 'sale_price' : sale_price },
			success: function(response){
				if(response != 0){
					var result = jQuery.parseJSON(response);
					$('.topbar-cart-qty').removeClass('hidden');
					$('.topbar-cart-qty').html(result.qty);
					$('.topbar-cart-subtotal').html(result.subtotal);
					$('.topbar-cart-list').html(result.cart);
					$('#add-to-cart-btn').removeAttr('disabled');
					alert('Item added to cart');
				}
			}
		});
	}else{
		alert('Select Size/Color to continue');
		$('#add-to-cart-btn').removeAttr('disabled');
	}
	<?php }else{ ?>
	$('#login-modal').modal('show');
	<?php } ?>
});
</script>