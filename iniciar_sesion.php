<?php

$user = $_POST['user'];
$pass = $_POST['pass'];

require_once("conexion.php");

$conexion = conectarMySQL();

$query = "SELECT * FROM usuarios WHERE usuario='{$user}' AND clave='{$pass}'";
$result = mysqli_query($conexion, $query) or die("Error en la consulta");

if ($data = mysqli_fetch_array($result)) {
	session_start();
	$_SESSION['id'] = $data['id'];
	$_SESSION['nombre'] = $data['nombre'];
	$_SESSION['usuario'] = $data['usuario'];
	cerrarConexion($conexion);
	header("Status: 301 Moved Permanently");
	header("Location: ./index.php");
} else {
	cerrarConexion($conexion);
	header("Status: 301 Moved Permanently");
	header("Location: ./iniciar_sesion_form.php");
}



?>
