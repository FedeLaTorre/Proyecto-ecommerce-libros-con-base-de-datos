<?php
session_start();
require 'conexion.php';
require '../librerias/info-usuarios.php';

$email      = $_POST['email'];
$password   = $_POST['password'];
$cpassword  = $_POST['cpassword'];
$nombre     = $_POST['nombre'];
$apellido   = $_POST['apellido'];

$errores = [];

if(empty($email)) {
    $errores['email'] = 'Por favor, ingrese un mail en este campo.';
} 

else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $errores['email'] = "Por favor, ingresar un formato de mail valido.";
}


if(empty($password)) {
    $errores['password'] = "Por favor, ingresar una contraseña en este campo.";
} else if(strlen($password) < 5) {
    $errores['password'] = "La contraseña tiene que tener un minimo de 5 caracteres para ser correcta.";
} 

else if($password !== $cpassword) {
    $errores['password'] = "Verificar que ambas contraseñas coincidan.";
}

if(count($errores) !== 0) {
  
    $_SESSION['errores'] = $errores;
    $_SESSION['old_data'] = [
        'email_r'   => $_POST['email'],
        'password_r'=> $_POST['password'],
        'cpassword' => $_POST['cpassword'],
        'nombre'    => $_POST['nombre'],
        'apellido'  => $_POST['apellido']
    ];
    header('Location: ../index.php?s=registrar');
    exit;
}



$idusuarios = crearUsuario($db, [
    'email'     => $email,
    'password'  => $password,
    'nombre'    => $nombre,
    'apellido'  => $apellido
]);


if($idusuarios !== false) {

    $_SESSION['idusuarios'] = $idusuarios;
    $_SESSION['email']      = $email;
    header('Location: ../usuario/index.php?s=home');
} else {
    echo "Aparentemente hubo algún problema";
}






