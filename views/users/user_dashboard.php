<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include '../views/layouts/header.php'; ?>
    <div class="container mt-5 py-5">
        <h1 class="text-center mb-5">Bienvenido/a <?php echo htmlspecialchars($userName); ?></h1>
<div class="row">
<?php if (!empty($accommodations)): ?>
        <h2 class="mb-5">Mis Alojamientos Favoritos</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="align-middle">Imagen</th>
                        <th class="align-middle">Nombre</th>
                        <th class="align-middle">Ubicación</th>
                        <!-- En dispositivos pequeños ocultamos la descripción -->
                        <th class="align-middle d-none d-md-table-cell">Descripción</th>
                        <th class="align-middle">Precio</th>
                        <th class="align-middle">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($accommodations as $accommodation): ?>
                        <tr>
                            <td class="align-middle"><img src="<?php echo htmlspecialchars($accommodation['image_url']); ?>" width="100px" height="auto" alt="<?= htmlspecialchars($accommodation['name']) ?>"></td>
                            <td class="align-middle"><?php echo htmlspecialchars($accommodation['name']); ?></td>
                            <td class="align-middle"><?php echo htmlspecialchars($accommodation['location']); ?></td>
                            <td class="align-middle d-none d-md-table-cell"><?php echo htmlspecialchars($accommodation['description']); ?></td>
                            <td class="align-middle"><?php echo htmlspecialchars($accommodation['price']); ?></td>
                            <td class="align-middle">
                                <form action="../controllers/AccommodationController.php?action=remove" method="POST">
                                    <input type="hidden" name="accommodation_id" value="<?php echo $accommodation['id']; ?>">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
                <p class="text-center">No hay alojamientos favoritos.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php //include '../views/layouts/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>