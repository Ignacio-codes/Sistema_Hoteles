<?php

// ------------------------
// PATRÓN SINGLETON
// ------------------------

class ConexionBD {
    private static $instancia = null;
    private $conexion;

    private $host = 'localhost';
    private $usuario = 'root';
    private $pass = '';
    private $bd = 'sistema_hoteles';
    private $puerto = '3306';

    private function __construct() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->pass, $this->bd, $this->puerto);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public static function obtenerInstancia() {
        if (self::$instancia === null) {
            self::$instancia = new ConexionBD();
        }
        return self::$instancia;
    }

    public function obtenerConexion() {
        return $this->conexion;
    }
}

// ------------------------