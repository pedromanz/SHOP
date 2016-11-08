<?php

if(isset($_GET["op"])){
$op = $_GET["op"];
/*
var_dump($op);
*/
switch ($op) {
    case "actualizar":
        if(isset($_GET["mensaje"])){
        $mensaje = Peticion::get("mensaje");
        if($mensaje == "1"){
            echo '<script type="text/javascript">alertify.alert("Actualizado correctamente");</script>';
        }
        if($mensaje == "-1"){
            echo '<script type="text/javascript">alertify.alert("Error Actualizando!");</script>'; 
        }

        }
        
        break;
    case "borrar":
        if(isset($_GET["mensaje"])){
        $mensaje = Peticion::get("mensaje");
        if($mensaje == "1"){
            echo '<script type="text/javascript">alert("Eliminado correctamente");</script>';
        }
        if($mensaje == "-1"){
            echo '<script type="text/javascript">alertify.alert("ERROR Eliminando!");</script>'; 
        }

    }
        break;
    case "insertar":
        if(isset($_GET["mensaje"])){
        $mensaje = Peticion::get("mensaje");
        if($mensaje == "1"){
            echo '<script type="text/javascript">alertify.alert("Insertado correctamente");</script>';
        }
        if($mensaje == "-1"){
            echo '<script type="text/javascript">alertify.alert("Error al insertar!");</script>'; 
        }

    }
        break;
    default:
        echo '<script type="text/javascript">alertify.alert("Bienvenido Administrador");</script>';
}

}