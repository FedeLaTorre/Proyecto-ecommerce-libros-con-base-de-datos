<?php

session_start();

require 'acciones/conexion.php';



$seccionesDisp = ['home', 'productos', 'contacto', '404', 'login', 'ver-producto', 'registrar'];

$seccion = $_GET['s'] ?? 'home';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Federico La Torre Segundo TP DW TN3A 2019</title>
    <meta name="author" content="Federico La Torre">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Rosario:400,700" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <header class="header">
        <h1>Buho Editorial</h1>
        <nav>
            <ul>
                <li><a href="index.php?s=home">Home</a></li>
                <li><a href="index.php?s=productos">Productos</a></li>
                <li><a href="index.php?s=contacto">Contacto</a></li>
                <li><a href="index.php?s=login">Iniciar Sesión</a></li>



            </ul>
        </nav>
    </header>
    <?php
   
    if(in_array($seccion, $seccionesDisp)) {
        require 'secciones/' . $seccion . '.php';
    } else {
       
        header('Location: index.php?s=404');
    }
    ?>
    <footer class="footer">
        <ul>
            <li>Federico La Torre</li>
            <li>Programación 2</li>
            <li>Prof. Santiago Gallino</li>
            <li>Trabajo práctico 2. Tercer semestre Escuela Da Vinci. 2019</li>

        </ul>
    </footer>
    <script>
        $(function() {
            $("#libros").accordion({
                collapsible: true
            });
        });

    </script>
</body>

</html>
