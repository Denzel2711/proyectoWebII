<?php
require_once 'conexion.php';

if (isset($_POST['delete_propiedad_id'])) {
    $propiedadId = intval($_POST['delete_propiedad_id']);
    
    // Obtener el ID de la imagen relacionada
    $queryImagen = "SELECT imagen_id FROM propiedades WHERE id = ?";
    $stmtImagen = mysqli_prepare($conection, $queryImagen);
    mysqli_stmt_bind_param($stmtImagen, 'i', $propiedadId);
    mysqli_stmt_execute($stmtImagen);
    mysqli_stmt_bind_result($stmtImagen, $imagenId);
    mysqli_stmt_fetch($stmtImagen);
    mysqli_stmt_close($stmtImagen);

    // Eliminar la propiedad de la base de datos
    $queryDeletePropiedad = "DELETE FROM propiedades WHERE id = ?";
    $stmtDeletePropiedad = mysqli_prepare($conection, $queryDeletePropiedad);
    mysqli_stmt_bind_param($stmtDeletePropiedad, 'i', $propiedadId);

    if (mysqli_stmt_execute($stmtDeletePropiedad)) {
        // Verificar si la imagen tiene otras referencias
        if ($imagenId) {
            $queryCountImagen = "SELECT COUNT(*) FROM propiedades WHERE imagen_id = ?";
            $stmtCountImagen = mysqli_prepare($conection, $queryCountImagen);
            mysqli_stmt_bind_param($stmtCountImagen, 'i', $imagenId);
            mysqli_stmt_execute($stmtCountImagen);
            mysqli_stmt_bind_result($stmtCountImagen, $count);
            mysqli_stmt_fetch($stmtCountImagen);
            mysqli_stmt_close($stmtCountImagen);

            if ($count == 0) {
                // Eliminar el registro de la imagen de la base de datos
                $queryDeleteImagen = "DELETE FROM imagenes WHERE id = ?";
                $stmtDeleteImagen = mysqli_prepare($conection, $queryDeleteImagen);
                mysqli_stmt_bind_param($stmtDeleteImagen, 'i', $imagenId);

                if (mysqli_stmt_execute($stmtDeleteImagen)) {
                    // También eliminar el archivo de imagen físicamente del servidor
                    $queryRutaImagen = "SELECT direccion FROM imagenes WHERE id = ?";
                    $stmtRutaImagen = mysqli_prepare($conection, $queryRutaImagen);
                    mysqli_stmt_bind_param($stmtRutaImagen, 'i', $imagenId);
                    mysqli_stmt_execute($stmtRutaImagen);
                    mysqli_stmt_bind_result($stmtRutaImagen, $imagenRuta);
                    mysqli_stmt_fetch($stmtRutaImagen);
                    mysqli_stmt_close($stmtRutaImagen);

                    if (file_exists($imagenRuta)) {
                        unlink($imagenRuta); // Eliminar el archivo físicamente
                    }
                } else {
                    die("Error al eliminar la imagen: " . mysqli_error($conection));
                }

                mysqli_stmt_close($stmtDeleteImagen);
            }
        }
        header("Location: ../misPropiedades.php");
    } else {
        die("Error al eliminar la propiedad: " . mysqli_error($conection));
    }

    mysqli_stmt_close($stmtDeletePropiedad);
}

mysqli_close($conection);
