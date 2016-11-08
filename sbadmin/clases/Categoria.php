<?php

class Categoria {
    private $id;
    private $nombre;
    
    function __construct($id=null, $nombre=null) {
        $this->id = $id;
        $this->nombre = $nombre;
    }
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    function set($datos, $inicio = 0) {
        $this->id = $datos[0 + $inicio];
        $this->nombre = $datos[1 + $inicio];
    }


}
