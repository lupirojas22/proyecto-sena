<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
$_SESSION['permite'] = 'no';
//require_once("conexion.php");
require_once("../Connections/conexion.php");

@$usuario = $_POST['usuario'];
@$contra = sha1($_POST['contra']);
$existe = 0;

// Conexión a la base de datos utilizando MySQLi
$mysqli = new mysqli('localhost', 'root', '', 'proyecto');
if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}

// Consulta segura utilizando MySQLi
$stmt = $mysqli->prepare("SELECT * FROM usuario WHERE usuario = ? AND contra = ?");
$stmt->bind_param("ss", $usuario, $contra);
$stmt->execute();
$result = $stmt->get_result();

while ($fila = $result->fetch_row()) {
    $existe = 1;
    $_SESSION['nombre'] = $fila[2];
    $_SESSION['nivel'] = $fila[4];
    $Nivel = $fila[4];
}

if ($existe == 1 && strcmp($Nivel, "P") == 0) {
    $_SESSION['permite'] = 'si';
    $_SESSION['usuario'] = $usuario;
    $sql = "UPDATE usuario SET ip='" . $_SERVER['REMOTE_ADDR'] . "', ultacces='" . date('y-m-d H:i:s') . "' WHERE usuario='$usuario'";
    $datos = $mysqli->query($sql) or die("error al insertar ip" . $mysqli->error);

    // Alerta de vencimiento
    include('alert_venc.php');
    echo "<script>
        alert('Bienvenido(a): " . $_SESSION['nombre'] . "');
        location.href='panel.php'
        </script>";
} elseif ($existe == 1 && (strcmp($Nivel, "u") == 0 || strcmp($Nivel, "a") == 0)) {
    $_SESSION['permite'] = 'si';
    $_SESSION['usuario'] = $usuario;
    $sql = "UPDATE usuario SET ip='" . $_SERVER['REMOTE_ADDR'] . "', ultacces='" . date('y-m-d H:i:s') . "' WHERE usuario='$usuario'";
    $datos = $mysqli->query($sql) or die("error al insertar ip" . $mysqli->error);

    echo "<script>
        alert('Bienvenido(a): " . $_SESSION['nombre'] . "');
        location.href='panel.php'
        </script>";
} else {
    echo "<script>
        alert('Usuario o contraseña incorrectos');
        location.href='index.php'
        </script>";
}
?>


<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<title>Login admin</title>
</head>
<body>
</body>
</html>