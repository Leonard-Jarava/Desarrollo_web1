<?php

namespace dao;

require_once 'database/conexion.php';
require_once 'modelos/asignacion.php';

use database\Conexion;
use PDO;

class AsignacionDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = (new Conexion())->conectar();
    }

    public function create($bus_id, $ruta_id, $pasajero_id, $hora_salida, $hora_llegada) {
        $sql = "INSERT INTO Asignacion (bus_id, ruta_id, pasajero_id, hora_salida, hora_llegada) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$bus_id, $ruta_id, $pasajero_id, $hora_salida, $hora_llegada]);
        return $this->pdo->lastInsertId();
    }

    public function getById($id) {
        $sql = "SELECT Asignacion.id AS asignacion_id, Asignacion.bus_id, Asignacion.ruta_id, Asignacion.pasajero_id, Asignacion.hora_salida, Asignacion.hora_llegada,
                       Buses.id AS bus_id, Buses.placa, Buses.modelo, Buses.capacidad, Buses.color, Buses.tipo_combustible,
                       Rutas.id AS ruta_id, Rutas.nombre AS ruta_nombre, Rutas.origen AS ruta_origen, Rutas.destino AS ruta_destino, Rutas.distancia AS ruta_distancia, Rutas.tipo_servicio AS ruta_tipo_servicio,
                       Pasajero.id AS pasajero_id, Pasajero.identificacion, Pasajero.nombre AS pasajero_nombre, Pasajero.apellidos, Pasajero.email, Pasajero.telefono
                FROM Asignacion
                INNER JOIN Buses ON Asignacion.bus_id = Buses.id
                INNER JOIN Rutas ON Asignacion.ruta_id = Rutas.id
                INNER JOIN Pasajero ON Asignacion.pasajero_id = Pasajero.id
                WHERE Asignacion.id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Organizar la salida en un array con la estructura solicitada
        $output = [
            'asignacion_id' => $result['asignacion_id'],
            'bus_id' => $result['bus_id'],
            'ruta_id' => $result['ruta_id'],
            'pasajero_id' => $result['pasajero_id'],
            'hora_salida' => $result['hora_salida'],
            'hora_llegada' => $result['hora_llegada'],
            'Buses' => [
                'bus_id' => $result['bus_id'],
                'placa' => $result['placa'],
                'modelo' => $result['modelo'],
                'capacidad' => $result['capacidad'],
                'color' => $result['color'],
                'tipo_combustible' => $result['tipo_combustible']
            ],
            'Rutas' => [
                'ruta_id' => $result['ruta_id'],
                'nombre' => $result['ruta_nombre'],
                'origen' => $result['ruta_origen'],
                'destino' => $result['ruta_destino'],
                'distancia' => $result['ruta_distancia'],
                'tipo_servicio' => $result['ruta_tipo_servicio']
            ],
            'Pasajero' => [
                'pasajero_id' => $result['pasajero_id'],
                'identificacion' => $result['identificacion'],
                'nombre' => $result['pasajero_nombre'],
                'apellidos' => $result['apellidos'],
                'email' => $result['email'],
                'telefono' => $result['telefono']
            ]
        ];
    
        return $output;
    }
    
    

    public function update($id, $bus_id, $ruta_id, $pasajero_id, $hora_salida, $hora_llegada) {
        $sql = "UPDATE Asignacion SET bus_id = ?, ruta_id = ?, pasajero_id = ?, hora_salida = ?, hora_llegada = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$bus_id, $ruta_id, $pasajero_id, $hora_salida, $hora_llegada, $id]);
        return $stmt->rowCount() > 0;
    }

    public function delete($id) {
        $sql = "DELETE FROM Asignacion WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }

    public function getAll() {
        $sql = "SELECT * FROM Asignacion";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
