<?php

class GestionUsuario {
    private $nombreTabla = "usuario";
    private $bd = null;

    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }

    function count($condicion=""){
        $this->bd->setConsulta("select count(*) from ".$this->nombreTabla." $condicion");
        $fila = $this->bd->getFila();
        return $fila[0];
    }
    
    function get($user) {
        $this->bd->setConsulta("select * from ".$this->nombreTabla." where usuario='$user'");
        $fila = $this->bd->getFila();
        $obj = new Usuario();
        $obj->set($fila);
        return $obj;
    }
    
    function delete($email) {
        $sql = "delete from ".$this->nombreTabla." where email='$email'";
        $this->bd->setConsulta($sql);
        return $this->bd->getNumeroFilasAfectadas();
    }
    
    function set(Usuario $obj, $emailold) {
        $sql = "update ".$this->nombreTabla." set ".
                "usuario = '".$obj->getUser()."', ".
                //"password = '".$obj->getPass()."', ".
                "email = '".$obj->getEmail()."', ".
                "tipo = '".$obj->getTipo()."', ".
                "activo = '".$obj->getActivo()."' ".
                "where email='$emailold'";
        $this->bd->setConsulta($sql);
        return $this->bd->getNumeroFilasAfectadas();
    }
    
    function insert(Usuario $obj) {
        $sql = "insert into ".$this->nombreTabla." values(".
                "'".$obj->getUser()."', ".
                "'".$obj->getPass()."', ".
                "'".$obj->getEmail()."', ".
                "'".$obj->getTipo()."', ".
                "'".$obj->getActivo()."')";
        $this->bd->setConsulta($sql);
        return $this->bd->getNumeroFilasAfectadas();
    }
    
    function getUsuarios($condicion="", $orderby=""){
        $this->bd->setConsulta("select * from ".$this->nombreTabla." $condicion $orderby");
        $respuesta = [];
        while($fila = $this->bd->getFila()){
            $obj = new Usuario();
            $obj->set($fila);
            $respuesta[] = $obj;
        }
        return $respuesta;
    }
    
    function view($condicion="", $orderby=""){
        $this->bd->setConsulta("select * from ".$this->nombreTabla." $condicion $orderby");
        $respuesta = '<table class="table" border="1">
            <tr>
                <th>user</th>
                <th>password</th>
                <th>email</th>
                <th>tipo</th>
                <th>activo</th>
                <th>eliminar</th>
                <th>editar</th>
            </tr>';
        while($fila = $this->bd->getFila()){
            $obj = new Usuario();
            $obj->set($fila);
            $respuesta.=
            "<tr>
                <td>".$obj->getUser()."</td>
                <td>".$obj->getPass()."</td>
                <td>".$obj->getEmail()."</td>
                <td>".$obj->getTipo()."</td>
                <td>".$obj->getActivo()."</td>
                <td><a href=\"phpborrar.php?email=".$obj->getEmail()."\"><img src=\"../img/cubo.jpg\"/></a></td>    
                <td><a href=\"editar.php?user=".$obj->getUser()."\"><img src=\"../img/editar.jpg\"/></a></td>
            </tr>";
        }
        $respuesta .= "</table>";
        return $respuesta;
    }
    
    
    
    
    
    
    
    
    
    
    
}
