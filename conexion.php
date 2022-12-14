<?php

function conectarMySQL() {
  $servername = "us-cdbr-east-06.cleardb.net";
  $database = "heroku_db3d9982984471e";
  $username = "b10f7e72b91db6";
  $password = "8d83b2b7";

  $conexion = mysqli_connect($servername, $username, $password, $database);

  if (!$conexion) {
    die("Connection failed: ".mysqli_connect_error());
  }

  return $conexion;
}

function cerrarConexion($conexion) {
  mysqli_close($conexion);
}

function guardarTexto($conexion, $titulo, $fecha, $texto, $comentarios) {
  $query = 'INSERT INTO `textos`(`titulo`, `fecha`, `texto`, `comentarios`) VALUES ("'.$titulo.'","'.$fecha.'","'.$texto.'","'.$comentarios.'")';
  $result = mysqli_query($conexion, $query) or die("Error en la consulta");
}

?>
