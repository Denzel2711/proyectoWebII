<?php
include_once 'conexion.php';

$color_tema = $_POST['color_tema'];
$mensaje_banner = $_POST['mensaje_banner'];
$informacion_quienes_somos = $_POST['informacion_quienes_somos'];
$enlace_facebook = $_POST['enlace_facebook'];
$enlace_youtube = $_POST['enlace_youtube'];
$enlace_instagram = $_POST['enlace_instagram'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

function subirImagen($fileInput)
{
    $directorio = "./assets/img/";
    $archivo = $directorio . basename($_FILES[$fileInput]["name"]);
    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

    if (isset($_FILES[$fileInput]) && $_FILES[$fileInput]['size'] > 0) {
        if ($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png" || $tipoArchivo == "gif" || $tipoArchivo == "webp") {
            if (move_uploaded_file($_FILES[$fileInput]["tmp_name"], $archivoAbsoluto)) {
                return $archivoRelativo;
            }
        }
    }
    return null;
}

function actualizarImagenEnBD($conection, $id, $direccion)
{
    $sql = "UPDATE imagenes SET direccion = ? WHERE id = ?";
    $stmt = mysqli_prepare($conection, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $direccion, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

$icono_principal = subirImagen('icono_principal');
$icono_blanco = subirImagen('icono_blanco');
$imagen_banner = subirImagen('imagen_banner');
$imagen_quienes_somos = subirImagen('imagen_quienes_somos');

$sql = "UPDATE configuracionsitio SET ";

$params = [];
$types = '';

if (!empty($color_tema)) {
    $sql .= "color_tema = ?, ";
    array_push($params, $color_tema);
    $types .= 's';
}
if (!empty($mensaje_banner)) {
    $sql .= "mensaje_banner = ?, ";
    array_push($params, $mensaje_banner);
    $types .= 's';
}
if (!empty($informacion_quienes_somos)) {
    $sql .= "informacion_quienes_somos = ?, ";
    array_push($params, $informacion_quienes_somos);
    $types .= 's';
}
if (!empty($enlace_facebook)) {
    $sql .= "enlace_facebook = ?, ";
    array_push($params, $enlace_facebook);
    $types .= 's';
}
if (!empty($enlace_youtube)) {
    $sql .= "enlace_youtube = ?, ";
    array_push($params, $enlace_youtube);
    $types .= 's';
}
if (!empty($enlace_instagram)) {
    $sql .= "enlace_instagram = ?, ";
    array_push($params, $enlace_instagram);
    $types .= 's';
}
if (!empty($direccion)) {
    $sql .= "direccion = ?, ";
    array_push($params, $direccion);
    $types .= 's';
}
if (!empty($telefono)) {
    $sql .= "telefono = ?, ";
    array_push($params, $telefono);
    $types .= 's';
}
if (!empty($email)) {
    $sql .= "email = ?, ";
    array_push($params, $email);
    $types .= 's';
}

if ($icono_principal) {
    actualizarImagenEnBD($conection, 1, $icono_principal);
}
if ($icono_blanco) {
    actualizarImagenEnBD($conection, 2, $icono_blanco);
}
if ($imagen_banner) {
    actualizarImagenEnBD($conection, 3, $imagen_banner);
}
if ($imagen_quienes_somos) {
    actualizarImagenEnBD($conection, 4, $imagen_quienes_somos);
}

$sql = rtrim($sql, ', ');

$sql .= " WHERE id = 1";

$stmt = mysqli_prepare($conection, $sql);

if (!empty($types)) {
    mysqli_stmt_bind_param($stmt, $types, ...$params);
}

mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    header("Location: ../personalizar.php");
} else {
    echo "No se realizaron cambios.";
}

mysqli_stmt_close($stmt);
mysqli_close($conection);
