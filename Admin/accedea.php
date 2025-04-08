<?php
header('Content-Type:text/html; charset=UTF-8');
if(!isset($_SESSION))
     session_start();
	 	 
mysql_query("SET NAMES 'utf8'");	 
if(@$_SESSION['permite']<>'si')
{
	echo "<script>
	       alert('debe iniciar sesión);
		   location.href='index.php'
		  </script>";
		  
		  $_SESSION=array();
		  session_destroy();
} 
 
	
	
?>


