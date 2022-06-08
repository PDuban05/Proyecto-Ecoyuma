<?php
//inicio de variable de session
session_start();
include("php/conexion.php"); //incluye conecion a base de datos
include("login/database.php");

//validar sesion de usuario activa
if (isset($_SESSION['id'])) {

    $id = $_SESSION['id'];

    $direccion = "SELECT * FROM usuarios inner join direccion where direccion.id_usuario=$id and usuarios.id = $id ";
    $records = mysqli_query($conexion, $direccion);
    $res = mysqli_fetch_assoc($records);
}
//captura de datos de retorno por post

if (!empty($_POST)) {
    $id = $_SESSION['id'];

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $direccion = $_POST["direccion"];
    $ciudad = $_POST["ciudad"];
    $departamento = $_POST["departamento"];
    $referencia = $_POST["referencia"];

// actualizacion de datos de un usuario ya registrado
    $sql = "UPDATE usuarios SET nombre='$nombre',apellido='$apellido',telefono='$telefono',email='$email' where id ='$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql = "SELECT * FROM direccion WHERE id_usuario='$id'";
    $records = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_assoc($records);
    
    //valiacion de registros existentes

    if(!empty($row) ){

    $sql = "UPDATE direccion SET direccion='$direccion',ciudad='$ciudad',departamento='$departamento',referencia='$referencia' where id_usuario ='$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    }else{

        $datos = "INSERT INTO direccion(id_usuario,departamento,ciudad,direccion,referencia)values('$id','$departamento','$ciudad','$direccion','$referencia')";
        $records = mysqli_query($conexion, $datos);

    }

    header("Location:checkout.php");

    
}




?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Completar pago</title>
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
                            include("php/nav_cart.php ");
                            include("php/modal_cart.php");
                            ?>

                        </li>


                    </ul>
                    <!---->



<!-- modal cliente  -->
                    <div class="overlay-login text-left">
                        <button type="button" class="overlay-close1">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>


                        <div class="wrap">
                            <div align="center" class="login p-5 bg-dark mx-auto mw-100">

                                <?php
                                if (!empty($_SESSION['name'])) {  ?>


                                    <img src="login/images/user2.jpg" class="img-responsive profile-userpic " alt="">
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



                 <!-- navbar -->                 
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
    <section class="pc-container">
        <div class="pcoded-content">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Completa tus datos de pedido</h3>
                        </div>
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-6">
                                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <div class="form-group">
                                            <label class="form-label" for="">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp" value="<?php if (!empty($res['nombre'])) {
                                                                                                                                            echo $res['nombre'];
                                                                                                                                        }  ?>" placeholder="Digite su nombre" required>

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Apellido</label>
                                            <input type="text" class="form-control" name="apellido" value="<?php if (!empty($res['apellido'])) {
                                                                                                                                            echo $res['apellido'];
                                                                                                                                        }  ?>" placeholder="Digite su apellido" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Telefono</label>
                                            <input type="number" class="form-control" name="telefono" value="<?php if (!empty($res['telefono'])) {
                                                                                                                                            echo $res['telefono'];
                                                                                                                                        }  ?>" placeholder="Digite su telefono" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="">Email</label>
                                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="<?php if (!empty($res['email'])) {
                                                                                                                                            echo $res['email'];
                                                                                                                                        }  ?>" placeholder="Digite su Email" required>

                                        </div>






                                        <div class="card-body">

                                            <button type="submit" class="btn btn-success"><i class="mr-2" data-feather="check-circle"></i>Continuar</button>

                                        </div>
                                </div>



                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="form-label">Direccion</label>
                                        <input type="text" class="form-control" name="direccion" placeholder="Digite su dirección" value="<?php if (!empty($res['direccion'])) {
                                                                                                                                            echo $res['direccion'];
                                                                                                                                        }  ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Departamento</label>
                                        <input type="text" class="form-control" name="departamento" placeholder="Digite el departamento" value="<?php if (!empty($res['departamento'])) {
                                                                                                                                            echo $res['departamento'];
                                                                                                                                        }  ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Ciudad</label>
                                        <input type="text" class="form-control" name="ciudad" value ="<?php if (!empty($res['ciudad'])) {
                                                                                                                                            echo $res['ciudad'];
                                                                                                                                        }  ?>"placeholder="Digite la ciudad" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Referencia</label>
                                        <input type="text" class="form-control" name="referencia"  value ="<?php if (!empty($res['referencia'])) {
                                                                                                                                            echo $res['referencia'];
                                                                                                                                        }  ?>"placeholder="Escriba una referencia de la residencia" required>
                                    </div>




                                    </form>
                                </div>



                            </div>



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





</body>

</html>