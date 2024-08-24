<!DOCTYPE html>
<html>
<head>
    <title>Agregar Producto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4><?php echo isset($product) ? 'Editar Producto' : 'Agregar Producto'; ?></h4>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url(isset($product) ? 'products/update/'.$product['id'] : 'products/store'); ?>" method="post">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" value="<?php echo isset($product) ? $product['name'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" name="description" required><?php echo isset($product) ? $product['description'] : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number" class="form-control" name="price" value="<?php echo isset($product) ? $product['price'] : ''; ?>" required>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="<?php echo site_url('products'); ?>" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
