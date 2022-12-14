<?php

session_start();

if (isset($_SESSION['id'])) {
	echo "";
} else {
	header("Status: 301 Moved Permanently");
	header("Location: ./iniciar_sesion_form.php");
}


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
            <a href="index.php">Comprobar</a>
            <a href="cerrar_sesion.php">Cerrar Sesión</a>
        </nav>
    </header>
        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>CAJA DE TEXTO</h3>
                        <p>Ingrese su texto para ser procesado</p>
                        <button id="btn__iniciar-sesion">Ir al formulario</button>
                    </div>
                    <div class="caja__trasera-register" style="margin-left: 100px;">
                        <h3>CARGA DE ARCHIVO</h3>
                        <p>Cargue su archivo de texto para poder ser procesado</p>
                        <button id="btn__registrarse">Ir al formulario</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="subir_texto.php?form=1" class="formulario__login" method="POST" enctype="multipart/form-data">

                        <h2>Caja de texto</h2>
                        <input type="text" name="titulo" placeholder="Titulo" autocomplete="off">
                        <textarea name="texto" placeholder="Ingrese texto"></textarea>
                        <input type="text" name="comentarios" placeholder="Comentarios" autocomplete="off">
                        <button type="submit">Guardar</button>
                    </form>

                    <!--Register-->
                    <form action="subir_texto.php?form=2" class="formulario__register" method="POST" enctype="multipart/form-data">
                        <h2>Cargue su archivo</h2>
                        <input type="text" name="titulo" placeholder="Titulo" autocomplete="off">
                        <input type="file" name="file_texto" placeholder="Archivo de texto" accept=".txt">
                        <input type="text" name="comentarios" placeholder="Comentarios" autocomplete="off">
                        <button typy="submit">Guardar</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="assets/js/script.js"></script>
</body>
</html>
