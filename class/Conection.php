<?php


class Conection
{

    //require_once "./class/Conection.php";
    //$db = Conection::connect();

    //metodo que nos conecte ala bd
    public static function connect()
    {
        try {
            $dsn = 'mysql:host=localhost;dbname=crud_alojamientos;charsey=utf8';
            $user = 'root';
            //creando la intancia de PDO
            $pdo = new PDO($dsn, $user, "");
            return $pdo;//retornar objeto
        } catch (PDOException $e) {
            echo "Error al conectarnos ala base de datos" . $e->getMessage();
            exit();
        }
    }
}
