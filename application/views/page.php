<style>
/*Contact sectiom*/
.content-header{
  font-family: 'Oleo Script', cursive;
  color:#fcc500;
  font-size: 45px;
}

.section-content{
  text-align: center; 

}
#contact{
    
    font-family: 'Teko', sans-serif;
  padding-top: 60px;
  width: 100%;
  width: 100vw;
  height: 550px;
  background: #3a6186; /* fallback for old browsers */
  background: -webkit-linear-gradient(to left, #3a6186 , #89253e); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to left, #3a6186 , #89253e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color : #fff;    
}
.contact-section{
  padding-top: 40px;
}
.contact-section .col-md-6{
  width: 50%;
}

.form-line{
  border-right: 1px solid #B29999;
}

.form-group{
  margin-top: 10px;
}
label{
  font-size: 1.3em;
  line-height: 1em;
  font-weight: normal;
}
.form-control{
  font-size: 1.3em;
  color: #080808;
}
textarea.form-control {
    height: 135px;
   /* margin-top: px;*/
}

.submit{
  font-size: 1.1em;
  float: right;
  width: 150px;
  background-color: transparent;
  color: #fff;

}

</style>
		<!-- SECTION -->
		<div class="section" style="padding:0;">
			<!-- container-fluid -->
			<div class="container-fluid">
				<!-- row -->
				<div class="row page-image" style="overflow:hidden;position:relative;">
					<img src="<?= base_url()?>uploads/page/<?= $content_data['page_image']?>" style="width:100%;filter: blur(5px);" />
					<h2 style="position: absolute; top: 45%; left: 0; color: #fff; text-shadow: 0px 0px 5px #000; font-size: 45px; right: 0; text-align: center;"><?= $content_data['page_title']?></h2>
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
							<li class="active"><?= $content_data['page_title']?></li>
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
					<div class="col-md-12">
						<p><?= html_entity_decode(htmlspecialchars_decode($content_data['page_description']))?></p>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<?php if($this->uri->segment(1) == 'contact-us'){ ?>
		<section id="contact">
			<div class="section-content">
				<h1 class="section-header">Get in <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Touch with us</span></h1>
			</div>
			<div class="contact-section">
			<div class="container">
				<form action="<?= base_url()?>home/contact_submit" method="POST">
					<div class="col-md-6 form-line">
			  			<div class="form-group">
			  				<label for="exampleInputUsername">Your name</label>
					    	<input required type="text" class="form-control" id="name" name="name" placeholder=" Enter Full Name">
				  		</div>
				  		<div class="form-group">
					    	<label for="email">Email Address</label>
					    	<input required type="email" class="form-control" id="email" name="email" placeholder=" Enter Email Address">
					  	</div>	
					  	<div class="form-group">
					    	<label for="phone">Mobile No.</label>
					    	<input required type="text" maxlength="10" class="form-control" id="phone" name="phone" placeholder=" Enter 10-digit mobile no.">
			  			</div>
			  		</div>
			  		<div class="col-md-6">
			  			<div class="form-group">
			  				<label for ="message"> Message</label>
			  			 	<textarea required class="form-control" id="message" name="message" placeholder="Enter Your Message"></textarea>
			  			</div>
			  			<div>
			  				<button type="submit" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Message</button>
			  			</div>
			  			
					</div>
				</form>
			</div>
		</section>
		<?php } ?>
<?php /** / ?>
		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->
<?php /**/ ?>