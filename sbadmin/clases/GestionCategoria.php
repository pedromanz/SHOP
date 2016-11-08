<?php

class GestionCategoria {

    private $bd = null;
    private $nombreTabla = "categoria";

    function __construct($bd) {
        $this->bd = $bd;
    }

    function count($condicion = "") {
        $sql = "select count(*) from ".$this->nombreTabla." $condicion";
        $this->bd->setConsulta($sql);
        $fila = $this->bd->getFila();
        return $fila[0];
    }

    function delete($id) {
        $sql = "delete from ".$this->nombreTabla." where id=$id ";
        $this->bd->setConsulta($sql);
        return $this->bd->getNumeroFilasAfectadas();
    }

    function exist($id) {
        $sql = "select count(*) from ".$this->nombreTabla." where id=$id ";
        $this->bd->setConsulta($sql);
        $fila = $this->bd->getFila();
        return $fila[0] > 0;
    }

    function get($id) {
        $sql = "select * from ".$this->nombreTabla." where id=$id ";
        $this->bd->setConsulta($sql);
        $fila = $this->bd->getFila();
        $categoria = new Categoria();
        $categoria->set($fila);
        return $categoria;
    }
    
    function getCategorias($pagina = 0, $rpp = 10, $condicion = "", $orderby = "order by id") {
        if (!is_numeric($pagina))
            $pagina = 0;
        $pos = $pagina * $rpp;
        $sql = "select * from "
                . $this->nombreTabla .
                " $condicion $orderby limit $pos, $rpp";
        $this->bd->setConsulta($sql);
        $respuesta = [];
        while ($fila = $this->bd->getFila()) {
            $obj = new Categoria();
            $obj->set($fila);
            $respuesta[] = $obj;
        }
        return $respuesta;
    }

    function insert(Categoria $categoria) {
        $sql = "insert into ".$this->nombreTabla." values(null,'".$categoria->getNombre()."')";
        $this->bd->setConsulta($sql);
        return $this->bd->getNumeroFilasAfectadas();
    }

    function set(Categoria $categoria, $idold) {
        $sql = "update ".$this->nombreTabla." set nombre='".$categoria->getNombre()."' where id=$idold ";
        $this->bd->setConsulta($sql);
        return $this->bd->getNumeroFilasAfectadas();
    }

    function select( $id="id",$campoclave = "idcategoria", $condicion = "") {
        echo "<select name=\"$campoclave\" id=\"$id\" class='form-control' >";
        echo "<option value=\"\">&nbsp;</option>";
        $sql = "select * from ".$this->nombreTabla." $condicion";
        $this->bd->setConsulta($sql);
        while ($fila = $this->bd->getFila()) {
            $categoria = new Categoria();
            $categoria->set($fila);
            if ($id != "" && $categoria->getId() == $id) {
                $selected = "selected=\"selected\"";
            }
            echo "<option value=\"" . $categoria->getId() . "\" "  . $selected . ">" .
            $categoria->getNombre() . " " .
            "</option>";
        }
        echo "</select>";
    }
}