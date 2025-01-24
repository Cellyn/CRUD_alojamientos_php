<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Alojamiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px;">
            <h2 class="text-center mb-4">Agregar Nuevo Alojamiento</h2>
            <form action="../../controllers/AccommodationController.php?action=create" method="POST" class="mt-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Ubicación:</label>
                    <input type="text" id="location" name="location" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <textarea id="description" name="description" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Precio:</label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="image_url" class="form-label">URL de la Imagen:</label>
                    <input type="url" id="image_url" name="image_url" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Agregar Alojamiento</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>