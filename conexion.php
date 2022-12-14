<?php

function conectarMySQL() {
  $servername = "localhost:3306";
  $database = "comparacion";
  $username = "root";
  $password = "";

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
