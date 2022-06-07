<?php
session_start();
include_once "../php/conexion.php";
require '../login/database.php';





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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" id="main-style-link">




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
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Administrar sitio</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="">Herramientas</a></li>
                                <li class="breadcrumb-item">Administrar Productos</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">

                <!-- [ Hover-table ] start -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Registro de pedidos</h3>
                        </div>



                        <div class="card-body table-border-style table-bordered">
                            <div class="table-responsive">


                                <table class="table table-hover" id="users">
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>Código pedido</th>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                            <th>Detalles</th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $pedidos = "SELECT * FROM pedidos order by fecha desc";


                                        $c = 1;
                                        $resultado = mysqli_query($conexion, $pedidos);
                                        while ($row = mysqli_fetch_assoc($resultado)) {


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
                                            $fecha = $nombredia . " " . $numeroDia . " de " . $nombreMes . " de " . $anio;



                                            $hora = substr($row["fecha"], 10, 10);



                                            $id_pedido = $row['id_pedido'];
                                            $detalles = "SELECT * FROM detalles where id_pedido ='$id_pedido'";
                                            $resultado2 = mysqli_query($conexion, $detalles);
                                            $total = 0;



                                            $id_user = $row['id_cliente'];

                                            $user = "SELECT * FROM usuarios where id ='$id_user'";
                                            $resultado3 = mysqli_query($conexion, $user);
                                            $nrow = mysqli_fetch_assoc($resultado3);


                                            $name = $nrow['nombre'];
                                            $apellido = $nrow['apellido'];
                                            $email = $nrow['email'];

                                            $direccion = "SELECT * FROM direccion where id_usuario ='$id_user'";
                                            $resultado4 = mysqli_query($conexion, $direccion);
                                            $n2row = mysqli_fetch_assoc($resultado4);

                                            $departamento = $n2row['departamento'];
                                            $ciudad = $n2row['ciudad'];
                                            $direccion = $n2row['direccion'];
                                            $referencia = $n2row['referencia'];












                                        ?>


                                            <tr>
                                                <td> <?php echo $c;
                                                        ?> </td>

                                                <td><?php echo $row['id_pedido'] ?></td>
                                                <td><?php echo $fecha . " :: " . $hora; ?>


                                                </td>

                                                <td><?php echo $row['estado'];
                                                    ?></td>




                                                <td>
                                                    <div class="card-body btn-page">


                                                        <button type="button" class="btn btn-icon btn-outline-success" data-toggle="modal" data-target="#exampleModal<?php echo $c ?>" data-whatever="@mdo"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                            </svg></button>

                                                        <div class="modal fade" id="exampleModal<?php echo $c;
                                                                                                $c++; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog  modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Detalles del pedido</h5>
                                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form>
                                                                            <div class="form-group">

                                                                                <input type="text" class="form-control" name="nombre" id="recipient-name" value="<?php echo $name . " " . $apellido ?>" readonly>
                                                                            </div>
                                                                            <div class="form-group">

                                                                                <input type="text" class="form-control" name="email" id="recipient-name" value="<?php echo $email ?>" readonly>
                                                                            </div>
                                                                            <div class="form-group">

                                                                                <input type="text" class="form-control" name="direccion" id="recipient-name" value="<?php echo $departamento . " :: " . $ciudad . " :: " . $direccion . " :: " . $referencia ?>" readonly>
                                                                            </div>

                                                                            <div class="form-group">

                                                                                    <?php  
                                                                                    if (!empty($_POST['estado'])) {

                                                                                        $estado =  $_POST['estado'];
                                                                                        $id_pedi2 = $_POST['id_pedi2'];
                                                                                    
                                                                                    
                                                                                    
                                                                                        $sql = "UPDATE pedidos SET estado='$estado' WHERE id_pedido=$id_pedi2";
                                                                                        $stmt = $conn->prepare($sql);
                                                                                        $stmt->execute();
                                                                                    }
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    ?>



                                                                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                                                                                    <input type="hidden" name="id_pedi2" value="<?php echo $row['id_pedido'] ?> ">
                                                                                    <select class="form-select" name="estado">

                                                                                        <?php if ($row['estado'] == "Preparación") {   ?>
                                                                                            <option value="Preparación">Preparación</option>
                                                                                            <option value="En camino">En Camino</option>
                                                                                            <option value="Entregado">Entregado</option>
                                                                                        <?php  } ?>

                                                                                        <?php if ($row['estado'] == "En camino") {   ?>
                                                                                            <option value="Preparación">Preparacion</option>
                                                                                            <option value="En camino">En Camino</option>
                                                                                            <option value="Entregado">Entregado</option>
                                                                                        <?php  } ?>

                                                                                        <?php if ($row['estado'] == "Entregado") {   ?>
                                                                                            <option value="Preparación">Preparacion</option>
                                                                                            <option value="En camino">En Camino</option>
                                                                                            <option value="Entregado">Entregado</option>
                                                                                        <?php  } ?>




                                                                                    </select>


                                                                            </div>

                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>


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
                                                                                            $name_pro =  "SELECT * FROM inventario WHERE id ='$id_pro'";
                                                                                            $resultado3 = mysqli_query($conexion, $name_pro);
                                                                                            $row3 = mysqli_fetch_assoc($resultado3);




                                                                                        ?>

                                                                                            <tr>

                                                                                                <td style="vertical-align: middle;">



                                                                                                    <?php echo $row3['nombre'] ?>

                                                                                                </td>



                                                                                                <td style="vertical-align: middle;"><input name="cantidad" type="number" id="cantidad" style="width:65px;" class="align-middle text-center" value="<?php echo $row2['cantidad']; ?>" size="1" maxlength="4" disabled /></td>
                                                                                                <td style="vertical-align: middle;">$<?php echo  number_format($row2['precio'], 0, ',', '.')    ?></td>
                                                                                                <td style="vertical-align: middle;">$<?php echo  number_format($row2['precio'] * $row2['cantidad'], 0, ',', '.'); ?></td>

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

                                                                                                                                    echo     number_format($total, 0, ',', '.');        ?> </strong>
                                                                            </li>




                                                                    </div>
                                                                    <div class="modal-footer">

                                                                        <button type="submit" class="btn  btn-primary">Guardar</button>


                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>




                                                </td>


                                            </tr>






                                        <?php } ?>


                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ Hover-table ] end -->




                <!-- [ Background-Utilities ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </section>

    <!-- Required Js -->




    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/feather.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>







    <script>
        $(document).ready(function() {
            $('#users').DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Agrupar de _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
                scrollY: 500,
                lengthMenu: [
                    [10, 25, -1],
                    [10, 25, 50]
                ],
            });
        });
    </script>






</body>

</html>