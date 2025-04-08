<?php
	header('Content-Type:text/html; charset=UTF-8');
	@session_start(); 
	
	if(! isset($_SESSION["usuario"]))
	{ 
      	header("Location:../index.php");  
    	exit;
	}

?>


