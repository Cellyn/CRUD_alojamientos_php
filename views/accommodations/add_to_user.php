<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Alojamiento a Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Agregar Alojamiento a Usuario</h1>
        <form action="../../controllers/AccommodationController.php?action=add" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="accommodation_id" class="form-label">ID del Alojamiento:</label>
                <input type="number" id="accommodation_id" name="accommodation_id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Agregar Alojamiento</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
