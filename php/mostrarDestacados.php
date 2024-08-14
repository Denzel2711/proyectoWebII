<?php
include_once 'php/conexion.php';

$query = "SELECT propiedades.titulo, propiedades.descripcion, propiedades.precio, imagenes.direccion AS imagen 
    FROM propiedades 
    INNER JOIN imagenes ON propiedades.imagen_id = imagenes.id
    WHERE propiedades.destacada = 1
    ORDER BY propiedades.fecha_creacion DESC
    LIMIT 3";

$resultado = mysqli_query($conection, $query);
?>