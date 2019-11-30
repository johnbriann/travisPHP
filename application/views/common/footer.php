		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<img src="<?= base_url()?>assets/images/<?= $settings['shop_footer_logo']?>" style="width:100%;"/>
								<h3 class="footer-title">About Us</h3>
								<p><?= $settings['shop_description']?></p>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<?php foreach($all_categories as $ckey => $top_category){ if($ckey < 5){ ?>
									<li><a href="<?= base_url().'category/'.$top_category['slug']?>"><?= ucwords($top_category['name'])?></a></li>
									<?php }}?>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="<?= base_url()?>about-us">About Us</a></li>
									<li><a href="<?= base_url()?>our-services">Our Services</a></li>
									<li><a href="<?= base_url()?>contact-us">Contact Us</a></li>
									<li><a href="<?= base_url()?>privacy-policy">Privacy Policy</a></li>
									<li><a href="<?= base_url()?>terms-and-condition">Terms & Conditions</a></li>
									
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Find Us</h3>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i><?= $settings['shop_address']?></a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+<?= $settings['shop_phone']?></a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i><?= $settings['shop_email']?></a></li>
								</ul>
								<ul class="social-network social-circle">
									<?php if($settings['shop_fb'] != ''){ ?>
									<li><a target="_blank" href="<?= $settings['shop_fb']?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
									<?php } ?>
									<?php if($settings['shop_tw'] != ''){ ?>
									<li><a target="_blank" href="<?= $settings['shop_tw']?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
									<?php } ?>
									<?php if($settings['shop_gp'] != ''){ ?>
									<li><a target="_blank" href="<?= $settings['shop_gp']?>" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
									<?php } ?>
									<?php if($settings['shop_li'] != ''){ ?>
									<li><a target="_blank" href="<?= $settings['shop_li']?>" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
									<?php } ?>
									<?php if($settings['shop_li'] != ''){ ?>
									<li><a target="_blank" href="<?= $settings['shop_li']?>" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section" style="padding:0;">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<span class="copyright">
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->