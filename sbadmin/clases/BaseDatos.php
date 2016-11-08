<?php
class BaseDatos {
    private $conexion;
    private $resultado;
    function __construct() {
        $this->conexion = new mysqli(Constantes::$servidor, Constantes::$usuario, Constantes::$clave, Constantes::$baseDatos);
        $this->conexion->set_charset("utf8");
    }
    function closeConexion() {
        $this->conexion->close();
    }
    function getAutonumerico() {
        return $this->conexion->insert_id;
    }
    function getFila() {
        return $this->resultado->fetch_array();
    }
    function getNumeroFilasAfectadas() {
        return $this->conexion->affected_rows;
    }
    function getNumeroFilasConsulta() {
        return $this->resultado->num_rows;
    }
    function moverFila($n) {
        $this->resultado->data_seek($n);
    }
    function setConsulta($consulta) {
        return $this->resultado = $this->conexion->query($consulta);
    }
}