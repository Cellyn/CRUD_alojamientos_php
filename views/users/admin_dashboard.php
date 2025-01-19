<?php
session_start();

// Verificar si el usuario es administrador
if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

require_once '../../models/Accommodation.php';
$accommodationModel = new Accommodation();
$accommodations = $accommodationModel->getAll(); // Obtener todos los alojamientos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Panel de Administración</h1>
        <div class="text-end mb-3">
            <a href="add_accommodation.php" class="btn btn-success">Agregar Alojamiento</a>
        </div>

        <h2>Alojamientos Disponibles</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accommodations as $accommodation): ?>
                <tr>
                    <td><?php echo htmlspecialchars($accommodation['id']); ?></td>
                    <td><?php echo htmlspecialchars($accommodation['name']); ?></td>
                    <td><?php echo htmlspecialchars($accommodation['location']); ?></td>
                    <td><?php echo htmlspecialchars($accommodation['description']); ?></td>
                    <td><?php echo htmlspecialchars($accommodation['price']); ?></td>
                    <td>
                        <a href="edit_accommodation.php?id=<?php echo $accommodation['id']; ?>" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
