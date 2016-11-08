<?php

class GestionProducto {

    private $bd = null;
    private $nombreTabla = "producto";

    function __construct($bd) {
        $this->bd = $bd;
    }

    function count($condicion = "") {
        $sql = "select count(*) from " . $this->nombreTabla . " $condicion";
        $this->bd->setConsulta($sql);
        $fila = $this->bd->getFila();
        return $fila[0];
    }

    function delete($id) {
        $sql = "delete from " . $this->nombreTabla . " where id=$id ";
        $this->bd->setConsulta($sql);
        return $this->bd->getNumeroFilasAfectadas();
    }

    function exist($id) {
        $sql = "select count(*) from " . $this->nombreTabla . " where id=$id ";
        $this->bd->setConsulta($sql);
        $fila = $this->bd->getFila();
        return $fila[0] > 0;
    }

    function get($id) {
        $sql = "select * from " . $this->nombreTabla . " where id=$id ";
        $this->bd->setConsulta($sql);
        $fila = $this->bd->getFila();
        $producto = new Producto();
        $producto->set($fila);
        return $producto;
    }
    
    function getId($ref) {
        $sql = "select * from " . $this->nombreTabla . " where referencia='$ref' ";
        $this->bd->setConsulta($sql);
        $fila = $this->bd->getFila();
        $producto = new Producto();
        $producto->set($fila);
        return $producto;
    }

    function getPaginas($pagina = 0, $rpp = 10, $condicion = "") {
        $numregs = $this->count($condicion);
        $paginas = ceil($numregs / $rpp) - 1;
        $ant = $pagina - 1;
        if ($ant < 0)
            $ant = 0;
        $sig = $pagina + 1;
        if ($sig >= $paginas)
            $sig = $paginas;
        $resultado[0] = 0; //primera
        $resultado[1] = $ant; //anterior
        $resultado[2] = $sig; //siguiente
        $resultado[3] = $paginas; //última
        if ($pagina > $paginas)
            $pagina = $paginas;
        if ($pagina < 0)
            $pagina = 0;
        $resultado[4] = $pagina; //actual
        return $resultado;
    }

    function getProductos($pagina = 0, $rpp = 10, $condicion = "", $orderby = "order by nombre") {
        if (!is_numeric($pagina))
            $pagina = 0;
        $pos = $pagina * $rpp;
        $sql = "select * from "
                . $this->nombreTabla .
                " $condicion $orderby limit $pos, $rpp";
        $this->bd->setConsulta($sql);
        $respuesta = [];
        while ($fila = $this->bd->getFila()) {
            $obj = new Producto();
            $obj->set($fila);
            $respuesta[] = $obj;
        }
        return $respuesta;
    }

    function getProductosAjax($pagina = 0, $rpp = 10, $condicion = "", $orderby = "order by nombre") {
        $paginas = $this->getPaginas($pagina, $rpp, $condicion);
        $arrayProductos = $this->getProductos($paginas[4], $rpp, $condicion, $orderby);
        $resultado = '{"pagina":"' . $paginas[4] . '","respuesta":[';
        foreach ($arrayProductos as $clave => $producto) {
            $resultado.=$producto->getJSON();
        }
        $resultado = substr($resultado, 0, strlen($resultado) - 1);
        $resultado .= ']}';
        return $resultado;
    }

    function insert(Producto $producto) {
        $sql = "insert into " . $this->nombreTabla . " values(".'null'."," .
                "'" . $producto->getReferencia() . "', " .
                "'" . $producto->getNombre() . "', " .
                "'" . $producto->getPrecio() . "', " .
                "'" . $producto->getIdcategoria() . "')";
        $this->bd->setConsulta($sql);
        return $this->bd->getNumeroFilasAfectadas();
    }

    function set(Producto $producto, $idold) {
        $sql = "update " . $this->nombreTabla . " set referencia='".$producto->getReferencia()."',nombre='".$producto->getNombre()."',precio='".$producto->getPrecio()."',idcategoria='".$producto->getIdcategoria()."' where id=$idold ";
        $this->bd->setConsulta($sql);
        return $this->bd->getNumeroFilasAfectadas();
    }

    function select($campoclave = "", $id = "idproducto", $condicion = "") {
        echo "<select name=\"$id\" id=\"$id\" >";
        echo "<option value=\"\">&nbsp;</option>";
        $sql = "select * from " . $this->nombreTabla . " $condicion";
        $this->bd->setConsulta($sql);
        while ($fila = $this->bd->getFila()) {
            $producto = new Producto();
            $producto->set($fila);
            $selected = "";
            if ($campoclave != "" && $producto->getId() == $campoclave) {
                $selected = "selected=\"selected\"";
            }
            echo "<option value=\"" . $producto->getId() . "\" " . $selected . ">" .
            $producto->getNombre() . " " .
            "</option>";
        }
        echo "</select>";
    }

}
