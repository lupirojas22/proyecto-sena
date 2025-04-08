<!DOCTYPE html>
<html lang="esp">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Contacto</title> 
    <link rel="shortcut icon" type="image/x-icon"  href="images/favicon.ico">
	<meta name="description" content="">	
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
<div id="contact">
	<div class="container">
		<div class="row">
			<div class="contacto row mt50"> 
            	<div class="col-md-offset-2 col-md-8 col-sm-12">
                    <h3 class="contacto">Contáctenos</h3>
                    <p>Comunícate con nosotros con gusto te atenderemos. Cotiza un curso  </p>
                </div>
				<div class="col-md-8 col-sm-8 mt30">
					<form  action="correo_contact.php" method="get" name="formulario">
                		<div class="col-md-6 col-sm-6">
                        	<label for="nombre" >NOMBRE</label>
                         	<input name="nombre" type="text" class="form-control" id="nombre" required>
                         	<label for="email" >E-MAIL</label>
                         	<input name="email" type="email" class="form-control" id="email" required>
                        </div>
                    	<div class="col-md-6 col-sm-6">
							<label for="mensaje" >MENSAJE</label>
							<textarea name="mensaje" rows="6" class="form-control" id="mensaje" required></textarea>
						</div>
			            <br> <br>  <br> <br>  <br> <br>  <br> <br> 
						<div class="col-md-6 col-sm-6">
                        	<button type="submit" name="submit" class="btn btnuestro btn-default"  >Enviar</button>
                        </div>
					</form>
				</div>
				<div class="col-md-4 col-sm-4 address">
					<div>
						<h3 class="contacto">E-mail</h3>
						<p>info@correo.com</p>
					</div>
                	<div>
						<h3 class="contacto">Teléfono</h3>
						<p>000000</p>
                    </div>
                    <br> <br>
                	<h3>Asesores</h3>
					<p> * Sí desea más información contáctese con nuestros asesores a través del siguiente link:<h3> <a target='_blank' href="asesores.php">Nuestros asesores.</a></p>         
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