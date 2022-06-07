<?php
session_start();

if( !isset($_SESSION['email']) ){
	header("Location:index.php");

}

require 'database.php';
$message = "";


if ($_POST) {

	$records = $conn->prepare('SELECT code  FROM usuarios WHERE email = :email');
	$records->bindParam(':email', $_SESSION['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	



	if (!empty($results['code']) && $results['code'] == $_POST['codigo']  ) {
		$_SESSION['code']=$results['code'];
		
		header("Location:change.php");
	} else {
		$message = "El codigo no coincide";
		$onload = "document.getElementById('codigo').focus()";
	}

}







?>

<!DOCTYPE html>

<head>

	<title>Recuperar</title>
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

<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">



			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
				<h1 class="margin-bottom-15">Digite el Codigo</h1>
				<div class="form-group">
					<div class="col-xs-12">
						<div class="control-wrapper">
							
							<input type="text" class="form-control" id="codigo"  name="codigo" style="letter-spacing: 3em;text-align: center;" placeholder="x x x x" required>
							<p style="color:red;font-size:11px"><?php echo $message ?></p>
						</div>
					</div>
				</div>


				<div class="form-group">
					<div class="col-md-12">
						<div class="control-wrapper">
							<input type="submit" value="Validar" class="btn btn-success btn-lg">

						</div>
					</div>
				</div>
			
				



			</form>

		</div>
	</div>
</body>

</html>