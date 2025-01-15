<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['id_user'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
    <p>Rol: <?php echo htmlspecialchars($_SESSION['role']); ?></p>
    <a href="../../controllers/AuthController.php?action=logout">Cerrar Sesión</a>
</body>
</html>
