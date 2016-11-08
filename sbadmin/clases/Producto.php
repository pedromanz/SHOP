<?php

class Producto {
     private $id, $referencia, $nombre, $precio, $idcategoria;
     
     
     function __construct($id="null", $referencia="null", $nombre="null", $precio="null", $idcategoria="null") {
         $this->id = $id;
         $this->referencia = $referencia;
         $this->nombre = $nombre;
         $this->precio = $precio;
         $this->idcategoria = $idcategoria;
     }
     
     function getId() {
         return $this->id;
     }

     function getReferencia() {
         return $this->referencia;
     }

     function getNombre() {
         return $this->nombre;
     }

     function getPrecio() {
         return $this->precio;
     }

     function getIdcategoria() {
         return $this->idcategoria;
     }

     function setId($id) {
         $this->id = $id;
     }

     function setReferencia($referencia) {
         $this->referencia = $referencia;
     }

     function setNombre($nombre) {
         $this->nombre = $nombre;
     }

     function setPrecio($precio) {
         $this->precio = $precio;
     }

     function setIdcategoria($idcategoria) {
         $this->idcategoria = $idcategoria;
     }

     public function set($objArray, $posinicial=0){
        $this->id = $objArray[0+$posinicial];
        $this->referencia = $objArray[1+$posinicial];
        $this->nombre = $objArray[2+$posinicial];
        $this->precio = $objArray[3+$posinicial];
        $this->idcategoria = $objArray[4+$posinicial];
    }

}
