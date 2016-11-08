<?php
function autocarga($clase) {
    include '../clases/'.$clase . '.php';
}
spl_autoload_register('autocarga');

$id = Peticion::get("id");

if($id!=NULL){
    $bd = new BaseDatos();
    $gestor = new GestionCategoria($bd);
    $resultado = $gestor->delete($id);
    $bd->closeConexion();
    header("Location: mostrarcategorias.php?mensaje=$resultado&op=borrar");
}
