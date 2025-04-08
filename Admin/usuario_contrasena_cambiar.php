<?php
header('Content-Type:text/html; charset=UTF-8');
require("accede.php");
include("../Connections/conexion.php");

// Validar y sanitizar el ID de usuario
$id = isset($_GET['user']) ? intval($_GET['user']) : 0;

if ($id > 0) {
    $total = "SELECT * FROM usuario WHERE idusuario = $id";
    $result = $mysqli->query($total);

    if ($result->num_rows > 0) {
        $row_total = $result->fetch_assoc();
        $userAnt = $row_total['usuario']; // Usuario anterior
    } else {
        echo "<script>
        alert('Usuario no encontrado');
        location.href='usuario_modificar.php';
        </script>";
        exit();
    }

    if (isset($_POST['Insertar'])) {
        $contra = sha1($_POST['contra']);
        $confContra = sha1($_POST['confcontra']);

        if ($contra !== $confContra) {
            echo "<script>
            alert('Las contraseñas no coinciden');
            history.back();
            </script>";
        } else {
            $sql2 = "UPDATE usuario SET
                contra = '$contra'
                WHERE idusuario = $id";

            if ($mysqli->query($sql2) === TRUE) {
                echo "<script>
                alert('Contraseña cambiada con éxito');
                location.href='usuario_modificar.php';
                </script>";
            } else {
                echo "Error al actualizar los datos: " . $mysqli->error;
            }
        }
    }
} else {
    echo "<script>
    alert('ID de usuario no válido');
    location.href='usuario_modificar.php';
    </script>";
    exit();
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
    <!-- SCRIP TEX AREA -->
    <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="tinymce/tinymce.min.js" type="text/javascript"></script>
    <title>Modificar contraseña Usuarios</title>
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
                        <center>
                            <section>
                                <h2>Modificar contraseña de Usuarios <span><img src='imagenes/clave.png' width='20' height='20' alt='clave'></span></h2>
                            </section>

                            <!-- Comienzo formulario -->
                            <form action="" method="post" class="user">
                                <label for="usuario">Usuario:</label><br/>
                                <?php echo htmlentities($row_total['usuario'], ENT_QUOTES, 'UTF-8'); ?><br/><br/>

                                <label for="nombre">Nombre:</label><br/>
                                <?php echo htmlentities($row_total['nombre'], ENT_QUOTES, 'UTF-8'); ?><br/><br/>

                                <label for="contra">Nueva Contraseña:</label><br/>
                                <input type="password" name="contra" required /><br/><br/>

                                <label for="confcontra">Confirmar Contraseña:</label><br/>
                                <input type="password" name="confcontra" required /><br/><br/>

                                <input type="submit" value="Registrar" class="button" name="Insertar">
                                <input type="button" onClick="javascript:location.href='usuario_modificar.php';" value="Cancelar" class="button">
                            </form>
                            <!-- Fin del formulario -->
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
