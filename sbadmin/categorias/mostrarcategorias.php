<?php

function autocarga($clase) {
    include '../clases/'.$clase . '.php';
}
spl_autoload_register('autocarga');


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/plugins/alertify/alertify.core.css" rel="stylesheet">
    <link href="../css/plugins/alertify/alertify.default.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="../../css/agency.min.css" rel="stylesheet">
    <link href="../css/sb-admin.css" rel="stylesheet">
    <script src="../js/plugins/alertify/alertify.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
                            <?php
        include 'mensajes.php';
        $bd = new BaseDatos();
        $gestor = new GestionCategoria($bd);
        $resultado=$gestor->getCategorias();
        ?>

    <div id="wrapper">

        <?php
            include '../menu.php';
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Categorias
                            <small>Muestra todas las categorias</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Categorias
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                

                <!-- CONTENIDDO DE CATEGORIAS -->
        <table class="table" border="1">
        <tbody>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th colspan="2">Acci&oacute;n</th>
            </tr>
                <?php
                foreach ($resultado as $indice => $valor) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $valor->getId(); ?>
                        </td>
                        <td>
                            <?php echo $valor->getNombre(); ?>
                        </td>
                        <?php
                        //if ($sesion->isAdministrador()) {
                            ?>
                        <td>
                            <a class="borrar" href="phpborrar.php?id=<?php echo $valor->getId(); ?>">
                                    <img src="../../img/cubo.jpg"/>
                            </a>
                        </td>
                        <td>
                            <a class="editar" href="editar.php?id=<?php echo $valor->getId(); ?>">
                                    <img src="../../img/editar.jpg"/>
                            </a>
                        </td>
                            <?php
                        //}
                        ?>
                    </tr>
                    <?php
                }
                $bd->closeConexion();
                ?>
            </tbody>
        </table>
        
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
        <!-- Begin | Register Form -->
        <form action="phpinsertar.php" method="get" enctype="text/plain">
            		    <div class="modal-body" align="center">
		    				<div id="div-register-msg">
                                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-register-msg">Registre nuevas categorias.</span>
                            </div>
                            <input name="categoria" class="form-control" type="text" placeholder="Nombre categoria" required></br>
            			</div>
		    		    <div class="modal-footer" align="center">
                            <div>
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Insertar nueva categoria" />
                            </div>
		    		    </div>
                    </form>
              
        </div><!-- End | Register Form -->
        </div>
        
 </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
        
        <!-- jQuery -->
    <script src="../../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../../js/jqBootstrapValidation.js"></script>
    <script src="../../js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="../../js/agency.min.js"></script>

</body>

</html>
