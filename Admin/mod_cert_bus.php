<?php
	header('Content-Type:text/html; charset=UTF-8');
	include("../Connections/conexion.php");
	require("accede.php");
	
   $Idempresa=$_POST['empresa'];

    $bus=$_POST['bus'];
    $referencia=$_POST['referencia'];

    if ($bus == '0') {
        $busq = "SELECT * FROM certificado WHERE id_empresa = $Idempresa AND activo = 0";
        $result = $mysqli->query($busq);
    
        if ($result && $result->num_rows > 0) {
            $existe = 1;
            $row_total = $result->fetch_assoc();
        } else {
            $existe = 0;
            if (!$result) {
                throw new Exception('Error en la consulta: ' . $mysqli->error);
            }
        }
    } elseif ($bus == '1') {
        $busq = "SELECT * FROM certificado WHERE num_doc = $referencia AND activo = 0";
        $result = $mysqli->query($busq);
    
        if ($result && $result->num_rows > 0) {
            $existe = 1;
            $row_total = $result->fetch_assoc();
        } else {
            $existe = 0;
            if (!$result) {
                throw new Exception('Error en la consulta: ' . $mysqli->error);
            }
        }
    }

    
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
    <link rel="stylesheet" type="text/css" href="css/tablamodificar.css">
    <link rel="stylesheet" type="text/css" href="css/titulos.css">
    <link rel="stylesheet" type="text/css" href="css/busqueda.css">
    <link rel="shortcut icon" type="image/x-icon"  href="imagenes/favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/saphv2.css" rel="stylesheet">
    <title> Editar</title>
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
   
			 <div class="panel panel-default">
        
        <div class="panel-heading">
        <center>Tabla editar certificados</center>
        </div>
        <div class="panel-body">
		 <!--MIRAMOS SI EXISTEN  QUE MOSTRAR --> 
        <?php
		if($existe == 1)
		{
		
		?>

        <div class="table-responsive">
        	<!-- COMIENZO DE LA TABALA BUSQUEDA  -->
        	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <!-- titulos de la tabla  -->
                <thead>
                    <tr>
                        <th><center>Nombre</center></th>
                        <th>Tipo Doc</th>
                        <th><center>Documento</center></th>
                        <th><center>Curso</center></th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <!-- FIN titulos de la tabla  -->

                <!-- la consulta de los certificados  -->
                <tbody>
                	<!--Comienso del while busqueda --> 
                    <?php
                    

                    do{ ?>
                    <tr class="odd gradeX">
                    	<!--NOMBRE -->
                        <td><?php echo $row_total['nombre']; ?></td>
                        <!--NOMBRE -->

                        <!--TIPO DE DOC -->
                        <?php
							$sql8="SELECT * FROM tipo_doc";
                            $rec8 = $mysqli->query($sql8);
							
							$ti_doc=$row_total['ti_doc'];
							while($row8=$rec8->fetch_assoc())
							{
								switch($ti_doc)
   								{
       								case $row8['id_doc']:
      							    $tipo_documento= $row8['abrev_doc']; // guardamos tipo de doc
									break;
									case 0:
									$tipo_documento= "No Definido"; //Por si no esta definido para evitar bucl
									break;
								}
							}
						?>                                   
                        <td><center><?php echo strtoupper ($tipo_documento);?></center></td>
                        <!-- FIN TIPO DE DOC -->
                                            
                        <!-- # DE DOC -->                    
                        <td><?php echo $row_total['num_doc']; ?></td>
                        <!--FIN # DE DOC -->                    
                         
                        <!--NOMBRE DEL CURSO -->                    
                        <?php
                        	//consultamos el nombre  curso en la tabla producto con el id
							$sql1="SELECT * FROM curso";
                            $rec= $mysqli->query($sql1);
							
							$nombretotal=$row_total['id_curso'];
                            while($row1= $rec->fetch_assoc())
							{
								switch($nombretotal)
								{
									case $row1['id_curso'] :
									$nom_curso= $row1['nom_curso'];  // nombre del curso 
									$idCurso=$row1['id_curso'];    //guardamos el id curso
      							  	
								}	
							}	
						?>
                        <td class="center"><?php echo $nom_curso; ?></td>
                        <!--FIN NOMBRE DEL CURSO -->

                        <!--ESTADO DEL CERTIFICADO  --> 
                        <td class="center"><?php echo $row_total['estado']; ?></td>
                        <!--FIN ESTADO DEL CERTIFICADO  -->

                        <!--LINK DE EDITAR Y EDITAR DOCUMENTOS -->
						<td>
							<!--EDITAR -->
							<a href="mod_cert2.php?id=<?php echo $row_total['id_certificado']; ?> " class="btn btn-link">Editar</a> <br><br>

							<!--DOCUMENTOS EDITAR -->
                           <!-- <a href="mod_cert_doc.php?cc=<?php echo $row_total['no_documento'];?>&idcurso=<?php echo $idCurso ?>&id=<?php echo $row_total['id_certificado']; ?>" class="btn btn-link">Edit docs</a> <br>--> 
                        </td>
                        <!--FIN LINK DE EDITAR Y EDITAR DOCUMENTOS -->
                    </tr>
                                 
                    <?php 
                    // Obtener la siguiente fila
                    
                    $row_total = $result->fetch_assoc();
                   
                     } while ($row_total); ?>  
                    <!--fin del while busqueda -->      
                </tbody>
                <!-- fin la consulta de los certificados  -->

            </table>
            <!-- FIN DE LA TABALA BUSQUEDA  -->
 				
        </div>
        
           <?php
		}
		else
		{
			echo "<center><h3>No hay  certficados </h3></center>";
		}
		?>
        
        </div></div></div>		
                  
                  
                  
                  
                  
                  
    </div>
    </div>
    </div>
    </div>
        
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.js"></script>
    <script src="js/stack-blur.js"></script>
    <script src="js/saphv2.js"></script>  
    <script src="assets/jquery-1.10.2.js"></script>
    
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/jquery.dataTables.js"></script>
    <script src="assets/dataTables.bootstrap.js"></script>

    <!--Script que controla idioma y detalles de la tabla -->
    <script>
	
        $(document).ready(function ()
        {
        	$('#dataTables-example').dataTable(
        	{
        		"language": 
        		{
            		"lengthMenu": "Ver _MENU_ registros por página",
            		"zeroRecords": "No se encontró nada - lo siento",
            		"info": "Mostrando página _PAGE_ de _PAGES_",
            		"infoEmpty": "No hay registros disponibles",
            		"infoFiltered": "(Filtrado de _MAX_ registros totales)",
					"loadingRecords": "Loading...",
     				"processing":  "Procesando...",
    				"search": "Buscar : ",
					"paginate":
					{
        				"first":    "Primero",
       					"last":     "Último",
        				"next":     "Sgte",
        				"previous": "Anterior"
        			},
           		}
           	} );
			
        });
	</script> 
	<!-- FIN SCRIPT TABLA -->   
    
  
  </body>
</html>