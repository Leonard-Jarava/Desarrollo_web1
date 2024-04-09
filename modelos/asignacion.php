<?php

namespace modelos;

class Asignacion {
    private $id;
    private $bus_id;
    private $ruta_id;
    private $pasajero_id;
    private $hora_salida;
    private $hora_llegada;

    public function __construct($id, $bus_id, $ruta_id, $pasajero_id, $hora_salida, $hora_llegada) {
        $this->id = $id;
        $this->bus_id = $bus_id;
        $this->ruta_id = $ruta_id;
        $this->pasajero_id = $pasajero_id;
        $this->hora_salida = $hora_salida;
        $this->hora_llegada = $hora_llegada;
    }

    public function getId() {
        return $this->id;
    }

    public function getBusId() {
        return $this->bus_id;
    }

    public function getRutaId() {
        return $this->ruta_id;
    }

    public function getPasajeroId() {
        return $this->pasajero_id;
    }

    public function getHoraSalida() {
        return $this->hora_salida;
    }

    public function getHoraLlegada() {
        return $this->hora_llegada;
    }

    public function setBusId($bus_id) {
        $this->bus_id = $bus_id;
    }

    public function setRutaId($ruta_id) {
        $this->ruta_id = $ruta_id;
    }

    public function setPasajeroId($pasajero_id) {
        $this->pasajero_id = $pasajero_id;
    }

    public function setHoraSalida($hora_salida) {
        $this->hora_salida = $hora_salida;
    }

    public function setHoraLlegada($hora_llegada) {
        $this->hora_llegada = $hora_llegada;
    }
}

?>
