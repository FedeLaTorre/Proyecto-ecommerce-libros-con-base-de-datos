<?php

session_start();

require 'conexion.php';
require '../librerias/info-usuarios.php';


$email      = $_POST['email'];
$password   = $_POST['password'];


$idusuarios = logUser($db, $email, $password);

if($idusuarios !== false) {
    
    $_SESSION['idusuarios'] = $idusuarios;
    $_SESSION['email']      = $email;
    header('Location: ../usuario/index.php?s=home');
} else {
   
    $_SESSION['errores'] = ["login" => 'Hubo un error en el login. Fijate de que el mail y la contraseña sean correctas y volve a intentar.'];
    $_SESSION['old_data'] = $_POST;
    header('Location: ../index.php?s=login');
}








