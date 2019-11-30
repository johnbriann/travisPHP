<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?= $page_title?> - Shop - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="Wide selection of forms controls, using the Bootstrap 4 code base, but built with React.">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
	<link rel="icon" href="<?= base_url()?>assets/images/favicon.png" type="image/png" sizes="16x16">
	<link href="<?= base_url()?>assets/css/style.css" rel="stylesheet"></head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/main.js"></script>
<body>
<style>
.modal-backdrop{display:none !important;}
</style>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar"><!-- closed-sidebar -->
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div class="logo-src"><img src="<?= base_url()?>assets/images/logo.png" style="width:70px;" /></div>
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
        </div>    <div class="app-header__content">
            
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn" style="background:url('<?= base_url()?>assets/images/logo.png') no-repeat center center;background-size: cover;">
                                        <img width="42" class="rounded-circle" src="<?= base_url()?>assets/images/blank.png" alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-menu-header">
                                            <div class="dropdown-menu-header-inner bg-info">
                                                <div class="menu-header-image opacity-2" style="background-image: url('<?= base_url()?>assets/images/logo.png');"></div>
                                                <div class="menu-header-content text-left">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3" style="background:url('<?= base_url()?>assets/images/logo-white.png') no-repeat center center;background-size: cover;">
                                                                <img width="42" class="rounded-circle" src="<?= base_url()?>assets/images/blank.png" alt="">
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading"><?= $this->session->userdata('first_name').' '.$this->session->userdata('last_name');?>
                                                                </div>
                                                                <div class="widget-subheading opacity-8"><?= ucwords($this->session->userdata('userrole'));?></div>
                                                            </div>
                                                            <div class="widget-content-right mr-2">
                                                                <a class="btn-pill btn-shadow btn-shine btn btn-focus" href="<?= base_url()?>logout">Logout</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
        </div>
    </div>

	<div class="app-main">
            <?php $this->load->view('common/navigation');?>
			<div class="app-main__outer">
                <div class="app-main__inner">
                    <?php $this->load->view($page_content);?>
                </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-right">Copyright &copy; Shop <?= date('Y')?></div>
                        </div>
                    </div>
                </div>
			</div>
    </div>
</div>
<div id="cropper_manager_box" style="position:fixed; top:15%; margin:0 auto; right:0; left:0; z-index:999; background:#fff;width:90%;min-height:50%;box-shadow:1px 1px 5px 1px #999;padding:15px 5px;display:none;">
<div id="cropper_manager_bg" style="">
	<div id="cropper_manager_div">
		 <!-- Content -->
		  <div class="container-fluis">
			<div class="row">
			  <div class="col-md-9">
				<!-- <h3 class="page-header">Demo:</h3> -->
				<div class="img-container" id="cropper_div">
				  <img id="cropper_image" src="<?= base_url()?>assets/images/blank.png" alt="Picture">
				</div>
			  </div>
			  <div class="col-md-3">
				<!-- <h3 class="page-header">Preview:</h3> -->
				<div class="docs-preview clearfix">
				  <div class="img-preview preview-lg"></div>
				</div>
				<div class="" id="actions">
				  <div class="docs-buttons">
					<div style="display:none;">
					<div class="btn-group">
					  <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move" title="Move" id="setDragMode">
						<span class="docs-tooltip" data-toggle="tooltip" title="cropper.setDragMode(&quot;move&quot;)">
						  <span class="fa fa-arrows"></span>
						</span>
					  </button>
					</div>
					</div>

					<div class="btn-group">
					<button type="button" class="btn btn-primary" data-method="destroy" title="Destroy" id="close_cropper">
						<span class="docs-tooltip" data-toggle="tooltip" title="Close">
						  <span class="fa fa-ban"></span> Cancel
						</span>
					  </button>
					<button type="button" class="btn btn-primary" data-method="getData" data-option data-target="#putData" id="done_crop_new">
					  <span class="docs-tooltip" data-toggle="tooltip" title="Crop">
						<span class="fa fa-crop"></span> 
						Okay
					  </span>
					</button>

					</div>
				  </div><!-- /.docs-buttons -->

				  <div class="col-md-3 docs-toggles" style="display:block;">
				  </div><!-- /.docs-toggles -->
				</div>
				<div class="clearfix"></div>
				<div style="color:#000000;">
				Drag and select area to crop.
				</div>
			   <!-- <h3 class="page-header">Data:</h3> -->
				<div class="docs-data" style="display:none;">
				  <div class="input-group input-group-sm">
					<label class="input-group-addon" for="dataX">X</label>
					<input type="text" class="form-control" id="dataX" placeholder="x">
					<span class="input-group-addon">px</span>
				  </div>
				  <div class="input-group input-group-sm">
					<label class="input-group-addon" for="dataY">Y</label>
					<input type="text" class="form-control" id="dataY" placeholder="y">
					<span class="input-group-addon">px</span>
				  </div>
				  <div class="input-group input-group-sm">
					<label class="input-group-addon" for="dataWidth">Width</label>
					<input type="text" class="form-control" id="dataWidth" placeholder="width">
					<span class="input-group-addon">px</span>
				  </div>
				  <div class="input-group input-group-sm">
					<label class="input-group-addon" for="dataHeight">Height</label>
					<input type="text" class="form-control" id="dataHeight" placeholder="height">
					<span class="input-group-addon">px</span>
				  </div>
				  <div class="input-group input-group-sm">
					<label class="input-group-addon" for="dataRotate">Rotate</label>
					<input type="text" class="form-control" id="dataRotate" placeholder="rotate">
					<span class="input-group-addon">deg</span>
				  </div>
				  <div class="input-group input-group-sm">
					<label class="input-group-addon" for="dataScaleX">ScaleX</label>
					<input type="text" class="form-control" id="dataScaleX" placeholder="scaleX">
				  </div>
				  <div class="input-group input-group-sm">
					<label class="input-group-addon" for="dataScaleY">ScaleY</label>
					<input type="text" class="form-control" id="dataScaleY" placeholder="scaleY">
				  </div>
				</div>
			  </div>
			</div>
		  </div>
	</div>
</div>
</div>
<style>
.red-border{
	border: 1px solid red !important;
}
</style>
<script>
$(document).on('click','.form-control',function(){
	$(this).removeClass('red-border');
});
</script>
</body>
</html>
