<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'><link rel="stylesheet" href="assets/css/style1.css">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
	<!-- partial:index.partial.html -->

	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h5 class="mb-0 pb-3"><font color="#12a39e"><span><a href="login.php" ><font color="#12a39e">Log In </a></span><span>Sign Up</span></font></h5>
						<!-- <div>
						<button class="checkbox" type="checkbox" id="reg-log" name="reg-log" onclick="location.href='login.view.php'"></button>
						<label for="reg-log"></label>
					</div> -->
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<h3 class="mb-4 pb-3"><font color="#ffeba7">Sign Up</h3></font>
										<div class="section text-center">
											<form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
												<div class="form-group mt-2">
													<i class="input-icon uil uil-user"></i><input type="text" name="nombre" class="form-style" placeholder="Your name" autocomplete="off">
												</div>
												<div class="form-group mt-2">
													<i class="input-icon uil uil-user"></i><input type="text" name="usuario" class="form-style" placeholder="Create a user" autocomplete="off">
												</div>	
												<div class="form-group mt-2">
													<i class="input-icon uil  uil-envelope-alt"></i><input type="text" name="correo" class="form-style" placeholder="Your Email" autocomplete="off">
												</div>	
												<div class="form-group mt-2">
													<i class="input-icon uil uil-lock-alt"></i><input type="password" name="password" class="form-style" placeholder="Your Password" autocomplete="off">
												</div>	
												<div class="form-group mt-2">
													<i class="input-icon uil uil-lock-alt"></i><input type="password" name="password2" class="form-style" placeholder="Repeat Password" autocomplete="off">
												</div>
												<button class="btn mt-4" onclick="login.submit()" id="submit">Crear</button>
                                                 <p class="mb-0 mt-4 text-center"><a href="index.view.php" class="link">Back to home</a></p>
											</div>
											<!-- Comprobamos si la variable errores esta seteada, si es asi mostramos los errores -->
											<?php if(!empty($errores)): ?>
												<div class="error">
													<ul>
														<?php echo $errores; ?>
													</ul>
												</div>
											<?php endif; ?>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- partial -->
	<script  src="assets/js/script.js"></script>
</body>
</html>