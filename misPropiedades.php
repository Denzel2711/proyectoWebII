<?php
include_once './php/conexion.php';
include './php/session.php';
include './php/mostrar.php';

// Obtener el ID del usuario con la sesión iniciada
$usuario_id = isset($_SESSION['usuario']['id']) ? $_SESSION['usuario']['id'] : '';

$query = "SELECT propiedades.*, imagenes.direccion AS imagen_ruta 
          FROM propiedades 
          JOIN imagenes ON propiedades.imagen_id = imagenes.id 
          WHERE propiedades.agente_id = '$usuario_id'";

$resultado = mysqli_query($conection, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Propiedades</title>
    <link rel="stylesheet" href="./style/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./php/dynamic-styles.php">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <br>
    <div class="container">
        <h1 class="text-center mb-5">MIS PROPIEDADES</h1>
        <div class="row">
            <?php while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>
                <div class="col-md-4">
                    <div class="card bg-dark">
                        <img src="<?php echo $propiedad['imagen_ruta']; ?>" alt="<?php echo $propiedad['titulo']; ?>">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="color: <?php mostrarColor2(); ?>;"><?php echo $propiedad['titulo']; ?></h5>
                            <p class="card-text text-center" style="color: <?php mostrarColor2(); ?>;"><?php echo $propiedad['descripcion']; ?></p>
                            <p class="text-center" style="color: <?php mostrarColor3(); ?>;">Precio: $<?php echo number_format($propiedad['precio']); ?></p>
                            <div class="d-flex justify-content-center">
                                <a href="#" class="btn" id="vermas" style="border-color: <?php mostrarColor2(); ?>; color: <?php mostrarColor2(); ?>;" onmouseover="this.style.backgroundColor='<?php mostrarColor2(); ?>', this.style.color='<?php mostrarColor1(); ?>';" onmouseout="this.style.backgroundColor='transparent', this.style.color='<?php mostrarColor2(); ?>';">VER MÁS...</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>



        </div>
    </div>
</body>

</html>

<?php
mysqli_close($conection);
?>