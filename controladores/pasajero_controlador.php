<?php

namespace controladores;

require_once 'dao/pasajero_dao.php';
require_once 'modelos/pasajero.php';
require_once 'funciones/json.php';

use dao\PasajeroDAO;
use modelos\Pasajero;
use funciones\Json;

class PasajeroControlador
{
    private $pasajeroDao;

    public function __construct()
    {
        $this->pasajeroDao = new PasajeroDAO();
    }

    public function all()
    {
        $pasajeros = $this->pasajeroDao->getAll();

        Json::encode('PASAJEROS GET ALL OK', $pasajeros);
    }

    public function create()
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        $identificacion = $requestData['identificacion'];
        $nombre = $requestData['nombre'];
        $apellidos = $requestData['apellidos'];
        $email = $requestData['email'];
        $telefono = $requestData['telefono'];

        $new_pasajero_id = $this->pasajeroDao->create($identificacion, $nombre, $apellidos, $email, $telefono);

        Json::encode('PASAJERO CREATE OK', ['id' => $new_pasajero_id]);
    }

    public function show($id)
    {
        $pasajero = $this->pasajeroDao->getById($id);

        Json::encode(
            $pasajero ? 'PASAJERO SHOW  OK' : 'PASAJERO NOT FOUND',
            [$pasajero]
        );
    }

    public function update($id)
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        $identificacion = $requestData['identificacion'];
        $nombre = $requestData['nombre'];
        $apellidos = $requestData['apellidos'];
        $email = $requestData['email'];
        $telefono = $requestData['telefono'];

        $updated = $this->pasajeroDao->update($id, $identificacion, $nombre, $apellidos, $email, $telefono);

        Json::encode('PASAJERO UPDATE OK', $updated);
    }

    public function delete($id)
    {
        $deleted = $this->pasajeroDao->delete($id);

        Json::encode(
            $deleted ? 'PASAJERO DELETE OK' : 'PASAJERO NOT FOUND',
            null
        );
    }
}

?>
