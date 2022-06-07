<?php
session_start();
require '../login/database.php';
include_once "../php/conexion.php";


$id = $_GET['idpro'];
$product = "SELECT * FROM inventario WHERE id = $id";
$resultado = mysqli_query($conexion, $product);
$row = mysqli_fetch_assoc($resultado);

$ofert = "SELECT * FROM ofertas WHERE id_inventario = $id";
$resultado2 = mysqli_query($conexion, $ofert);
$row2 = mysqli_fetch_assoc($resultado2);





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
    <link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">

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
            <img src="assets/images/logo.png" alt="" class="logo logo-lg">
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
                            <h3>Editar Producto</h3>
                        </div>
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-6">
                                    <form method="POST" action="update.php">
                                        <div class="form-group">
                                            <label class="form-label" for="">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp" placeholder="Digite el nombre del producto" value="<?php echo $row["nombre"]; ?>" required>
                                             <input type="hidden" value="<?php echo $row["id"]; ?>" name="id">   
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Precio</label>
                                            <input type="number" class="form-control" name="precio" value="<?php echo $row["precio_ahora"];?>" placeholder="Digite el precio base del producto" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Minima unidad</label>
                                            <input type="number" class="form-control" name="cantidad" value="<?php echo $row["min_uni"];?>" placeholder="Digite la minima cantidad que se permitira comprar" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="inputState">Seleccione la categoria del producto</label>
                                            <select id="inputState" name="categoria" class="form-control">

                                                <?php
                                                if ($row["categoria"] == "PLÁNTULAS DE CACAO") {
                                                ?>
                                                    <option selected>PLÁNTULAS DE CACAO</option>
                                                    <option>SEMILLAS</option>
                                                    <option>PLÁNTULAS ORNAMENTALES</option>

                                                <?php

                                                } elseif ($row["categoria"] == "SEMILLAS") {

                                                ?>
                                                    <option>PLÁNTULAS DE CACAO</option>
                                                    <option selected>SEMILLAS</option>
                                                    <option>PLÁNTULAS ORNAMENTALES</option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option>PLÁNTULAS DE CACAO</option>
                                                    <option>SEMILLAS</option>
                                                    <option selected>PLÁNTULAS ORNAMENTALES</option>

                                                <?php

                                                }
                                                ?>





                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Ficha técnica</label>

                                            <small class="form-text text-muted">Solo se permite arhivos .PDF</small>
                                        </div>


                                        <div class="input-group mb-3">
                                            <div class="form-file">

                                                <label class="form-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">

                                                    <input id="ficha" name="ficha[]" type="file" class="file" data-browse-on-zone-click="true" ?>


                                                </label>
                                            </div>

                                        </div>



                                        <br><br><br>

                                        <?php
                                        if(!empty( $row["ficha_tecnica"])){    
                                       
                                        ?>
                                        <div class="embed-responsive" style="padding-bottom:90%;width:80%;">
                                            <embed type="application/pdf" src="<?php  echo "../" . $row["ficha_tecnica"]; ?>" />
                                            


                                        </div>
                                        <?php
                                         }
                                        ?>
                                            <input type="hidden" value="<?php echo $row["ficha_tecnica"]; ?>" name="fichaa">


                                        <br><br><br><br><br><br><br><br><br><br>
                                        <div class="card-body">

                                            <button type="submit" class="btn btn-success"><i class="mr-2" data-feather="check-circle"></i>Guardar Cambios</button>

                                        </div>


                                </div>



                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="form-label">Descripción principal</label>
                                        <textarea class="form-control" name="descripcion1" rows="3" required><?php echo $row["descripcion1"]; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Descripción Secundaria</label>
                                        <textarea class="form-control" name="descripcion2" rows="3" required><?php echo $row["descripcion2"]; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Porcentaje de descuento</label>
                                        <input type="number" class="form-control" name="descuento" min="1" max="100" value="<?php if (!empty($row2["descuento"])) {
                                                                                                                                echo $row2["descuento"];
                                                                                                                            }  ?>" placeholder="Digite un numero 1 a 100 que representara el porcentaje de descuento">
                                    </div>




                                    <div class="form-group">
                                        <label class="form-label">Imagenes</label>

                                        <small class="form-text text-muted">Solo se permite arhivos .jpg,png</small>
                                    </div>


                                    <div class="input-group mb-3">
                                        <div class="file-loading">
                                            <input id="archivos" name="imagenes[]" type="file" data-browse-on-zone-click="true" multiple>
                                        </div>

                                    </div>






                                    <div class="col-mb-3" style="width:80%;">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Imagenes del producto</h5>
                                            </div>
                                            <div class="card-body">
                                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        

                                                             <?php
                                                             if(!empty($row["img_dir1"])){ 
                                                             ?>
                                                             <div class="carousel-item active"> 
                                 
                                                            <img class="img-fluid d-block w-100" src="<?php echo "../" . $row["img_dir1"]; ?>" alt="First slide">
                                                            </div>
                                                             <?php } ?>

                                                            <input type="hidden" name="imagen" value="<?php echo $row["img_dir1"]; ?>">



                                                        <?php
                                                        if(!empty($row["img_dir2"])){ 
                                                        ?>
                                                        <div class="carousel-item">

                                                            <img class="img-fluid d-block w-100" src="<?php echo "../" . $row["img_dir2"];?>" alt="Second slide">

                                                            
                                                        </div><?php } ?>
                                                        <input type="hidden" name="imagen2" value="<?php echo $row["img_dir2"]; ?>">


                                                        <?php
                                                        if(!empty($row["img_dir3"])){ 
                                                        ?>
                                                        <div class="carousel-item">
                                                            <img class="img-fluid d-block w-100" src="<?php if (!empty($row["img_dir3"])) {
                                                                                                            echo "../" . $row["img_dir3"];
                                                                                                        } ?>" alt="third slide">
                                                            
                                                        </div>  <?php } ?>

                                                        <input type="hidden" name="imagen3" value="<?php echo $row["img_dir3"];?>">


                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
                                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                                                </div>
                                            </div>
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

                            <p> <?php if ($_POST) {
                                    echo $nombre . "  " .  $precio . "  " . $cantidad . "  " . $categoria . "  " . $descripcion1 . "  " . $descripcion2 . "  " . $ficha . "       " .    $imagen . "       " .  $imagen2 . "       " .    $imagen3;
                                }; ?> </p>

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