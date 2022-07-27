<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['estado']['msg'])){
	$statusMsg = $sessData['estado']['msg'];
	$statusMsgType = $sessData['estado']['type'];
	unset($_SESSION['sessData']['estado']);
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'><link rel="stylesheet" href="assets/css/style1.css">
	<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">
	<!-- Último minificado bootstrap css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery libraria incluida -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<!-- Último minificado bootstrap js -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<body>
		<div class="main">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="nav nav-pills">
					</ul>
				</div>
				<div class="panel-body">
					<div class="row">
						<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

					</head>
					<body>
						<!-- partial:index.partial.html -->

						<div class="section">
							<div class="container">
								<div class="row full-height justify-content-center">
									<div class="col-12 text-center align-self-center py-5">
										<div class="section pb-5 pt-5 pt-sm-2 text-center">
											<div class="card-3d-wrap mx-auto">
												<div class="card-3d-wrapper">
													<div class="card-front">
														<div class="center-wrap">
															<h3 class="mb-4 pb-3"><font color="#ffeba7">Password recovery</h3></font>
															<div class="section text-center">
																<?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
																<form  class="formulario" action="MiCuenta.php" method="post">
																	<div class="form-group mt-2">
																		<i  class="input-icon uil uil-lock-alt"></i><input type="password" class="form-style" name="password" placeholder="PASSWORD" required="">
																	</div>
																	<div class="form-group mt-2">
																	<i  class="input-icon uil uil-lock-alt"></i><input type="password" class="form-style" name="confirm_password" placeholder="CONFIRMAR PASSWORD" required="">
																</div>
																	<div class="send-button">
																		<input type="hidden" name="fp_code" value="<?php echo $_REQUEST['fp_code']; ?>"/>
																		<input type="submit" name="resetSubmit" value="REINICIAR PASSWORD" class="btn mt-4">
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
