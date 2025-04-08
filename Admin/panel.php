<?php
	header('Content-Type:text/html; charset=UTF-8');
	require("accede.php");
?>
    
<!DOCTYPE html>
<html lang="esp">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon"  href="imagenes/favicon.ico">
    <title>Panel Administrativo</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/saphv2.css" rel="stylesheet">
</head>

<body >
<?php include('include/header.php'); ?>
<div class="container">
   	<div class="row">
   		<?php include('include/menu_mod.php'); ?>
		<div class="col-md-9">
    	    <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-desktop"></i>Inicio</div>
            	<div class="panel-body">
                    <br>
                    <center>
                        <h2 >Bienvenido <?php echo $_SESSION['nombre'] ?> al sistema </h2>
                    </center>
                    <center>
                        <p>Desde el menú o nuestro panel central podrás ingresar a realizar la función que desees.</p>
                    </center>
                        <img class="src-image" src="imagenes/panel-1.2.png"/>
                        <img class="src-image" src="imagenes/panel-1.1.png"/>
                        <img class="src-image" src="imagenes/panel-5.png"/>
                        <div class="col-sm-4">       
                        	<div class="card">                        
                        		<canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                          		<div class="avatar">
                            		<img src="" alt="" />
                          		</div>
                                <div class="content">
                                	<p>Módulo <br>
                                certificados</p>
                                <form action="" method="post">
                                <p><button type="button" class="btn btn-info" >
                                <a href="panel_cert.php">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                IR</button> </p></a>
                               	</div>           
							</div>
						</div>    
						
						
						<?php 
                         if($_SESSION['nivel']=='a') {?>
                    
                        <div class="col-sm-4">
                            <div class="card">
                            	<canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                                <div class="avatar">
                                	<img src="" alt="" />
                                </div>
                                <div class="content">
                                	<p>Módulo<br>
                                     Administrador</p>
                                    <p><button type="button" class="btn btn-info">
                                    <a href="panel_adm.php">
                                    <i class="fa fa-bus"></i>
                                    IR </button></p></a>
                               	</div>                                   
                         	</div>
						</div>
                        
						<?php  } ?>
                    


                 	</div>
           		</div>
        	</div>
   		</div>
  	</div>
        
        
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.js"></script>
    <script src="js/stack-blur.js"></script>
    <script src="js/saphv2.js"></script>
  </body>
</html>