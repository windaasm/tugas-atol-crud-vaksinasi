<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<section class="vh-100" style="background-color: #9A616D;">
	<div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col col-xl-10">
				<div class="card" style="border-radius: 1rem;">
					<div class="row g-0">
						<div class="col-md-6 col-lg-5 d-none d-md-block">
							<img src="https://images.unsplash.com/photo-1608422050828-485141c98429?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=373&q=80" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
						</div>
						<div class="col-md-6 col-lg-7 d-flex align-items-center">
							<div class="card-body p-4 p-lg-5 text-black">

								<form method="post" name="f" action="login.php">

									<div class="d-flex align-items-center mb-3 pb-1">
										<i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
										<span class="h1 fw-bold mb-0">Sistem Pengelolaan Vaksinasi</span>
									</div>

									<h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

									<div class="form-outline mb-4">
										<input type="text" id="form2Example17" class="form-control form-control-lg" name="Username" value="<?php echo ($_SERVER["REMOTE_ADDR"] == "5.189.147.47" ? "admin" : ""); ?>" maxlength="17" size="17" />
										<label class="form-label" for="form2Example17">Username</label>
									</div>

									<div class="form-outline mb-4">
										<input type="password" id="form2Example27" class="form-control form-control-lg" name="password" value="<?php echo ($_SERVER["REMOTE_ADDR"] == "5.189.147.47" ? "password_admin" : ""); ?>" maxlength="17" size="17" />
										<label class="form-label" for="form2Example27">Password</label>
									</div>

									<div class="pt-1 mb-4">
										<button class="btn btn-dark btn-lg btn-block" type="submit" name="TblLogin" value="Login">Login</button>
									</div>

								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

</html>