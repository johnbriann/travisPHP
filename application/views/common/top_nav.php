<!-- NAVIGATION -->
<nav id="navigation">
	<!-- container -->
	<div class="container">
		<!-- responsive-nav -->
		<div id="responsive-nav">
			<!-- NAV -->
			<ul class="main-nav nav navbar-nav">
				<li class="<?= ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home')?'active':'';?>"><a href="<?= base_url()?>">Home</a></li>
				<li class="<?= ($this->uri->segment(1) == 'about-us')?'active':'';?>"><a href="<?= base_url()?>about-us">About Us</a></li>
				<li class="<?= ($this->uri->segment(1) == 'our-services')?'active':'';?>"><a href="<?= base_url()?>our-services">Our Services</a></li>
				<li class="<?= ($this->uri->segment(1) == 'categories')?'active':'';?>"><a href="<?= base_url()?>categories">Categories</a></li>
				<li class="<?= ($this->uri->segment(1) == 'contact-us')?'active':'';?>"><a href="<?= base_url()?>contact-us">Contact Us</a></li>
			</ul>
			<!-- /NAV -->
		</div>
		<!-- /responsive-nav -->
	</div>
	<!-- /container -->
</nav>
<!-- /NAVIGATION -->