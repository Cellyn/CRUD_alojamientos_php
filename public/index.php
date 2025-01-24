<?php
require_once '../controllers/AuthController.php';
require_once '../controllers/AccommodationController.php';

// Obtener la acción desde la URL
$action = $_GET['action'] ?? 'home'; // Acción predeterminada: 'home'
$controller = $_GET['controller'] ?? 'accommodation'; // Controlador predeterminado: 'accommodation'

// Rutas disponibles
/*switch ($controller) {
    case 'auth':
        switch ($action) {
            case 'login':
                AuthController::login();
                break;

            case 'logout':
                AuthController::logout();
                break;

            case 'register':
                AuthController::register();
                break;

            default:
                echo "Acción no válida para el controlador Auth.";
                break;
        }
        break;

    case 'accommodation':
        switch ($action) {
            case 'listAllAccommodations':
                AccommodationController::listAllAccommodations();
                break;

            case 'addAccommodation':
                AccommodationController::addAccommodationToUser();
                break;

            case 'removeAccommodation':
                AccommodationController::removeAccommodation();
                break;

            default:
                echo "Acción no válida para el controlador Accommodation.";
                break;
        }
        break;

    default:
        echo "Controlador no válido.";
        break;
}*/
