<?php
session_start();
include("php/conexion.php");




if (isset($_SESSION['id'])) {

	$id = $_SESSION['id'];

	$direccion = "SELECT * FROM usuarios inner join direccion where direccion.id_usuario=$id and usuarios.id = $id ";
	$records = mysqli_query($conexion, $direccion);
	$res = mysqli_fetch_assoc($records);
}



// SDK de Mercado Pago

require 'vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-2774693874356825-052711-f552a42a3e09800c1c4417ce299ddcfc-678907485');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia




?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>Carrito de compras</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Goggles a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
	<link href="css/style6.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/shop.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/checkout.css">
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>




</head>

<body>
	<div class="banner-top container-fluid" id="home">
		<!-- header -->
		<header>
			<div class="row">
				<div class="col-md-3 top-info text-left mt-lg-4">
					<h6>Necesitas ayuda</h6>
					<ul>
						<li>
							<i class="fas fa-phone"></i>
						</li>
						<li class="number-phone mt-3">(037) 6138032</li>
					</ul>
				</div>
				<div class="col-md-6 logo-w3layouts text-center">
					<h1 class="logo-w3layouts">
						<a class="navbar-brand" href="index.html">
							EcoyumaShop </a>
					</h1>
				</div>

				<div class="col-md-3 top-info-cart text-right mt-lg-4">
					<ul class="cart-inner-info">
						<li class="button-log">
							<a class="btn-open" href="#">
								<?php if (!empty($_SESSION['name'])) {
									echo $_SESSION['name'] . " " . $_SESSION['apellido'];
								}  ?> <span class="fa fa-user" aria-hidden="true"></span>
							</a>
						</li>



						<li class="galssescart galssescart2 cart cart box_1">

							<?php
							include_once("php/nav_cart.php ");
							include_once("php/modal_cart.php");


							$items = array();
							foreach ($carrito_mio as $producto) {

								if (is_array($producto)) {

									if (count($producto) == 6) {





										$item = new MercadoPago\Item();
										$item->title = $producto["titulo"];
										$item->quantity = $producto["cantidad"];
										$item->currency_id = "COP";
										$item->unit_price = $producto["precio"];


										$items[] = $item;
									}
								}
							}

							$preference->items = $items;
							$preference->back_urls = array(
								"success" => "http://localhost/captura.php",
								"fail" => "http://localhost/fallo.php"


							);

							$preference->auto_return = "approved";
							$preference->binary_mode = true;




							$preference->save();




							?>

						</li>


					</ul>
					<!---->




					<div class="overlay-login text-left">
						<button type="button" class="overlay-close1">
							<i class="fa fa-times" aria-hidden="true"></i>
						</button>


						<div class="wrap">
							<div align="center" class="login p-5 bg-dark mx-auto mw-100">

								<?php
								if (!empty($_SESSION['name'])) {  ?>


									<img src="login/images/user2.jpg" class="img-responsive profile-userpic" alt="">
									<br>

									<div class="form-group">
										<label class="mb-2"> <?php echo $_SESSION['name'] . " " . $_SESSION['apellido'] ?> </label>

										<small id="emailHelp" class="form-text text-muted"><?php echo $_SESSION['email'] ?></small>
									</div>



								<?php
								} else { ?>


									<button type="submit" class="btn btn-primary submit mb-4"><a href="login/index.php">Ingresa </a></button>
									<button type="submit" class="btn btn-primary submit mb-4"> <a href="login/registro.php">Registrar</a></button>

								<?php
								} ?>


							</div>

						</div>


					</div>





					<!---->
				</div>
			</div>




			<label class="top-log mx-auto"></label>
			<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">

					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav nav-mega mx-auto">
						<li class="nav-item active">
							<a class="nav-link ml-lg-0" href="index.php">Inicio

							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="conocenos.html">Conocenos</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="#clases">Categorias</a>



						</li>


						<li class="nav-item">
							<a class="nav-link" href="contactos.html">Contactos</a>
						</li>




						<li class="nav-item">
							<a class="nav-link" href="search.php">
								<i class="fas fa-search"></i>
							</a>
						</li>




					</ul>

				</div>
			</nav>


		</header>

	</div>
	<!--// header_top -->
	<!--checkout-->
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<div class="inner-sec-shop px-lg-4 px-3">

				<div class="checkout-right">



					<div class="center mt-5">
						<div class="card pt-3">
							<h3 class="tittle-w3layouts my-lg-4 mt-3">Carrito </h3>
							<div class="container-fluid p-2">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Imagen</th>
											<th scope="col">Cantidad</th>
											<th scope="col">Artículo</th>
											<th scope="col">Precio</th>
											<th scope="col">Total</th>
											<th scope="col">Borrar</th>
										</tr>
									</thead>
									<tbody>





										<div class="container_card">

											<?php
											if (isset($_SESSION['carrito'])) {
												$total = 0;
												for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
													if (isset($carrito_mio[$i])) {
														if ($carrito_mio[$i] != NULL) {
											?>
															<?php if ($carrito_mio[$i]['ref'] != 'portes') { ?>
																<tr>
																	<th scope="row" style="vertical-align: middle;"><?php echo $i; ?></th>

																	<td>
																		<img src="<?php echo $carrito_mio[$i]['img'] ?>" alt="" width="100px">


																	</td>
																	<td style="vertical-align: middle;">
																		<form id="form2" name="form1" method="post" action="php/cart.php">
																			<input name="id" type="hidden" id="id" value="<?php print $i; ?>" class="align-middle" />
																			<input name="cantidad" type="number" min="<?php echo $carrito_mio[$i]['min']; ?>" id="cantidad" style="width:65px;" class="align-middle text-center" value="<?php print $carrito_mio[$i]['cantidad'];   ?>" size="1" maxlength="4" />
																			<input type="image" name="imageField3" src="images/actualiza.png" value="" class="btn btn-sm btn-primary btn-rounded" />
																		</form>
																	</td>



																	<td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['titulo'] ?></td>
																	<td style="vertical-align: middle;">$<?php echo  number_format($carrito_mio[$i]['precio'], 0, ',', '.')    ?></td>
																	<td style="vertical-align: middle;">$<?php echo  number_format($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'], 0, ',', '.'); ?></td>
																	<td style="vertical-align: middle;">
																		<form id="form3" name="form2" method="post" action="php/cart.php">
																			<input name="id2" type="hidden" id="id2" value="<?php print $i; ?>" />
																			<button type="image" name="imageField3" class="btn-lg bg-danger text-white " style="border:0px;" data-toggle="tooltip" data-placement="top" title="Remove item"><i class="fas fa-trash-alt"></i> Borrar
																			</button>
																		</form>
																	</td>
																</tr>
															<?php } ?>
											<?php
															$total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
														}
													}
												}
											}
											?>

									</tbody>
								</table>


								<li class="list-group-item d-flex justify-content-between">
									<span style="text-align: left; color: #000000;"><strong>Total (COP)</strong></span>
									<strong style="text-align: left; color: #000000;">$<?php
																						if (isset($_SESSION['carrito'])) {
																							$total = 0;
																							for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
																								if (isset($carrito_mio[$i])) {
																									if ($carrito_mio[$i] != NULL) {
																										$total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
																									}
																								}
																							}
																						}
																						if (!isset($total)) {
																							$total = '0';
																						} else {
																							$total = $total;
																						}
																						echo number_format($total, 0, ',', '.'); ?> </strong>
								</li>



							</div>
						</div>
						<div class="d-flex">

							<?php
							if (!empty($res)) {
							?>


								<a type="button" class="checkout-btn btn  my-4 btn-lg  ml-auto"></a>


							<?php 	} elseif(isset($_SESSION['id'])) {

							?>

								<a type="button" class="btn btn-success my-4 btn-lg  ml-auto" href="datos.php">Continuar</a>
							

							<?php 	}else{ ?>


								<a type="button" class="btn btn-success my-4 btn-lg  ml-auto" href="login/index.php">Continuar</a>
								

								<?php $_SESSION['alt']="Antes de realizar una compra es necesario iniciar sesión";	}	?>

						</div>


						<?php
						if (!empty($res)) {



						?>
							<div class="col-md-6 col-xl-4">
								<h5>Detalles de la dirección</h5>
								<hr>
								<div class="card">
									<div class="card-body">

										<h6 class="card-subtitle mb-2 text-muted">
											<?php
											echo
											$res['nombre'] . "  " . $res['apellido'] . "<br>" . $res['telefono'] . "<br>" . "" . $res['departamento'] . ", " . $res['ciudad'] . ", " . $res['direccion']

											?>

										</h6>

										<a href="datos.php" class="card-link">editar</a>

									</div>
								</div>
							</div>

						<?php	} ?>





					</div>
				</div>



			</div>


		</div>

		</div>

	</section>




	<!--//checkout-->
	<!--footer -->
	<footer class="py-lg-5 py-3">
		<div class="container-fluid px-lg-5 px-3">
			<div class="row footer-top-w3layouts">
				<div class="col-lg-3 footer-grid-w3ls">
					<div class="footer-title">
						<h3>Acerca de nosotros </h3>
					</div>
					<div class="footer-text ">
						<p>ECO YUMA S.A.S. es una organización especializada en la solución de necesidades agropecuarias, ambientales y sociales.</p>
						<ul class="footer-social text-left mt-lg-4 mt-3">

							<li class="mx-2">
								<a href="https://www.facebook.com/Ecoyumasas/" target="_blank">
									<span class="fab fa-facebook-f fa-2x"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="https://www.instagram.com/ecoyumasas/" target="_blank">
									<span class="fab fa-instagram fa-2x"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="https://api.whatsapp.com/send?phone=573212149219" target="_blank">
									<span class="fab fa-whatsapp fa-2x"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="https://www.youtube.com/channel/UCTJu-enh72CIES7PQLpYd2Q" target="_blank">
									<span class="fab fa-youtube fa-2x"></span>
								</a>
							</li>

						</ul>
					</div>
				</div>
				<div class="col-lg-3 footer-grid-w3ls">
					<div class="footer-title">
						<h3>Contactanos:</h3>
					</div>
					<div class="contact-info">

						<div class="phone">

							<p> <i class="fas fa-phone fa-2x"></i>(+57) 321 214 9219</p>
							<p>
								<a href="info@ecoyuma.com.co" target="_blank"><i class="fas fa-envelope fa-2x"></i> info@ecoyuma.com.co</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 footer-grid-w3ls">
					<div class="footer-title">
						<h3>Menú Rápido</h3>
					</div>
					<ul class="links">
						<li>
							<a href="index.php">Inicio</a>
						</li>
						<li>
							<a href="conocenos.html">Conocenos</a>
						</li>
						<li>
							<a href="404.html">Categorias</a>
						</li>
						<li>
							<a href="contactos.html">Contactos</a>
						</li>
						<li>
							<a href="developers.html">Developers</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-3 footer-grid-w3ls">
					<div class="footer-title">
						<h3>Subscribete </h3>
					</div>
					<div class="footer-text">
						<p>Al suscribirse a nuestra lista de correo, siempre recibirá nuestras últimas noticias y actualizaciones</p>

						<?php
						require 'login/database.php';
						if (!empty($_POST["Email"])) {

							$email = $_POST["Email"];
							$sql = "INSERT INTO correossub(email) VALUES (?)";
							$stmt = $conn->prepare($sql);
							$stmt->execute([$email]);
						}


						?>

						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<input class="form-control" type="email" name="Email" placeholder="Ingresa tu correo electronico" required="">
							<button class="btn1">
								<i class="far fa-envelope" aria-hidden="true"></i>
							</button>
							<div class="clearfix"> </div>
						</form>
					</div>
				</div>
			</div>
			<div class="copyright-w3layouts mt-4">
				<p class="copy-right text-center ">&copy; UDI | Creative Developer

				</p>
			</div>
		</div>
	</footer>
	<!-- //footer -->
	<!--jQuery-->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- newsletter modal -->
	<!--search jQuery-->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/classie-search.js"></script>
	<script src="js/demo1-search.js"></script>
	<!--//search jQuery-->
	<!-- cart-js -->
	<script src="js/minicart.js"></script>

	<!-- //cart-js -->



	<script src="js/bootstrap.js"></script>
	<!-- js file -->

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>


	<script>
		$(document).ready(function() {
			$(".button-log a").click(function() {
				$(".overlay-login").fadeToggle(200);
				$(this).toggleClass('btn-open').toggleClass('btn-close');
			});
		});
		$('.overlay-close1').on('click', function() {
			$(".overlay-login").fadeToggle(200);
			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
			open = false;
		});
	</script>





	<script src="https://sdk.mercadopago.com/js/v2"></script>


	<script>
		// Agrega credenciales de SDK
		const mp = new MercadoPago("TEST-a15c8275-9b0d-438d-9eb5-c980eee047d9", {
			locale: "es-CO",
		});

		// Inicializa el checkout
		mp.checkout({
			preference: {
				id: "<?php echo $preference->id; ?>",
			},
			render: {
				container: ".checkout-btn", // Indica el nombre de la clase donde se mostrará el botón de pago
				label: "Proceder al Pago", // Cambia el texto del botón de pago (opcional)
			},
			theme: {
				headerColor: "#c0392b"
			}

		});
	</script>

</body>

</html>