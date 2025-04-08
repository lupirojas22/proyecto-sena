<?php
header('Content-Type: text/html; charset=UTF-8');
require("accede.php");
include("../Connections/conexion.php");


// Verificar si se ha enviado el formulario
if (isset($_POST['subir'])) {
    // Recoger y sanitizar las entradas del formulario
    $nueva = $mysqli->real_escape_string($_POST['contra']);
    $confirma = $mysqli->real_escape_string($_POST['confirma']);

    // Verificar si las contraseñas coinciden
    if ($nueva !== $confirma) {
        echo "<script>
                alert('La contraseña NUEVA no coincide');
                history.back();
              </script>";
    } else {
        // Actualizar la contraseña en la base de datos

        $contra = sha1($nueva);
        echo $contra;
        $usuario = $_SESSION['usuario'];
        $sql2 = "UPDATE usuario SET contra='$contra' WHERE usuario='$usuario'";
        if ($mysqli->query($sql2) === TRUE) {
            echo "<script>
                    alert('Contraseña cambiada con éxito');
                    location.href='panel.php';
                  </script>";
        } else {
            echo "Error al actualizar los datos: " . $mysqli->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/forempleado.css"> 
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/saphv2.css" rel="stylesheet">     
    <title>Mi Clave</title>
</head>
<body>
    <?php include('include/header.php'); ?>
    <div class="container">
        <div class="row">
            <?php 
            if ($_SESSION['nivel'] == 'P') {
                include('include/menu.php');
            } else {
                include('include/menu_mod.php');
            }
            ?>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-desktop"></i> Inicio</div>        
                    <div class="panel-body">
                        <center>
                            <h1>Modificar tu clave usuario <b><?php echo $_SESSION['usuario']; ?></b></h1>
                            <!-- COMIENZO FORMULARIO -->
                            <form action="" method="post" name="form" enctype="multipart/form-data" class="form-horizontal">
                                <!-- Nueva contraseña -->
                                <div class="form-group">
                                    <label for="contra" class="col-lg-3 control-label">Nueva Contraseña: <span class="glyphicon glyphicon-lock"></span></label>
                                    <div class="col-lg-8">
                                        <input type="password" name="contra" class="form-control" required>
                                    </div>
                                </div>
                                <!-- Confirmar contraseña -->
                                <div class="form-group">
                                    <label for="confirma" class="col-lg-3 control-label">Confirmar Contraseña: <span class="glyphicon glyphicon-lock"></span></label>
                                    <div class="col-lg-8">
                                        <input type="password" name="confirma" class="form-control" required>
                                    </div>
                                </div>
                                <input type="submit" value="subir" name="subir" class="btn btn-primary">
                                <input type="button" onClick="location.href='panel_cert.php';" value="Cancelar" class="btn btn-primary">
                            </form>
                            <!-- FIN FORMULARIO -->
                        </center>
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
