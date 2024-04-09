<?php

namespace database;

use PDO;
use PDOException;

class Conexion {
    private $host;
    private $dbname;
    private $usuario;
    private $contraseña;
    private $pdo;

    public function __construct() {
        $this->host = "localhost";
        $this->dbname = "buses";
        $this->usuario = "root";
        $this->contraseña = "";
    }

    public function conectar() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $this->pdo = new PDO($dsn, $this->usuario, $this->contraseña);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            exit;
        }
    }

    public function desconectar() {
        $this->pdo = null;
    }

    public function getPdo() {
        return $this->pdo;
    }
}

?>
