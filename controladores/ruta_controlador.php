<?php

namespace controladores;

require_once 'dao/ruta_dao.php';
require_once 'modelos/ruta.php';
require_once 'funciones/Json.php';

use dao\RutaDAO;
use modelos\Ruta;
use funciones\Json;

class RutaControlador
{
    private $rutaDao;

    public function __construct()
    {
        $this->rutaDao = new RutaDAO();
    }

    public function all()
    {
        $rutas = $this->rutaDao->getAll();

        Json::encode('RUTAS GET ALL OK', $rutas);
    }

    public function create()
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        $nombre = $requestData['nombre'];
        $origen = $requestData['origen'];
        $destino = $requestData['destino'];
        $distancia = $requestData['distancia'];
        $tipo_servicio = $requestData['tipo_servicio'];

        $new_ruta_id = $this->rutaDao->create($nombre, $origen, $destino, $distancia, $tipo_servicio);

        Json::encode('RUTA CREATE OK', ['id' => $new_ruta_id]);
    }

    public function show($id)
    {
        $ruta = $this->rutaDao->getById($id);

        Json::encode(
            $ruta ? 'RUTA SHOW  OK' : 'RUTA NOT FOUND',
            [$ruta]
        );
    }

    public function update($id)
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        $nombre = $requestData['nombre'];
        $origen = $requestData['origen'];
        $destino = $requestData['destino'];
        $distancia = $requestData['distancia'];
        $tipo_servicio = $requestData['tipo_servicio'];

        $updated = $this->rutaDao->update($id, $nombre, $origen, $destino, $distancia, $tipo_servicio);


        Json::encode('RUTA UPDATE OK', $updated);
    }

    public function delete($id)
    {
        $deleted = $this->rutaDao->delete($id);
        Json::encode(
            $deleted ? 'RUTA DELETE OK' : 'RUTA NOT FOUND',
             null
        );
    }
}

