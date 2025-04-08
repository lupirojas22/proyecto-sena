<?php
    header('Content-Type: text/html; charset=UTF-8');
    require("accede.php");
    include("../Connections/conexion.php");

    $id = $_GET['user'];
    $total = "SELECT * FROM usuario WHERE idusuario = $id";
    $result = $mysqli->query($total);

    if ($row_total = $result->fetch_assoc()) {
        $userAnt = $row_total['usuario'];  //usuario anterior
    }

    if (isset($_POST['Insertar'])) {
        $existe = 0;
        $user = $_POST['usuario'];

        if (strcmp($userAnt, $user) == 0) {
            // Son iguales
            $sql2 = "UPDATE usuario SET
                nombre = '$_POST[nombre]',
                nivel = '$_POST[nivel]'
                WHERE idusuario = $id";

            if ($mysqli->query($sql2) === TRUE) {
                echo "<script>
                    alert('Usuario editado con éxito');
                    location.href='usuario_modificar.php';
                    </script>";
            } else {
                echo "Error al actualizar los datos: " . $mysqli->error;
            }
        } else {
            $sql = "SELECT * FROM usuario WHERE usuario = '$user'";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                $existe = 1;
            }

            if ($existe == 1) {
                echo "<script>
                    alert('El usuario ya existe');
                    history.back();
                    </script>";
            } else {
                $sql2 = "UPDATE usuario SET
                    usuario = '$user',
                    nombre = '$_POST[nombre]',
                    nivel = '$_POST[nivel]'
                    WHERE idusuario = $id";

                if ($mysqli->query($sql2) === TRUE) {
                    echo "<script>
                        alert('Usuario editado con éxito');
                        location.href='usuario_modificar.php';
                        </script>";
                } else {
                    echo "Error al actualizar los datos: " . $mysqli->error;
                }
            }
        }
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
    <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="tinymce/tinymce.min.js" type="text/javascript"></script>
    <title>Modificar Usuarios</title>
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
                                <h2>Modificar de Usuarios <span><img src='imagenes/clave.png' width='20' height='20' alt='clave'> </span></h2>
                            </section>

                            <form action="" method="post" class="user">
                                <label for="usuario">Usuario: </label><br/>
                                <input type="text" onpaste="return false" onKeyPress="javascrip:return NoEspacio(event,this)" name="usuario" value="<?php echo htmlspecialchars($row_total['usuario']); ?>" /><br/><br/>

                                <label for="nombre">Nombre: </label><br/>
                                <input type="text" name="nombre" value="<?php echo htmlspecialchars($row_total['nombre']); ?>" /><br/><br/>

                                <label for="nivel">Nivel de acceso: </label><br/>
                                <p>Personal solo tiene acceso a certificado crear y modificar</p>
                                <select name="nivel" class="despegable">
                                    <option value="a" <?php if ($row_total['nivel'] == 'a') echo "selected"; ?>>Administrador</option>
                                    <option value="u" <?php if ($row_total['nivel'] == 'u') echo "selected"; ?>>Usuario</option>
                                    <option value="P" <?php if ($row_total['nivel'] == 'P') echo "selected"; ?>>Personal</option>
                                </select><br/><br/><br/>

                                <input type="submit" value="Registrar" class="button" name="Insertar">
                                <input type="button" onClick="javascript:location.href='usuario_modificar.php';" value="Cancelar" class="button">
                            </form>

                            <script language="javascript">
                                function NoEspacio(e, campo) {
                                    key = e.keyCode ? e.keyCode : e.which;
                                    if (key == 32) {
                                        return false;
                                    }
                                }
                            </script>
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
