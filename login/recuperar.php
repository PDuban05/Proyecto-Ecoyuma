<?php
session_start();




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'email/src/PHPMailer.php';
require 'email/src/SMTP.php';
require 'email/src/Exception.php';
require 'database.php';
$message = "";

$mail = new PHPMailer(true);

if ($_POST) {

	$email = $_POST['email'];
	$records = $conn->prepare('SELECT  email FROM usuarios WHERE email = :email');
	$records->bindParam(':email', $email);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);


	if (!empty($results['email'])) {

		$code = rand(1000, 9999);

		$sql = "UPDATE usuarios SET code='$code' WHERE email = '$email'";
		$stmt = $conn->prepare($sql);

		$stmt->execute();

		$_SESSION['email'] = $email;



		try {

			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = TRUE;
			$mail->Username = 'ecoyumas.s.a.s@gmail.com';
			$mail->Password = 'ecoyuma12345';
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = 587;
	
			$mail->setFrom('ecoyumas.s.a.s@gmail.com', 'EcoYuma S.A.S');
			$mail->addAddress($email);
	
	
			$mail->isHTML(true);
			$mail->Subject = "Codigo de Recuperacion-ECOYUMA S.A.S";
			$mail->Body = 'Tu codigo de recuperacion es: <b> '.$code.' <b>';
			$mail->send();
	
			header("Location:codigo.php");

		} catch (Exception $e) {
			echo 'mensaje' . $mail->ErrorInfo;
		}




	}else{

		$message="El correo no ha sido registrado";


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
				<h1 class="margin-bottom-15">Obtener codigo de recuperación</h1>
				<div class="form-group">
					<div class="col-xs-12">
						<div class="control-wrapper">
							<label for="username" class="control-label fa-label"><i class="fa fa- fa-envelope"></i></label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
							<p style="color:red;font-size:11px"><?php echo $message ?></p>
						</div>
					</div>
				</div>


				<div class="form-group">
					<div class="col-md-12">
						<div class="control-wrapper">
							<input type="submit" value="Enviar Codigo" class="btn btn-success btn-lg">

						</div>
					</div>
				</div>
				<hr>
				<p style="color:Black;font-size:12px">Te enviaremos un codigo de 4 digitos a tu correo electronico</p>
				


			</form>

		</div>
	</div>
</body>

</html>