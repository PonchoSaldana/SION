<?php
include("conexion.php");

if (!isset($_GET["id"])) {
    echo "Producto no especificado.";
    exit();
}

$id = $_GET["id"];

$db = new conexion_db();
$conexion = $db->conectar();

$stmt = $conexion->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($producto = $resultado->fetch_assoc()):
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($producto["nombre"]); ?> - Detalles</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="detalle-producto">
        <img src="uploads/<?php echo htmlspecialchars($producto["imagen"]); ?>" alt="<?php echo htmlspecialchars($producto["nombre"]); ?>" style="width:300px; height:auto;">
        
        <div class="info">
            <h1><?php echo htmlspecialchars($producto["nombre"]); ?></h1>
            <p><strong>Descripción:</strong> <?php echo htmlspecialchars($producto["descripcion"]); ?></p>
            <p><strong>Precio:</strong> $<?php echo number_format($producto["precio"], 2); ?></p>
            <p><strong>Stock:</strong> <?php echo htmlspecialchars($producto["cantidad"]); ?></p>
            <p><strong>Categoría:</strong> <?php echo htmlspecialchars($producto["categoria"]); ?></p>

            <form action="agregar_carrito.php" method="POST">
                <input type="hidden" name="id_producto" value="<?php echo $producto['id']; ?>">
                <button type="submit">🛒 Agregar al carrito</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
else:
    echo "Producto no encontrado.";
endif;

$stmt->close();
$db->cerrar();
?>