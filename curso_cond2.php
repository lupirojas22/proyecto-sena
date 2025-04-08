<?php
header('Content-Type: text/html; charset=UTF-8');

require_once('Connections/conexion.php');

$id_categoria = 1;
$subcategoria = $_GET['sub'];

// Consulta para la tabla 'curso'
$query_curso = "SELECT * FROM curso WHERE activo = 1 AND id_subcategoria = ?";
$stmt_curso = $mysqli->prepare($query_curso);
$stmt_curso->bind_param('i', $subcategoria);
$stmt_curso->execute();
$result_curso = $stmt_curso->get_result();

// Consulta para la tabla 'subcategoria'
$query_subcategoria = "SELECT * FROM subcategoria WHERE id_subcategoria = ?";
$stmt_subcategoria = $mysqli->prepare($query_subcategoria);
$stmt_subcategoria->bind_param('i', $subcategoria);
$stmt_subcategoria->execute();
$result_subcategoria = $stmt_subcategoria->get_result();
$row_totalsub = $result_subcategoria->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Conductores</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nivo-lightbox.css">
    <link rel="stylesheet" href="css/nivo_themes/default/default.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body>

    <?php include('include/menu.php'); ?>
    <div id="portfolio">
        <div class="container">
            <div class="row" id="cursos">
                <center>
                    <h2><?php echo htmlentities($row_totalsub['nom_subcategoria'], ENT_COMPAT, 'UTF-8'); ?></h2>
                    <p>Los documentos solicitados dependiendo del nivel de capacitación solicitada, se deben entregar en medio físico o enviar al correo: @ escaneados <strong>100%</strong> legible.</p>
                </center>

                <?php
                // Recorre los resultados
                while ($row_total = $result_curso->fetch_assoc()) {
                    echo '<div class="cursos row mt30">';
                    echo '<hr>';
                    echo '<div class="col-md-6 col-sm-6">';
                    echo '<h3>' . htmlentities($row_total['nom_curso'], ENT_COMPAT, 'UTF-8') . '</h3>';
                    echo '<p>INTENSIDAD HORARIA CERTIFICADA: ' . htmlentities($row_total['total_horas'], ENT_COMPAT, 'UTF-8') . ' Horas.</p>';
                    echo '<p>' . $row_total['descripcion'] . '.</p>';
                    echo '</div>';
                    echo '<div class="col-md-6 col-sm-6">';
                    echo '<div class="team-wrapper">';
                    echo '<img src="Admin/imagenes/' . $row_total['imagen'] . '" alt="' . htmlentities($row_total['nom_curso'], ENT_COMPAT, 'UTF-8') . '" width="165px" height="165px" />';
                    echo '<h4 class="cursos">' . htmlentities($row_total['nom_curso'], ENT_COMPAT, 'UTF-8') . '</h4>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
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
