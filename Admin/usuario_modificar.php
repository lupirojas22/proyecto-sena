<?php
	header('Content-Type:text/html; charset=UTF-8');
	require("accede.php");
	include("../Connections/conexion.php");
	
    $total = "SELECT * FROM usuario";
    $result = $mysqli->query($total);
    $row_total = $result->fetch_assoc();
    $existe = $result && $result->num_rows > 0;

    if ($result) {
        // Libera el conjunto de resultados
        $result->free();
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
    <title>Usuarios </title>
</head>

<body >

	<?php include('include/header.php'); ?>
    <div class="container">
    <div class="row">
	<?php include('include/menu_adm.php'); ?>
	<div class="col-md-9">
    <div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-desktop"></i> Inicio</div>
	<div class="panel-body">
    <br> 
    <div class="panel panel-default">
        <div class="panel-heading">
        <center>Usuarios Sistema</center>
        </div>
        <div class="panel-body">
		 <!--MIRAMOS SI EXISTEN  QUE MOSTRAR --> 
         <?php if ($existe): ?>

        <div class="table-responsive">
        	<!-- COMIENZO DE LA TABALA BUSQUEDA  -->
        	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <!-- titulos de la tabla  -->
                <thead>
                    <tr>
                                        <th>Usuario</th>
                                        <th><center>Nombre</center></th>
                                        <th>Nivel</th>
                                        <th><center>Acci&oacute;n</center></th>
                    </tr>
                </thead>
                <!-- FIN titulos de la tabla  -->

                <!-- la consulta de los certificados  -->
                <tbody>
                	<!--Comienso del while busqueda --> 
                    <?php 
                     $result = $mysqli->query($total);
                     while ( $row_total= $result->fetch_assoc()): ?>
                    <tr class="odd gradeX">
                    	 
                        <!--usuario -->
                        <td><?php echo $row_total['usuario']; ?></td>
                        <!--usuario -->
                        
                        
                        <!--nombre -->
                        <td><?php echo $row_total['nombre']; ?></td>
                        <!--nombre -->
                        
                        <!--nivel -->
                        <td><?php echo $row_total['nivel']; ?></td>
                        <!--nivek -->
                        
                        
        
                         <!-- LINK CAMBIAR USUARIO -->
                        <td>
                        <center>
                      <a href='usuario_modificar2.php?user=<?php echo $row_total['idusuario']; ?>' class="btn btn-primary">Modificar</a>
                      <a href='usuario_eliminar.php?user=<?php echo $row_total['idusuario']; ?>'class="btn btn-info" onClick="return confirmar()">Eliminar</a>
                      </center>
                        </td>
                                 
                        <?php       endwhile; ?> 
                    <!--fin del while busqueda -->      
                </tbody>
                <!-- fin la consulta de los certificados  -->

            </table>
            <!-- FIN DE LA TABALA BUSQUEDA  -->
 				
        </div>
        
           
		<?php else: ?>
            <center><h3>No hay usuarios</h3></center>
            <?php endif; ?>
        
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
            		"info": "Monstrando pagina _PAGE_ de _PAGES_",
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
    
      <!-- SCRIP QUE PREGUNTA SI DESEA ELIMINAR  -->
      <script>
	function confirmar()
	{
		if(confirm('¿Está seguro de eliminar este usuario?'))
		return true;
		else
		return false;
	}
	</script>
    <!-- SCRIP QUE PREGUNTA SI DESEA ELIMINAR  -->
    
    
  
  </body>
</html>