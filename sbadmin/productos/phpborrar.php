<?php
function autocarga($clase) {
    include '../clases/'.$clase . '.php';
}
spl_autoload_register('autocarga');

$id = Peticion::get("id");

if($id!=NULL){
    $bd = new BaseDatos();
    $gestor = new GestionProducto($bd);
    $resultado = $gestor->delete($id);
    $bd->closeConexion();
    header("Location: mostrarproductos.php?mensaje=$resultado&op=borrar");
}
