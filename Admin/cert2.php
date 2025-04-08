<?php
	header('Content-Type:text/html; charset=UTF-8');
	require("accede.php");
    include("../Connections/conexion.php");
	//include 'conexion.php';
	
	/*nombre*/
	$nombre=$_POST['nombre'];
	/*nombre*/

	/* Numero Docuemnto*/
	
	$no_documento=strtoupper($_POST['no_documento']);
	/*Numero Docuemnto*/

	/*tipo documento*/
	$ti_doc=$_POST['ti_doc'];
	/*tipo documento*/

	/*curso se guarda el id*/
	$id_curso=$_POST['curso'];
	/*cursoo*/

/*IDEMPRESA Y PRECIO */
	$tipo_cert=$_POST['tipo_cert'];

	// tipo_cert: mira si es independiente o si es empresa.
	if($tipo_cert==0)
	{  
  		$idEmpresa =$tipo_cert;     // INDEPENDIENTE
	}
	else
	{  
    	$idEmpresa=$_POST['empresa']; // EMPRESA GUARDAMOS ID 
    	/*buscamos el nit de empresa en tabla empresa*/
		$sql = "SELECT * FROM empresas WHERE IdEmpresa = $idEmpresa";
		$result = $mysqli->query($sql);
		
		if ($result->num_rows > 0) {

			while ($row = $result->fetch_assoc()) {
				$NITEmpresa=$row['Nit'];
			
			}
		} else {
			echo "No se encontraron resultados.";
		}
	 
    }
   	/*FIN buscamos el nit de empresa*/    	
	
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
	/* --lugar exp---*/
	$ciudad_exp =$_POST['ciudad_exp'];
	/*FIN ESTADO CERTIFICACION*/

	/* GENERAL EL CODIGO  CONSECUTIVO */
	/*---------------------------------------------------------*/
	//buscamos el idcurso del curso escogido 
	$cursoBus = "SELECT * FROM curso where id_curso='$id_curso'";
	$result2 = $mysqli->query($cursoBus);
	
	if ($result2->num_rows > 0) {
		// Iterar sobre los resultados
		while ($row4 = $result2->fetch_assoc()) {
		$idCursoConsecutivo= $row4['id_subcategoria'];    // id del curso para general el consecutivo
		$curso=$row4['nom_curso'];                 // nombre curso para enviarlo a la pagina de documentos
			
		}
	} else {
		echo "No se encontraron resultados.";
	}

switch($idCursoConsecutivo)
{
    case 1:
    $Tipo_consecutivo ="CP";		
    break;
	case 2:
    $Tipo_consecutivo ="MR";	
    break;
	case 3:
    $Tipo_consecutivo ="MC";
	break;
	case 4:
    $Tipo_consecutivo ="MA";
	break;
	case 5:
    $Tipo_consecutivo ="IS";
	break;
	case 6:
    $Tipo_consecutivo ="CA";	
    break;
	case 7:
    $Tipo_consecutivo ="EC";
	break;
	case 8:
    $Tipo_consecutivo ="IC";
	break;
	case 9:
    $Tipo_consecutivo ="AD";
	break;
	case 10:
    $Tipo_consecutivo ="TC";
	break;
	case 11:
    $Tipo_consecutivo ="SP";	
    break;
	case 12:
    $Tipo_consecutivo ="AL";
	break;
	case 13:
    $Tipo_consecutivo ="CM";
	break;
	case 14:
    $Tipo_consecutivo ="TV";
	break;
}

// Variables de fecha
$año = date("y");
$mes = date("m");
$dia = date("d");

// Consultar el consecutivo existente
$consulta2 = $mysqli->query("SELECT * FROM consecutivo WHERE Tipo_consecutivo='$Tipo_consecutivo'");
if (!$consulta2) {
    die("Problema al consultar Consecutivo: " . $mysqli->error);
}

function zerofill($num, $zerofill = 4)
{
    return str_pad($num, $zerofill, '0', STR_PAD_LEFT);
}

if ($consulta2->num_rows == 0) {
    $Consecutivo = 1;
    $Init = 0;
} else {
    $row = $consulta2->fetch_assoc();
    $Consecutivo = $row['Consecutivo'];

    if ($Consecutivo > 9999) {
        $Consecutivo = 0;
    }
    ++$Consecutivo;
    $Init = 1;
}

$cons = zerofill($Consecutivo);

if ($Init == 0) {
    $insert_query = "INSERT INTO consecutivo (Tipo_consecutivo, Consecutivo, año) VALUES ('$Tipo_consecutivo', '$Consecutivo', '$año')";
    if (!$mysqli->query($insert_query)) {
        die("Problemas al insertar datos: " . $mysqli->error);
    }
} else {
    $update_query = "UPDATE consecutivo SET Consecutivo=$Consecutivo, año=$año WHERE Tipo_consecutivo='$Tipo_consecutivo'";
    if (!$mysqli->query($update_query)) {
        die("Problemas al actualizar datos: " . $mysqli->error);
    }
}




$ConsecutivoTotal="$año$Tipo_consecutivo$cons";
/*FIN DE GENERAL EL CONSECUTIVO */
/*----------------------------------------------------------------------------------------------*/


