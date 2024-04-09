<?php

namespace controladores;

require_once 'dao/asignacion_dao.php';
require_once 'modelos/asignacion.php';
require_once 'funciones/json.php';

use dao\AsignacionDAO;
use modelos\Asignacion;
use funciones\Json;

class AsignacionControlador
{
    private $asignacionDao;

    public function __construct()
    {
        $this->asignacionDao = new AsignacionDAO();
    }

    public function all()
    {
        $asignaciones = $this->asignacionDao->getAll();

        Json::encode('ASIGNACIONES GET ALL OK', $asignaciones);
    }

    public function create()
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        $bus_id = $requestData['bus_id'];
        $ruta_id = $requestData['ruta_id'];
        $pasajero_id = $requestData['pasajero_id'];
        $hora_salida = $requestData['hora_salida'];
        $hora_llegada = $requestData['hora_llegada'];

        $new_asignacion_id = $this->asignacionDao->create($bus_id, $ruta_id, $pasajero_id, $hora_salida, $hora_llegada);

        Json::encode('ASIGNACION CREATE OK', ['id' => $new_asignacion_id]);
    }

    public function show($id)
    {
        $asignacion = $this->asignacionDao->getById($id);

        Json::encode(
            $asignacion ? 'ASIGNACION SHOW  OK' : 'ASIGNACION NOT FOUND',
            [$asignacion]
        );
    }

    public function update($id)
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        $bus_id = $requestData['bus_id'];
        $ruta_id = $requestData['ruta_id'];
        $pasajero_id = $requestData['pasajero_id'];
        $hora_salida = $requestData['hora_salida'];
        $hora_llegada = $requestData['hora_llegada'];

        $updated = $this->asignacionDao->update($id, $bus_id, $ruta_id, $pasajero_id, $hora_salida, $hora_llegada);

        Json::encode('ASIGNACION UPDATE OK', $updated);
    }

    public function delete($id)
    {
        $deleted = $this->asignacionDao->delete($id);

        Json::encode(
            $deleted ? 'ASIGNACION DELETE OK' : 'ASIGNACION NOT FOUND',
            null
        );
    }
}

?>
