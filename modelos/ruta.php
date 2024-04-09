<?php

namespace modelos;

class Ruta {
    private $id;
    private $nombre;
    private $origen;
    private $destino;
    private $distancia;
    private $tipo_servicio;

    public function __construct($id, $nombre, $origen, $destino, $distancia, $tipo_servicio) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->origen = $origen;
        $this->destino = $destino;
        $this->distancia = $distancia;
        $this->tipo_servicio = $tipo_servicio;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getOrigen() {
        return $this->origen;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function getDistancia() {
        return $this->distancia;
    }

    public function getTipoServicio() {
        return $this->tipo_servicio;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setOrigen($origen) {
        $this->origen = $origen;
    }

    public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function setDistancia($distancia) {
        $this->distancia = $distancia;
    }

    public function setTipoServicio($tipo_servicio) {
        $this->tipo_servicio = $tipo_servicio;
    }
}
