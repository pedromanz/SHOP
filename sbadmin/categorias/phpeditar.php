<?php

function autocarga($clase) {
    include '../clases/'.$clase . '.php';
}
spl_autoload_register('autocarga');

$id = Peticion::get("id");
$nombre = Peticion::get("categoria");

$bd = new BaseDatos();
$obj = new Categoria(null,$nombre);
$gestor = new GestionCategoria($bd);
$resultado=$gestor->set($obj,$id);
$bd->closeConexion();
header("Location: mostrarcategorias.php?mensaje=$resultado&op=actualizar");