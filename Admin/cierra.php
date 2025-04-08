<?php
session_start();
$_SESSION['permite']='no';
$_SESSION=array();
session_destroy();
header('location:../index.php');
?>