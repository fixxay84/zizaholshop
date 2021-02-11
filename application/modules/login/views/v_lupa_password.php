<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lupa Password | Member</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<!-- Favicons -->
    <link href="<?php echo base_url() ?>assets/images/logo.png" rel="icon">
    <link href="<?php echo base_url() ?>assets/images/logo.png" rel="apple-touch-icon"><!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">

				<form class="login100-form" method="post" action="<?php echo base_url('login/forgotPassword') ?>">
					<span class="login100-form-title p-b-55">
						Forgot Password?
					</span>

					<div class="wrap-input100"><?php echo $this->session->flashdata('message') ?></div>

					<div class="wrap-input100 m-b-16">
						<input class="input100" type="text" name="email" placeholder="Email" autofocus="" value="<?php echo set_value('email') ?>">
						<?php echo form_error('email', '<small class="text-danger">', '</small>' ) ?>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn" type="submit">
							Reset Password
						</button>
					</div>

					<div class="text-center w-full p-t-20">
						<a class="txt1 bo1 hov1" href="<?php echo base_url('login') ?>">
							Back to Login							
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
	

<!--===============================================================================================-->	
	<script src="<?php echo base_url() ?>assets/template/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url() ?>assets/template/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template/login/js/main.js"></script>

</body>
</html>