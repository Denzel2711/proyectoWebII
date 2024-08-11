<?php
include_once 'php/mostrar.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Real Estate</title>
    <link rel="stylesheet" href="./style/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./php/dynamic-styles.php">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include_once './assets/include/navbarAdmin.php'; ?>
    <?php include_once './assets/include/heroSection.php'; ?>
    <?php include_once './assets/include/quienesSomos.php'; ?>
    <?php include_once './assets/include/propiedadesDestacadas.php'; ?>
    <?php include_once './assets/include/propiedadesVenta.php'; ?>
    <?php include_once './assets/include/propiedadesAlquiler.php'; ?>
    <?php include_once './assets/include/footer.php'; ?>
</body>

</html>