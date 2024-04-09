<?php

namespace controladores;

require_once 'dao/bus_dao.php';
require_once 'modelos/bus.php';
require_once 'funciones/json.php';

use dao\BusDAO;
use modelos\Bus;
use funciones\Json;

class BusControlador
{
    private $busDao;

    public function __construct()
    {
        $this->busDao = new BusDAO();
    }

    public function all()
    {
        $buses = $this->busDao->getAll();

        Json::encode('BUSES GET ALL OK', $buses);
    }

    public function create()
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        $placa = $requestData['placa'];
        $modelo = $requestData['modelo'];
        $capacidad = $requestData['capacidad'];
        $color = $requestData['color'];
        $tipo_combustible = $requestData['tipo_combustible'];

        $new_bus_id = $this->busDao->create($placa, $modelo, $capacidad, $color, $tipo_combustible);

        Json::encode('BUS CREATE OK', ['id' => $new_bus_id]);
    }

    public function show($id)
    {
        $bus = $this->busDao->getById($id);

        Json::encode(
            $bus ? 'BUS SHOW  OK' : 'BUS NOT FOUND',
            [$bus]
        );
    }

    public function update($id)
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        $placa = $requestData['placa'];
        $modelo = $requestData['modelo'];
        $capacidad = $requestData['capacidad'];
        $color = $requestData['color'];
        $tipo_combustible = $requestData['tipo_combustible'];

        $updated = $this->busDao->update($id, $placa, $modelo, $capacidad, $color, $tipo_combustible);


        Json::encode('BUS UPDATE OK', $updated);
    }

    public function delete($id)
    {
        $deleted = $this->busDao->delete($id);
        Json::encode(
            $deleted ? 'BUS DELETE OK' : 'BUS NOT FOUND',
             null
        );
    }
}
