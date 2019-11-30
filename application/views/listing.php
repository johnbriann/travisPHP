<?php $uri1 = $this->uri->segment(1);?>
<style>
.parallax {
  /* The image used */
  background-image: url("<?= base_url()?>assets/images/parallax.jpg");

  /* Set a specific height */
  min-height: 300px; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.shop:before{
	width: 50%;
}
</style>
		<!-- SECTION -->
		<div class="section" style="padding:0;">
			<!-- container-fluid -->
			<div class="container-fluid">
				<!-- row -->
				<div class="row page-image parallax" style="overflow:hidden;position:relative;">
					<!--<img src="<?= base_url()?>assets/images/parallax.jpg" style="width:100%;filter: blur(5px);" />-->
					<h2 style="position: absolute; top: 45%; left: 0; color: #fff; text-shadow: 0px 0px 5px #000; font-size: 45px; right: 0; text-align: center;"><?= ucwords($uri1)?></h2>
				</div>
				<!-- /row -->
			</div>
			<!-- /container-fluid -->
		</div>
		<!-- /SECTION -->
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<!--<h3 class="breadcrumb-header">Regular Page</h3>-->
						<ul class="breadcrumb-tree">
							<li><a href="<?= base_url()?>">Home</a></li>
							<li class="active">All <?= ucwords($uri1)?></li>
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
					<!-- shop -->
					<?php foreach($content_data as $tckey => $item){ ?>
					<div class="col-md-3 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<?php if(file_exists(IMGURL.'/'.$param.'/'.$item['image'])){$image = base_url().'uploads/'.$param.'/'.$item['image'];}else{$image = base_url().'assets/images/default.jpg';}?>
								<img src="<?= $image?>" alt="<?= ucwords($item['name'])?>">
							</div>
							<div class="shop-body">
								<h3><?= ucwords($item['name'])?><br>Collection</h3>
								<a href="<?= base_url().$param.'/'.$item['slug']?>" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<?php } ?>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->