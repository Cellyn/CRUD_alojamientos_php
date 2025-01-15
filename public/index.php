<?php
require_once '../controllers/AccommodationController.php';
require_once '../controllers/AuthController.php';

$authController = new AuthController();
$accommodationController = new AccommodationController();

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_GET['action'] === 'login') {
        $authController->login($_POST);
    } elseif ($_GET['action'] === 'register') {
        $authController->register($_POST);
    } elseif ($_GET['action'] === 'store') {
        $accommodationController->store($_POST);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($_GET['action'] === 'login') {
        $authController->showLogin();
    } elseif ($_GET['action'] === 'register') {
        $authController->showRegister();
    } elseif ($_GET['action'] === 'logout') {
        $authController->logout();
    } elseif ($_GET['action'] === 'create') {
        $accommodationController->create();
    } elseif ($_GET['action'] === 'edit') {
        $accommodationController->edit($_GET['id']);
    } elseif ($_GET['action'] === 'delete') {
        $accommodationController->delete($_GET['id']);
    } else {
        $accommodationController->index();
    }
}
