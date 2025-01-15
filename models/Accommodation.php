<?php
require_once '../config/Connection.php';

class Accommodation {
    private $connection;
    private $table = 'accommodations';

    public function __construct() {
        $this->connection = Connection::connect();
    }

    public function getAll() {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO $this->table (nombre, ubicacion, precio) VALUES (:nombre, :ubicacion, :precio)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':ubicacion', $data['ubicacion']);
        $stmt->bindParam(':precio', $data['precio']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $query = "UPDATE $this->table SET nombre = :nombre, ubicacion = :ubicacion, precio = :precio WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':ubicacion', $data['ubicacion']);
        $stmt->bindParam(':precio', $data['precio']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
