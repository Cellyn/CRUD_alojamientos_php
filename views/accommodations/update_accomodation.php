<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alojamiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar Alojamiento</h1>
        <?php
        // Verifica si se ha pasado el alojamiento a través de la sesión
        if (isset($_SESSION['accommodation'])) {
            $accommodation = $_SESSION['accommodation'];
        } else {
            echo "<div class='alert alert-danger'>No se encontró el alojamiento a editar.</div>";
            exit();
        }
        ?>
        <form action="../../controllers/AccommodationController.php?action=update" method="POST" class="mt-4">
            <!-- Campo oculto para pasar el ID del alojamiento -->
            <input type="hidden" name="accommodation_id" value="<?= $accommodation['id'] ?>">

            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?= $accommodation['name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Ubicación:</label>
                <input type="text" id="location" name="location" class="form-control" value="<?= $accommodation['location'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción:</label>
                <textarea id="description" name="description" class="form-control" required><?= $accommodation['description'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio:</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" value="<?= $accommodation['price'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">URL de la Imagen:</label>
                <input type="url" id="image_url" name="image_url" class="form-control" value="<?= $accommodation['image_url'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
