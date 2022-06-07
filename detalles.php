<?php session_start();
include("php/conexion.php");

$id_producto = $_GET['id'];
$consulta = "SELECT * FROM ofertas where id_inventario ='$id_producto'";

$consulta2 = "SELECT * from inventario where id ='$id_producto' ";

$resultado = mysqli_query($conexion, $consulta);
$resultado2 = mysqli_query($conexion, $consulta2);

$row = mysqli_fetch_assoc($resultado);
$row2 = mysqli_fetch_assoc($resultado2);

$consulta3 = "SELECT * FROM inventario order by rand() limit 6";
$resultado3 = mysqli_query($conexion, $consulta3);


?>



<!DOCTYPE html>
<html lang="es">

<head>
	<title><?php
			if (!empty($row["nombre"])) {

				echo $row["nombre"];
				$id = $row["id_inventario"];
			} else {

				echo $row2["nombre"];
				$id = $row2["id"];
			}

			?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Goggles a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />






	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			if (window.scrollY == 0) window.scrollTo(0, 1);
		};
	</script>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>



	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
	<link href="css/style6.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/shop.css" type="text/css" />
	<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">

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
                            include("php/nav_cart.php ");
                            include("php/modal_cart.php");
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
                                if (!empty($_SESSION['name']) && $_SESSION['rol'] == "usuario") {  ?>


                                    <img src="login/images/user2.jpg" class="img-responsive profile-userpic " alt="">
                                    <br>

                                    <div class="form-group">
                                        <label class="mb-2"> <?php echo $_SESSION['name'] . " " . $_SESSION['apellido'] ?> </label>

                                        <small id="emailHelp" class="form-text text-muted"><?php echo $_SESSION['email'] ?></small>

                                        <h6 id="emailHelp" class="form-text text-muted"> <a href="registropedidos.php">Mis Compras</a> </h6>
                                    </div>

                                    <button type="submit" class="btn btn-primary submit mb-4"><a href="login/logout.php">Cerrar Sesión</a></button>






                                <?php
                                } elseif (!empty($_SESSION['name']) && $_SESSION['rol'] == "admin") { ?>

                                    <img src="images/logo.webp" class="img-responsive profile-userpic " alt="">
                                    <br>

                                    <div class="form-group">
                                        <label class="mb-2"> <?php echo $_SESSION['name'] . " " . $_SESSION['apellido'] ?> </label>
                                        <small id="emailHelp" class="form-text text-muted"><?php echo $_SESSION['email'] ?></small> <br>
                                        <h6 id="emailHelp" class="form-text text-muted"> <a href="registropedidos.php">Mis Compras</a> </h6>

                                    </div>

                                    <button type="submit" class="btn btn-primary submit mb-4"><a href="admin/index.php">Administrar sitio</a></button>
                                    <button type="submit" class="btn btn-primary submit mb-4"><a href="login/logout.php">Cerrar Sesión</a></button>





                                <?php } else { ?>


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
	<!--//banner -->
	<!--/shop-->







	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<div class="inner-sec-shop pt-lg-4 pt-3">
				<div class="row">
					<div class="col-lg-4 single-right-left ">
						<div class="grid images_3_of_2">
							<div class="flexslider1">

								<ul class="slides">


									<?php if (!empty($row["img_dir1"])) { ?>
										<?php if (!empty($row["img_dir1"])) { ?>

											<li data-thumb="<?php echo $img = $row["img_dir1"]; ?>">
												<div class="thumb-image"> <img src="<?php echo $row["img_dir1"]; ?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
											</li> <?php } ?>
										<?php if (!empty($row["img_dir2"])) { ?>

											<li data-thumb="<?php echo $row["img_dir2"]; ?>">
												<div class="thumb-image"> <img src="<?php echo $row["img_dir2"]; ?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
											</li> <?php } ?>
										<?php if (!empty($row["img_dir3"])) { ?>
											<li data-thumb="<?php echo $row["img_dir3"]; ?>">
												<div class="thumb-image"> <img src="<?php echo $row["img_dir3"]; ?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
											</li> <?php } ?>


									<?php } else { ?>
										<?php if (!empty($row2["img_dir1"])) { ?>
										<li data-thumb="<?php echo $img = $row2["img_dir1"]; ?>">
											<div class="thumb-image"> <img src="<?php echo $row2["img_dir1"]; ?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
										</li><?php } ?>
										<?php if (!empty($row2["img_dir2"])) { ?>

										<li data-thumb="<?php echo $row2["img_dir2"]; ?>">
											<div class="thumb-image"> <img src="<?php echo $row2["img_dir2"]; ?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
										</li> <?php } ?>

										<?php if (!empty($row2["img_dir3"])) { ?>	
										<li data-thumb="<?php echo $row2["img_dir3"]; ?>">
											<div class="thumb-image"> <img src="<?php echo $row2["img_dir3"]; ?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
										</li> <?php } ?>


									<?php } ?>



								</ul>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-8 single-right-left simpleCart_shelfItem">
						<h3><?php if (!empty($row["nombre"])) {

								echo $nombre = $row["nombre"];
							} else {

								echo $nombre = $row2["nombre"];
							}
							?></h3>
						<p>

							<?php
							if (!empty($row["descuento"])) {

								$des = $row["descuento"];
								$precio2 = $row2["precio_ahora"];

								$descuento = ($des * $precio2) / 100;
								$total = $precio2 - $descuento;



							?>
								<span class="item_price">$<?php echo  number_format($precio = $total, 0, ',', '.') ?></span>
								<del>$<?php echo number_format($row2["precio_ahora"], 0, ',', '.'); ?> </del>

							<?php
							} else {	?>

								<span class="item_price">$<?php echo  number_format($precio = $row2["precio_ahora"], 0, ',', '.'); ?></span>
							<?php	} ?>


						</p>
						<div class="rating1">
							<ul class="stars">
								<li><a href=""><i class="fa fa-star" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							</ul>

						</div>

						<div class="description">
							<p>Impuestos incluidos Entrega de 8 a 10 días hábiles</p>
							<hr>
							<?php if (!empty($row["descripcion1"])) {	?>

								<h5><?php echo $row["descripcion1"]; ?></h5>

							<?php	} else { ?>

								<h5><?php echo $row2["descripcion1"]; ?></h5>


							<?php	}	?>




						</div>
						<hr>
						<div class="color-quality">
							<div class="color-quality-right">
								<form action="php/cart.php" id="formulario" name="formulario" method="post">
									<h5>cantidad:</h5>

									<?php if (!empty($row["min_uni"])) {	?>

										<input name="cantidad" type="number" min="<?php echo $min = $row["min_uni"]; ?>" value="<?php echo  $row["min_uni"]; ?>"><span>&nbsp;Unidades</span>
										<p>La cantidad minima en el pedido de compra para el producto es de <?php echo $row["min_uni"]; ?> unidades</p>



									<?php	} else { ?>

										<input name="cantidad" type="number" min="<?php echo $min = $row2["min_uni"]; ?>" value="<?php echo  $row2["min_uni"]; ?>"><span>&nbsp;Unidades</span>
										<p>La cantidad minima en el pedido de compra para el producto es de <?php echo $row2["min_uni"]; ?> unidades</p>


									<?php	}	?>


							</div>
						</div>

						<div class="occasion-cart">
							<div class="googles single-item singlepage">


								<input type="hidden" name="titulo" value="<?php echo $nombre; ?>">
								<input type="hidden" name="ref" value="<?php echo $id; ?>">
								<input type="hidden" name="precio" value="<?php echo $precio; ?>">
								<input type="hidden" name="img" value="<?php echo $img; ?>">
								<input type="hidden" name="min" value="<?php echo $min; ?>">





								<button type="submit" class="googles-cart pgoogles-cart">
									Añadir al carro
								</button>



								</form>


							</div>
						</div>


					</div>
					<div class="clearfix"> </div>





					<!--/tabs-->
					<div class="responsive_tabs">
						<div id="horizontalTab">
							<ul class="resp-tabs-list">
								<li>Description</li>


							</ul>
							<div class="resp-tabs-container">
								<!--/tab_one-->
								<div class="tab1">

									<?php if (!empty($row["descripcion2"])) { ?>


										<div class="single_page">

											<h6>Referencia</h6>
											<p><?php echo $row["descripcion2"]; ?></p>
											<?php
											if (!empty($row["ficha_tecnica"])) {

											?>

												<a href="<?php echo $row["ficha_tecnica"]; ?>" target="_blank"><i class="fas fa-file-pdf"></i>&nbsp;Ficha Técnica</a>

											<?php
											}

											?>



										</div>




									<?php	} else { ?>


										<div class="single_page">

											<h6>Referencia</h6>
											<p><?php echo $row2["descripcion2"]; ?></p>
											<?php
											if (!empty($row2["ficha_tecnica"])) {

											?>

												<a href="<?php echo $row2["ficha_tecnica"]; ?>" target="_blank"><i class="fas fa-file-pdf"></i>&nbsp;Ficha Técnica</a>

											<?php
											}

											?>



										</div>


									<?php	} ?>





								</div>
								<!--//tab_one-->


							</div>
						</div>
					</div>
					<!--//tabs-->

				</div>
			</div>
		</div>
		<div class="container-fluid">
			<!--/slide-->
			<div class="slider-img mid-sec mt-lg-5 mt-2 px-lg-5 px-3">
				<!--//banner-sec-->
				<h3 class="tittle-w3layouts text-left my-lg-4 my-3">Podria interesarte</h3>


				<div class="mid-slider">
					<div class="owl-carousel owl-theme row">
						<?php while ($row3 = mysqli_fetch_assoc($resultado3)) {	?>


							<div class="item">
								<div class="gd-box-info text-center">
									<div class="product-men women_two bot-gd">
										<div class="product-googles-info slide-img googles">
											<div class="men-pro-item">
												<div class="men-thumb-item">
													<img src="<?php echo $row3["img_dir1"]; ?>" class="img-fluid" alt="">
													<div class="men-cart-pro">
														<div class="inner-men-cart-pro">

															<form action="detalles.php" method="GET">

																<input type="number" name="id" value="<?php echo $row3["id"]; ?>" class="oculto">
																<button class="link-product-add-cart" type="submit">Ver</button>
															</form>


														</div>
													</div>

												</div>
												<div class="item-info-product">

													<div class="info-product-price">
														<div class="grid_meta">
															<div class="product_price">
																<h4>
																	<a><?php echo $row3["nombre"]; ?></a>
																</h4>

															</div>
															<ul class="stars">
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star-half-o" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star-o" aria-hidden="true"></i>
																	</a>
																</li>
															</ul>
														</div>
														<div class="googles single-item hvr-outline-out">


														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						<?php }	?>





					</div>
				</div>





			</div>
			<!--//slider-->
		</div>
	</section>
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
	<script>
		googles.render();

		googles.cart.on('googles_checkout', function(evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
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
	<!-- carousel -->
	<!-- price range (top products) -->
	<script src="js/jquery-ui.js"></script>
	<script>
		//<![CDATA[ 
		$(window).load(function() {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function(event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

		}); //]]>
	</script>
	<!-- //price range (top products) -->

	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
			$('.owl-carousel').owlCarousel({
				loop: true,
				margin: 10,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						nav: true
					},
					600: {
						items: 2,
						nav: false
					},
					900: {
						items: 3,
						nav: false
					},
					1000: {
						items: 4,
						nav: true,
						loop: false,
						margin: 20
					}
				}
			})
		})
	</script>

	<!-- //end-smooth-scrolling -->

	<!-- single -->
	<script src="js/imagezoom.js"></script>
	<!-- single -->
	<!-- script for responsive tabs -->
	<script src="js/easy-responsive-tabs.js"></script>
	<script>
		$(document).ready(function() {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function(event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
			$('#verticalTab').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true
			});
		});
	</script>
	<!-- FlexSlider -->
	<script src="js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function() {
			$('.flexslider1').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->

	<!-- dropdown nav -->

	<!--// end-smoth-scrolling -->


	<script src="js/bootstrap.js"></script>
	<!-- js file -->

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>

</html>