<?php
//session_start();
$isLoggedIn = isset($_SESSION['id_user']); // Verifica si el usuario está autenticado
$userName = $isLoggedIn ? $_SESSION['user'] : ''; // Nombre del usuario si está logueado
$userRole = $isLoggedIn ? $_SESSION['role'] : ''; // Rol del usuario logueado
?>

<nav class="navbar navbar-expand-lg bg-primary fw-bold fixed-top" data-bs-theme="dark">
    <div class="container-fluid">
        <!-- Logo y nombre -->
        <a class="navbar-brand">Bienvenid@s</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Menú de navegación -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link link-light" href="../controllers/AccommodationController.php?action=index">Inicio</a>
                </li>
                <!-- Opciones dinámicas -->
                <?php if ($isLoggedIn): ?>
                    <!-- Usuario logueado -->
                    <li class="nav-item" dropdown>
                        <a class="nav-link dropdown-toggle link-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars($userName); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <?php if ($userRole == "user"): ?>
                                <li><a class="dropdown-item text-primary" href="../controllers/AccommodationController.php?action=list">Mi Cuenta</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            <?php endif; ?>
                            <li><a class="dropdown-item text-danger" href="../controllers/AuthController.php?action=logout">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <!-- Usuario no logueado -->
                    <li class="nav-item">
                        <a class="nav-link link-light" href="../views/auth/login.php">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="../views/auth/register.php">Registrarse</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>