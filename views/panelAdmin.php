<?php
$conexion = new mysqli("localhost", "root", "", "sion_db");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

session_start();
include("../config/sesion.php"); // Asegúrate de que este archivo contenga la verificación del rol

// Verificar si el usuario es administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../index.php?error=Acceso denegado");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../public/css/panelAdmin.css">
  <title>Sion Wireless - Panel del admin</title>
  <!-- ICONOS DE Boxicons -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <!--BOTON DE Boxicons----------------------------------------------------------->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="../public/img/LOGO/favicon.png" type="image/x-icon">
</head>

<body>

  <nav>
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <div class="logo-toggle">
        <span class="logo"><a href="../index.php"><img src="../public/img/LOGO/sin fondo.png" alt="Logo SION" height="90"></a></span>
      </div>
      <center>
        <h2 style="color: white;">Panel de Administración</h2>
      </center>
    </div>
  </nav><br><br><br>

  <?php if (isset($_GET['eliminado']) && $_GET['eliminado'] == 1): ?>
    <div class="alert alert-success text-center m-3">Producto eliminado con éxito.</div>
  <?php endif; ?>

  <header><br><br>
    <div class="alert alert-info text-center m-3">Bienvenido al panel de administración. Aquí puedes gestionar productos, servicios y pedidos.</div>
  <div class="container mt-4">
    <ul class="nav nav-tabs" id="adminTabs">
      <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#products">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#orders">Pedidos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#services">Servicios</a>
      </li>
    </ul>

    <div class="tab-content mt-3">
      <div class="tab-pane fade show active" id="products">
        <div class="xd">Gestión de Productos</div>
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Agregar Producto</button>

        <!-- Modal para agregar producto (sin cambios) -->
        <div class="modal" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form id="addProductForm" enctype="multipart/form-data" method="POST" action="../model/guardarProducto.php">
                <div class="modal-header">
                  <h5 class="modal-title" id="addProductModalLabel">Agregar Producto</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div><div class="alert alert-warning text-center m-3">Recuerda que cualquier cambio que realices aquí afectará directamente a la tienda.</div>
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
                    <p><strong>Oferta:</strong> <?php echo (isset($producto['oferta']) && $producto['oferta']) ? 'Sí' : 'No'; ?></p>
                    <div class="d-flex gap-2 mt-2">
                      <form id="eliminarForm<?php echo $producto['id']; ?>" action="../app/controllers/eliminar.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal<?php echo $producto['id']; ?>">Eliminar</button>
                      </form>
                      <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $producto['id']; ?>">Editar</button>
                      <input class="form-check-input" type="checkbox" name="oferta" id="oferta<?php echo $producto['id']; ?>" <?php echo (isset($producto['oferta']) && ($producto['oferta'] == 1 || $producto['oferta'] === '1')) ? 'checked' : ''; ?> disabled>
                    </div>
                  </div>

                  <!-- Modal de confirmación de eliminación (sin cambios) -->
                  <div class="modal fade" id="confirmDeleteModal<?php echo $producto['id']; ?>" tabindex="-1" aria-labelledby="confirmDeleteLabel<?php echo $producto['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="confirmDeleteLabel<?php echo $producto['id']; ?>">Confirmar eliminación</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                          ¿Estás seguro de que deseas eliminar este producto?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-danger" form="eliminarForm<?php echo $producto['id']; ?>">Confirmar</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal editar (sin cambios) -->
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
                            <input class="form-check-input" type="checkbox" name="oferta" id="oferta<?php echo $producto['id']; ?>" <?php echo (isset($producto['oferta']) && ($producto['oferta'] == 1 || $producto['oferta'] === '1')) ? 'checked' : ''; ?>>
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
        <?php endif; ?>
      </div>

      <div class="tab-pane fade" id="orders">
       <div class="tab-pane fade" id="orders">
    <?php
session_start();
$conexion = new mysqli("localhost", "root", "", "sion_db");

