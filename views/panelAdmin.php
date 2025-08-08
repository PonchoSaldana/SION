<?php
$conexion = new mysqli("localhost", "root", "", "sion_db");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Administración - Sion Wireless</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="../public/img/LOGO/favicon.png" type="image/x-icon">
  <style>
    body {
        background-color: #fff;
    }
    nav {
        background-color: #0d6efd;
        padding: 1rem;
    }
    .navbar-brand {
        color: white;
        font-weight: bold;
        font-size: 1.5rem;
    }
    .navbar-nav .nav-link {
        color: white;
        font-weight: 500;
    }
    h2, h3 {
        color: #343a40;
    }
    .card {
        margin-bottom: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out;
    }
    .card:hover {
        transform: scale(1.02);
    }
    .card h5 {
        font-weight: bold;
        color: #0d6efd;
    }
    .card p {
        margin-bottom: 5px;
    }
    .btn {
        font-weight: 500;
    }
    .modal-title {
        font-weight: bold;
    }
    .alert {
        max-width: 500px;
        margin: 0 auto;
    }
    @media (max-width: 360px) {
        .logo img {
            height: 60px;
        }
        .navbar-nav {
            font-size: 0.9rem;
        }
    }
    .modal {
        overflow-y: auto;
        z-index: 1055;
    }
    .modal-backdrop {
        z-index: 1050;
    }
    body.modal-open {
        overflow: hidden;
    }
    .modal-dialog {
        margin-top: 10vh;
    }
    .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
  </style>
</head>
<body>

<nav>
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <div class="logo-toggle">
      <span class="logo"><a href="../public/index.php"><img src="../public/img/LOGO/sin fondo.png" alt="Logo SION" height="90"></a></span>
    </div>
    <center><h2 style="color: white;">Panel de Administración</h2></center>
    
  </div>
</nav>

<?php if (isset($_GET['eliminado']) && $_GET['eliminado'] == 1): ?>
  <div class="alert alert-success text-center m-3">Producto eliminado con éxito.</div>
<?php endif; ?>

<div class="container mt-4">
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
      <div class="modal" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="addProductForm" enctype="multipart/form-data" method="POST" action="../model/guardarProducto.php">
              <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Agregar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3"><label class="form-label">Nombre</label><input type="text" class="form-control" name="nombre" required></div>
                <div class="mb-3"><label class="form-label">Descripción</label><input type="text" class="form-control" name="descripcion" required></div>
                <div class="mb-3"><label class="form-label">Precio</label><input type="number" step="0.01" class="form-control" name="precio" required></div>
                <div class="mb-3"><label class="form-label">Cantidad</label><input type="number" class="form-control" name="cantidad" required></div>
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
                <div class="mb-3"><input type="file" name="imagen" class="form-control" required></div>
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" name="oferta" id="oferta">
                  <label class="form-check-label" for="oferta">¿Este producto está en oferta?</label>
                </div>
              </div>
              <div class="modal-footer"><button type="submit" class="btn btn-primary">Guardar</button></div>
            </form>
          </div>
        </div>
      </div>

      <?php
      $resultado = $conexion->query("SELECT * FROM productos");
      if ($resultado->num_rows > 0): ?>
        <div class="row">
          <?php while ($producto = $resultado->fetch_assoc()): ?>
            <div class="col-md-4">
              <div class="card">
                <img src="../public/uploads/<?php echo $producto['imagen']; ?>" class="card-img-top" style="height:200px; object-fit:cover;">
                <div class="card-body">
                  <h5><?php echo $producto['nombre']; ?></h5>
                  <p><?php echo $producto['descripcion']; ?></p>
                  <p><strong>Precio:</strong> $<?php echo $producto['precio']; ?></p>
                  <p><strong>Cantidad:</strong> <?php echo $producto['cantidad']; ?></p>
                  <p><strong>Categoría:</strong> <?php echo $producto['categoria']; ?></p>
                  <p><strong>Oferta:</strong> <?php echo ($producto['oferta']) ? 'Sí' : 'No'; ?></p>
                  <div class="d-flex gap-2 mt-2">
                    <form action="../app/controllers/eliminar.php" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                      <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                      <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $producto['id']; ?>">Editar</button>
                  </div>
                </div>

                <!-- Modal editar -->
                <div class="modal" id="editModal<?php echo $producto['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $producto['id']; ?>" aria-hidden="true">
                  <div class="modal-dialog">
                    <form class="modal-content form-editar" method="POST" action="../app/controllers/editar_producto.php" enctype="multipart/form-data">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel<?php echo $producto['id']; ?>">Editar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                        <div class="mb-3"><label class="form-label">Nombre</label><input type="text" class="form-control" name="nombre" value="<?php echo $producto['nombre']; ?>" required></div>
                        <div class="mb-3"><label class="form-label">Descripción</label><input type="text" class="form-control" name="descripcion" value="<?php echo $producto['descripcion']; ?>" required></div>
                        <div class="mb-3"><label class="form-label">Precio</label><input type="number" class="form-control" name="precio" step="0.01" value="<?php echo $producto['precio']; ?>" required></div>
                        <div class="mb-3"><label class="form-label">Cantidad</label><input type="number" class="form-control" name="cantidad" value="<?php echo $producto['cantidad']; ?>" required></div>
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
                        <div class="form-check mb-3">
                          <input class="form-check-input" type="checkbox" name="oferta" id="oferta<?php echo $producto['id']; ?>" <?php echo ($producto['oferta']) ? 'checked' : ''; ?>>
                          <label class="form-check-label" for="oferta<?php echo $producto['id']; ?>">¿Este producto está en oferta?</label>
                        </div>
                        <div class="mb-3"><label class="form-label">Imagen (opcional)</label><input type="file" name="imagen" class="form-control"></div>
                      </div>
                      <div class="modal-footer"><button type="submit" class="btn btn-primary">Guardar Cambios</button></div>
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
    </div>

    <div class="tab-pane fade" id="orders">
      <h3>Pedidos</h3>
      <p>Aquí puedes gestionar los pedidos (funcionalidad pendiente).</p>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll('.form-editar').forEach(form => {
  form.addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(form);

    fetch('../app/controllers/editar_producto.php', {
      method: 'POST',
      body: formData
    })
    .then(resp => resp.text())
    .then(respuesta => {
      if (respuesta.includes("actualizado=1") || respuesta.trim() === "") {
        const modalElement = form.closest('.modal');
        const modal = bootstrap.Modal.getOrCreateInstance(modalElement);
        modal.hide();

        location.reload();
      } else {
        alert("Error al actualizar: " + respuesta);
      }
    })
    .catch(error => {
      console.error("Error al enviar el formulario:", error);
    });
  });
});
</script>

</body>
</html>