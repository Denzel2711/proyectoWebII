<?php
include_once 'conexion.php';
include 'session.php';


function subirImagen($fileInput)
{
    $directorio = "../assets/img/";
    $archivo = $directorio . basename($_FILES[$fileInput]["name"]);
    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

    if (isset($_FILES[$fileInput]) && $_FILES[$fileInput]['size'] > 0) {
        if ($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png" || $tipoArchivo == "gif") {
            if (move_uploaded_file($_FILES[$fileInput]["tmp_name"], $archivo)) {
                return $archivo;
            } else {
                echo "Error al mover el archivo a $archivo";
            }
        } else {
            echo "Tipo de archivo no permitido.";
        }
    } else {
        echo "No se ha subido ningún archivo o el archivo está vacío.";
    }
    return null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo_propiedad = mysqli_real_escape_string($conection, $_POST['tipo_propiedad']);
    $destacada = mysqli_real_escape_string($conection, $_POST['destacada']);
    $titulo = mysqli_real_escape_string($conection, $_POST['titulo']);
    $descripcion = mysqli_real_escape_string($conection, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($conection, $_POST['precio']);

    $usuario_id  = isset($_SESSION['usuario']['id']) ? $_SESSION['usuario']['id'] : '';

    $imagenRuta = subirImagen('imagen');

    if ($imagenRuta) {
        $queryImagen = "INSERT INTO imagenes (nombre, direccion) VALUES ('" . basename($imagenRuta) . "', '" . $imagenRuta . "')";

        if (mysqli_query($conection, $queryImagen)) {
            $imagenID = mysqli_insert_id($conection);

            $queryPropiedad = "INSERT INTO propiedades (tipo, destacada, titulo, descripcion, precio, agente_id, imagen_id) 
                               VALUES ('$tipo_propiedad', '$destacada', '$titulo', '$descripcion', '$precio', '$usuario_id', '$imagenID')";

            if (mysqli_query($conection, $queryPropiedad)) {
                echo "Propiedad guardada correctamente.";
            } else {
                echo "Error al guardar la propiedad: " . mysqli_error($conection);
            }
        } else {
            echo "Error al guardar la imagen: " . mysqli_error($conection);
        }
    } else {
        echo "Error al subir la imagen.";
    }
}

mysqli_close($conection);
