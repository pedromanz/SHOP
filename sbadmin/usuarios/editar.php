<?php
function autocarga($clase) {
    include '../clases/'.$clase . '.php';
}
spl_autoload_register('autocarga');

$user = Peticion::get("user");
$bd = new BaseDatos();
$gestor = new GestionUsuario($bd);
$obj = $gestor->get($user);
$bd->closeConexion();
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agency - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="../css/agency.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
    <body>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
        <!-- Begin | Register Form -->
        <form action="phpeditar.php" method="get" enctype="text/plain">
            <div class="" align="center">
					<img class="img-circle" id="img_logo" src="http://bootsnipp.com/img/logo.jpg">
				</div>
            		    <div class="modal-body" align="center">
		    				<div id="div-register-msg">
                                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-register-msg">Edite su usuario.</span>
                            </div>
                                <input name="user" class="form-control" type="text" value="<?php echo $obj->getUser(); ?>" placeholder="Username" required></br>
                                <input name="email" class="form-control" type="text" value="<?php echo $obj->getEmail(); ?>" placeholder="E-Mail" required></br>
                            <select name="tipo">
                                <option <?php 
                                    $tipo = $obj->getTipo();
                                    if($tipo == "administrador")
                                        echo "selected='selected'";                        
                                ?> value="administrador">Administrador</option>
                                <option <?php 
                                    $tipo = $obj->getTipo();
                                    if($tipo == "usuario")
                                        echo "selected='selected'";                        
                                ?>  value="usuario">Usuario</option>
                            </select>
                            <select name="activo">
                                <option <?php 
                                    $tipo = $obj->getActivo();
                                    if($tipo == "1")
                                        echo "selected='selected'";                        
                                ?> value="1">Activo</option>
                                <option  <?php 
                                    $tipo = $obj->getActivo();
                                    if($tipo == "0")
                                        echo "selected='selected'";                        
                                ?> value="0">No Activo</option>
                            </select>
            			</div>
		    		    <div class="modal-footer" align="center">
                            <div>
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Actualizar" />
                            </div>
		    		    </div>
                    </form>
              
        </div><!-- End | Register Form -->
        </div>
        
         <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="../js/agency.min.js"></script>

</body>

</html>
