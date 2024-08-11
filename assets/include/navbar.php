<?php
session_start();
include './php/conexion.php';
?>
<style>
    .nav-link {
        font-size: 15px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <h2>Luxury Real State</h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php if (isset($_SESSION['usuario'])) : ?>
                <?php $privilegio = $_SESSION['usuario']['privilegio']; ?>
                <ul class="navbar-nav ms-auto list">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#destacadas">DESTACADAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ventas">VENTAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#alquileres">ALQUILERES</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#footer">CONTACTENOS</a>
                    </li>

                    <?php if ($privilegio == 'administrador') : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./personalizar.php">PERSONALIZAR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./roles.php">ROLES</a>
                        </li>
                    <?php elseif ($privilegio == 'agente_de_ventas') : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./ventas.php">CREAR VENTA</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
                </form>
                <br>
                <form class="d-flex" style="margin-left:7px" method="post">
                    <button class="btn btn-outline-light" type="submit" name="redirect"><i class="bi bi-person"></i></button>
                </form>
            <?php else : ?>
                <ul class="navbar-nav ms-auto list">
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php">INICIAR SESIÓN</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['redirect'])) {
    header("Location: login.php");
    exit();
}
?>