<?php

function autocarga($clase) {
    include '../sbadmin/clases/'.$clase . '.php';
}
spl_autoload_register('autocarga');
$categoria = Peticion::get("id");
if(!isset($categoria)){
    $categoria = 1;
}
include_once('jcart/jcart.php');
session_start();

?>


<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" media="screen, projection" href="style.css" />
    <link rel="stylesheet" type="text/css" media="screen, projection" href="jcart/css/jcart.css" />
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
    <?php
        $bd = new BaseDatos();
        $gestor = new GestionCategoria($bd);
        $resultado=$gestor->getCategorias();
        ?>
<div id="sidebar">
				<div id="jcart"><?php $jcart->display_cart();?></div>
			</div>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group">
                    <?php
                foreach ($resultado as $indice => $valor) {
                    ?>
                    <a href="index.php?id=<?php echo $valor->getId();?>" class="list-group-item"><?php echo $valor->getNombre();?></a>
                   <?php 
                   
                } 
               // $bd->closeConexion();
                ?>
                  
                </div>
            </div>
               <div class="col-md-9"> 
                   <h2 style="text-combine-upright:"><?php
                   $obj=$gestor->get($categoria);
                   echo $obj->getNombre();
                   ?></h2>
                   
                   <?php
                   $gestor2 = New GestionProducto($bd);
                   $r=$gestor2->getProductos(0, 10, "where idcategoria=$categoria");
                   foreach ($r as $indice2 => $valor2){ 
                       
                   
?>
                       <div class="col-md-4 col-sm-6 portfolio-item">
                           <a href="#<?php echo $valor2->getReferencia();?>" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?php echo"../img/productos/" .$valor2->getReferencia().".jpg";?>" class="img-responsive" alt="nombre">
                    </a>
                    <div class="portfolio-caption">
                        <h4><?php echo $valor2->getNombre();?></h4>
                        <p class="text-muted"><?php echo $valor2->getPrecio()." €";?></p>
                    </div>
                </div>
               
                   <?php
                    
                   }
                                                      
                   ?>
                   
                
                
    </section>
                    
	Soccer Ball	Baseball Mitt
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
    
    
        <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

    <!-- Portfolio Modal 1 -->
   

    
                                <
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    foreach ($r as $indice2 => $valor2){ 
    include 'productos.php';
    }
    ?>
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
    
    <script type="text/javascript" src="jcart/js/jcart.min.js"></script>
    <?php
    $bd->closeConexion();
   ?>

</body>

</html>
