<?php
session_start();
include("../config/conexion.php");

if (!isset($_SESSION["id"])) {
    header("Location: ../views/login.php");
    exit();
}

$id_usuario = $_SESSION["id"];

$conexion = (new conexion_db())->conectar();
$stmt = $conexion->prepare("SELECT nombre, apellidos, correo, celular, direccion, codigo_postal FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$stmt->bind_result($nombre, $apellidos, $correo, $celular, $direccion, $codigo_postal);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta - Sion Wireless</title>
    <link rel="shortcut icon" href="../public/img/LOGO/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../public/css/mi_cuenta.css"> 
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main class="main-content">
        <div class="user-container">
            <h2 class="text-center mb-4">Mi Cuenta</h2>
            <div class="user-data">
                <p><strong>Nombre:</strong> <?= htmlspecialchars($nombre) ?></p>
                <p><strong>Apellidos:</strong> <?= htmlspecialchars($apellidos) ?></p>
                <p><strong>Correo:</strong> <?= htmlspecialchars($correo) ?></p>
                <p><strong>Celular:</strong> <?= htmlspecialchars($celular) ?></p>
                <p><strong>Dirección:</strong> <?= htmlspecialchars($direccion) ?></p>
                <p><strong>Código Postal:</strong> <?= htmlspecialchars($codigo_postal) ?></p>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" onclick="document.getElementById('modalEditar').style.display='block'">
                    Editar datos
                </button>
                <button class="btn btn-secondary" onclick="history.back()">
                    Regresar
                </button>
                <a href="../app/controllers/cerrarSesion.php" class="btn-cerrar-sesion">Cerrar sesión</a>
            </div>
        </div>
    </main>

    <div id="modalEditar" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('modalEditar').style.display='none'">×</span>
            <h3>Editar información</h3>
            <form action="../app/controllers/actualizar_usuario.php" method="POST">
                <input type="hidden" name="id" value="<?= $id_usuario ?>">

                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required>

                <label>Apellidos:</label>
                <input type="text" name="apellidos" value="<?= htmlspecialchars($apellidos) ?>" required>

                <label>Correo:</label>
                <input type="email" name="correo" value="<?= htmlspecialchars($correo) ?>" required>

                <label>Celular:</label>
                <input type="text" name="celular" value="<?= htmlspecialchars($celular) ?>">

                <label>Dirección:</label>
                <input type="text" name="direccion" value="<?= htmlspecialchars($direccion) ?>">

                <label>Código postal:</label>
                <input type="text" name="codigo_postal" value="<?= htmlspecialchars($codigo_postal) ?>">

                <button class="btn btn-success" type="submit">Guardar cambios</button>
            </form>
        </div>
    </div>

    <script>
        window.onclick = function(event) {
            const modal = document.getElementById('modalEditar');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>