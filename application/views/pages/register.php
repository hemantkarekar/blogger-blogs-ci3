<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("components/_common_head") ?>
</head>

<body>
	<main>
		<section class="py-5">
			<div class="row m-0 justify-content-center">
				<div class="col-xxl-3 col-xl-5 col-md-6 col-sm-8 col-12">
				<h2 class="mb-3">Register Page</h2>
					<?php if ($this->session->userdata("oauth_error")) { ?>
						<div class="alert alert-danger" role="alert">
							<?= $this->session->userdata("oauth_error"); ?>
						</div>
					<?php }
					?>
					<form method="post" action="<?= base_url("api/auth/register") ?>" id="registerForm">
					<div class="row m-0">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="exampleInputFirstN" class="form-label">First Name:</label>
								<input type="text" name="f_name" class="form-control" id="exampleInputFirstN">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label for="exampleInputLastN" class="form-label">Last Name:</label>
								<input type="text" name="l_name" class="form-control" id="exampleInputLastN">
							</div>
						</div>
						
						<div class="col-12">
							<div class="mb-3">
								<label for="exampleInputEmail" class="form-label">Email Address:</label>
								<input type="email" name="email" class="form-control" id="exampleInputEmail">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label for="exampleInputLastN" class="form-label">Mobile Number:</label>
								<input type="text" name="mobile" class="form-control" id="exampleInputLastN" aria-describedby="mobileUsernameHelp">
								<div id="mobileUsernameHelp" class="form-text">This will be your username while logging in.</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="mb-3">
								<label for="exampleInputPassword1" class="form-label">Password</label>
								<input type="password" name="password" class="form-control" id="exampleInputPassword1">
							</div>
						</div>
					</div>
						<div class="mb-3 form-check">
							<input type="checkbox" name="auto-login" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">Keep me logged in</label>
						</div>
						<button type="submit" class="btn btn-primary">Register Me</button>
					</form>
				</div>
			</div>
		</section>
	</main>
	<?php $this->load->view("components/_common_js") ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<style>
		.error{
			color: red;
		}
		input.error{
			box-shadow: 0 0 0 0.15rem rgba(255, 0, 0, 0.4);
		}
	</style>
	
	<script>
		$(document).ready(function() {
			$("#registerForm").validate({
				rules: {
					'username': {
						required: true,
					},
					'password': {
						required: true,
					}
				},
				messages: {
					'username': {
						required: "Please enter username",
					},
					'password': {
						required: "Please enter your password",
					},
				}
			});
		});
	</script>
</body>

</html>