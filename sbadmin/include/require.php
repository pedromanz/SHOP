<?php
function autocarga($clase) {
    include 'clases/'.$clase . '.php';
}
spl_autoload_register('autocarga');
//$sesion = new Sesion();

?>