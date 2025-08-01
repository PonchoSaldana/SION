<!DOCTYPE html><html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Sion Wireless</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <?php if (isset($_GET['eliminado']) && $_GET['eliminado'] == 1): ?>
    <div class="alert alert-success text-center m-3">Producto eliminado con éxito.</div>
<?php endif; ?>
    <nav>
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sion Wireless - Admin</a>
            <div class="navbar-nav">
                <a class="nav-link" href="admin_login.html">Cerrar Sesión</a>
            </div>
        </div>
    </nav><div class="container mt-4">
    <h2>Panel de Administración</h2>
    <ul class="nav nav-tabs" id="adminTabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#products">Productos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#orders">Pedidos</a>
        </li>
    </ul>

    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="products">
            <h3>Gestión de Productos</h3>
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Agregar Producto</button>

<!-- Modal para agregar producto -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Agregar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="addProductForm" enctype="multipart/form-data" method="POST" action="guardarProducto.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" name="precio" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoría</label>
                        <select class="form-control" name="categoria" required>
                            <option value="Antenas">Antenas</option>
                            <option value="Cámaras">Cámaras</option>
                            <option value="Cables">Cables</option>
                            <option value="Conectores">Conectores</option>
                            <option value="Módems">Módems</option>
                            <option value="Switches">Switches</option>
                            <option value="Routers">Routers</option>
                        </select>
                    </div>
                    <div class="mb-3">
                       <input type="file" name="imagen" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$conexion = new mysqli("localhost", "root", "", "sion_db");

$resultado = $conexion->query("SELECT * FROM productos");

if ($resultado->num_rows > 0): ?>
    <div class="row">
        <?php while ($producto = $resultado->fetch_assoc()): ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo $producto['imagen']; ?>" class="card-img-top" style="height:200px; object-fit:cover; ">
                    <div class="card-body">
                        <h5><?php echo $producto['nombre']; ?></h5>
                        <p><?php echo $producto['descripcion']; ?></p>
                        <p><strong>Precio:</strong> $<?php echo $producto['precio']; ?></p>
                        <p><strong>Cantidad:</strong> <?php echo $producto['cantidad']; ?></p>
                        <p><strong>Categoría:</strong> <?php echo $producto['categoria']; ?></p>
                    </div>
                    <form action="eliminar.php" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
    <button type="submit" class="btn btn-danger btn-sm mt-2">Eliminar</button>
</form>

<!-- Botón para abrir modal para actualizar los datos de los productos-->
<button class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $producto['id']; ?>">Editar</button>

<!-- Modal para editar producto -->
<div class="modal fade" id="editModal<?php echo $producto['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $producto['id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" method="POST" action="editar_producto.php" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel<?php echo $producto['id']; ?>">Editar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input type="text" class="form-control" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Descripción</label>
          <input type="text" class="form-control" name="descripcion" value="<?php echo $producto['descripcion']; ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Precio</label>
          <input type="number" class="form-control" name="precio" step="0.01" value="<?php echo $producto['precio']; ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Cantidad</label>
          <input type="number" class="form-control" name="cantidad" value="<?php echo $producto['cantidad']; ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Categoría</label>
          <select class="form-control" name="categoria" required>
            <option value="Antenas" <?php if ($producto['categoria'] == 'Antenas') echo 'selected'; ?>>Antenas</option>
            <option value="Cámaras" <?php if ($producto['categoria'] == 'Cámaras') echo 'selected'; ?>>Cámaras</option>
            <option value="Cables" <?php if ($producto['categoria'] == 'Cables') echo 'selected'; ?>>Cables</option>
            <option value="Conectores" <?php if ($producto['categoria'] == 'Conectores') echo 'selected'; ?>>Conectores</option>
            <option value="Módems" <?php if ($producto['categoria'] == 'Módems') echo 'selected'; ?>>Módems</option>
            <option value="Switches" <?php if ($producto['categoria'] == 'Switches') echo 'selected'; ?>>Switches</option>
            <option value="Routers" <?php if ($producto['categoria'] == 'Routers') echo 'selected'; ?>>Routers</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Imagen (opcional)</label>
          <input type="file" name="imagen" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </form>
  </div>
</div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php else: ?>
    <p>No hay productos.</p>
<?php endif;

$conexion->close();
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>