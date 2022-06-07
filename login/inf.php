<?php
session_start();
require 'database.php';

if( !isset($_SESSION['email']) ){
	header("Location:index.php");

}


if ($_POST) {

	$departamento = $_POST["departamento"];
	$ciudad = $_POST["ciudad"];
	$direccion = $_POST["direccion"];
	$referencia = $_POST["referencia"];



	$records1 = $conn->prepare('SELECT id FROM usuarios WHERE email = :email and password= :pass');
	$records1->bindParam(':email', $_SESSION['email']);
	$records1->bindParam(':pass', $_SESSION['password']);
	$records1->execute();
	$results1 = $records1->fetch(PDO::FETCH_ASSOC);
	$id = $results1['id'];





	$sql = "INSERT INTO direccion(id_usuario,departamento,ciudad,direccion,referencia) VALUES (?,?,?,?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id, $departamento, $ciudad, $direccion, $referencia]);
	
	session_unset();

	session_destroy();

	header("Location:index.php");
}



?>




<!DOCTYPE html>

<head>

	<title>Completa tú información</title>
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

<body class="templatemo-bg-gray2" onload=" <?php echo $onload ?>">
	<div class="container">
		<div class="col-md-12">
			
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="  <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="post">
			<p class="text-right"><a href="index.php"  style="font-weight: 400;">Omitir</a></p>
			<h1 class="margin-bottom-15">Completa tú información</h1>



				<div class="form-group">
					<div class="col-xs-12">
						<div class="control-wrapper">
							<input type="text" class="form-control" name="departamento" placeholder="Departamento" value="" required>
						</div>
					</div>
				</div>


				<div class="form-group">
					<div class="col-xs-12">
						<div class="control-wrapper">
							<input type="text" class="form-control" name="ciudad" placeholder="Ciudad" value="" required>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<div class="control-wrapper">
							<input type="text" class="form-control" name="direccion" placeholder="Dirección" value="" required>
						</div>
					</div>
				</div>






				<div class="form-group">
					<div class="col-xs-12">
						<div class="control-wrapper">
							<input type="text" class="form-control" name="referencia" placeholder="Referencia" value="" required>
						</div>
					</div>
				</div>









				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox control-wrapper">
							<label class="font-label">
								Al hacer clic en "Guardar", aceptas nuestras Condiciones, la Política de datos y la Política de cookies.
							</label>
						</div>
					</div>
				</div>






				<div class="form-group">
					<div class="col-md-12">
						<div class="control-wrapper">
							<div class="d-flex">

								<input type="submit" value="Guardar" class="btn btn-success my-4 btn-lg  ml-auto">
							</div>
						</div>
					</div>
				</div>



			</form>

		</div>
	</div>


</body>

</html>