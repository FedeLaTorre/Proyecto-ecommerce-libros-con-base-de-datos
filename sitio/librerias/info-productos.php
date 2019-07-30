<?php

function traerProductos($db, $cantidad = null) {
    
    $consulta = "SELECT * FROM productos
                ORDER BY titulo DESC";
    
    
    if(is_numeric($cantidad)) {
      
        $consulta .= " LIMIT " . $cantidad;
    }
    
    
    $resultado = mysqli_query($db, $consulta);
    
    $salidaResultados = [];
    
    while($fila = mysqli_fetch_assoc($resultado)) {
       
        $salidaResultados[] = $fila;
    }
    
   
   
    return $salidaResultados;
    
    
}


function traerProductoPorId($db, $id) {
   
    $id = mysqli_real_escape_string($db, $id);
    
   
    $consulta = "SELECT 
                    titulo, 
                    sinopsis, 
                    paginas, 
                    precio, 
                    imagen 
                FROM productos
                WHERE idproductos = '$id'";
    
    $resultado = mysqli_query($db, $consulta);
    
   
    
    return mysqli_fetch_assoc($resultado);
}


function crearProducto($db, $datos) {
    
    $consulta = "INSERT INTO productos (idusuarios, titulo, sinopsis, paginas, precio, imagen)
    VALUES (
        '" . mysqli_real_escape_string($db, $datos['idusuarios']) . "',
        '" . mysqli_real_escape_string($db, $datos['titulo']) . "',
        '" . mysqli_real_escape_string($db, $datos['sinopsis']) . "',
        '" . mysqli_real_escape_string($db, $datos['paginas']) . "',
        '" . mysqli_real_escape_string($db, $datos['precio']) . "',
        '" . mysqli_real_escape_string($db, $datos['imagen']) . "'
        
    )";
   

    return mysqli_query($db, $consulta);
}

function eliminarProducto($db, $id) {
    $id = mysqli_real_escape_string($db, $id);
    
    $consulta = "DELETE FROM generos_has_productos
                WHERE productos_idproductos = '$id'";
    
    mysqli_query($db, $consulta);
    
    $consulta = "DELETE FROM productos
                WHERE idproductos = '$id'";
    
    return mysqli_query($db, $consulta);
}


function editarProducto($db, $id, $data) {
    $id = mysqli_real_escape_string($db, $id);

    $camposSQL = [];
    
    foreach($data as $columna => $valor) {
        $camposSQL[] = $columna . " = '" . mysqli_real_escape_string($db, $valor) . "'";
    }
    
    $consulta = "UPDATE productos
                SET " . implode(', ', $camposSQL) . "
                WHERE idproductos = '" . $id . "'";
  
    
    return mysqli_query($db, $consulta);
}

function crearGenerosParaProductos($db, $idproductos, $generos) {
    $consulta = "INSERT INTO generos_has_productos (generos_idgeneros, productos_idproductos)
                VALUES ";
   
    $paresValores = [];
    
    foreach($generos as $genero) {
        $generoFiltrado = mysqli_real_escape_string($db, $genero);
        $paresValores[] = "('" . $id . "', '" . $generoFiltrado . "')";
    }
    
    $consulta .= implode(', ', $paresValores);
    
    return mysqli_query($db, $consulta);
}


function traerGenerosDeProductosPorId($db, $id) {
    $id = mysqli_real_escape_string($db, $id);
    
    $consulta = "SELECT g.* FROM generos g
                INNER JOIN generos_has_productos ghp
                ON ghp.generos_idgeneros = g.idgeneros
                WHERE ghp.productos_idproductos = '" . $id . "'";
    $resultado = mysqli_query($db, $consulta);
    
    $salida = [];
    while($fila = mysqli_fetch_assoc($resultado)) {
        $salida[] = $fila;
    }
    return $salida;
}




