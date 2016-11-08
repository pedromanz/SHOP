<?php

function autocarga($clase) {
    include '../clases/'.$clase . '.php';
}
spl_autoload_register('autocarga');

$id = Peticion::post("id");
$referencia = Peticion::post("referencia");
$nombre = Peticion::post("nombre");
$precio = Peticion::post("precio");
$idcategoria = Peticion::post("idcategoria");

$precio = str_replace(",",".",$precio);

if (isset($_FILES ["archivo"])){
    $subir= new Subir("archivo");
    $subir->setNombre($referencia);
    $subir->setGestion("sobrescribir");
    $subir->setDestino("../../img/productos/");
    $r = $subir->subir();
}

$bd = new BaseDatos();
$obj = new Producto($id,$referencia,$nombre,$precio,$idcategoria);
$gestor = new GestionProducto($bd);
$resultado=$gestor->set($obj, $id);
$bd->closeConexion();


header("Location: mostrarproductos.php?mensaje=$resultado&op=actualizar");