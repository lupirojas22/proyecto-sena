<?php
	header('Content-Type:text/html; charset=UTF-8');
	require("accede.php");
	include("../Connections/conexion.php");
    try {
        /* CONSULTA CERTIFICADO */
        $sql = "SELECT * FROM certificado WHERE estado = 'Certificado' AND activo = '0'";
        $result = $mysqli->query($sql);
        $existe = 0;
    
        // Verifica si la consulta fue exitosa y si hay resultados
        if ($result) {
            if ($result->num_rows > 0) {
                $existe = 1;
                $row_total = $result->fetch_assoc();
            } else {
                $existe = 0;
            }
        } else {
            throw new Exception('Error en la consulta: ' . $mysqli->error);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <link rel="stylesheet" type="text/css" href="css/tablamodificar.css">
    <link rel="stylesheet" type="text/css" href="css/titulos.css">
    <link rel="stylesheet" type="text/css" href="css/busqueda.css">
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/saphv2.css" rel="stylesheet">
    <title>Imprimir Cert</title>
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
                    <div class="panel panel-default"></div>
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-2 col-md-2"></div>
                        <form action="cert_pdf_bus.php" method="post" name="form" enctype="multipart/form-data" class="form-horizontal col-sm-9 col-md-9">
                            <!-- escoger empresa o # referencia -->
                            <select name="bus" id="bus" class="form-control">
                                <option value="0">Empresa</option>
                                <option value="1">N.documento</option>
                            </select>
                            <!-- escoger empresa o # referencia -->

                            <!-- EMPRESA -->
                            <div id="oculto" style="display:block;" class="form-group">
                                <br>
                                <p>Escoja la empresa que desea consultar.</p>
                                <?php
                                $expedicion = "SELECT * FROM empresas WHERE NombreEmpresa != 'ANULADA' ORDER BY NombreEmpresa ASC";
                                $rec = $mysqli->query($expedicion);
                                echo "<select name='empresa' class='form-control' id='empresa'>";
                                if ($rec) {
                                    // Recorre los resultados
                                    while ($row = $rec->fetch_assoc()) {
                                        echo "<option value='{$row['IdEmpresa']}'>{$row['NombreEmpresa']}</option>";
                                    }
                                    echo "</select>";
                                    // Libera el conjunto de resultados
                                    $rec->free();
                                } else {
                                    throw new Exception('Error en la consulta: ' . $mysqli->error);
                                }
                                ?>
                            </div>
                            <!-- EMPRESA -->

                            <!-- N REFERENCIA -->
                            <div id="ref" style="display:none;" class="form-group">
                                <br>
                                <p>Ingresar N.Documento.</p>
                                <input type="text" name="referencia" class="form-control"/>
                            </div>
                            <!-- N REFERENCIA -->

                            <br>
                            <span class="col-sm-4"></span>
                            <input type="submit" value="Buscar" name="Buscar" class="btn-primary btn-lg col-sm-4"/>
                        </form>
                    </div>
                    <br>
                    <div class="panel-heading">
                        <center>Tabla Imprimir certificados</center>
                    </div>
                    <div class="panel-body">
                        <!-- MIRAMOS SI EXISTEN CERTIFICADOS QUE MOSTRAR -->
                        <?php if ($existe == 1) { ?>
                            <div class="table-responsive">
                                <!-- COMIENZO DE LA TABLA BUSQUEDA -->
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <!-- titulos de la tabla -->
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
                                    <!-- FIN titulos de la tabla -->

                                    <!-- la consulta de los certificados -->
                                    <tbody>
                                    <!-- Comienzo del while busqueda -->
                                    <?php do { ?>
                                        <tr class="odd gradeX">
                                            <!-- NOMBRE -->
                                            <td><?php echo $row_total['nombre']; ?></td>
                                            <!-- NOMBRE -->

                                            <!-- # DOC -->
                                            <td class="center"><?php echo $row_total['num_doc']; ?></td>
                                            <!-- FIN # DOC -->

                                            <!-- NOMBRE DEL CURSO -->
                                            <?php
                                            // Consultamos el nombre del curso en la tabla curso con el id
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
                                            <!-- FIN NOMBRE DEL CURSO -->

                                            <!-- DIV DE EMPRESA -->
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
                                            <!-- FIN DIV DE EMPRESA -->

                                            <!-- ESTADO DEL CERTIFICADO -->
                                            <td class="center"><?php echo $row_total['estado']; ?></td>
                                            <!-- FIN ESTADO DEL CERTIFICADO -->

                                            <!-- FECHA -->
                                            <td class="center"><?php echo $row_total['fecha_ingreso']; ?></td>
                                            <!-- FIN FECHA -->

                                            <!-- LINK DE IMPRIMIR -->
                                            <td>
                                                <!-- imprimir -->
                                                <?php
                                                echo "<a target='_blank' href='pdf/pdf.php?cc={$row_total['id_certificado']}'>Imprimir</a>";
                                                ?>
                                            </td>
                                            <!-- FIN LINK DE IMPRIMIR -->
                                        </tr>
                                    <?php
                                    } while ($row_total = $result->fetch_assoc());
                                    $result->free();
                                    $mysqli->close();
                                    ?>
                                    <!-- fin del while busqueda -->
                                    </tbody>
                                    <!-- fin la consulta de los certificados -->
                                </table>
                                <!-- FIN DE LA TABLA BUSQUEDA -->
                            </div>
                        <?php } else { ?>
                            <center><h3>No hay certificados para Imprimir</h3></center>
                        <?php } ?>
                    </div>
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
            		"lengthMenu": "Ver _MENU_ registros por p&aacute;gina",
            		"zeroRecords": "No se encontr&oacute nada - lo siento",
            		"info": "Mostrando p&aacute;gina _PAGE_ de _PAGES_",
            		"infoEmpty": "No hay registros disponibles",
            		"infoFiltered": "(Filtrado de _MAX_ registros totales)",
					"loadingRecords": "Loading...",
     				"processing":  "Procesando...",
    				"search": "Buscar : ",
					"paginate":
					{
        				"first":    "Primero",
       					"last":     "�0�3ltimo",
        				"next":     "Sgte",
        				"previous": "Anterior"
        			},
           		}
           	} );
			
        });
	</script> 
	<!-- FIN SCRIPT TABLA -->   
	
		<!-- script  visibilidad div de acuerdo a lo que escojan  -->
<script>
    prevVal = "";
    $('#bus').change(function(){ 
        
    /*comprobamos que busqueda escogieron*/
    if(this.value === "0")  //empresa
    {   document.getElementById('oculto').style.display = 'block';
        document.getElementById('ref').style.display = 'none';
    }
    if(this.value === "1") //  N refencia
    {   document.getElementById('oculto').style.display = 'none';
        document.getElementById('ref').style.display = 'block';
    }
    });
    </script>
    
  
  </body>
</html>
</body>
</html>



   