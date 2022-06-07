<?php
session_start();
$carpetaAdjunta = "../images/";
// Contar envían por el plugin
$Imagenes = count(isset($_FILES['imagenes']['name']) ? $_FILES['imagenes']['name'] : 0);
$infoImagenesSubidas = array();
for ($i = 0; $i < $Imagenes; $i++) {

	// El nombre y nombre temporal del archivo que vamos para adjuntar
	$nombreArchivo = isset($_FILES['imagenes']['name'][$i]) ? $_FILES['imagenes']['name'][$i] : null;
	$nombreTemporal = isset($_FILES['imagenes']['tmp_name'][$i]) ? $_FILES['imagenes']['tmp_name'][$i] : null;


	$logitudPass    = 10;
	$newname    = substr(md5(microtime()), 1, $logitudPass);

	$explode        = explode('.', $nombreArchivo);
	$extension_foto = array_pop($explode);
	$rutaArchivo  = $carpetaAdjunta . $newname . '.' . $extension_foto;


	if (empty($_SESSION['imagenes'])) {
		$_SESSION['imagenes'] = "images/".$newname . '.' . $extension_foto;
	} else if (empty($_SESSION['imagenes2'])) {

		$_SESSION['imagenes2'] = "images/".$newname . '.' . $extension_foto;
	} else if (empty($_SESSION['imagenes3'])) {

		$_SESSION['imagenes3'] ="images/".$newname . '.' . $extension_foto;
	}


	move_uploaded_file($nombreTemporal, $rutaArchivo);

	$infoImagenesSubidas[$i] = array("caption" => "$nombreArchivo", "height" => "120px", "showRemove" => false, "key" => $nombreArchivo);
	$ImagenesSubidas[$i] = "<img  height='120px'  src='$rutaArchivo' class='file-preview-image'>";
}

$arr = array(
	"file_id" => 0, "overwriteInitial" => true, "initialPreviewConfig" => $infoImagenesSubidas,
	"initialPreview" => $ImagenesSubidas
);
echo json_encode($arr);
