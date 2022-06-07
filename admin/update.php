<?php
session_start();
require '../login/database.php';
include_once "../php/conexion.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$categoria = $_POST['categoria'];
$descripcion1 = $_POST['descripcion1'];
$descripcion2 = $_POST['descripcion2'];
$descuento = $_POST['descuento'];

if (!empty($_SESSION['ficha'])) {
    $ficha = $_SESSION['ficha'];
} else {
    $ficha = $_POST["fichaa"];
}

if (!empty($_SESSION['imagenes']) || !empty($_SESSION['imagenes2']) || !empty($_SESSION['imagenes3'])) {


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
} else {
    $imagen = $_POST["imagen"];
    $imagen2 = $_POST["imagen2"];
    $imagen3 = $_POST["imagen3"];
}






$sql = "UPDATE inventario SET nombre='$nombre',precio_ahora='$precio',min_uni='$cantidad',categoria='$categoria',descripcion1='$descripcion1',descripcion2='$descripcion2',ficha_tecnica='$ficha',img_dir1='$imagen',img_dir2='$imagen2',img_dir3='$imagen3' WHERE id=$id";
$stmt = $conn->prepare($sql);
$stmt->execute();

if (!empty($descuento)) {
    $ofert = "SELECT * FROM ofertas WHERE id_inventario = $id";
    $resultado2 = mysqli_query($conexion, $ofert);
    $row = mysqli_fetch_assoc($resultado2);

    if (!empty($row)) {

        $sql = "UPDATE ofertas SET descuento = '$descuento' WHERE id_inventario = '$id' ";
        $res = mysqli_query($conexion, $sql);
    } else {

        $sql = "INSERT INTO ofertas(id_inventario, descuento) VALUES('$id','$descuento')";
        $res = mysqli_query($conexion, $sql);
    }
} elseif ($descuento == "") {

    $ofert = "DELETE FROM ofertas WHERE id_inventario = $id";
    $records = mysqli_query($conexion, $ofert);
}


$_SESSION['update']="Se han realizado los cambios satisfactoriamente";
header("Location:productos.php");


unset(
    $_SESSION['imagenes'],
    $_SESSION['imagenes2'],
    $_SESSION['imagenes3'],
    $_SESSION['ficha']

);
