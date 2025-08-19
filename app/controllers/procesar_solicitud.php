<?php
session_start();

// Incluir la clase de conexión
include "../../config/conexion.php"; // Asegúrate de que la ruta sea correcta

// Instanciar la clase de conexión y obtener la conexión
$conexion_db = new conexion_db();
$conn = $conexion_db->conectar();

// Verificar si la conexión se estableció correctamente
if ($conn->connect_error) {
    die("Error: No se pudo establecer la conexión a la base de datos. " . $conn->connect_error);
}

// Verificar si el usuario está logueado
if (!isset($_SESSION['id'])) {
    header("Location: ../../views/servicios.php?error=Debes iniciar sesión para solicitar un servicio");
    exit();
}

// Verificar si se enviaron los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servicio_nombre = isset($_POST['servicio_nombre']) ? htmlspecialchars(trim($_POST['servicio_nombre'])) : '';
    $precio = isset($_POST['precio']) ? floatval(trim($_POST['precio'])) : 0.00;
    $fecha_servicio = isset($_POST['fecha_servicio']) ? $_POST['fecha_servicio'] : '';

    $usuario_id = $_SESSION['id'];

    // Validar datos
    if (empty($servicio_nombre) || $precio <= 0 || empty($fecha_servicio)) {
        header("Location: ../../views/servicios.php?error=Datos incompletos o fecha no seleccionada");
        exit();
    }

    // Insertar la solicitud en la base de datos
    $query = "INSERT INTO solicitudes_servicios (usuario_id, servicio_nombre, precio, fecha_solicitud, fecha_servicio, estado) 
              VALUES (?, ?, ?, NOW(), ?, 'pendiente')";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // "i"=int, "s"=string, "d"=decimal, "s"=string (fecha)
    $stmt->bind_param("isds", $usuario_id, $servicio_nombre, $precio, $fecha_servicio);

    if ($stmt->execute()) {
        header("Location: ../../views/servicios.php?success=Solicitud enviada con éxito, un técnico se comunicará con usted");
        exit();
    } else {
        header("Location: ../../views/servicios.php?error=Error al procesar la solicitud: " . $conn->error);
        exit();
    }

    $stmt->close();
    $conexion_db->cerrar(); // Cerrar la conexión usando el método de la clase
} else {
    header("Location: ../../views/servicios.php?error=Método no permitido");
    exit();
}
?>
