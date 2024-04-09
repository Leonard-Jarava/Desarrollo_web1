<?php

namespace modelos;

class Bus {
    private $id;
    private $placa;
    private $modelo;
    private $capacidad;
    private $color;
    private $tipo_combustible;

    public function __construct($id, $placa, $modelo, $capacidad, $color, $tipo_combustible) {
        $this->id = $id;
        $this->placa = $placa;
        $this->modelo = $modelo;
        $this->capacidad = $capacidad;
        $this->color = $color;
        $this->tipo_combustible = $tipo_combustible;
    }

    public function getId() {
        return $this->id;
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getCapacidad() {
        return $this->capacidad;
    }

    public function getColor() {
        return $this->color;
    }

    public function getTipoCombustible() {
        return $this->tipo_combustible;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setCapacidad($capacidad) {
        $this->capacidad = $capacidad;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function setTipoCombustible($tipo_combustible) {
        $this->tipo_combustible = $tipo_combustible;
    }
}
?>
