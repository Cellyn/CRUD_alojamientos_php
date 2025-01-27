<?php

/*require_once "Connection.php";
$db = Connection::connect();
print_r($db);*/

require_once '../models/User.php';
require_once '../models/Accommodation.php';

/*$userModel = new User();
$users = $userModel->all();

if ($users) {
    echo "<pre>";
    print_r($users);
    echo "</pre>";
} else {
    echo "No se encontraron usuarios.";
} */

//encriptar contraseña
echo "<hr>";
echo password_hash('12345', PASSWORD_BCRYPT); 

/*$accommodationModel = new Accommodation();
$accommodation = $accommodationModel->getAll();

if ($accommodation) {
    echo "<pre>";
    print_r($accommodation);
    echo "</pre>";
} else {
    echo "No se encontraron alojamientos.";
}
*/