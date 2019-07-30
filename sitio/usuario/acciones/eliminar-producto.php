<?php

session_start();

require '../../librerias/info-usuarios.php';
redirectIfNotLogged('../../');

require '../../acciones/conexion.php';
require '../../librerias/info-productos.php';

$id = $_GET['id'];

$exito = eliminarProducto($db, $id);


if($exito) {
    $_SESSION['mensaje'] = "Eliminaste el producto. ";
    header('Location: ../index.php?s=productos');
} else {
    $_SESSION['mensaje'] = "No pudimos eliminar el producto";
    header('Location: ../index.php?s=productos');
}







