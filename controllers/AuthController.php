<?php

require_once '../models/User.php';
session_start();

class AuthController
{
    public static function handleRequest()
    {
        $action = $_REQUEST['action'] ?? null;

        switch ($action) {
            case 'login':
                self::login();
                break;

            case 'logout':
                self::logout();
                break;

            case 'register': 
                self::register();
                break;

            default:
                // Acción no válida o no especificada
                header("Location: ../views/auth/login.php");
                exit();
        }
    }

    private static function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = trim($_POST['password']);

            $userModel = new User();
            $isLoggedIn = $userModel->login($email, $password);

            if ($isLoggedIn) {
                // Redirigir al usuario a su cuenta
                header("Location: ../views/users/account.php");
                exit();
            } else {
                // Redirigir al login con un mensaje de error
                header("Location: ../views/auth/login.php?error=1");
                exit();
            }
        }
    }

    private static function logout()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'logout') {
            session_unset();
            session_destroy();
            header("Location: ../views/auth/login.php");
            exit();
        }
    }

    private static function register() // Cambiamos a static
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener datos del formulario
            $name = trim($_POST['name']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = trim($_POST['password']);
            $role = $_POST['role'];

            // Validar campos vacíos
            if (empty($name) || empty($email) || empty($password) || empty($role)) {
                die("Por favor, completa todos los campos.");
            }

            // Registrar usuario
            $userModel = new User();
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role' => $role,
            ];

            if ($userModel->register($data)) {
                header("Location: ../views/auth/login.php");
                exit();
            } else {
                echo "Error al registrar usuario.";
            }
        }
    }
}

// Manejar la solicitud
AuthController::handleRequest();
