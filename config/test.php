<?php

/*require_once "Connection.php";
$db = Connection::connect();
print_r($db);*/

require_once '../models/User.php';

$userModel = new User();
$users = $userModel->all();

if ($users) {
    echo "<pre>";
    print_r($users);
    echo "</pre>";
} else {
    echo "No se encontraron usuarios.";
}

echo "<hr>";
echo password_hash('12345', PASSWORD_BCRYPT);