<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function() {
    // Capturar el evento cuando se abre el modal
    $('#deleteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Botón que activó el modal
      var productId = button.data('id'); // Extraer el ID del producto desde el atributo data-id

      // Guardar el ID del producto en el botón de confirmación
      var confirmButton = $(this).find('#confirmDelete');

      // Limpiar eventos previos
      confirmButton.off('click');

      // Añadir un evento de clic para confirmar la eliminación
      confirmButton.on('click', function () {
        // Redirigir a la URL de eliminación
        window.location.href = "<?= site_url('products/delete/'); ?>" + productId;
      });
    });
  });
</script>

</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Lista de Productos</h4>
            <a href="<?php echo site_url('products/create'); ?>" class="btn btn-success btn-sm float-right">Agregar Nuevo Producto</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['description']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td>
                            <a href="<?php echo site_url('products/edit/'.$product['id']); ?>" class="btn btn-warning btn-sm">Editar</a>
                            <!-- Dentro de un enlace para eliminar un producto -->
                            <!-- Botón que activa el modal -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="<?= $product['id']; ?>">
                            Eliminar
                        </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que deseas eliminar este producto? Esta acción no se puede deshacer.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">Eliminar</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
