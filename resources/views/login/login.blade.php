<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login-Asips</title>
     <link href="Login/css/styles.css" rel="stylesheet" />
     <link rel="icon" href="./assets/images/logo.png">


        <link rel="stylesheet" type="text/css" href="Login/css/util.css">
        <link rel="stylesheet" type="text/css" href="Login/css/main.css">
    <!--===============================================================================================-->
  </head>
  <body>

	@if (session()->has('loginGagal'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align: center">
                        {{ session('loginGagal') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form" method="POST" action="/login-form">
					@csrf
					<span class="login100-form-title p-b-70">
						Login
					</span>
					<span class="login100-form-avatar">
						<img src="./assets/images/logo.png" alt="AVATAR">
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" required="required">
							Login
						</button>
					</div>

						<li>
							<span class="txt1">
								Don’t have an account?
							</span>

							<a href="/registration" class="txt2">
								Sign up
							</a>
						</li>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/bootstrap/js/popper.js"></script>
	<script src="Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/daterangepicker/moment.min.js"></script>
	<script src="Login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Login/js/main.js"></script>

</body>
</html>

