<!DOCTYPE html>
<html lang="en">

<head>
	<title>Daftar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/'); ?>assets/img/Logosaja_E-Pora.png" />
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/login/'); ?> images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/'); ?>vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/'); ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/'); ?>vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/'); ?>vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/'); ?>vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/'); ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/'); ?>css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/'); ?>login.css">
	<link href="<?php echo base_url('assets/login/'); ?>assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<!--===============================================================================================-->
</head>

<body>

	<!-- Section: Design Block -->
	<section class="background-radial-gradient overflow-hidden align-middle">
		<style>
			* {
				vertical-align: middle;
				font-family: 'Poppins', sans-serif;
			}

			section {
				height: 100vh;
			}

			.background-radial-gradient {
				min-height: 100%;
				background-color: hsla(238.868, 98%, 32%, 0.91);
				background-image: radial-gradient(650px circle at 0% 0%,
						hsla(239, 88%, 22%, 0.91),
						hsla(239, 85%, 16%, 0.91),
						hsla(239, 52%, 20%, 0.91),
						hsla(239, 71%, 33%, 0.91),
						transparent 100%),
					radial-gradient(1250px circle at 100% 100%,
						hsla(238.868, 98%, 32%, 0.91),
						hsla(239, 85%, 16%, 0.91),
						hsla(239, 52%, 20%, 0.91),
						hsla(239, 71%, 33%, 0.91),
						transparent 100%);
			}

			#radius-shape-1 {
				height: 220px;
				width: 220px;
				top: -60px;
				left: -130px;
				background: radial-gradient(#228cbd, #50b9e9);
				overflow: hidden;
			}

			#radius-shape-2 {
				border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
				bottom: -60px;
				right: -110px;
				width: 300px;
				height: 300px;
				background: radial-gradient(#228cbd, #50b9e9);
				overflow: hidden;
			}

			.bg-glass {
				background-color: hsla(0, 0%, 100%, 0.7) !important;
				backdrop-filter: saturate(200%) blur(25px);
			}
		</style>

		<div class="container px-4 px-md-5 text-center text-lg-start align-middle">
			<div class="row gx-lg-5 align-items-center mb-5">
				<div class="col-lg-6 mb-3 mb-lg-0 hahaha" style="z-index: 10">
					<h1 class="my-3 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
						Dinas Perumahan, Kawasan Permukiman<br />
						<span class="text-ijo">dan Cipta Karya</span>
					</h1>
					<p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
						Kabupaten Malang, Jawa Timur
					</p>
				</div>

				<div class="col-lg-6 mb-5 mb-lg-0 position-relative hahaha">
					<div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong mt-5 ms-5"></div>
					<div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

					<div class="card bg-glass rounded-4">
						<div class="card-body px-4 py-5 px-md-5">
							<div class="mb-4 text-center">
								<img src="<?php echo base_url('assets/login/'); ?>logokabupaten.png" class="img-thumbnaill" alt="...">
							</div>
							<form action=" <?= base_url('auth/proses_log') ?>" method="post" onsubmit="return validateCaptcha();">
								<!-- Email input -->
								<div class="form-outline mb-4 text-start">
									<label class="form-label" for="form3Example3">Username</label>
									<input type="text" id="form3Example3" name="username" class="form-control" />
								</div>

								<!-- Password input -->
								<div class="row">
									<div class="col-md-12 mb-2">
										<div class="form-outline text-start">
											<label class="form-label" for="form3Example4">Kata Sandi</label>
											<input type="password" id="form3Example4" name="password" class="form-control" />
										</div>
									</div>
								</div>
								<div style="margin: 0 auto; display: flex; flex-direction: column; align-items: center; justify-content: center;">
									<!-- Login buttons -->
									<div class="g-recaptcha" data-sitekey="6LfrFKQUAAAAAMzFobDZ7ZWy982lDxeps8cd1I2i"></div>
									<button type="submit" class="btn btn-block mt-4 rounded btn-success" onclick="validateForm()">Login</button>
								</div>

								<!-- Submit button -->
								<!-- <button type="submit" class="btn btn-block mt-4 rounded btn-success">
									Log In
								</button> -->

								<div class="mt-4 mb-0 py-0 text-center">
									<div class="text-black">
										Belum memiliki akun? <a href="<?= base_url('Auth/register'); ?>" class="ms-1 hahahaha">Daftar sekarang!</a>
									</div>
								</div>

								<!-- Register buttons -->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Section: Design Block -->


	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/'); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/'); ?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url('assets/login/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/'); ?>vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/'); ?>vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		function validateForm() {
			var username = document.getElementById('username').value;
			var password = document.getElementById('pw').value;
			var errorUsername = document.getElementById('error-username');
			var errorPassword = document.getElementById('error-password');

			errorUsername.textContent = '';
			errorPassword.textContent = '';


			if (username.trim() === '') {
				errorUsername.textContent = 'Username harus diisi!';
			}

			if (password.trim() === '') {
				errorPassword.textContent = 'Password harus diisi!';
			}

			// Add reCAPTCHA verification here
			var response = grecaptcha.getResponse();
			if (response.length == 0) {
				// reCaptcha not verified
				alert("Please verify that you are human!");
			} else {
				// captcha verified, continue with form submission
				// You can add code here to submit the form to the server
			}
		}
	</script>

	<!-- SHOW PASSWORD -->
	<script>
		const passwordField = document.getElementById("pw");
		const togglePasswordButton = document.getElementById("togglePassword");

		togglePasswordButton.addEventListener("click", function() {
			const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
			passwordField.setAttribute("type", type);
			this.classList.toggle("fa-eye");
			this.classList.toggle("fa-eye-slash");
		});
	</script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/'); ?>js/main.js"></script>
	<script src="<?php echo base_url('assets/login/'); ?>login.js"></script>
	<script>
		function validateCaptcha() {
			var response = grecaptcha.getResponse();
			if (response.length === 0) {
				alert("Please complete the reCAPTCHA.");
				return false;
			}
			return true;
		}
	</script>


</body>

</html>