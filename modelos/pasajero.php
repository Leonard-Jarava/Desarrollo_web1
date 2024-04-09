<?php

namespace modelos;

class Pasajero {
    private $id;
    private $identificacion;
    private $nombre;
    private $apellidos;
    private $email;
    private $telefono;

    public function __construct($id, $identificacion, $nombre, $apellidos, $email, $telefono) {
        $this->id = $id;
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->telefono = $telefono;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdentificacion() {
        return $this->identificacion;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
}

?>
