<?php
session_start();
include("php/conexion.php");

if(!isset( $_SESSION['id'])){
    header("Location:index.php");
}

$id = $_SESSION['id'];


$pedidos = "SELECT * FROM pedidos WHERE id_cliente ='$id' order by fecha desc ";




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




    <link rel="icon" type="image/x-icon" href="/images/logo.webp">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
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
                                    </div>

                                    <button type="submit" class="btn btn-primary submit mb-4"><a href="login/logout.php">Cerrar Sesión</a></button>






                                <?php
                                } elseif (!empty($_SESSION['name']) && $_SESSION['rol'] == "admin") { ?>

                                    <img src="images/logo.webp" class="img-responsive profile-userpic " alt="">
                                    <br>

                                    <div class="form-group">
                                        <label class="mb-2"> <?php echo $_SESSION['name'] . " " . $_SESSION['apellido'] ?> </label>
                                        <small id="emailHelp" class="form-text text-muted"><?php echo $_SESSION['email'] ?></small>
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


    <div class="row">


        <!-- //header -->
        <!-- banner -->

    </div>
    <!--//banner-sec-->
    <section class="banner-bottom-wthreelayouts py-lg-5 py-3">
        <div class="container-fluid">
            <div class="inner-sec-shop px-lg-4 px-3">
                <h3 class="tittle-w3layouts my-lg-4 my-4">Mis Compras </h3>
                <div class="row">




                    <?php
                  
                    $resultado = mysqli_query($conexion, $pedidos);
                    $c=1;
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $i = 1;
                        
                        $total = 0;

                        $id_pedido =  $row["id_pedido"];


                        $detalle =  "SELECT * FROM detalles WHERE id_pedido ='$id_pedido' ";
                        $resultado2 = mysqli_query($conexion, $detalle);

                        $fecha = substr($row["fecha"], 0, 10);
                        $numeroDia = date('d', strtotime($fecha));
                        $dia = date('l', strtotime($fecha));
                        $mes = date('F', strtotime($fecha));
                        $anio = date('Y', strtotime($fecha));
                        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
                        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
                        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
                        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
                        $fecha= $nombredia . " " . $numeroDia . " de " . $nombreMes . " de " . $anio;



                    ?>




                        <div class="col-sm-12">
                            <h5 class="mb-3" style="margin-top: 50px;"><?php echo $fecha; ?></h5>
                            <hr>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#collapse<?php echo $c; ?>" aria-expanded="true" aria-controls="collapseOne"> <?php echo $row["estado"]; ?></a></h5>
                                    </div>
                                    <div id="collapse<?php echo $c; $c++; ?>" class=" card-body collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">

                                        

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Imagen</th>
                                                    <th scope="col">Articulo</th>
                                                    <th scope="col">Cantidad</th>
                                                    <th scope="col">Precio</th>
                                                    <th scope="col">Total</th>

                                                </tr>
                                            </thead>
                                            <tbody>





                                                <div class="container_card">

                                                    <?php
                                                    while ($row2 = mysqli_fetch_assoc($resultado2)) {
                                                        $id_pro = $row2["id_producto"];
                                                        $name_pro =  "SELECT * FROM inventario WHERE id ='$id_pro' ";
                                                        $resultado3 = mysqli_query($conexion, $name_pro);
                                                        $row3 = mysqli_fetch_assoc($resultado3);






                                                    ?>

                                                        <tr>
                                                            <th scope="row" style="vertical-align: middle;"><?php echo $i;
                                                                                                            $i++ ?></th>

                                                            <td>
                                                                <img src="<?php echo $row3['img_dir1'] ?>" alt="" width="100px">


                                                            </td>
                                                            <td style="vertical-align: middle;">

                                                                <input name="id" type="hidden" id="id" value="<?php  ?>" class="align-middle" />

                                                                <?php echo $row3['nombre'] ?>

                                                            </td>



                                                            <td style="vertical-align: middle;"><input name="cantidad" type="number" id="cantidad" style="width:65px;" class="align-middle text-center" value="<?php echo $row2['cantidad']; ?>" size="1" maxlength="4" disabled /></td>
                                                            <td style="vertical-align: middle;">$<?php echo  number_format($row2['precio'], 0, ',', '.')    ?></td>
                                                            <td style="vertical-align: middle;">$<?php echo  number_format($row2['precio'] * $row2['cantidad'], 0, ',', '.'); ?></td>
                                                            <td style="vertical-align: middle;">

                                                            </td>
                                                        </tr>

                                                    <?php
                                                        $total = $total + ($row2['precio'] * $row2['cantidad']);
                                                    }

                                                    ?>

                                            </tbody>
                                        </table>


                                        <li class="list-group-item d-flex justify-content-between">
                                            <span style="text-align: left; color: #000000;"><strong>Total (COP)</strong></span>
                                            <strong style="text-align: left; color: #000000;">$<?php

                                                                                                echo     number_format($total, 0, ',', '.');  ?> </strong>
                                        </li>





                                    </div>
                                </div>

                            </div>
                        </div>

                    <?php    } ?>


                </div>

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