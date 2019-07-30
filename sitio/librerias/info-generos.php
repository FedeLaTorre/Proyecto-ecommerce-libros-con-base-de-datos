<?php

function obtenerGeneros($db) {
    $consulta = "SELECT * FROM generos
                ORDER BY generos";
    $resultado = mysqli_query($db, $consulta);
    
    $salida = [];
    while($fila = mysqli_fetch_assoc($resultado)) {
        $salida[] = $fila;
    }
    return $salida;
}