<?php

function autocarga($clase) {
    include '../clases/'.$clase . '.php';
}
spl_autoload_register('autocarga');

$referencia = Peticion::post("referencia");
$nombre = Peticion::post("nombre");
$precio = Peticion::post("precio");
$idcategoria = Peticion::post("idcategoria");



$precio = str_replace(",",".",$precio);

$bd = new BaseDatos();
$obj = new Producto(null,$referencia,$nombre,$precio,$idcategoria);
$gestor = new GestionProducto($bd);
$resultado=$gestor->insert($obj);

if ($resultado==1){
    $subir= new Subir("archivo");
    $subir->setNombre($referencia);
    $subir->setGestion("renombrar");
    $subir->setDestino("../../img/productos/");
    $subir->subir();
}
$bd->closeConexion();
header("Location: mostrarproductos.php?mensaje=$resultado&op=insertar");