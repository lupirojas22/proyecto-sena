<?php
	header('Content-Type: text/html; charset=UTF-8');
	//include 'connections/conexion.php';
    require_once("Connections/conexion.php");

    $captura = $_POST['Documento'];

    if (!empty($captura)) {
        // Inicializar el valor de existencia
        $existe = 0;

        // Preparar la consulta SQL de forma segura usando consultas preparadas
        $stmt = $mysqli->prepare("SELECT * FROM certificado WHERE num_doc = ?");
        $stmt->bind_param('s', $captura);  // 's' indica que el parámetro es una cadena de texto
        $stmt->execute();

        // Obtener el resultado de la consulta
        $result = $stmt->get_result();

        // Verificar si existen resultados
        $totalRows_total = $result->num_rows;

        if ($totalRows_total > 0) {
            // Obtener los datos del primer resultado
            $row_total = $result->fetch_assoc();
            $idProd = $row_total['id_curso'];
        }

        // Cerrar la declaración preparada
        $stmt->close();
    } else {
        // Manejar el caso en que 'Documento' está vacío
        echo "El campo de documento está vacío.";
    }

    
?>



<!DOCTYPE html>
<html lang="esp">
<head>
	<title>Consulta2</title>
    <meta name="keywords" content="">
	<meta name="description" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="shortcut icon" type="image/x-icon"  href="images/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nivo-lightbox.css">
	<link rel="stylesheet" href="css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/estilo.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

</head>
<body>
	
<?php include('include/menu.php'); ?>

<div id="consulta-header">
    <div class="container">
        <div class="row">
            <?php 
            // Consultar si el documento existe y está inactivo
            $stmt = $mysqli->prepare("SELECT * FROM certificado WHERE num_doc = ? AND activo = '0'");
            $stmt->bind_param('s', $captura);  // 's' para string (número de documento)
            $stmt->execute();
            $result = $stmt->get_result();
            $existe = $result->num_rows;
            
            if ($existe == 1) {
                // Si se encuentra el documento, mostramos la tabla
                $row_total = $result->fetch_assoc();  // Obtenemos la primera fila
                ?>
                <center>
                    <h3><?php echo $row_total['nombre']; ?></h3>
                    <div class="table-container">
                        <table border="1" class="table-container">
                            <thead>
                                <tr>
                                    <th>Formado en</th>
                                    <th>Fecha Exp.</th>
                                    <th>Estado</th>
                                    <th>Activo</th>
                                    <th>Certificado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // Obtener el nombre del curso
                                $idProd = $row_total['id_curso'];
                                $busqcur = $mysqli->prepare("SELECT nom_curso FROM curso WHERE id_curso = ?");
                                $busqcur->bind_param('i', $idProd);
                                $busqcur->execute();
                                $result_curso = $busqcur->get_result();
                                $row_curso = $result_curso->fetch_assoc();
                                ?>
                                <tr>
                                    <td><center><?php echo $row_curso['nom_curso']; ?></center></td>
                                    <td><center><?php echo $row_total['fecha']; ?></center></td>
                                    <td><center><?php echo $row_total['estado']; ?></center></td>
                                    <td><center><?php echo $row_total['activo'] == '0' ? 'Activo' : 'Vencido'; ?></center></td>
                                    <td><center>
                                        <?php
                                        // Mostrar enlace para imprimir si está certificado y activo
                                        if ($row_total['estado'] == 'Certificado') {
                                            echo "<a target='_blank' href='Admin/pdf/pdf.php?cc={$row_total['id_certificado']}'>Imprimir</a>";
                                        } else {
                                            echo "No se puede descargar";
                                        }
                                        ?>
                                    </center></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr noshade="noshade" size="2" width="80%" />
                </center>
            <?php
            } else { 
                // Si no se encuentra el documento
                echo "<center>";
                echo "No se encuentra un certificado en nuestra base de datos con el número de documento $captura. <br>
                      Póngase en contacto con nosotros <br><br> <a href='contacto.php' class='btn'> Contáctenos </a>";
                echo "</center>";
            }  
            ?>
            <center>
                </br>
                <a href="consulta1.php" class="btn btn-default">Nueva Consulta</a>
            </center>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>	
<script src="js/nivo-lightbox.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>