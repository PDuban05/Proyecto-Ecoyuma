<?php
session_start();
require 'database.php';
$alert = "";
$nombre = "";
$apellido = "";
$telefono = "";
$email = "";
$password1 = "";
$password2 = "";
$onload = "";


if ($_POST) {

	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$telefono = $_POST["telefono"];
	$email = $_POST["email"];
	$password1 = $_POST["password1"];
	$password2 = $_POST["password2"];

	if ($password1 != $password2) {

		$alert = "No coinciden las contraseñas";
		$onload = "document.getElementById('password1').focus()";
	} else {

		$sql = "INSERT INTO usuarios(nombre,apellido,telefono,email,password) VALUES (?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$password = password_hash($password1, PASSWORD_BCRYPT);
		$stmt->execute([$nombre, $apellido, $telefono,$email,$password]);

		
		$_SESSION['email']=$email;
		$_SESSION['password']=$password;

		header("Location:inf.php");
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

<body class="templatemo-bg-gray2" onload="<?php echo $onload ?>">
	<div class="container">
		<div class="col-md-12">

			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="  <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="post">
				<h1 class="margin-bottom-15">Registro</h1>



				<div class="form-group">
					<div class="col-xs-12">
						<div class="control-wrapper">
							<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>" required>
						</div>
					</div>
				</div>


				<div class="form-group">
					<div class="col-xs-12">
						<div class="control-wrapper">
							<input type="text" class="form-control" name="apellido" placeholder="Apellidos" value="<?php echo $apellido; ?>" required>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<div class="control-wrapper">
							<input type="text" class="form-control" name="telefono" placeholder="Telefono" value="<?php echo $telefono; ?>" required>
						</div>
					</div>
				</div>






				<div class="form-group">
					<div class="col-xs-12">
						<div class="control-wrapper">
							<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
						</div>
					</div>
				</div>


				<div class="form-group">
					<div class="col-md-12">
						<div class="control-wrapper">
							<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
							<input type="password" class="form-control" id="password1" name="password1" placeholder="Contraseña" required>
						</div>
					</div>
				</div>


				<div class="form-group">
					<div class="col-md-12">
						<div class="control-wrapper">
							<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
							<input type="password" class="form-control" id="password2" name="password2" placeholder="Vuelve a escribir la contraseña" required>
							<label style="color: red;font-size:11px;  "> <?php echo $alert ?> </label>
						</div>
					</div>
				</div>





				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox control-wrapper">
							<label class="font-label">
								Al hacer clic en "Registrarte", aceptas nuestras Condiciones, la Política de datos y la Política de cookies.
							</label>
						</div>
					</div>
				</div>






				<div class="form-group">
					<div class="col-md-12">
						<div class="control-wrapper">

							<input type="submit" value="Registrarte" class="btn btn-success btn-lg">

						</div>
					</div>
				</div>



			</form>

		</div>
	</div>


</body>

</html>