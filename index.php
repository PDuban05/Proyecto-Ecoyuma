<?php
session_start();

//incluye conexion base de datos
include("php/conexion.php");

//Valida si hay una sesion de usuario activa
if (isset($_SESSION['id'])) {

    $id = $_SESSION['id'];

    $user = "SELECT * FROM usuarios where id= $id";
    $records = mysqli_query($conexion, $user);
    $res = mysqli_fetch_assoc($records);
    //asignacion de informacion a variables de sesion
    $_SESSION['name'] = $res['nombre'];
    $_SESSION['apellido'] = $res['apellido'];
    $_SESSION['email'] = $res['email'];
    $_SESSION['rol'] = $res['rol'];
}

//Se realiza una consulta de los productos en oferta disponbles

$ofertas = "SELECT * FROM ofertas inner join inventario on ofertas.id_inventario = inventario.id";




?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>EcoYuma</title>
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



<!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/images/logo.webp">

<!-- implementacion de librerias -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
    <link href="css/style6.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/shop.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
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


<!-- modal de usuario -->

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


<!-- nav bar -->

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
<!-- nav bar end -->

        </header>

    </div>


    <div class="row">


        <!-- //header -->
        <!-- banner -->
        <div class="banner">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>





                <div class="carousel-inner" role="listbox">


                    <div class="carousel-item active">
                        <div class="carousel-caption text-center">
                            <h3>Plántulas de Cacao</h3>
                        </div>
                    </div>



                    <div class="carousel-item item2">
                        <div class="carousel-caption text-center">

                            <h3>Semillas</h3>

                        </div>
                    </div>
                    <div class="carousel-item item3">
                        <div class="carousel-caption text-center">
                            <h3>Plantas Ornamentales</h3>


                        </div>
                    </div>
                    <div class="carousel-item item4">
                        <div class="carousel-caption text-center">


                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!--//banner -->
        </div>
    </div>
    
    <section class="banner-bottom-wthreelayouts py-lg-5 py-3">
        <div class="container-fluid">
            <div class="inner-sec-shop px-lg-4 px-3">
                <h3 class="tittle-w3layouts my-lg-4 my-4">Novedades </h3>
                <div class="row">




                    <?php
                    //ejecucion y consulta
                    $resultado = mysqli_query($conexion, $ofertas);
                    while ($row = mysqli_fetch_assoc($resultado)) { ?>

                        <!-- products -->
                        <div class="col-md-3 product-men women_two">
                            <div class="product-googles-info googles">
                                <div class="men-pro-item">
                                    <div class="men-thumb-item">
                                        <img src="    <?php echo $row["img_dir1"]; ?>   " class="img-fluid" alt="">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <form action="detalles.php" method="GET">

                                                    <input type="hidden" name="id" value="<?php echo $row["id_inventario"]; ?>">
                                                    <button class="link-product-add-cart" type="submit">Comprar</button>
                                                </form>
                                            </div>
                                        </div>
                                        <span class="product-new-top">-<?php echo $row["descuento"]; ?>% </span>
                                    </div>
                                    <div class="item-info-product">
                                        <div class="info-product-price">
                                            <div class="grid_meta">
                                                <div class="product_price">
                                                    <h4>
                                                        <a> <?php echo $row["nombre"]; ?> </a>
                                                    </h4>
                                                    <div class="grid-price mt-2">
                                                        <span class="money ">$<?php $descuento = ($row["descuento"]  *  $row["precio_ahora"]) / 100;
                                                                                echo $numeroFormateado = number_format($row["precio_ahora"] - $descuento, 0, ',', '.'); ?> </span>

                                                        <del>$<?php echo  $numeroFormateado = number_format($row["precio_ahora"], 0, ',', '.'); ?> </del>

                                                    </div>
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
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php  } ?>

                    <!-- productos end -->







                </div>





