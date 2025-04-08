<?php 
	// Validación y sanitización de datos
	$nombre = isset($_GET['nombre']) ? htmlspecialchars(trim($_GET['nombre'])) : '';
	$correo = isset($_GET['email']) ? filter_var(trim($_GET['email']), FILTER_VALIDATE_EMAIL) : '';
	$mensaje = isset($_GET['mensaje']) ? htmlspecialchars(trim($_GET['mensaje'])) : '';

	// Verificar que los campos no estén vacíos y el correo sea válido
	if ($nombre && $correo && $mensaje) {
		// Componer el cuerpo del mensaje
		$cuerpo = "Este mensaje fue enviado por: $nombre\n";
		$cuerpo .= "Su e-mail es: $correo\n";
		$cuerpo .= "Mensaje: $mensaje";

		// Encabezados adicionales
		$headers = "From: $correo\r\n";
		$headers .= "Reply-To: $correo\r\n";
		
		// Enviar el correo
		if (mail('lupirojas22@gmail.com', 'Contacto de pagina web', $cuerpo, $headers)) {
			$error = "Su mensaje se ha enviado.";
		} else {
			$error = "Error, su mensaje no se ha enviado. Por favor, intente más tarde.";
		}
	} else {
		$error = "Por favor, complete todos los campos correctamente.";
	}
?>

<!DOCTYPE html>
<html lang="esp">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Correo contacto</title>
    <meta name="keywords" content="">
	<meta name="description" content="">
    <link rel="shortcut icon" type="image/x-icon"  href="images/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nivo-lightbox.css">
	<link rel="stylesheet" href="css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="css/templatemo-style.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body>

<?php include('include/menu.php'); ?>	
<div id="contact-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12"></div>
		</div>
	</div>
</div>
<div id="contact">
	<div class="container">
		<div class="row">
			<div id="enviado">
				<center>
					<h2>
						<?php 
						echo $error;
						?>
					</h2>
				</center>
            	<div class="col-md-offset-2 col-md-8 col-sm-12">
					<center> 
                    	<a href="contacto.php" class="btn btn-default ">Volver</a>
                    </center>
				</div>
			</div>         
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