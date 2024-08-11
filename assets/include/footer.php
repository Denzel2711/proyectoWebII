<footer class="bg-warning text-dark py-4">
    <div class="container">
        <div class="row text-center align-items-center">
            <div class="col-md-4">
                <h2>INFORMACIÓN</h2>
                <br>
                <p><strong>Dirección:</strong> <?php mostrarDireccion() ?></p>
                <p><strong>Teléfono:</strong> <?php mostrarTelefono() ?></p>
                <p><strong>Email:</strong> <?php mostrarEmail() ?></p>
            </div>
            <div class="col-md-4">
                <img src="<?php mostrarIconoPrincipal() ?>" alt="UTN Solutions Real Estate" class="mb-3" width="350" height="250px">
                <div class="social-icons">
                    <a href="<?php mostrarEnlaceFacebook() ?>" class="text-dark mx-2"><i class="bi bi-facebook" style="font-size: 2.5rem;"></i></a>
                    <a href="<?php mostrarEnlaceInstagram() ?>" class="text-dark mx-2"><i class="bi bi-instagram" style="font-size: 2.5rem;"></i></a>
                    <a href="<?php mostrarEnlaceYoutube() ?>" class="text-dark mx-2"><i class="bi bi-youtube" style="font-size: 2.5rem;"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <h3>CONTACTANOS </h3>
                <form class="custom-form" action="php/enviarCorreo.php" method="post">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono:</label>
                        <input type="tel" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="message">Mensaje:</label>
                        <textarea class="form-control" id="message" rows="2" name="message"></textarea>
                    </div>
                    <br>
                    <div class="form-group d-flex justify-content-center">
                        <div class="g-recaptcha" data-sitekey="6Le1oyIqAAAAAHzEtxwEfFE2bml6IFY7SdOe02MX"></div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>

            </div>
        </div>
    </div>
</footer>