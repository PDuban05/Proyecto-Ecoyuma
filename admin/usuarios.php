<?php
include_once "../php/conexion.php";

$user="SELECT * FROM usuarios";




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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" id="main-style-link">
    
    
    

</head>

<body >
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
                                <li class="breadcrumb-item">Administrar Usuarios</li>
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
                            <h3>Usuarios Registrados</h3>

      
                            
                        </div>


                        <div class="card-body table-border-style table-bordered">
                            <div class="table-responsive">


                                <table class="table table-hover" id="users">
                                    <thead>
                                       
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Telefono</th>
                                            <th>Email</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $c=1;
                                        $resultado= mysqli_query($conexion,$user);
                                        while($row= mysqli_fetch_assoc($resultado)){


                                       

                                    
                                    ?>

                                        


                                        <tr>
                                            <td><?php echo $c; $c++;?></td>
                                            <td><?php echo $row["nombre"]; ?></td>
                                            <td><?php echo $row["apellido"]; ?></td>
                                            <td><?php echo $row["telefono"]; ?></td>
                                            <td><?php echo $row["email"]; ?></td>
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
    
    $(document).ready(function () {
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
                lengthMenu: [ [10, 25, -1], [10, 25, 50] ],
            });
        });
    </script>

 
    

    

</body>

</html>