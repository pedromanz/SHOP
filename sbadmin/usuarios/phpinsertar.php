<?php

function autocarga($clase) {
    include '../clases/'.$clase . '.php';
}
spl_autoload_register('autocarga');

$user = Peticion::get("user");
$pass = Peticion::get("pass");
$email = Peticion::get("email");
$tipo = Peticion::get("tipo");
$activo = Peticion::get("activo");

$bd = new BaseDatos();
$obj = new Usuario($user, sha1($pass), $email, $tipo, $activo);
$gestor = new GestionUsuario($bd);
$resultado=$gestor->insert($obj);
$bd->closeConexion();
header("Location: mostrarusuarios.php?mensaje=$resultado&op=insertar");