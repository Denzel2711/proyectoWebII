<?php
include_once 'php/conexion.php';
include_once 'php/mostrar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/login.css?202406=<?php echo (rand()); ?>">
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form action="php/logicaLogin.php" method="post">
                <label for="chk" aria-hidden="true">Iniciar</label>
                <input type="email" name="correo" placeholder="Correo electrónico" required="">
                <input type="password" name="contrasena" placeholder="Contraseña" required="">
                <button type="submit" name="login">Iniciar Sesión</button>
            </form>
            <div style="text-align: center; padding-top:20px;">
                <img style="border-radius: 10px;" src="<?php mostrarIconoPrincipal() ?>" alt="" width="130" height="110px">
            </div>
        </div>


        <div class="login">
            <form action="php/logicaRegistro.php" method="post">
                <label for="chk" aria-hidden="true">Registrarse</label>
                <input type="text" name="nombre" placeholder="Nombre" required="">
                <input type="text" name="telefono" placeholder="Teléfono" required="">
                <input type="text" name="usuario" placeholder="Usuario" required="">
                <input type="email" name="correo" placeholder="Correo electrónico" required="">
                <input type="password" name="contrasena" placeholder="Contraseña" required="">
                <button type="submit" name="submit">Enviar</button>
            </form>
        </div>

    </div>

</body>

</html>