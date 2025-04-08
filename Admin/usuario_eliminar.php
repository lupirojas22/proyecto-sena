<?php
   header('Content-Type:text/html; charset=UTF-8');
   require("accede.php");
   include("../Connections/conexion.php");


        $id = $_GET['user']; 
        $sql = "DELETE FROM usuario WHERE idusuario = $id";
        if ($mysqli->query($sql) === TRUE) {
            $mensaje="<center>
		     <br> <br> <h2>Felicidades Sentencia ejecutada correctamente<h2></center><br/>
	   	     <br/>
			 <center>
             <a href='usuario_modificar.php' class='btn btn-primary'>volver a modificar </a>
	
           <a href='panel_adm.php' class='btn btn-primary margen'>volver a inicio </a> </center>";
	  
        } else {
            echo "Problema en la consulta de datos: " . $mysqli->error;
        }



?>

<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/fromularios.css">
        <link rel="stylesheet" type="text/css" href="css/titulos.css">
        <link rel="shortcut icon" type="image/x-icon"  href="imagenes/favicon.ico">
        <title> usuario elimin  </title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link href="css/saphv2.css" rel="stylesheet">
    </head>

	<body>

	<?php include('include/header.php'); ?>
	<div class="container">
    <div class="row">
    <?php include('include/menu_adm.php'); ?>
	<div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-desktop"></i> Inicio</div>
                        <div class="panel-body">
                        <br>
                        <?php echo $mensaje; ?>                  
                        
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