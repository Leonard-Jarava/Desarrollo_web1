<?php

namespace dao;

require_once 'database/conexion.php';

use database\Conexion;
use PDO;

class RutaDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = (new Conexion())->conectar();
    }

    public function create($nombre, $origen, $destino, $distancia, $tipo_servicio) {
        $sql = "INSERT INTO Rutas (nombre, origen, destino, distancia, tipo_servicio) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nombre, $origen, $destino, $distancia, $tipo_servicio]);
        return $this->pdo->lastInsertId();
    }

    public function getById($id) {
        $sql = "SELECT * FROM Rutas WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $nombre, $origen, $destino, $distancia, $tipo_servicio) {
        $sql = "UPDATE Rutas SET nombre = ?, origen = ?, destino = ?, distancia = ?, tipo_servicio = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nombre, $origen, $destino, $distancia, $tipo_servicio, $id]);
        return $stmt->rowCount() > 0;
    }

    public function delete($id) {
        $sql = "DELETE FROM Rutas WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }

    public function getAll() {
        $sql = "SELECT * FROM Rutas";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
