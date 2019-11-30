<!-- jQuery Plugins -->

<script src="<?= base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/js/slick.min.js"></script>
<script src="<?= base_url()?>assets/js/nouislider.min.js"></script>
<script src="<?= base_url()?>assets/js/jquery.zoom.min.js"></script>
<script src="<?= base_url()?>assets/js/main.js"></script>


<!-- The Modal -->
<div class="modal" id="myModal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
<p class="flashdata-msg"></p>
</div>
</div>
</div>
</div>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="loginmodal-container">
			<div class="login-div">
				<h1>Login to Your Account</h1>
				<br>
				<input type="text" id="login-email" placeholder="Email Address" />
				<input type="password" id="login-password" placeholder="Password" />
				<div class="alert alert-danger login-error-div" style="display:none;"><strong>Error! </strong><span id="login-error"></span></div>	
				<input type="button" id="login-btn" class="login loginmodal-submit" value="Login" />
				<div class="login-help">
					<a class="pull-left" href="javascript:;" id="register-div-btn">Register</a><a class="pull-right" href="javascript:;" id="forgot-div-btn">Forgot Password?</a>
				</div>
			</div>
			<div class="forgot-div" style="display:none;">
				<h1>Reset Password</h1>
				<br>
				<input type="text" id="reset-email" placeholder="Email Address" />
				<div class="alert alert-danger reset-error-div" style="display:none;"><strong>Error! </strong><span id="reset-error"></span></div>	
				<input type="button" id="reset-btn" class="login loginmodal-submit" value="Rquest Reset" />
				<div class="login-help">
					<a class="pull-left go-back-btn" href="javascript:;"><i class="fa fa-arrow-left"></i> Go Back</a><!--<a class="pull-right" href="javascript:;" id="reset-div-btn">Enter Reset Code!</a>-->
				</div>
			</div>
			<div class="reset-code-div" style="display:none;">
				<h1>Reset Password</h1>
				<div class="alert alert-success">A 4-digit code has been sent to your email!</div>
				<br>
				<input type="text" maxlength="4" id="reset-code" placeholder="4 Digit Code" />
				<div class="alert alert-danger reset-code-error-div" style="display:none;"><strong>Error! </strong><span id="reset-code-error"></span></div>	
				<input type="button" id="verify-btn" class="login loginmodal-submit" value="Verify" />
				<div class="login-help">
					<a class="pull-left go-back-btn" href="javascript:;"><i class="fa fa-arrow-left"></i> Go Back</a>
				</div>
			</div>
			<div class="pass-div" style="display:none;">
				<h1>Reset Password</h1>
				<div class="alert alert-success">Enter New Password!</div>
				<br>
				<input type="password" id="new-password" placeholder="New Password" />
				<input type="password" id="new-confirm-password" placeholder="Confirm Password" />
				<div class="alert alert-danger pass-error-div" style="display:none;"><strong>Error! </strong><span id="pass-error"></span></div>	
				<input type="button" id="pass-btn" class="login loginmodal-submit" value="Change" />
				<div class="login-help">
					<a class="pull-left go-back-btn" href="javascript:;"><i class="fa fa-arrow-left"></i> Go Back</a>
				</div>
			</div>
			
			<div class="register-div" style="display:none;">
				<h1>Register Your Account</h1>
				<br>
				<input type="text" id="register-first-name" placeholder="First Name" />
				<input type="text" id="register-last-name" placeholder="Last Name" />
				<input type="text" id="register-phone" placeholder="Phone No." />
				<input type="text" id="register-email" placeholder="Email Address" />
				<input type="password" id="register-password" placeholder="Password" />
				<input type="password" id="register-confirm-password" placeholder="Confirm Password" />
				<div class="alert alert-danger register-error-div" style="display:none;"><strong>Error! </strong><span id="register-error"></span></div>	
				<input type="button" id="register-btn" class="login loginmodal-submit" value="Register" />
				<div class="login-help">
					<a class="pull-left go-back-btn" href="javascript:;"><i class="fa fa-arrow-left"></i> Go Back</a>
				</div>
			</div>
			<input type="hidden" id="new-email" value="" />
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	<?php if($this->session->flashdata('msg')){ ?>
	$('#flashdata-modal').modal('show');
	$('.flashdata-msg').html('<?= $this->session->flashdata('msg');?>');
	<?php } ?>
	<?php if($this->session->flashdata('err_msg')){ ?>
	$('#flashdata-modal').modal('show');
	$('.flashdata-msg').html('<?= $this->session->flashdata('err_msg');?>');
	<?php } ?>
});
$(document).on('click','#topbar-login-btn',function(){
	$('#login-modal').modal('show');
});
$(document).on('click','input',function(){
	$(this).removeClass('red-border');
});
$(document).on('click','#forgot-div-btn',function(){
	$('.login-div').hide();
	$('.register-div').hide();
	$('.forgot-div').show();
});
$(document).on('click','.go-back-btn',function(){
	$('.login-div').show();
	$('.pass-div').hide();
	$('.reset-div').hide();
	$('.reset-code-div').hide();
	$('.register-div').hide();
	$('.forgot-div').hide();
	$('#login-btn').removeAttr('disabled');
	$('#verify-btn').removeAttr('disabled');
	$('#register-btn').removeAttr('disabled');
	$('#pass-btn').removeAttr('disabled');
	$('#reset-btn').removeAttr('disabled');
	$('.alert.alert-danger').hide();
});
$(document).on('click','#register-div-btn',function(){
	$('.login-div').hide();
	$('.login-div').hide();
	$('.register-div').show();
});
$(document).on('click','#login-btn',function(){
	$('#login-btn').attr('disabled',true);
	var validate = 0;
	var email = $('#login-email').val();
	var password = $('#login-password').val();
	if(email == ''){
		validate = 1;
		$('#login-email').addClass('red-border');
	}
	if(password == ''){
		validate = 1;
		$('#login-password').addClass('red-border');
	}
	if(validate == 0){
		$.ajax({
			url: '<?= base_url()?>home/login_process',
			type: 'POST',
			data: {'email' : email, 'password' : password },
			success: function(response){
				var result = jQuery.parseJSON(response);
				if(result.status == 'true'){
					location.reload();
				}else{
					$('#login-btn').removeAttr('disabled');
					$('.login-error-div').show();
					$('#login-error').html(result.msg);
				}
			}
		});
	}else{
		$('#login-btn').removeAttr('disabled');
	}
});
$(document).on('click','#reset-btn',function(){
	$('#reset-btn').attr('disabled',true);
	var validate = 0;
	var email = $('#reset-email').val();
	if(email == ''){
		validate = 1;
		$('#reset-email').addClass('red-border');
	}
	if(validate == 0){
		$('#new-email').val(email);
		$.ajax({
			url: '<?= base_url()?>home/reset_process',
			type: 'POST',
			data: {'email' : email },
			success: function(response){
				var result = jQuery.parseJSON(response);
				if(result.status == 'true'){
					$('#reset-email').val('');
					$('.forgot-div').hide();
					$('.reset-code-div').show();
				}else{
					$('#reset-btn').removeAttr('disabled');
					$('.reset-error-div').show();
					$('#reset-error').html(result.msg);
				}
			}
		});
	}else{
		$('#reset-btn').removeAttr('disabled');
	}
});
$(document).on('click','#verify-btn',function(){
	$('#verify-btn').attr('disabled',true);
	var validate = 0;
	var email = $('#new-email').val();
	var code = $('#reset-code').val();
	if(code == ''){
		validate = 1;
		$('#reset-code').addClass('red-border');
	}
	if(validate == 0){
		$.ajax({
			url: '<?= base_url()?>home/verify_code',
			type: 'POST',
			data: {'email' : email ,'code' : code },
			success: function(response){
				var result = jQuery.parseJSON(response);
				if(result.status == 'true'){
					$('#reset-code').val('');
					$('.reset-code-div').hide();
					$('.pass-div').show();
				}else{
					$('#verify-btn').removeAttr('disabled');
					$('.reset-code-error-div').show();
					$('#reset-code-error').html(result.msg);
				}
			}
		});
	}else{
		$('#verify-btn').removeAttr('disabled');
	}
});
$(document).on('click','#pass-btn',function(){
	$('#pass-btn').attr('disabled',true);
	var validate = 0;
	var email = $('#new-email').val();
	var pass = $('#new-password').val();
	var cpass = $('#new-confirm-password').val();
	if(pass == ''){
		validate = 1;
		$('#new-password').addClass('red-border');
	}
	if(cpass == ''){
		validate = 1;
		$('#new-confirm-password').addClass('red-border');
	}
	if(cpass != pass){
		validate = 1;
		$('#new-password').addClass('red-border');
		$('#new-confirm-password').addClass('red-border');
	}
	if(validate == 0){
		$.ajax({
			url: '<?= base_url()?>home/reset_password_process',
			type: 'POST',
			data: {'email' : email, 'pass' : pass },
			success: function(response){
				var result = jQuery.parseJSON(response);
				if(result.status == 'true'){
					$('#new-password').val('');
					$('#new-confirm-password').val('');
					$('.pass-div').hide();
					$('.login-div').show();
				}else{
					$('#pass-btn').removeAttr('disabled');
					$('.pass-error-div').show();
					$('#pass-error').html(result.msg);
				}
			}
		});
	}else{
		$('#pass-btn').removeAttr('disabled');
	}
});
$('#register-phone').mask('+1(999) 999-9999');
$(document).on('click','#register-btn',function(){
	$('#register-btn').attr('disabled',true);
	var validate = 0;
	var fname = $('#register-first-name').val();
	var lname = $('#register-last-name').val();
	var phone = $('#register-phone').val();
	var email = $('#register-email').val();
	var pass = $('#register-password').val();
	var cpass = $('#register-confirm-password').val();
	if(email == ''){
		validate = 1;
		$('#register-email').addClass('red-border');
	}
	if(fname == ''){
		validate = 1;
		$('#register-first-name').addClass('red-border');
	}
	if(lname == ''){
		validate = 1;
		$('#register-last-name').addClass('red-border');
	}
	if(phone == ''){
		validate = 1;
		$('#register-phone').addClass('red-border');
	}
	if(pass == ''){
		validate = 1;
		$('#register-password').addClass('red-border');
	}
	if(cpass == ''){
		validate = 1;
		$('#register-confirm-password').addClass('red-border');
	}
	if(cpass != pass){
		validate = 1;
		$('#register-password').addClass('red-border');
		$('#register-confirm-password').addClass('red-border');
	}
	if(validate == 0){
		$.ajax({
			url: '<?= base_url()?>home/register_process',
			type: 'POST',
			data: {'fname' : fname, 'lname' : lname, 'email' : email, 'pass' : pass, 'phone' : phone },
			success: function(response){
				var result = jQuery.parseJSON(response);
				if(result.status == 'true'){
					location.reload();
				}else{
					$('#register-btn').removeAttr('disabled');
					$('.register-error-div').show();
					$('#register-error').html(result.msg);
				}
			}
		});
	}else{
		$('#register-btn').removeAttr('disabled');
	}
});
</script>