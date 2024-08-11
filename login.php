<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/login.css">
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form action="php/logicaRegistro.php" method="post">
                <label for="chk" aria-hidden="true">Registrarse</label>
                <input type="text" name="nombre" placeholder="Nombre" required="">
                <input type="text" name="telefono" placeholder="Teléfono" required="">
                <input type="text" name="usuario" placeholder="Usuario" required="">
                <input type="email" name="correo" placeholder="Correo" required="">
                <input type="password" name="contrasena" placeholder="Contraseña" required="">
                <button type="submit" name="submit">Enviar</button>
            </form>
        </div>


        <div class="login">
            <form action="php/logicaLogin.php" method="post">
                <label for="chk" aria-hidden="true">Iniciar</label>
                <input type="email" name="correo" placeholder="Email" required="">
                <input type="password" name="contrasena" placeholder="Password" required="">
                <button type="submit" name="login">Iniciar Sesión</button>
            </form>
        </div>

    </div>

</body>

</html>