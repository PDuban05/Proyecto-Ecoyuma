<?php


session_start();
require 'database.php';

$message = "";
$onload = "";

if ($_POST) {

	$records = $conn->prepare('SELECT id, email,nombre,apellido,password FROM usuarios WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);



	if (!empty($results['password'])  &&  password_verify($_POST['password'], $results['password'])) {
		$_SESSION['id'] = $results['id'];


		header("Location:../index.php");
	} else {
		$message = "El Email o contraseña no coincide";
		$onload = "document.getElementById('email').focus()";
	}
}


?>

<!DOCTYPE html>

<head>

	<title>Iniciar Sesión</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">
</head>

<body class="templatemo-bg-gray" onload=" <?php echo $onload ?>">
	<div class="container">
		<div class="col-md-12">


			<!-- [ basic-alert ] start -->
			<?php
			if (isset($_SESSION['alt'])) {
			?>

				<div class="col-md-12">
					<div class="card">

						<div class="card-body">

							<div class="alert alert-success" role="alert">
								<?php

								echo $_SESSION['alt'];
								unset($_SESSION['alt']);
								?>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			?>






			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
				<h1 class="margin-bottom-15">Iniciar Sesión</h1>
				<div class="form-group">
					<div class="col-xs-12">
						<div class="control-wrapper">
							<label for="username" class="control-label fa-label"><i class="fa fa- fa-envelope"></i></label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="control-wrapper">
							<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
							<input type="password" class="form-control" name="password" placeholder="Contraseña" required>

							<p style="color:red;font-size:11px"> <?php echo $message; ?></p>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-12">
						<div class="control-wrapper">
							<input type="submit" value="Ingresar" class="btn btn-success btn-lg">
							<a href="recuperar.php" class="text-right pull-right">Has olvidado tu contraseña</a>
						</div>
					</div>
				</div>
				<hr>
				<div class="text-center">
					<a href="registro.php" class="templatemo-create-new">Registrate <i class="fa fa-arrow-circle-o-right"></i></a>




				</div>

			</form>

		</div>
	</div>
	<script src="../admin/assets/js/plugins/bootstrap.min.js"></script>
</body>

</html>