<?php

function autocarga($clase) {
    include '../clases/'.$clase . '.php';
}
spl_autoload_register('autocarga');

$user = Peticion::get("user");
$email = Peticion::get("email");
$tipo = Peticion::get("tipo");
$activo = Peticion::get("activo");

$bd = new BaseDatos();
$obj = new Usuario($user, "", $email, $tipo, $activo);
$gestor = new GestionUsuario($bd);
$resultado=$gestor->set($obj,$email);
$bd->closeConexion();
header("Location: mostrarusuarios.php?mensaje=$resultado&op=actualizar");