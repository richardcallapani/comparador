<?php

session_start();

if (isset($_SESSION['id'])) {
	echo "";
} else {
	header("Status: 301 Moved Permanently");
	header("Location: ./iniciar_sesion_form.php");
}



require_once("conexion.php");
$conexion = conectarMySQL();

$query = "SELECT * FROM textos;";
$result = mysqli_query($conexion, $query) or die("Error en la consulta");

$datos = [];
while ($data = mysqli_fetch_array($result)) {
	$datos[$data['id']] = $data;
}
cerrarConexion($conexion);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detector de Similitud</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>

    <header>
        <div class="logo">
            <img src="../Login-y-registro-con-html-css-js/assets/images/PLAGIO_LOGI.svg" alt="">
        </div>
        <nav class="contenido">
            <a href="#">Inicio</a>
            <a href="#">Caracteristicas</a>
            <a href="#">Ver Tesis</a>
            <a href="subir_texto_form.php">Subir textos</a>
            <a href="cerrar_sesion.php">Cerrar Sesión</a>
        </nav>
    </header>
        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                	<form action="." method="POST">
                	<table>
                		<caption>COMPARADOR DE TEXTOS</caption>
                		<thead>
                			<tr>
	                			<th style="width: 35%;">Texto #1</th>
	                			<th style="width: 35%;">Texto #2</th>
	                			<th>Acciones</th>
                			</tr>
                		</thead>
                		<tbody>
                			<tr>
                				<td>
                					<select name="texto_1">
                						<?php
					                	 foreach ($datos as $data) {
					                	 	echo "<option value='". $data["id"] . "'>" . $data['id'] . " - " . $data['titulo'] . "</option>";
					                	 }
					                	?>
                					</select>
                				</td>
                				<td>
                					<select name="texto_2">
                						<?php
					                	 foreach ($datos as $data) {
					                	 	echo "<option value='". $data["id"] . "'	>" . $data['id'] . " - " . $data['titulo'] . "</option>";
					                	 }
					                	?>
                					</select>
                				</td>
                				<td>
                					<button type="submit" id="btn_comparar">Comparar</button>
                				</td>
                			</tr>
                			<tr>
	                			<th>
	                				<?php
                					if (isset($_REQUEST['texto_1'])) {
                						echo $_REQUEST['texto_1'] . " - " . $datos[$_REQUEST['texto_1']]['titulo'];
                					}
                					?>
	                			</th>
	                			<th>
	                				<?php
                					if (isset($_REQUEST['texto_2'])) {
                						echo $_REQUEST['texto_2'] . " - " . $datos[$_REQUEST['texto_2']]['titulo'];
                					}
                					?>
	                			</th>
	                			<th>
	                				<?php
                					if (isset($_REQUEST['texto_2'])) {
                						echo "Resultados";
                					}
                					?>
	                			</th>
                			</tr>
                			<tr>
                				<td>
                					<?php
                					if (isset($_REQUEST['texto_1'])) {
                						echo $datos[$_REQUEST['texto_1']]['texto'];
                					}
                					?>
                				</td>
                				<td>
                					<?php
                					if (isset($_REQUEST['texto_2'])) {
                						echo $datos[$_REQUEST['texto_2']]['texto'];
                					}
                					?>
                				</td>
                				<td>
                					<?php
                					if (isset($_REQUEST['texto_2'])) {
                						
                						$id_1 = $_REQUEST['texto_1'];
                						$id_2 = $_REQUEST['texto_2'];

                						$titulo_1 = $datos[$_REQUEST['texto_1']]['titulo'];
                						$titulo_2 = $datos[$_REQUEST['texto_2']]['titulo'];

                						$texto_1 = $datos[$_REQUEST['texto_1']]['texto'];
                						$texto_2 = $datos[$_REQUEST['texto_2']]['texto'];

                						$son_iguales = $texto_1 == $texto_2;

                						if ($son_iguales) {
                							echo "- <b>SI SON IGUALES</b><br><br>";
                						} else {
                							echo "- <b>NO SON IGUALES</b><br><br>";
                						}

                						echo "- <b>" . $titulo_1 . "</b>: <br>" . (substr_count(trim($texto_1), "\n")+1) . " lineas<br>";
                						echo  (substr_count(trim($texto_1), "\n")+substr_count($texto_1, " ")+1) . " palabras<br><br>";

                						echo "- <b>" . $titulo_2 . "</b>: <br>" . (substr_count(trim($texto_2), "\n")+substr_count($texto_2, " ")+1) . " palabras<br>";
                						echo (substr_count(trim($texto_2), "\n")+1) . " lineas<br>";
                						
                						

                					}
                					?>
                				</td>
                			</tr>
                			
                		</tbody>
                	</table>
                    </form>
                	

                </div>

                <div class="caja__trasera">

                	<table>
                		<caption>LISTADO DE TEXTOS</caption>
                		<thead>
                			<tr>
	                			<th >Codigo</th>
	                			<th>Titulo</th>
	                			<th>Vista previa</th>
	                			<th>Fecha</th>
	                			<th>Comentarios</th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php

		                	 foreach ($datos as $data) {
		                	 	echo "<tr>";
		                	 	echo "<td>{$data['id']}</td>";
		                	 	echo "<td>{$data['titulo']}</td>";
		                	 	echo "<td>" . substr($data['texto'], 0, 35) . "</td>";
		                	 	echo "<td>{$data['fecha']}</td>";
		                	 	echo "<td>{$data['comentarios']}</td>";
		                	 	echo "</tr>";
		                	 }
		                	?>
                		</tbody>
                	</table>
                    
                	

                </div>

                
            </div>

        </main>

        <script src="assets/js/script.js"></script>
</body>
</html>


