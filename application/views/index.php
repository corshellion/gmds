<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="<?php echo base_url('assets/Images/kueku.png'); ?>">

<head>
	<title>Masuk Akun- Travia</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/kueku/assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/kueku/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/kueku/assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="http://localhost/kueku/assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/kueku/assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/kueku/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/kueku/assets/css/main.css">
<!--===============================================================================================-->
    
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100"  >
			<div class="wrap-login100" style="width:700px;height:700px;">
				<div class="login100-pic js-tilt" data-tilt>
					<a href="<?php echo base_url(); ?>"><img src="http://localhost/kueku/assets/images/kueku.png" alt="IMG" style="width:60%;"></a>
				</div>
                
				<form class="login100-form validate-form" action="<?php echo base_url('Php/log')?>" method="post" >
					<span class="login100-form-title" style="margin-left:30%;">
						Masuk Administrator
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz" style="width:500px;">
						<input class="input100" type="text" name="email" placeholder="Email" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required" style="width:500px;">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					
                        <div class="container-login100-form-btn" style="width:500px;">
                       
						<button class="login100-form-btn" >
                             Masuk
						</button>
					    </div>

				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="http://localhost/kueku/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="http://localhost/kueku/assets/vendor/bootstrap/js/popper.js"></script>
	<script src="http://localhost/kueku/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="http://localhost/kueku/assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="http://localhost/kueku/assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
 
<!--===============================================================================================-->
	<script src="http://localhost/kueku/assets/js/main.js"></script>

</body>
</html>