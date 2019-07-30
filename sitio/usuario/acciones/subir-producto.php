<?php

session_start();

require '../../librerias/info-usuarios.php';

redirectIfNotLogged('../');

require '../../acciones/conexion.php';
require '../../librerias/info-productos.php';
require '../../librerias/image-functions.php'; 


$titulo       = $_POST['titulo'];
$sinopsis     = $_POST['sinopsis'];
$paginas      = (int)$_POST['paginas'];
$precio       = (int)$_POST['precio'];
$imagen       = $_FILES['imagen'];


$errores = [];

if(empty($titulo)) {
    $errores['titulo'] = "Por favor, ingresar un título para el producto.";
} else if(strlen($titulo) < 5) {
    $errores['titulo'] = "El título debe de tener al menos 5 caracteres.";
}

if(empty($sinopsis)) {
    $errores['sinopsis'] = "Por favor, ingresar una sinopsis para el producto.";
}

if(empty($paginas)) {
    $errores['paginas'] = "Por favor, ingresar un numero de páginas para el producto.";
    }else if(is_int($paginas) === false || is_int($paginas) <= 0) {
    $errores['paginas'] = "Por favor, ingresar un numero para las páginas.";
}

if(empty($precio)) {
    $errores['precio'] = "Por favor, ingresar un precio para el producto.";
}else if(is_int($precio) === false || is_int($paginas) <= 0) {
    $errores['precio'] = "Por favor, ingresar un numero para el precio.";
}

if(empty($imagen['tmp_name'])) {
    $errores['imagen']  = "Por favor subir una imagen para el producto.";
}



if(count($errores) !== 0) {
    
    $_SESSION['errores'] = $errores;
    $_SESSION['old_data'] = $_POST;
    header('Location: ../index.php?s=nuevo-producto');
    exit;
}


$nombresImagenes = generateSiteImages($imagen, __DIR__ . '/../../img/', null, true);

$exito = crearProducto($db, [
    'idusuarios' => 1, 
    'titulo' => $titulo,
    'sinopsis' => $sinopsis,
    'paginas' => $paginas,
    'precio' => $precio,
    'imagen' => $nombresImagenes['name'], 
]);

if($exito) {
   
        header('Location: ../index.php?s=productos');
}