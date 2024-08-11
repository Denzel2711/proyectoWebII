<?php
require_once './php/conexion.php';
require_once './php/crudRoles.php';
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
</head>

<style>
    #section-principal {
        padding: 30px;
    }

    h1 {
        color: #343a40;
        margin-bottom: 30px;
        font-weight: 700;
    }

    .table-container {
        margin: 0 auto;
        max-width: 1200px;
        overflow-x: auto;
    }

    .table {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.6);
    }

    .table th {
        background-color: #343a40;
        color: #ffffff;
    }

    .table th,
    .table td {
        padding: 15px;
        text-align: center;
    }

    .btn-delete {
        background-color: #dc3545;
        color: #ffffff;
        border: none;
        padding: 6px 12px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }
</style>

<body>
    <?php include_once './assets/include/navbar.php'; ?>
    <section id="section-principal">
        <h1 class="text-center">Usuarios Registrados</h1>
        <?php if (mysqli_num_rows($resultUsuarios) > 0) : ?>
            <div class="table-container">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">IdUsuario</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Telefono</th>
                            <th class="text-center">Correo</th>
                            <th class="text-center">Usuario</th>
                            <th class="text-center">Rol</th>
                            <th class="text-center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($resultUsuarios)) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($row['telefono']); ?></td>
                                <td><?php echo htmlspecialchars($row['correo']); ?></td>
                                <td><?php echo htmlspecialchars($row['usuario']); ?></td>
                                <td>
                                    <form action="./php/crudRoles.php" method="POST" class="d-inline">
                                        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                        <select class="form-select" name="role_id" onchange="this.form.submit()">
                                            <option value="administrador" <?php echo $row['privilegio'] == 'administrador' ? 'selected' : ''; ?>>Administrador</option>
                                            <option value="agente_de_ventas" <?php echo $row['privilegio'] == 'agente_de_ventas' ? 'selected' : ''; ?>>Ventas</option>
                                            <option value="agente_de_ventas" <?php echo $row['privilegio'] == 'publico' ? 'selected' : ''; ?>>Publico</option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <form action="./php/crudRoles.php" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                                        <input type="hidden" name="delete_user_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                        <button type="submit" class="btn-delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <p class="text-center">No se encontraron usuarios.</p>
        <?php endif; ?>
    </section>
</body>

</html>