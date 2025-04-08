<?php
	header('Content-Type:text/html; charset=UTF-8');
	require("accede.php");
	include("../Connections/conexion.php");
	

	/*id del certificado modificar*/
	$v1 =$_GET['id'];
	/*id del certificado modificar*/
	
	/*id del curso que era antes para eliminar en caso tal  */
	$ci =$_GET['ci'];
	/*id del curso que era antes para eliminar en caso tal*/

	/*nombre*/
	$nombre=$_POST['nombre'];
	/*nombre*/

	/* Numero Docuemnto*/
	$no_documento=strtoupper($_POST['no_documento']);
	/*Numero Docuemnto*/
	
	//VARIABLE  QUE RECIBE  EL ANTERIOR # DE DOC
	$docu=$_POST['docu_ante'];
	//VARIABLE  QUE RECIBE  EL ANTERIOR # DE DOC

	/*tipo documento*/
	$ti_doc=$_POST['ti_doc'];
	/*tipo documento*/

	

	/*curso se guarda el id*/
	$idProducto=$_POST['curso'];

	/*cursoo*/

	/* IDEMPRESA Y PRECIO */

	$tipo_cert=$_POST['tipo_cert'];

	// tipo_cert: mira si es independiente o si es empresa.
	if($tipo_cert==0)
	{  
  		$idEmpresa =0;     // INDEPENDIENTE
	}
	else
	{  
    	$idEmpresa=$_POST['empresa']; // EMPRESA GUARDAMOS ID 
    	/*buscamos el nit de empresa en tabla empresa*/
		$nitbus = "SELECT * FROM empresas where IdEmpresa='$idEmpresa'";
		$result1 = $mysqli->query($nitbus);

		while ($row_total = $result1->fetch_assoc()) {
		$NITEmpresa=$row_total['Nit'];// nit empresa para poder buscar precio
  		/*FIN buscamos el nit de empresa*/
		}
		

	
	}
    /*FIN IDEMPRESA Y PRECIO */
    
    /*DATOS DEL INDEPENDIENTE*/
	$CiudadResidencia=$_POST['CiudadResidencia'];
	$Empresatrabaja=$_POST['Empresatrabaja'];
	$Cargo=$_POST['Cargo'];
	$tel=$_POST['tel'];
	$email=$_POST['email'];
	/*FIN DATOS INDEPENDIENTE*/

	/*ESTADO CERTIFICACION*/
	//miramos el estado de certificacion como esta .
	$estado=$_POST['certificacion'];
	$imprimir=$_POST['imprimir'];
	$fecha=$_POST['fecha'];
	//si no hay fecha le decimos que ponga 0 para llenar la base de datos y no dejar espacios en blanco
	if ($fecha=="")
	{$fecha="0000-00-00";}
	$ciudad_exp=$_POST['ciudad_exp'];

	/*FIN ESTADO CERTIFICACION*/
	
	
/*---------------------------------INDEPENDIENTES  EMPRESA-----------------------------------*/

	/* consultamos la tabla independiente */
    	
		$sql8 = "SELECT * FROM independiente";
	   $rec8= $mysqli->query($sql8);
	// variable para guardar resultado de si existe o no 
	    $exiteIndependient = "";
	// variable para guardar resultado de si existe o no 

    /* consultamos la tabla independiente */
	while($row8=$rec8->fetch_assoc())
	{ 
		// verificamos si en la tabla hay un numero de cedula  ya 
		if( $docu == $row8['num_doc'] && $ci== $row8['id_curso'] )
    	{ 
			$exiteIndependient = 1;	// 1 es si existe 
    	}
		else
		{
			$exiteIndependient = 2;	// 2 no existe 
		}
	}
	

	/* consultamos la tabla independiente */
	
	/* verificamos que la id empresa siga siendo idependiente */
	if($idEmpresa == '0')
	{
		echo $exiteIndependient;
		//escogio ser idependiente
		if ($exiteIndependient == 1)
		{   
		  
			// remplazamos  los datos en la tabla  por que ya existen 
 			
			$query = "UPDATE independiente SET
            num_doc = UPPER('$no_documento'),
            Empresatrabaja = UPPER('$Empresatrabaja'),
            CiudadResidencia = UPPER('$CiudadResidencia'),
            Cargo = UPPER('$Cargo'),
            tel = '$tel',
            email = '$email',
            id_curso = '$idProducto'
            WHERE independientes.no_documento = '$docu' AND independientes.id_curso = '$ci'";

			if ($mysqli->query($query) === TRUE) {
				echo "Datos actualizados correctamente";
			} else {
				echo "Error al actualizar los datos: " . $mysqli->error;
			}
		}

		else
		{
			// lo creamos en la tabla por que no existe
			$insert_query = "INSERT INTO independiente(num_doc,Empresatrabaja,CiudadResidencia,Cargo,tel,email,id_curso) 
							VALUES (UPPER('$no_documento'),UPPER('$Empresatrabaja'),UPPER('$CiudadResidencia'),UPPER('$Cargo'),'$tel','$email','$idProducto')";
			if (!$mysqli->query($insert_query)) {
				die("Problemas al insertar datos: " . $mysqli->error);
			}
			
		}
	} else { 
		//escogio empresa 
		if ($exiteIndependient== 1)
		{
			$query2 = "DELETE FROM independiente WHERE id_curso = '$docu' AND id_curso = '$ci'";

			if ($mysqli->query($query2) === TRUE) {
				echo "Registro eliminado correctamente";
			} else {
				echo "Error al eliminar el registro: " . $mysqli->error;
			}
		}
		
	}
	/*  FIN  verificamos que la id empresa siga siendo idependiente */
/*---------------------------------INDEPENDIENTES  EMPRESA-----------------------------------*/



/* ---------------------------INSERTAR CAMBIOS TABLA CERTIFICADO------------------ */	
    /* INSERTAR CAMBIOS TABLA CERTIFICADO */
    
	$query2 ="UPDATE certificado 
	SET nombre=UPPER('".$nombre."'),
	ti_doc='$ti_doc',
	num_doc=UPPER('".$no_documento."'),
    id_curso='$idProducto',
	id_empresa='$idEmpresa',
	estado='".$estado."',
	fecha='".$fecha."',
	imprimir='".$imprimir."',
	ciudad_exp='".$ciudad_exp."'
	WHERE certificado.id_certificado = $v1 ";
	
	if ($mysqli->query($query2) === TRUE) {
		echo "Datos actualizados correctamente";
	} else {
		echo "Error al actualizar los datos: " . $mysqli->error;
	}
 
	$mensaje= "<center> <br> <br> <h2>Felicidades Sentencia ejecutada correctamente<h2></center><br/>
	<br/>
	<center>
	<a href='mod_cert.php' class='btn btn-primary btn-lg'>volver a modificar </a> <br><br>
	<a href='cert.php' class='btn btn-primary btn-lg' >crear un nuevo certificado  </a>
	</center>";
	
	
/* -------------------------INSERTAR CAMBIOS TABLA CERTIFICADO--------------------- */
	
?>


<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/titulos.css">
	<link rel="shortcut icon" type="image/x-icon"  href="imagenes/favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/saphv2.css" rel="stylesheet">
    <title>Modificar Certificado</title>
</head>
<body >

<?php include('include/header.php'); ?>
	<div class="container">
    	<div class="row">
		<?php include('include/menu.php'); ?>
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