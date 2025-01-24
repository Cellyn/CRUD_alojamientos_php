<?php
require_once '../models/Accommodation.php';
session_start();

class AccommodationController
{
    public static function handleRequest()
    {
        $action = $_REQUEST['action'] ?? 'index';

        if (isset($_SESSION['id_user']) && isset($_SESSION['role'])) {
            //header("Location: ../controllers/AccommodationController.php?action=index");
            //(../controllers/AccommodationController.php?action=index)
            $userId = $_SESSION['id_user'];
            $role = $_SESSION['role'];
        }
        
        $accommodationModel = new Accommodation();

        switch ($action) {
            case 'index':
                self::listAllAccommodations($accommodationModel);
                break;

            case 'list':
                self::listAccommodationsUser($accommodationModel, $userId, $role);
                break;

            case 'add':
                self::addAccommodationToUser($accommodationModel, $userId, $role);
                break;

            case 'remove':
                self::removeAccommodationFromUser($accommodationModel, $userId, $role);
                break;

            case 'create':
                self::createAccommodation($accommodationModel, $role);
                break;

            default:
                header("Location: ../controllers/AccommodationController.php?action=index");
                exit();
        }
    }

    private static function listAllAccommodations($accommodationModel)
    {
        // Obtener todos los alojamientos
        $accommodations = $accommodationModel->getAll();

        // Incluir la vista para pasar datos
        include '../views/accommodations/index.php';
        exit();
    }

    private static function listAccommodationsUser($accommodationModel, $userId, $role)
    {
        if ($role == 'user') {
            $accommodations = $accommodationModel->getByUser($userId, $role);
            //$_SESSION['accommodations'] = $accommodations;
            include "../views/users/user_dashboard.php";
        } else {
            echo "No tienes permisos para ver alojamientos.";
        }
    }

    private static function addAccommodationToUser($accommodationModel, $userId, $role)
    {
        $accommodationId = $_POST['accommodation_id'] ?? null;

        if (!$accommodationId) {
            echo "ID de alojamiento no proporcionado.";
            return;
        }

        $data = [
            'userId' => $userId,
            'accommodationId' => $accommodationId,
            'role' => $role,
        ];

        if ($accommodationModel->addAccommodationToUser($data)) {
            echo "Alojamiento agregado exitosamente.";
            header("Location: ../controllers/AccommodationController.php?action=index");
        } else {
            echo "Error al agregar alojamiento.";
        }
    }

    private static function removeAccommodationFromUser($accommodationModel, $userId, $role)
    {
        $accommodationId = $_POST['accommodation_id'] ?? null;

        if (!$accommodationId) {
            echo "ID de alojamiento no proporcionado.";
            return;
        }

        $data = [
            'userId' => $userId,
            'accommodationId' => $accommodationId,
            'role' => $role,
        ];

        if ($accommodationModel->removeAccommodationFromUser($data)) {
            echo "Alojamiento eliminado exitosamente.";
            header("Location: ../controllers/AccommodationController.php?action=list");
        } else {
            echo "Error al eliminar alojamiento.";
        }
    }

    private static function createAccommodation($accommodationModel, $role)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($role != 'admin') {
                echo "No tienes permisos para agregar alojamientos.";
                return;
            }

            $data = [
                'name' => $_POST['name'] ?? '',
                'location' => $_POST['location'] ?? '',
                'description' => $_POST['description'] ?? '',
                'price' => $_POST['price'] ?? '',
                'image_url' => $_POST['image_url'] ?? '',
                'role' => $role,
            ];

            if (empty($data['name']) || empty($data['location']) || empty($data['description']) || empty($data['price']) || empty($data['image_url'])) {
                echo "Por favor, completa todos los campos.";
                return;
            }

            if ($accommodationModel->create($data)) {
                echo "Alojamiento creado exitosamente.";
                //header("Location: ../views/users/admin.php");
                header("Location: ./index.php");
            } else {
                echo "Error al crear el alojamiento.";
            }
        }
    }
}

// Manejar la solicitud
AccommodationController::handleRequest();
