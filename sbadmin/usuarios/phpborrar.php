<?php
function autocarga($clase) {
    include '../clases/'.$clase . '.php';
}
spl_autoload_register('autocarga');

$email = Peticion::get("email");

if($email!=NULL){
    $bd = new BaseDatos();
    $gestor = new GestionUsuario($bd);
    $resultado = $gestor->delete($email);
    $bd->closeConexion();
    header("Location: mostrarusuarios.php?mensaje=$resultado&op=borrar");
}
