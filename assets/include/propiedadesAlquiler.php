<?php
include_once './php/mostrarAlquileres.php';
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
                            <p class="text-center" style="color: <?php mostrarColor3(); ?>;">Precio: $<?php echo number_format($propiedad['precio']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <div class="d-flex justify-content-center mt-5">
                <a href="./alquileres.php" class="btn" id="vermas" style="border-color: <?php mostrarColor2(); ?>; color: <?php mostrarColor2(); ?>;"
                    onmouseover="this.style.backgroundColor='<?php mostrarColor2(); ?>', this.style.color='<?php mostrarColor1(); ?>';"
                    onmouseout="this.style.backgroundColor='transparent', this.style.color='<?php mostrarColor2(); ?>';">VER MÁS...</a>
            </div>
        </div>
</section>