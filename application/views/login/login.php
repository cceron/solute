<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Cristian Ceron">

	<title>Acceso a la plataforma</title>

	<link rel="shortcut icon" href="<?php echo base_url("assets/images/platform.ico")?>">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

	
	<link class="js-stylesheet" href="<?php echo base_url("assets/template/css/light.css")?>" rel="stylesheet">
	<!--<script src="<?php echo base_url("assets/template/js/settings.js")?>"></script>-->
	<!-- END SETTINGS -->
	<link rel="stylesheet" href="<?php echo base_url("assets/template/css/bootstrap-icons.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/template/css/notyf.min.css")?>">
</head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

	<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
		<div class="main d-flex justify-content-center w-100">
			<main class="content d-flex p-0">
				<div class="container d-flex flex-column">
					<div class="row h-100">
						<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
							<div class="d-table-cell align-middle">

								<div class="text-center mt-4">
									<h1 class="h2">Bienvenido</h1>
									<p class="lead">Ingresa tu credencial para acceder a la plataforma.</p>
								</div>

								<div class="card">
									<div class="card-body">
										<div class="m-sm-4">
											<div class="text-center">
												<img src="<?php echo base_url("assets/images/user_64.png") ?>" alt="Chris Wood" class="img-fluid rounded-circle" width="132" height="132" />
											</div>
											<form id="frm-login">
												<div class="mb-3">
													<label class="form-label">Correo</label>
													<input class="form-control form-control-lg" type="email" name="email" placeholder="Digita tu correo" required=""/>
												</div>
												<div class="mb-3">
													<label class="form-label">Contraseña</label>
													<input class="form-control form-control-lg" type="password" name="password" placeholder="Digita tu contraseña de la plataforma" required=""/>
													<small>
														<a href="login/reset-password">Olvide mi contraseña</a>
													</small>
												</div>
												
												<div class="text-center mt-3">
													<button type="submit" class="btn btn-lg btn-primary"><i class="bi bi-key-fill"></i> Acceder</button>
													<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
												</div>
											</form>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</main>
		</div>

		<script src="<?php echo base_url("assets/template/js/app.js")?>"></script>
		<script src="<?php echo base_url("assets/template/js/notyf.min.js")?>"></script>
		<script src="<?php echo base_url("assets/js/utils.js")?>"></script>
		<script src="<?php echo base_url("assets/js/platform.js")?>"></script>
		

	</body>

</html>