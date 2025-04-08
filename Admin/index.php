<!DOCTYPE html>
<html lang="esp">
<head>   
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cpanel</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">   
    <link href="css/saphv2.css" rel="stylesheet"> 
    <link rel="shortcut icon" type="image/x-icon"  href="imagenes/favicon.ico">
</head>
<body class="loginbg">
	<div class="container">
    	<div class="row">
    		<div class="col-sm-6 col-md-4 col-md-offset-4">
        		<div class="account-wall">
                	<img class="profile-img" src="imagenes/saph-login-logo.png" alt="">
                	<form action="index2.php"  class="form-signin" method="post">
                       	<input type="text" class="form-control" npaste="return false" onKeyPress="javascript:return NoEspacio(event,this)" name="usuario"  placeholder="Nombre" required >      
                       	<input type="password" class="form-control" name="contra" placeholder="Contraseña" required />
                       	<button class="btn btn-lg btn-info btn-block" type="submit"> Iniciar Sesión</button>
                       	<a href="../index.php" class="pull-right need-help">Regresar </a><span class="clearfix"></span>
					</form>
				</div>
			</div>          
		</div>
	</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/saphv2.js"></script>
    
</body>
</html>