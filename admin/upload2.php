<?php 
session_start();

$carpetaAdjunta="../fichas_tecnicas/";
// Contar envían por el plugin
$Imagenes =count(isset($_FILES['ficha']['name'])?$_FILES['ficha']['name']:0);
$infoImagenesSubidas = array();
for($i = 0; $i < $Imagenes; $i++) {

	// El nombre y nombre temporal del archivo que vamos para adjuntar
	$nombreArchivo=isset($_FILES['ficha']['name'][$i])?$_FILES['ficha']['name'][$i]:null;
	$nombreTemporal=isset($_FILES['ficha']['tmp_name'][$i])?$_FILES['ficha']['tmp_name'][$i]:null;
	

	
	$logitudPass    = 10;
	$newname    = substr(md5(microtime()), 1, $logitudPass);
	$explode        = explode('.', $nombreArchivo);
	$extension_pdf = array_pop($explode);
	$_SESSION['ficha'] ="fichas_tecnicas/". $newname . '.' . $extension_pdf;

	$rutaArchivo  = $carpetaAdjunta . $newname . '.' . $extension_pdf;
	
	move_uploaded_file($nombreTemporal,$rutaArchivo);
	
	$infoImagenesSubidas[$i]=array("caption"=>"$nombreArchivo","showRemove"=>false,"key"=>$nombreArchivo);
	$ImagenesSubidas[$i]="<embed  width='100%' src='$rutaArchivo' class='file-preview-pdf'/>";


	}

$arr = array("file_id"=>0,"overwriteInitial"=>true,"initialPreviewConfig"=>$infoImagenesSubidas,
			 "initialPreview"=>$ImagenesSubidas);
echo json_encode($arr);

?>