<!-- catalogo -->
                <script>
                    function plantas_cacao() {
                        document.formulario.submit()
                    }
                </script>

                <script>
                    function semillas() {
                        document.formulario2.submit()
                    }
                </script>

                <script>
                    function ornamentales() {
                        document.formulario3.submit()
                    }
                </script>

                <form action="catalogo.php" method="GET" name="formulario">

                    <input type="hidden" name="categoria" value="PLÁNTULAS DE CACAO">
                </form>

                <form action="catalogo.php" method="GET" name="formulario2">
                    <input type="hidden" name="categoria" value="SEMILLAS">
                </form>

                <form action="catalogo.php" method="GET" name="formulario3">
                    <input type="hidden" name="categoria" value="PLÁNTULAS ORNAMENTALES">
                </form>




                <section id="clases">

                    <div class="row galsses-grids pt-lg-5 pt-3">

                        <h3 class="tittle-w3layouts my-lg-4 my-4">Categorias</h3>

                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-header">
                                    <a href="javascript:plantas_cacao()">
                                        <h5> Plantulas de cacao </h5>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                            <a href="javascript:plantas_cacao()"><img class="img-fluid d-block h-100 w-100" src="images/cate_cacao.jpg" alt="First slide"></a>
                                            </div>
                                            <div class="carousel-item">
                                            <a href="javascript:plantas_cacao()"> <img class="img-fluid d-block h-100 w-100" src="images/cate_cacao2.jpg" alt="Second slide"></a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-header">
                                    <a href="javascript:semillas()">
                                        <h5>Semillas</h5>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                            <a href="javascript:semillas()"> <img class="img-fluid d-block h-100 w-100" src="images/cate_semillas.jpg" alt="First slide"></a>
                                            </div>
                                            <div class="carousel-item">
                                            <a href="javascript:semillas()"> <img class="img-fluid d-block h-100 w-100" src="images/cate_semillas2.jpg" alt="Second slide"></a>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-header">
                                    <a href="javascript:ornamentales()">
                                        <h5>Plántulas Ornamentales</h5>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                            <a href="javascript:ornamentales()"> <img class="img-fluid d-block h-100 w-100" src="images/cate_plan.jpg" alt="First slide"> </a>

                                            </div>
                                            <div class="carousel-item">
                                            <a href="javascript:ornamentales()"><img class="img-fluid d-block h-100 w-100" src="images/cate_plan2.jpg" alt="Second slide"> </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                <!-- catalogo end -->





                <!-- /clients-sec -->
                <div class="testimonials p-lg-5 p-3 mt-4">
                    <div class="row last-section">
                        <div class="col-lg-3 footer-top-w3layouts-grid-sec">
                            <div class="mail-grid-icon text-center">
                                <i class="fas fa-gift"></i>
                            </div>
                            <div class="mail-grid-text-info">
                                <h3>INSTITUTO COLOMBIANO AGROPECUARIO</h3>
                                <p>Se cumplen las normas exigidas por el ICA para comercializar material vegetal libre de plagas.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 footer-top-w3layouts-grid-sec">
                            <div class="mail-grid-icon text-center">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <div class="mail-grid-text-info">
                                <h3>AMIGOS DEL MEDIO AMBIENTE</h3>
                                <p>En la producción de material vegetal se emplean productos orgánicos y de síntesis químicas.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 footer-top-w3layouts-grid-sec">
                            <div class="mail-grid-icon text-center">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="mail-grid-text-info">
                                <h3>ACOMPAÑAMIENTO TÉCNICO</h3>
                                <p>Se cuenta con un grupo de profesionales calificados para el asesoramiento técnico post venta.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 footer-top-w3layouts-grid-sec">
                            <div class="mail-grid-icon text-center">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="mail-grid-text-info">
                                <h3>MANUAL DE RECOMENDACIONES</h3>
                                <p>Se entrega un instructivo técnico con cuidados del manejo de los productos y servicios adquiridos.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //clients-sec -->
            </div>
        </div>
    </section>
    <!-- about -->
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
                        //registro de correos en la base de datos
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
    <!-- Modal -->
    <!-- Modal -->

    <script>
        $(document).ready(function() {
            $("#myModal").modal();
        });
    </script>
    <!-- // modal -->

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




    <!-- dropdown nav -->

    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            /*
            						var defaults = {
            							  containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear' 
            						 };
            						*/

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!--// end-smoth-scrolling -->

    <script src="js/bootstrap.js"></script>
    <!-- js file -->
</body>

</html>