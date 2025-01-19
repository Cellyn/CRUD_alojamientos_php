<?php
session_start();

// Verificar si el usuario es un usuario estándar
if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'user') {
    header("Location: ../auth/login.php");
    exit();
}

require_once '../models/Accommodation.php';
$accommodationModel = new Accommodation();
$accommodations = $accommodationModel->getByUser($_SESSION['id_user'], 'user'); // Obtener los alojamientos para el usuario
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Panel de Usuario</h1>

        <h2>Alojamientos Reservados</h2>
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
                        <form action="../../controllers/AccommodationController.php?action=remove" method="POST">
                            <input type="hidden" name="accommodation_id" value="<?php echo $accommodation['id']; ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
e