<?php

function autocarga($clase) {
    include '../clases/'.$clase . '.php';
}
spl_autoload_register('autocarga');

$categoria = Peticion::get("categoria");

$bd = new BaseDatos();
$obj = new Categoria(null,$categoria);
$gestor = new GestionCategoria($bd);
$resultado=$gestor->insert($obj);
$bd->closeConexion();
header("Location: mostrarcategorias.php?mensaje=$resultado&op=insertar");