if ($_SESSION['rol'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

$query = "SELECT p.*, u.nombre AS usuario 
          FROM pedidos p
          INNER JOIN usuarios u ON p.usuario_id = u.id
          ORDER BY p.fecha_pedido DESC";
$result = $conexion->query($query);
?>

<h2>Pedidos de Usuarios</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID Pedido</th>
        <th>Usuario</th>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Estado</th>
        <th>Fecha</th>
        <th>Acciones</th>
    </tr>
    <?php while($pedido = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $pedido['id'] ?></td>
        <td><?= htmlspecialchars($pedido['usuario']) ?></td>
        <td><?= htmlspecialchars($pedido['producto_nombre']) ?></td>
        <td><?= $pedido['cantidad'] ?></td>
        <td>$<?= number_format($pedido['precio'] * $pedido['cantidad'], 2) ?></td>
        <td><?= $pedido['estado'] ?></td>
        <td><?= $pedido['fecha_pedido'] ?></td>
        <td>
            <a href="cambiar_estado.php?id=<?= $pedido['id'] ?>&estado=aprobado">Aprobar</a> |
            <a href="cambiar_estado.php?id=<?= $pedido['id'] ?>&estado=cancelado">Cancelar</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

      <div class="tab-pane fade" id="services">
        <div class="xd">Gestión de Servicios</div>
        <?php
        // Consulta para obtener las solicitudes de servicios con teléfono y dirección
        $query = "SELECT ss.id, ss.servicio_nombre, ss.precio, ss.fecha_solicitud, 
                         u.nombre, u.apellidos, u.celular, u.direccion, 
                         CONCAT(u.nombre, ' ', u.apellidos) AS nombre_completo 
                  FROM solicitudes_servicios ss 
                  JOIN usuarios u ON ss.usuario_id = u.id 
                  ORDER BY ss.fecha_solicitud DESC";
        $result = $conexion->query($query);

        if ($result->num_rows > 0): ?>
          <table class="table table-striped mt-3">
            <thead>
              <tr>
                <th>ID</th>
                <th>Servicio</th>
                <th>Precio</th>
                <th>Usuario</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Fecha</th>
                <th>Completado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($solicitud = $result->fetch_assoc()): ?>
                <tr>
                  <td><?php echo $solicitud['id']; ?></td>
                  <td><?php echo htmlspecialchars($solicitud['servicio_nombre']); ?></td>
                  <td>$<?php echo number_format($solicitud['precio'], 2); ?></td>
                  <td><?php echo htmlspecialchars($solicitud['nombre_completo']); ?></td>
                  <td><?php echo htmlspecialchars($solicitud['celular']); ?></td>
                  <td><?php echo htmlspecialchars($solicitud['direccion']); ?></td>
                  <td><?php echo $solicitud['fecha_solicitud']; ?></td>
                  <td>
                      <input type="hidden" name="solicitud_id" value="<?php echo $solicitud['id']; ?>">
                      <input type="checkbox" name="completado" onchange="this.form.submit()" 
                             <?php echo !empty($solicitud['completado']) && $solicitud['completado'] == 1 ? 'checked' : ''; ?>>
                  </td>
                  <td>
                    <!-- Acciones adicionales si las necesitas -->
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        <?php else: ?>
          <p>No hay solicitudes de servicios.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <br><br><br><br><br><br><br>
  <footer class="main-footer">
    <div class="footer-section footer-logo">
      <img src="../public/img/LOGO/sin fondo.png" alt="Logo SION">
      <p>© 2025 SION System Wireless. <br>Todos los derechos reservados.</p>
    </div>
    <div class="footer-section">
      <h4>Contacto</h4>
      <ul>
        <li><a href="mailto:correo@ejemplo.com">SION@gmail.com</a></li>
        <li><a href="tel:+525555555555">55-5555-5555</a></li>
        <li><a href="https://maps.google.com/?q=ubicacion_de_la_tienda" target="_blank">Tienda Física</a></li>
      </ul>
    </div>
    <div class="footer-section">
      <h4>Empresa</h4>
      <ul>
        <li><a href="#">Política de privacidad</a></li>
        <li><a href="#">Términos y condiciones</a></li>
        <li><a href="#">Promoción y ofertas</a></li>
      </ul>
    </div>
  </footer>
  </header>

  <!-- Modal de éxito para edición (sin cambios) -->
  <div class="modal fade" id="successEditModal" tabindex="-1" aria-labelledby="successEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="successEditLabel">Éxito</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          Los datos del producto se han actualizado correctamente.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="acceptSuccessEdit" data-bs-dismiss="modal">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de error para edición (sin cambios) -->
  <div class="modal fade" id="errorEditModal" tabindex="-1" aria-labelledby="errorEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="errorEditLabel">Error</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body" id="errorMessage">
          Ha ocurrido un error al actualizar los datos.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.querySelectorAll('.form-editar').forEach(form => {
      form.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(form);
        const modalElement = form.closest('.modal');
        const successModal = new bootstrap.Modal(document.getElementById('successEditModal'));
        const errorModal = new bootstrap.Modal(document.getElementById('errorEditModal'));

        fetch('../app/controllers/editar_producto.php', {
            method: 'POST',
            body: formData
          })
          .then(resp => resp.text())
          .then(respuesta => {
            if (respuesta.includes("actualizado=1") || respuesta.trim() === "") {
              const modal = bootstrap.Modal.getInstance(modalElement);
              modal.hide();
              successModal.show();
              document.getElementById('acceptSuccessEdit').addEventListener('click', () => {
                location.reload();
              }, { once: true });
            } else {
              document.getElementById('errorMessage').textContent = "Error al actualizar: " + respuesta;
              errorModal.show();
            }
          })
          .catch(error => {
            document.getElementById('errorMessage').textContent = "Error al enviar el formulario: " + error.message;
            errorModal.show();
          });
      });
    });
  </script>

</body>

</html>
<?php $conexion->close(); ?>