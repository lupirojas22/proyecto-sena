<!DOCTYPE html>
<html lang="esp">
<head>
	<title>Consulta</title>
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
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
	
<?php include('include/menu.php'); ?>

<div id="consulta-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12"></div>  
            <div class="col-md-12 col-sm-12">            
                <center>
                    <h3>Consulta los certificados de las capacitaciones</h3>
                    <br>
                <p >Verifica la validez de un certificado solo se necesita el número de cédula , ingresa el número sin espacios ni puntos. </p>             
                </center>
                <br>           
                <center>
                    <form id="form1" name="form1" method="post" action="consulta2.php" class="user" >
                        <input name="Documento" type="" placeholder="Documento" class="form-control" value=""  required>
                        <br>
                        <input type="submit" value="Buscar" class="btn email"/>
                        <input type="button" onClick="javascript:location.href='index.php';" value="Cancelar" class="btn email"/>
                    </form>
                </center> 
                <center>
                <br><br>
                <p> * Los certificados de alturas se expiden en convenio con Nomada CI Ltda puede verificar la legalidad de la empresa en el siguente link: <a target='_blank' href="http://www.sena.edu.co/es-co/formacion/Paginas/Autorizaciones.aspx?RootFolder=%2Fes-co%2Fformacion%2FAutorizaciones%2FPersonas%20Jur%C3%ADdicas%2FDistrito%20Capital&FolderCTID=0x01200094949DDA03FAFC4788EE0B7D2BFA112D&View=%7BC0A5F2FF-1255-44D9-AA7B-3F5DA6C9DADA%7D#InplviewHash75f38448-fdd6-43d0-9ae2-da74aa7d60cd=Paged%3DTRUE-p_SortBehavior%3D0-p_ID%3D671-PageFirstRow%3D121">Empresas autorizadas SENA </a><br><br>
                * Consulta directamente en el SENA los certificados de nuestro entrenador Mauricio Mejía Charry C.C. 7.702.967 en cursos de trabajo seguro en alturas, en el siguiente link:<br> <a target='_blank' href="http://certificados.sena.edu.co/"> Certificado Digital SENA </a>
                </p>
                </center>                                 
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