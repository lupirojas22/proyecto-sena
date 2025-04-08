<?php
$mysqli = new mysqli('localhost', 'root', '', 'proyecto');
if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}


?>