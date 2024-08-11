<?php include_once 'php/mostrar.php'; ?>

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
    <link rel="stylesheet" href="./style/personalizar.css">
</head>

<body>
    <?php include_once './assets/include/navbar.php'; ?>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="bg-dark custom-card">
                    <h2 class="text-center">Personalizar Sitio Web</h2>
                    <form action="php/logicaPersonalizar.php" method="POST" enctype="multipart/form-data" class="mt-4" id="personalizar">

                        <div class="mb-3">
                            <label for="color_tema" class="form-label">Color del Tema:</label>
                            <select class="form-select" name="color_tema" id="color_tema">
                                <option value="azul">Azul</option>
                                <option value="amarillo_y_gris">Amarillo y Gris</option>
                                <option value="blanco_y_gris">Blanco y Gris</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="icono_principal" class="form-label">Ícono Principal:</label>
                            <input type="file" class="form-control" name="icono_principal" id="icono_principal">
                        </div>

                        <div class="mb-3">
                            <label for="icono_blanco" class="form-label">Ícono Blanco:</label>
                            <input type="file" class="form-control" name="icono_blanco" id="icono_blanco">
                        </div>

                        <div class="mb-3">
                            <label for="imagen_banner" class="form-label">Imagen del Banner:</label>
                            <input type="file" class="form-control" name="imagen_banner" id="imagen_banner">
                        </div>

                        <div class="mb-3">
                            <label for="mensaje_banner" class="form-label">Mensaje del Banner:</label>
                            <input type="text" class="form-control" name="mensaje_banner" id="mensaje_banner">
                        </div>

                        <div class="mb-3">
                            <label for="informacion_quienes_somos" class="form-label">Información "Quienes Somos":</label>
                            <textarea class="form-control" name="informacion_quienes_somos" id="informacion_quienes_somos" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="imagen_quienes_somos" class="form-label">Imagen "Quienes Somos":</label>
                            <input type="file" class="form-control" name="imagen_quienes_somos" id="imagen_quienes_somos">
                        </div>

                        <div class="mb-3">
                            <label for="enlace_facebook" class="form-label">Enlace Facebook:</label>
                            <input type="text" class="form-control" name="enlace_facebook" id="enlace_facebook">
                        </div>

                        <div class="mb-3">
                            <label for="enlace_youtube" class="form-label">Enlace youtube:</label>
                            <input type="text" class="form-control" name="enlace_youtube" id="enlace_youtube">
                        </div>

                        <div class="mb-3">
                            <label for="enlace_instagram" class="form-label">Enlace Instagram:</label>
                            <input type="text" class="form-control" name="enlace_instagram" id="enlace_instagram">
                        </div>

                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion">
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-custom">Guardar Configuración</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>