<?php
	header('Content-Type:text/html; charset=UTF-8');
	require("accede.php");
	include("../Connections/conexion.php");
	
	
	/* GUARDAMOS LOS DATOS */
	if (isset($_POST['Insertar'])) 
    {
		
		 
	    $existe=0;
  	    if ($_POST['contra'] <> $_POST['confcontra'])
   		{
			  echo " <script>
	       			  alert('Las contraseñas no coinciden');
					 history.back();
					 </script>";
  		}else{
	  			  $sql="SELECT * FROM usuario";
				   $result = $mysqli->query($sql);
				 
	  			 while($busca= $result->fetch_assoc())
	  			 {
		  			 if($busca['usuario']==$_POST['usuario'])
		   			 $existe=1;
	   			 }
	   
			if($existe==1)
			{
					echo "<script>
					alert('El usuario ya existe');
					history.back();
					</script>";
			} else{
					$contra=sha1($_POST['contra']);
					$insert_query ="INSERT INTO usuario (usuario,nombre,contra,nivel) 
					VALUES ('$_POST[usuario]','$_POST[nombre]','$contra','$_POST[nivel]')";
					
					if (!$mysqli->query($insert_query)) {
						die("Problemas al insertar datos: " . $mysqli->error);
					}
					
				
				
					echo   
				"<script>
					alert('Usuario  Registrado Con Exito');
					location.href='usuario_modificar.php'
					</script>";
				
			}
		   
		   
	   }
	   
	   
}
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon"  href="imagenes/favicon.ico">
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
	 <script  src="tinymce/tinymce.min.js" type = "text/javascript"></script>
   
	<title> Registro Usuarios</title>
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
         <h2>Registro de Usuarios <span><img src='imagenes/clave.png' width='20' height='20' alt='clave'> </span> </h2> 
         </section>

		    <!--Comienzo formulario  -->
			
            <form  action="" method="post" class="user">
     
         <label for="usuario" > Usuario: </label></br>
         <input type="text"  onpaste="return false" onKeyPress="javascrip:return NoEspacio (event,this)" name="usuario" required /> <br/><br/>
     
     
       <label for="nombre" >Nombre: </label><br/>
       <input type="text" name="nombre" required /> <br/><br/>
       
       <label for="contra" >Contrase&ntilde;a: </label><br/>
       <input type="password" name="contra" required /> <br/><br/>
       
       <label for="confcontra">Confirmar: </label><br/>
       <input type="password" name="confcontra" required /> <br/><br/>
     
     
       		 <label for="nivel" > Nivel de acceso: </label><br/>
       		 <p>Personal solo tiene acceso a certificado crear y modificar</p>
             <select name="nivel" class="despegable">
              <option value="a">Administrator</option>  
              <option value="u">Usuario</option>
              <option value="P">Personal</option>
              </select>
            <br/><br/><br/>
            
            
       <input type="submit" value="Registrar" class="button" name="Insertar" >
       <input type="button" onClick="javascript:location.href='usuario_modificar.php';" value="Cancelar" class="button" />

     </form>
     
     <script language="javascript">
	 function NoEspacio(e,campo) {
		 key= e.keyCode ? e.keyCode: e.which;
		 if(key == 32) {return false;}
		 
		 }
	 </script>
		    <!--Fin del formulario  -->

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

