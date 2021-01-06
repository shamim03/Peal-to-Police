
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Peal To Police</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--=========================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/css/font-awesome.min.css">
<!--=================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/lr_util.css">
	<link rel="stylesheet" type="text/css" href="css/lr_main.css">
<!--=======================================================================-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(50340638_377596063004037_7250771404084215808_n.jpg);">
					<span class="login100-form-title-1">
						Sign Up
					</span>
				</div>
				@if ($errors->any())
					<div class="">
						<ul>
							@foreach ($errors->all() as $error)
								<!-- <li class="text-center">{{ $error }}</li> -->
								<div class="alert alert-danger fade in">
									<a href="#" class="close" data-dismiss="alert">&times;</a>
									<strong>Error!</strong> {{$error}}
								</div>
							@endforeach
						</ul>
					</div>
				@endif
				<form class="login100-form validate-form" method="post" action="/register">
					@csrf
					<div class="wrap-input100 validate-input m-b-26" data-validate="Name is required">

						<span class="label-input100">Name</span>
						<input class="input100" type="text" name="name" placeholder="Enter name">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<!-- <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">National_ID</span>
						<input class="input100" type="text" name="username" placeholder="Enter national id">
						<span class="focus-input100"></span>
					</div>
 -->
                    
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Enter email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Mobile number is required">
						<span class="label-input100">Mobile number</span>
						<input class="input100" type="text" name="mobile" placeholder="Enter mobile number">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Confurm password is required">
						<span class="label-input100">Confurm password</span>
						<input class="input100" type="password" name="password_confirmation" placeholder="Enter confurm password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Register
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>