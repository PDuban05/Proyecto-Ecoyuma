<?php
// mensaje de fallo en la transaccion 

$_SESSION['fallo']= "Algo no ha ido bien, intenta realizar el pago de nuevo";
header("Location:checkout.php");


?>