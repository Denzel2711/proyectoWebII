<?php
include_once './php/mostrarAlquileres.php';
$totalPropiedades = mysqli_num_rows($resultado);
mysqli_data_seek($resultado, 0);
?>
<section class="featured-properties py-5" style="background-color: <?php mostrarColor1(); ?>; color: <?php mostrarColor2(); ?>;">
    <div class="container">
        <h2 class="text-center mb-5">PROPIEDADES EN ALQUILER</h2>
        <div class="row">
            <?php while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>
                <div class="col-md-4">
                    <div class="card" style="background-color: <?php mostrarColor1(); ?>;">
                        <img src="<?php echo $propiedad['imagen']; ?>" alt="<?php echo $propiedad['titulo']; ?>">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="color: <?php mostrarColor2(); ?>;"><?php echo $propiedad['titulo']; ?></h5>
                            <p class="card-text text-center" style="color: <?php mostrarColor2(); ?>;"><?php echo $propiedad['descripcion']; ?></p>
                            <p class="text-center" style="color: <?php mostrarColor3(); ?>;">Precio por mes: $<?php echo number_format($propiedad['precio']); ?></p>
                            <p class="text-center" style="color: <?php mostrarColor3(); ?>;">Creado por: <?php echo $propiedad['nombre_usuario']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php if ($totalPropiedades >= 3) : ?>
                <div class="d-flex justify-content-center mt-5">
                    <a href="./alquiler.php" class="btn" id="vermas" style="background-color: white; border-color: <?php mostrarColor1(); ?>; color: <?php mostrarColor1(); ?>;">
                        VER MÁS...
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>