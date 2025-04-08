<?php
header('Content-Type:text/html; charset=UTF-8');
require("accede.php");
//mysql_query("SET NAMES utf8");
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon"  href="imagenes/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/forempleado.css"> 
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/saphv2.css" rel="stylesheet">     
	<title> Insertar datos certificado</title>
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
		<center>
		<h1>Insertar datos del certificado</h1>

		    <!--Comienzo formulario  -->
			<form action="cert2.php" method="post" name="form" entype="multipart/form-data" class="form-horizontal" onSubmit="return validar()">
            
             
  			<!--Nombre  -->
  			<div class="form-group">
    		<label for="nombre" class="col-lg-3 control-label" > Nombres y apellidos:</label>
    		<div class=" col-lg-8">
            <input type="text" name="nombre" required=required placeholder="Nombre y Apellido" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" class="form-control"/> 
            </div>
            
            </div>
            <!-- Fin Nombre  -->
                              
        	
                              
            <!--tipo documento  -->
            <div class="form-group">
            <label for="ti_doc"  class="col-lg-3 control-label"> Tipo Documento: </label>
            <div class=" col-lg-8">
            <select  name="ti_doc"  id="ti_doc" class="form-control" required >
                <option value="1" id="option0">Cédula </option> 
                <option value="2" id="option1">Pasaporte</option>
                <option value="3" id="option1">Cédula de Extranjería</option>
                <option value="4" id="option1">Visa</option>
                <option value="5" id="option1">Permiso especial de permanencia</option>
                <option value="6" id="option1">Permiso por Protección Temporal</option>
            </select> 
            </div>
            </div>
            <!--Fin tipo de Documento  -->
                                
            <!-- # documento  -->
            <div class="form-group">
            <label for="no_documento" class="col-lg-3 control-label">Número de Documento:</label>
            <div class=" col-lg-8">
            <input type="text" name="no_documento"  id="doc"  pattern="[0-9]{5,10}" maxlength="10" class="form-control"  required/>
            </div>
            </div>
            <!-- fin # documento  --> 
            
 <!--            CURSO  --> 
            <div class="form-group">
                <label for="curso" class="col-lg-3 control-label">Curso:</label>
            	<div class=" col-lg-8">
                <?php
                                   include("../Connections/conexion.php");
                                    
                                    $sql = 'SELECT * FROM curso';
                                    $result = $mysqli->query($sql);
                                    if ($result) {
                                        echo "<select name='curso' id='curso' class='form-control'>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='{$row['id_curso']}'>{$row['nom_curso']}</option>";
                                        }
                                        echo "</select>";
                                        $result->free();
                                    } else {
                                        throw new Exception('Error en la consulta: ' . $mysqli->error);
                                    }
                                    ?> 
            	</div>
            </div>  
            <!-- Fin CURSO --> 
                                
            <!--MODULO TIPO CERITICACIÓN-->
            <!--TIPO CERTIFICACION  -->
            <div class="form-group">
            <label for="tipo_cert" class="col-lg-3 control-label" > Tipo De Certificación: </label>
             <div class=" col-lg-8">
            <select  name="tipo_cert"  id="tipo_cert" class="form-control" required >
                <option value="1" >EMPRESA</option>
                <option value="0" >INDEPENDIENTE</option> 
            </select> 
            </div>
            </div> 
            <!--TIPO CERTIFICACION  -->
                              
            <!--DIV DE EMPRESA-->
            
            <div id="divEmpresa" style="display:block;" class="form-group">
                <label for="empresa" class="col-lg-3 control-label">Nombre Empresa</label>
                <div class=" col-lg-8">
                <?php
                                    
                                    $consultaEmpresas = "SELECT * FROM empresas";
                                    $result = $mysqli->query($consultaEmpresas);
                                    if ($result) {
                                        echo "<select name='empresa' id='empresa' class='form-control' required>";
                                        while ($row3 = $result->fetch_assoc()) {
                                            echo "<option value='{$row3['IdEmpresa']}'>{$row3['NombreEmpresa']}</option>";
                                        }
                                        echo "</select>";
                                        $result->free();
                                    } else {
                                        throw new Exception('Error en la consulta: ' . $mysqli->error);
                                    }
                                    ?>
                </div>
            </div> 
            <!-- FIN DIV DE EMPRESA-->
                                
            <!-- DIV INDEPENDIENTES-->
            <div id="divIndep" style="display:none;" class="form-group">
               
                <!--Ciudad Residencia -->
                <div class="form-group">
                <label class="col-lg-3 control-label">Ciudad donde trabaja:</label>
                <div class=" col-lg-8">
                <?php
                                       
                                        $expedicion3 = "SELECT * FROM ciudad ORDER BY ciudad ASC";
                                        $result= $mysqli->query( $expedicion3);

                                        if ($result) {
                                        echo "<select name='CiudadResidencia' id='CiudadResidencia' class='form-control'>";
                                        while ($row2 = $result->fetch_assoc()){
                                            echo "<option value='{$row2['ciudad']}'>{$row2['ciudad']}</option>";
                                        }
                                        echo "</select>";
                                        $result->free();
                                    } else {
                                        throw new Exception('Error en la consulta: ' . $mysqli->error);
                                    
                                    } 
                                        ?>
                </div> 
                </div> 
                <!-- Fin Ciudad Residencia -->
                                        
                <!-- empresa del independiente -->
                <div class="form-group">
                <label for="Empresatrabaja" class="col-lg-3 control-label">Empresa donde trabaja :	</label>
                <div class=" col-lg-8">
                <input   type="text" name="Empresatrabaja"  pattern="[A-Za-z0-9\s]+ {5,100}" maxlength="100" class="form-control"/>
                </div>
                </div>
                <!-- empresa del independiente -->
                                        
                <!-- cargo del independiente -->
                <div class="form-group">
                <label for="Cargo" class="col-lg-3 control-label">Cargo :</label>
                <div class=" col-lg-8">
                <input   type="text" name="Cargo"   pattern="[A-Za-z\s]+" class="form-control"/>
                </div>
                </div>
                <!-- cargo del independiente -->
                                        
    			<!-- Tel del independiente -->
                <div class="form-group">
                <label for="tel" class="col-lg-3 control-label">Teléfono</label>
                <div class=" col-lg-8">
                <input   type="tel" name="tel" id="tel" pattern="[0-9]+" maxlength="15"  class="form-control"/>
                </div>
                </div>
                <!-- Tel del independiente -->
                                        
                <!-- email del independiente -->
                <div class="form-group">
                <label for="email" class="col-lg-3 control-label">E-mail</label>
                <div class=" col-lg-8">
                <input   type="email" name="email" class="form-control" />
                </div>
                </div>
                <!-- email del independiente -->    									
               
            </div>
            <!--FIN  DIV INDEPENDIENTES-->
            <!--FIN MODULO TIPO CERITICACIÓN--> 
                                
								
            <!--MODULO ESTADO DE CERTIFICACIÓN--> 
            <div class="form-group">
            <label for="estado" class="col-lg-3 control-label" > Estado Certificación: </label>
            <div class=" col-lg-8">
            <select  name="certificacion"  id="certificacion" class="form-control"  required >
                <option value="En proceso de Certificación" >En proceso de Certificación</option> 
                <option value="En proceso de formación" >En proceso de formación</option>
                <option value="Certificado" >Certificado</option>
            </select> 
            </div>
            </div>
                                
            <!--DIV solo visible cuando este certificado  -->
            <div id="oculto" style="display:none;" class="form-group"> 
                <!-- fecha -->
                <div class="form-group">
                <label for="fecha" class="col-lg-3 control-label" > Fecha de expedición</label>
                <div class=" col-lg-8">
                <input type="date" name="fecha" id="fecha" class="form-control"/>
                </div>
                </div>
                <!-- fecha -->
                
                <!-- ciudad de expedición -->
                <div class="form-group">
                <label class="col-lg-3 control-label">Ciudad de expedición:</label>
                <div class=" col-lg-8">
                <?php
                                       
                                        $expedicion1 = "SELECT * FROM ciudad ORDER BY ciudad ASC";
                                        $result= $mysqli->query($expedicion1 ); 
                                        if ($result) {
                                        echo "<select name='ciudad_exp' id='ciudad_exp' class='form-control'>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='{$row['ciudad']}'>{$row['ciudad']}</option>";
                                        }
                                        echo "</select>";
                                        $result->free();
                                    } else {
                                        throw new Exception('Error en la consulta: ' . $mysqli->error);
                                    
                                    } 
                                    // Cierra la conexión
                                    $mysqli->close();
                                        ?> 
                </div> 
                </div> 
                <!-- ciudad de expedición -->
                
                <!--imprimir-->
                <div class="form-group">
                <label for="imprimir" class="col-lg-3 control-label"> Permitir Imprimir:</label>
                <div class=" col-lg-8">
                <select name="imprimir" id="Activo" class="form-control">
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
                </div>
                </div>
                <!--imprimir-->
            </div>
            <!-- FIN MODULO ESTADO DE CERTIFICACIÓN--> 
                              
            <input type="submit" value="Insertar Datos" class="btn btn-primary btn-lg"/>
            <input type="button" onClick="javascrip:location.href='panel_cert.php';"value="Cancelar" class="btn btn-primary btn-lg"/>
		    </form>
		    <!--Fin del formulario  -->

		</center>
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

       
    <!--SCRIPT TIPO CERTIFICADO EMPRESA O INDEPENT -->  
	<script>
    prevVal = "";
	$('#tipo_cert').change(function(){ 
	
	/*comprobamos si es empresa o independiente*/
	if(this.value === "1") // empresa
    {   document.getElementById('divEmpresa').style.display = 'block';
        document.getElementById('divIndep').style.display = 'none';
	    document.getElementById("precio").required = false;  //precio no obligatorio
	    document.getElementById("tel").required = false;    //telefono no obligatorio
	}
    if(this.value === "0") // indepentiente
    {   document.getElementById('divEmpresa').style.display = 'none';
        document.getElementById('divIndep').style.display = 'block';
		document.getElementById("precio").required = true;  //volvemos obligatorio el precio
		document.getElementById("tel").required = true;    //volvemos obligatorio el telefono
	} });
    </script>
    <!--FIN CRIPT TIPO CERTIFICADO EMPRESA O INDEPENT  -->
    
    
    <!--CRIPT ESTADO DE LA CERTIFICACION -->  
	<script>
    prevVal = "";
	$('#certificacion').change(function(){ 

	/*comprobamos estado de el certificado si certificado o en proceso o formacion*/
	if(this.value === "Certificado")   // empresa
    {   document.getElementById('oculto').style.display = 'block';
        document.getElementById("fecha").required = true;   //fecha obligatorio
    }
	if(this.value === "En proceso de Certificación" || this.value ==="En proceso de formación" ) // indepentiente
    {   document.getElementById('oculto').style.display = 'none';
		document.getElementById("fecha").required = false;   //quitamos lo obligatorio de la fecha
	} });
    </script>
    <!--FIN CRIPT ESTADO DE LA CERTIFICACION-->
     
  

</body>
</html>



