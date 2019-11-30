<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title><?= $page_title?> - Shop - Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
		<meta name="description" content="ShakooMakoo">
		
		<!-- Disable tap highlight on IE -->
		<meta name="msapplication-tap-highlight" content="no">
		<link rel="icon" href="<?= base_url()?>assets/images/favicon.png" type="image/png" sizes="16x16">
		<link href="<?= base_url()?>assets/css/style.css" rel="stylesheet"></head>
	<body>
		<div class="app-container app-theme-white body-tabs-shadow">
			<div class="app-container">
				<div class="h-100 bg-plum-plate bg-animation">
					<div class="d-flex h-100 justify-content-center align-items-center">
						<div class="mx-auto app-login-box col-md-8">
							<div class="modal-dialog w-100 mx-auto">
								<div class="modal-content">
									<div class="modal-body">
										<div class="h5 modal-title text-center">
											<h4 class="mt-2">
												<div><img src="<?= base_url()?>assets/images/logo.png" style="width:100px;" /></div>
												<span>Sign in to your account</span>
											</h4>
										</div>
										<form action="<?= base_url()?>home/login_process" method="POST" id="login-form">
											<div class="form-row">
												<div class="col-md-12">
													<?php if($this->session->flashdata('msg')){ ?>
													<div class="alert alert-danger"><?= $this->session->flashdata('msg')?></div>
													<?php } ?>
												</div>
												<div class="col-md-12">
													<div class="position-relative form-group">
														<input required type="text" id="username" name="username" class="form-control" placeholder="Username / Email Address" />
													</div>
												</div>
												<div class="col-md-12">
													<div class="position-relative form-group">
														<input required type="password" id="password" name="password" class="form-control" placeholder="Password" />
													</div>
												</div>
											</div>
										</form>
									</div>
									<div class="modal-footer clearfix">
										<!--<div class="float-left"><a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a></div>-->
										<div style="margin:0 auto;">
											<button type="submit" class="btn btn-primary btn-lg" form="login-form">Login</button>
										</div>
									</div>
								</div>
							</div>
							<div class="text-center text-white opacity-8 mt-3">Copyright &copy; Shop <?= date('Y')?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?= base_url()?>assets/js/main.js"></script>
	</body>
</html>
