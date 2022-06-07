<?php

if (!empty($_SESSION['code'])) {
	header("Location:index.php");
}

session_start();
$message = "";
$onload = "";





require 'database.php';



$records = $conn->prepare('SELECT id,nombre,apellido,email,code FROM usuarios WHERE email = :email and code=:code');
$records->bindParam(':email', $_SESSION['email']);
$records->bindParam(':code', $_SESSION['code']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);



if ($_POST) {
	echo $_SESSION['code'];
	if ($results['email'] == $_SESSION['email'] && $results['code'] == $_SESSION['code'] && $_POST['pass'] == $_POST['password']) {
		$email = $results['email'];
		$code = $results['code'];
		$passw = password_hash($_POST['password'], PASSWORD_BCRYPT);

		$sql = "UPDATE usuarios SET password='$passw' WHERE email = '$email' and code='$code' ";
		$stmt = $conn->prepare($sql);
		$stmt->execute();

		session_unset();

		session_destroy();
		header("Location:index.php");
	} else {
		$message = "Las contraseñas no coincide";
		$onload = "document.getElementById('pass').focus()";
	}
}


?>

<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
		$('#mostrar_contrasena').click(function() {
			if ($('#mostrar_contrasena').is(':checked')) {
				$('#contrasena').attr('type', 'text');
			} else {
				$('#contrasena').attr('type', 'password');
			}
		});
	});


	$(document).ready(function() {
		$('#mostrar_contrasena').click(function() {
			if ($('#mostrar_contrasena').is(':checked')) {
				$('#contrasena2').attr('type', 'text');
			} else {
				$('#contrasena2').attr('type', 'password');
			}
		});
	});
</script>

<!DOCTYPE html>

<head>

	<title>Cambio de contraseña</title>
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



			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">


				<div class="profile-userpic">
					<img src="images/user2.jpg" class="img-responsive" alt="">
				</div>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $results['nombre'] . " " . $results['apellido']  ?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo  $results['email']  ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<div class="control-wrapper">
							<label for="username" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
							<input type="password" class="form-control" id="contrasena" name="pass" placeholder="Digita tu nueva contraseña" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="control-wrapper">
							<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
							<input type="password" class="form-control" id="contrasena2" name="password" placeholder="Digita nuevamente tu contraseña" required>
							<p style="color:red;font-size:11px"> <?php echo $message; ?></p>
							<Label style="margin:10px;"><input type="checkbox" id="mostrar_contrasena" title="clic para mostrar contraseña" /> Mostrar Contraseñas </Label>





						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<div class="control-wrapper">
								<input type="submit" value="Cambiar Contraseña" class="btn btn-success btn-lg">

							</div>
						</div>
					</div>



			</form>

		</div>
	</div>
</body>



</html>