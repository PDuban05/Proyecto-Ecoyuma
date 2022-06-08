<?php
session_start();

include("php/nav_cart.php ");
include("php/conexion.php");
include("login/database.php");
//captura de datos de retorno de mercado pago
$id = $_SESSION['id'];
$Payment = $_GET['payment_id'];
$status = $_GET['status'];
$Payment_type = $_GET['payment_type'];
$order_id = $_GET['merchant_order_id'];
//captura de fecha y hora de la compra
date_default_timezone_set('America/Bogota');
$fecha = date('Y-m-d H:i:s');

//insert de los datos del pedido
$datos = "INSERT INTO pedidos(id_cliente,estado,fecha)values('$id','Preparacion','$fecha')";
$records = mysqli_query($conexion, $datos);


$datos = "SELECT * FROM pedidos where id_cliente='$id' and fecha='$fecha'";
$records = mysqli_query($conexion, $datos);
$row = mysqli_fetch_assoc($records);


foreach ($carrito_mio as $producto) {

    if (is_array($producto)) {

        if (count($producto) == 6) {

            //insert detalles del pedido
            $id_pedido = $row['id_pedido'];
            $ref = $producto["ref"];
            $cantidad = $producto["cantidad"];
            $precio = $producto["precio"];
        
            $datos = "INSERT INTO detalles (id_pedido,id_transaccion,id_producto,cantidad,precio)values('$id_pedido','$Payment','$ref','$cantidad','$precio')";
            $records = mysqli_query($conexion, $datos);

            
        }
    }
}
//redireccion despues de la transferencia
header("Location:php/borrarcarro.php");
header("Location:registropedidos.php");
