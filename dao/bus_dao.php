<?php

namespace dao;

require_once 'database/conexion.php';

use database\Conexion;
use PDO;

class BusDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = (new Conexion())->conectar();
    }

    public function create($placa, $modelo, $capacidad, $color, $tipo_combustible) {
        $sql = "INSERT INTO Buses (placa, modelo, capacidad, color, tipo_combustible) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$placa, $modelo, $capacidad, $color, $tipo_combustible]);
        return $this->pdo->lastInsertId();
    }

    public function getById($id) {
        $sql = "SELECT Buses.id AS id_bus, Buses.placa, Buses.modelo, Buses.capacidad, Buses.color, Buses.tipo_combustible,
                       Asignacion.id AS asignacion_id, Asignacion.ruta_id, Asignacion.pasajero_id, Asignacion.hora_salida, Asignacion.hora_llegada
                FROM Buses
                LEFT JOIN Asignacion ON Buses.id = Asignacion.bus_id
                WHERE Buses.id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Organizar la salida en un array con la estructura solicitada
        $output = [
            'id_bus' => $result[0]['id_bus'],
            'placa' => $result[0]['placa'],
            'modelo' => $result[0]['modelo'],
            'capacidad' => $result[0]['capacidad'],
            'color' => $result[0]['color'],
            'tipo_combustible' => $result[0]['tipo_combustible'],
            'asignaciones' => []
        ];
    
        foreach ($result as $row) {
            if ($row['asignacion_id'] !== null) {
                $output['asignaciones'][] = [
                    'asignacion_id' => $row['asignacion_id'],
                    'ruta_id' => $row['ruta_id'],
                    'pasajero_id' => $row['pasajero_id'],
                    'hora_salida' => $row['hora_salida'],
                    'hora_llegada' => $row['hora_llegada']
                ];
            }
        }
    
        return $output;
    }
    

    public function update($id, $placa, $modelo, $capacidad, $color, $tipo_combustible) {
        $sql = "UPDATE Buses SET placa = ?, modelo = ?, capacidad = ?, color = ?, tipo_combustible = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$placa, $modelo, $capacidad, $color, $tipo_combustible, $id]);
        return $stmt->rowCount() > 0;
    }

    public function delete($id) {
        $sql = "DELETE FROM Buses WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }

    public function getAll() {
        $sql = "SELECT * FROM Buses";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
