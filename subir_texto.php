
<?php

$form = $_REQUEST['form'];
$titulo = $_REQUEST['titulo'];
$texto = $_REQUEST['texto'];
$comentarios = $_REQUEST['comentarios'];
require_once("conexion.php");

$conexion = conectarMySQL();

if ($form == "2") {
	$texto = "";
	$ruta_archivo = "./temporal.txt";
	if (move_uploaded_file($_FILES['file_texto']['tmp_name'], $ruta_archivo)) {
		$texto = file_get_contents($ruta_archivo);
	} 
} 
date_default_timezone_set('America/Lima');
guardarTexto($conexion, $titulo, date("Y-m-d H:i:s"), $texto, $comentarios);

cerrarConexion($conexion);

header("Status: 301 Moved Permanently");
header("Location: ./index.php");

?>

