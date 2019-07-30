<?php

function redirectIfNotLogged($path = "../") {
    if(!isset($_SESSION['idusuarios']) || empty($_SESSION['idusuarios'])) {
        $_SESSION['mensaje'] = "Por favor, inicie sesión.";
        header('Location: ' . $path . 'index.php?s=login');
        exit;
    }
}


function logUser($db, $email, $password) {
    $email    = mysqli_real_escape_string($db, $email);
    $password = mysqli_real_escape_string($db, $password);
    
    $consulta = "SELECT idusuarios, email, password FROM usuarios
            WHERE email = '" . $email . "'";
  
    $resultado = mysqli_query($db, $consulta);
   
    if(mysqli_num_rows($resultado) === 1) {
        $fila = mysqli_fetch_assoc($resultado);
        
      
        if(password_verify($password, $fila['password'])) {
           
            return $fila['idusuarios'];
          //  return ['id' => $fila['idusuarios'], 'rol' => $fila['rol']];
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function crearUsuario($db, $data) {
   
    $email = mysqli_real_escape_string($db, $data['email']);
    $nombre = mysqli_real_escape_string($db, $data['nombre']);
    $apellido = mysqli_real_escape_string($db, $data['apellido']);
   
    $password = password_hash($data['password'], PASSWORD_DEFAULT);
    
    $consulta = "INSERT INTO usuarios (email, password, nombre, apellido)
            VALUES (
                '" . $email . "',
                '" . $password . "',
                '" . $nombre . "',
                '" . $apellido . "'
            )";
    
    $exito = mysqli_query($db, $consulta);
    
    if($exito) {
      
        $id = mysqli_insert_id($db);
        
        return $id;
    } else {
        return false;
    }
}

function traerUsuarioPorId($db, $id) {
    $consulta = "SELECT * FROM usuarios
                WHERE idusuarios = " . $id;
    
    $resultado = mysqli_query($db, $consulta);
    
    $fila = mysqli_fetch_assoc($resultado);
    return $fila;
}