/* fecha ingreso al sistema el certificado*/

$Fecha_ingresol= date("Y")."-$mes-$dia";

/* fecha ingreso al sistema el certificado*/

/* Activo  el certificado  es cuando pase un año*/
$Activo="0";
// activo = 0  si esta activo
//activo = 1  no activo 
/*FIN ACTIVO   el certificado  es cuando pase un año*/

/*VERIFICAMOS PRIMERO SI YA EXISTE EL USUARIO CON = CURSO,CC Y ESTA ACTIVO */
$existe = 0;

// Consulta para verificar si el certificado existe
$consulta = $mysqli->query("SELECT * FROM certificado WHERE num_doc='$no_documento' AND id_curso='$id_curso' AND Activo='0'");

if (!$consulta) {
    die("Problema al consultar el certificado: " . $mysqli->error);
}

// Iterar sobre los resultados
while ($fila6 = $consulta->fetch_assoc()) {
    $existe = 1;  // Ya existe 

    // Actualizar el certificado
    $update_query = "UPDATE certificado SET Activo='1' WHERE num_doc='$no_documento' AND id_curso='$id_curso' AND Activo='0'";
    if (!$mysqli->query($update_query)) {
        die("Problemas al actualizar datos: " . $mysqli->error);
    }
}
/* FIN VERIFICAMOS PRIMERO SI YA EXISTE EL USUARIO CON = CURSO, CC Y ESTA ACTIVO */

if ($existe == 0) {
    $cons_emp = "SELECT * FROM independiente WHERE num_doc='$no_documento'";
    $resul = $mysqli->query($cons_emp);
    if (!$resul) {
        die("Problema al consultar independiente: " . $mysqli->error);
    }
    if ($resul->num_rows > 0) {
        $exist_emp = 1;
    } else {
        $exist_emp = 0;
    }
    if ($idEmpresa == 0) {
        if ($exist_emp == 0) {
            // INSERTAMOS LOS DATOS A LA TABLA INDEPENDIENTE
            $insert_independiente = "INSERT INTO independiente(num_doc, Empresatrabaja, CiudadResidencia, Cargo, tel, email, id_curso)
                VALUES(UPPER('$no_documento'), UPPER('$Empresatrabaja'), UPPER('$CiudadResidencia'), UPPER('$Cargo'), '$tel', '$email', '$id_curso')";
            if (!$mysqli->query($insert_independiente)) {
                die("Problemas al insertar datos en independiente: " . $mysqli->error);
            }
        } else {
            // ACTUALIZAMOS LOS DATOS EN LA TABLA INDEPENDIENTE
            $update_independiente = "UPDATE independiente SET Empresatrabaja=UPPER('$Empresatrabaja'), CiudadResidencia=UPPER('$CiudadResidencia'), Cargo=UPPER('$Cargo'), tel='$tel', email='$email', id_curso='$id_curso' WHERE num_doc='$no_documento'";
            if (!$mysqli->query($update_independiente)) {
                die("Problemas al actualizar datos en independiente: " . $mysqli->error);
            }
        }
    }

    // INSERTAMOS LOS DATOS A LA TABLA CERTIFICADO
    $insert_certificado = "INSERT INTO certificado(nombre, ti_doc, num_doc, id_curso, id_empresa, estado, fecha, imprimir, consecutivo, fecha_ingreso, ciudad_exp, activo)
        VALUES(UPPER('$nombre'), '$ti_doc', UPPER('$no_documento'), UPPER('$id_curso'), '$idEmpresa', '$estado', '$fecha', '$imprimir', '$ConsecutivoTotal', '$Fecha_ingresol', '$ciudad_exp', '$Activo')";
    if (!$mysqli->query($insert_certificado)) {
        die("Problemas al insertar datos en certificado: " . $mysqli->error);
    }

  

    // Mensajes
    $mensaje1 = "<center> <h2>Se ha creado el certificado de $nombre con número de documento $no_documento </h2></center><br>";
    $mensaje2 = "<center>
           
            <h2>Para generar más certificados</br> dar clic en Volver </h2>  <br>
            <a href='cert.php'  class='btn btn-primary btn-lg active'>VOLVER</a>
            </font>
            </center>";
} elseif ($existe == 1) {
    $mensaje1 = "<center> <h2>Ya existe un certificado creado para $nombre con número de documento $no_documento y se encuentra activo</h2></center><br>";
    $mensaje2 = "";
}


/*FIN INGRESAMOS LOS DATOS A LAS RESPECTIVAS TABLAS  */
	
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/fromularios.css">
    <link rel="stylesheet" type="text/css" href="css/titulos.css">
    <link rel="shortcut icon" type="image/x-icon"  href="imagenes/favicon.ico">
    <title> Ingreso certificado</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/saphv2.css" rel="stylesheet">
</head>

<body>

	<?php include('include/header.php'); ?>
	<div class="container">
    <div class="row">
    <?php include('include/menu.php'); ?>
    <div class="col-md-9">
    <div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-desktop"></i> Inicio</div>
    <div class="panel-body">
        </br>
        <?php echo $mensaje1; ?>                  
        <?php echo $mensaje2; ?>
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
