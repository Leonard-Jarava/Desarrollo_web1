<?php

namespace dao;

require_once 'database/conexion.php';
require_once 'modelos/pasajero.php';

use database\Conexion;
use modelos\Pasajero;
use PDO;

class PasajeroDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = (new Conexion())->conectar();
    }

    public function create($identificacion, $nombre, $apellidos, $email, $telefono) {
        $sql = "INSERT INTO Pasajero (identificacion, nombre, apellidos, email, telefono) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$identificacion, $nombre, $apellidos, $email, $telefono]);
        return $this->pdo->lastInsertId();
    }

    public function getById($id) {
        $sql = "SELECT * FROM Pasajero WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $identificacion, $nombre, $apellidos, $email, $telefono) {
        $sql = "UPDATE Pasajero SET identificacion = ?, nombre = ?, apellidos = ?, email = ?, telefono = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$identificacion, $nombre, $apellidos, $email, $telefono, $id]);
        return $stmt->rowCount() > 0;
    }

    public function delete($id) {
        $sql = "DELETE FROM Pasajero WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }

    public function getAll() {
        $sql = "SELECT * FROM Pasajero";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
