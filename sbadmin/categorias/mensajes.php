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
            echo '<script type="text/javascript">alert("Actualizado correctamente");</script>';
        }
        if($mensaje == "-1"){
            echo '<script type="text/javascript">alert("Error Actualizando!");</script>'; 
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
            echo '<script type="text/javascript">alert("ERROR Eliminando!");</script>'; 
        }

    }
        break;
    case "insertar":
        if(isset($_GET["mensaje"])){
        $mensaje = Peticion::get("mensaje");
        if($mensaje == "1"){
            echo '<script type="text/javascript">alert("Insertado correctamente");</script>';
        }
        if($mensaje == "-1"){
            echo '<script type="text/javascript">alert("Error al insertar!");</script>'; 
        }

    }
        break;
    default:
        echo '<script type="text/javascript">alert("Bienvenido Administrador");</script>';
}

}