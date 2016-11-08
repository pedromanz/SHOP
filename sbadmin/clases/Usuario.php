<?php
class Usuario {
    private $user, $pass, $email, $tipo, $activo;
    
    function __construct($user=null, $pass=null, $email=null, $tipo=null, $activo=null) {
        $this->user = $user;
        $this->pass = $pass;
        $this->email = $email;
        $this->tipo = $tipo;
        $this->activo = $activo;
    }
    function getUser() {
        return $this->user;
    }

    function getPass() {
        return $this->pass;
    }

    function getEmail() {
        return $this->email;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getActivo() {
        return $this->activo;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    public function set($objArray, $posinicial=0){
        $this->user = $objArray[0+$posinicial];
        $this->pass = $objArray[1+$posinicial];
        $this->email = $objArray[2+$posinicial];
        $this->tipo = $objArray[3+$posinicial];
        $this->activo = $objArray[4+$posinicial];
    }
    
    
    
}
