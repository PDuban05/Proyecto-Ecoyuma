<?php
session_start();
require '../login/database.php';


if (!empty($_POST['nombre']) ) {

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $categoria = $_POST['categoria'];
    $descripcion1 = $_POST['descripcion1'];
    $descripcion2 = $_POST['descripcion2'];

    if (!empty($_SESSION['ficha'])) {
        $ficha = $_SESSION['ficha'];
    } else {
        $ficha = "";
    }

    if (!empty($_SESSION['imagenes'])) {
        $imagen = $_SESSION['imagenes'];
    } else {
        $imagen = "";
    }

    if (!empty($_SESSION['imagenes2'])) {
        $imagen2 = $_SESSION['imagenes2'];
    } else {
        $imagen2 = "";
    }


    if (!empty($_SESSION['imagenes3'])) {
        $imagen3 = $_SESSION['imagenes3'];
    } else {
        $imagen3 = "";
    }


  

    $sql = "INSERT INTO inventario(nombre,precio_ahora,min_uni,categoria,descripcion1,descripcion2,ficha_tecnica,img_dir1,img_dir2,img_dir3) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);

    $stmt->execute([$nombre, $precio, $cantidad, $categoria, $descripcion1, $descripcion2,$ficha,$imagen,$imagen2,$imagen3]);

    $_SESSION['insert']="se ha registrado correctamente el producto";

    header("Location:productos.php");


}

unset(
    $_SESSION['imagenes'],
    $_SESSION['imagenes2'],
    $_SESSION['imagenes3'],
    $_SESSION['ficha']

);






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Administrar sitio</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />



    <!-- Favicon icon -->
    <link rel="icon" type="image/x-icon" href="../images/logo.webp">

    <!-- font css -->

    <link rel="stylesheet" href="assets/fonts/feather.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="assets/fonts/material.css">


    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css" id="main-style-link">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link href="upload/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous">
    <link href="upload/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="upload/js/plugins/piexif.js" type="text/javascript"></script>
    <script src="upload/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="upload/js/fileinput.js" type="text/javascript"></script>
    <script src="upload/js/locales/fr.js" type="text/javascript"></script>
    <script src="upload/js/locales/es.js" type="text/javascript"></script>
    <script src="upload/themes/gly/theme.js" type="text/javascript"></script>
    <script src="upload/themes/fas/theme.js" type="text/javascript"></script>
    <script src="upload/themes/explorer-fas/theme.js" type="text/javascript"></script>
    <script>
        $.fn.fileinput.defaults.theme = 'fas';
    </script>







</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Mobile header ] start -->
    <div class="pc-mob-header pc-header">
        <div class="pcm-logo">
        <img src="./images/logo.webp" alt="" class="logo logo-lg">
        </div>
        <div class="pcm-toolbar">
            <a href="#!" class="pc-head-link" id="mobile-collapse">
                <div class="hamburger hamburger--arrowturn">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </a>
            <a href="#!" class="pc-head-link" id="headerdrp-collapse">
                <i data-feather="align-right"></i>
            </a>
            <a href="#!" class="pc-head-link" id="header-collapse">
                <i data-feather="more-vertical"></i>
            </a>
        </div>
    </div>
    <!-- [ Mobile header ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pc-sidebar ">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="index.html" class="b-brand">

                    <img src="assets/images/logo.png" alt="" class="logo logo-lg">
                    <img src="assets/images/logo.png" alt="" class="logo logo-sm">
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <li class="pc-item pc-caption">
                        <label>Menú</label>
                    </li>
                    <li class="pc-item">
                        <a href="index.php" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">home</i></span><span class="pc-mtext">Dashboard</span></a>
                    </li>
                    <li class="pc-item pc-caption">
                        <label>Herramientas</label>

                    </li>

                    <li class="pc-item">
                        <a href="usuarios.php" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone"></i></span><span class="pc-mtext">Administrar Usuarios</span></a>
                    </li>

                    <li class="pc-item">
                        <a href="productos.php" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone"></i></span><span class="pc-mtext">Administrar Productos</span></a>
                    </li>

                    <li class="pc-item">
                        <a href="single.php" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone"></i></span><span class="pc-mtext">Agregar productos</span></a>
                    </li>




                </ul>


            </div>


        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="pc-header ">
        <div class="header-wrapper">

            <div class="ml-auto">
                <ul class="list-unstyled">

                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
                            <span>
                                <span class="user-name">Pedro Moreno</span>
                                <span class="user-desc">Administrator</span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pc-h-dropdown">


                            <a href="auth-signin.html" class="dropdown-item">
                                <i class="material-icons-two-tone">chrome_reader_mode</i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </header>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <section class="pc-container">
        <div class="pcoded-content">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Agregar Producto Nuevo</h3>
                        </div>
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-6">
                                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <div class="form-group">
                                            <label class="form-label" for="">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp" placeholder="Digite el nombre del producto" required>

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Precio</label>
                                            <input type="number" class="form-control" name="precio" placeholder="Digite el precio base del producto" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Minima unidad</label>
                                            <input type="number" class="form-control" name="cantidad" placeholder="Digite la minima cantidad que se permitira comprar" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="inputState">Seleccione la categoria del producto</label>
                                            <select id="inputState" name="categoria" class="form-control">
                                                <option selected>PLÁNTULAS DE CACAO</option>
                                                <option>SEMILLAS</option>
                                                <option>PLÁNTULAS ORNAMENTALES</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Ficha técnica</label>

                                            <small class="form-text text-muted">Solo se permite arhivos .PDF</small>
                                        </div>


                                        <div class="input-group mb-3">
                                            <div class="form-file">

                                                <label class="form-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">

                                                    <input id="ficha" name="ficha[]" type="file" class="file" data-browse-on-zone-click="true" >


                                                </label>
                                            </div>

                                        </div>




                                        <div class="card-body">

                                            <button type="submit" class="btn btn-success"><i class="mr-2" data-feather="check-circle"></i>Guardar Producto</button>

                                        </div>
                                </div>



                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="form-label">Descripción principal</label>
                                        <textarea class="form-control" name="descripcion1" rows="5" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Descripción Secundaria</label>
                                        <textarea class="form-control" name="descripcion2" rows="5" required></textarea>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label">Imagenes</label>

                                        <small class="form-text text-muted">Solo se permite arhivos .jpg,png</small>
                                    </div>


                                    <div class="input-group mb-3">
                                        <div class="file-loading">
                                            <input id="archivos" name="imagenes[]" type="file" data-browse-on-zone-click="true" multiple="true" >
                                        </div>

                                    </div>




                                    </form>
                                </div>

                                <?php
                                $directory = "imagenes_/";
                                $images = glob($directory . "*.*");
                                ?>

                                <script>
                                    $("#archivos").fileinput({
                                        theme: 'fas',
                                        language: 'es',
                                        uploadUrl: "upload.php",
                                        uploadAsync: false,
                                        minFileCount: 1,
                                        maxFileCount: 3,
                                        allowedFileExtensions: ['jpg', 'png', 'jpeg'],
                                        showUpload: false,
                                        showRemove: false,


                                    });
                                    $("#ficha").fileinput({
                                        theme: 'fas',
                                        language: 'es',
                                        uploadUrl: "upload2.php",
                                        uploadAsync: false,
                                        minFileCount: 1,
                                        maxFileCount: 1,
                                        allowedFileExtensions: ['pdf'],
                                        showUpload: false,
                                        showRemove: false,


                                    });
                                </script>



                            </div>

                           

                        </div>
                    </div>
                </div>




            </div>

        </div>
    </section>

    <!-- Required Js -->




    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/feather.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>


















</body>

</html>