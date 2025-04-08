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
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	    
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
    <title> Imprimir Cert</title>
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
    <br> 

    <div class="panel panel-default">
        <div class="panel-heading">
        <center>Tabla Imprimir certificados</center>
        </div>
        <div class="panel-body">
         <!--MIRAMOS SI EXISTEN certifica QUE MOSTRAR --> 
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
                        <th><center>Documento</center></th>
                        <th><center>Curso</center></th>
                        <th>Empresa</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <!-- FIN titulos de la tabla  -->

                <!-- la consulta de los certificados  -->
                <tbody>
                	<!--Comienso del while busqueda --> 
                    <?php do{ ?>
                    <tr class="odd gradeX">
                    	<!--NOMBRE -->
                        <td><?php echo $row_total['nombre']; ?></td>
                        <!--NOMBRE -->

                         <!--# DOC  --> 
                        <td class="center"><?php echo $row_total['num_doc']; ?></td>
                        <!--FIN # DOC  -->       
                         
                        <!--NOMBRE DEL CURSO -->                    
                        <?php
                        	//consultamos el nombre  curso en la tabla producto con el id
                            $sql1 = "SELECT * FROM curso WHERE id_curso = '{$row_total['id_curso']}'";
                            $rec1 = $mysqli->query($sql1);
                            $Sub_categoria = '';
                            if ($rec1) {
                                while ($row1 = $rec1->fetch_assoc()) {
                                    if ($row1['id_curso'] == $row_total['id_curso']) {
                                        $Sub_categoria = $row1['nom_curso'];
                                        $idCurso = $row1['id_curso'];
                                    }
                                }
                                $rec1->free();	
							}	
						?>
                        <td class="center"><?php echo $Sub_categoria; ?></td>
                        <!--FIN NOMBRE DEL CURSO -->
                        
             
                        <!--DIV DE EMPRESA-->
                        <?php
                                            $IdEmpresa = $row_total['id_empresa'];
                                            if ($IdEmpresa !== "0") {
                                                $consulEmpresas = "SELECT * FROM empresas WHERE IdEmpresa = $IdEmpresa";
                                                $result2 = $mysqli->query($consulEmpresas);
                                                $NombreEmpre = '';
                                                if ($result2) {
                                                    while ($fila4 = $result2->fetch_assoc()) {
                                                        $NombreEmpre = $fila4['NombreEmpresa'];
                                                    }
                                                    $result2->free();
                                                }
                                            } else {
                                                $NombreEmpre = 'INDEPENDIENTE';
                                            }
                         ?>
                        
                        <td class="center"><?php echo $NombreEmpre; ?></td>
               
                        <!-- FIN DIV DE EMPRESA-->
                         
                          
                        <!--ESTADO DEL CERTIFICADO  --> 
                        <td class="center"><?php echo $row_total['estado']; ?></td>
                        <!--FIN ESTADO DEL CERTIFICADO  -->
                        
                        <!--ESTADO DEL FECHA  --> 
                        <td class="center"><?php echo $row_total['fecha_ingreso']; ?></td>
                        <!--FIN ESTADO DEL FECHA  -->


                        <!--LINK DE EDITAR Y EDITAR DOCUMENTOS -->
						<td>
						<!--EDITAR -->
                        <?php   echo "<a target='_blank' href= 'pdf/pdf.php?cc=$row_total[id_certificado]'>Imprimir</a>"; ?>
                        </td>

                        <!--FIN LINK DE EDITAR Y EDITAR DOCUMENTOS -->
                    </tr>
                                 
                    <?php
                                    } while ($row_total = $result->fetch_assoc());
                                    $result->free();
                                    $mysqli->close();
                                    ?>  
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
			echo "<center><h3>No hay  certificados para Imprimir </h3></center>";
		}
		?>
		<center> <a href="cert_pdf.php" class="btn btn-primary">Volver</a></center>
        
        
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
            		"lengthMenu": "Ver _MENU_ registros por p���0�4gina",
            		"zeroRecords": "No se encontr���0�3 nada - lo siento",
            		"info": "Mostrando p���0�4gina _PAGE_ de _PAGES_",
            		"infoEmpty": "No hay registros disponibles",
            		"infoFiltered": "(Filtrado de _MAX_ registros totales)",
					"loadingRecords": "Loading...",
     				"processing":  "Procesando...",
    				"search": "Buscar : ",
					"paginate":
					{
        				"first":    "Primero",
       					"last":     "�0�10��3ltimo",
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