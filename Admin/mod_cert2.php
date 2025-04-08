<?php

	header('Content-Type:text/html; charset=UTF-8');
	require("accede.php");
	include("../Connections/conexion.php");
	/*ID certificado*/
	$v1 =$_GET['id'];

	
	
	$sql = "SELECT * FROM certificado where id_certificado = $v1";
	$result = $mysqli->query($sql);
	
	
		/*consultamos certificado con id*/
	
	/*# documento*/
	
	if ($result) {
		// Recorre los resultados
		while ($row_total = $result->fetch_assoc()) {
		   
			/*# documento*/
			$doc=$row_total['num_doc'];
			/*# documento*/

			/*nombre*/
			$nombre=$row_total['nombre'];
			/*nombre*/
	
	
			/*id empresa*/
			$emp=$row_total['id_empresa'];
			/*id empresa*/
	
			/*tipo documento*/
			$tipo_documento=$row_total['ti_doc'];
			/*tipo documento*/
	
			/*id producto que es el id del curso*/
			$idCurso=$row_total['id_curso'];
			/*id producto que es el id del curso*/
	
			/* tipo ceritificacion empresa o idependiente*/
			$IdEmpresa=$row_total['id_empresa'];   // si es cero  es idependiente   si es otro numero es empresa 
			/* tipo ceritificacion empresa o idependiente*/
	
			/*estado del certificad*/
			$EstadoCe=$row_total['estado'];
			/*estado del certificad*/

			/* fehca <estado></estado>*/
		    $fechaCe=$row_total['fecha'];

			/* imprimir */ 
			$imprimir= $row_total['imprimir'];

			/* fecha  expeed  */
			$CiudadExp=$row_total['ciudad_exp'];
		
	
	
	
	
	
		}
	
		// Libera el conjunto de resultados
		$result->free();
	} else {
		throw new Exception('Error en la consulta: ' . $mysqli->error);
	
	}
	
			$curso= "SELECT * FROM curso where curso.id_curso = $idCurso";
			$result2 = $mysqli->query($curso);
	
		
		/*conectamos con la tabla producto  nombre curso */
		
		if ($result2) {
			// Recorre los resultados
			while ($fila= $result2->fetch_assoc()) {
				$Nombrecurso= $fila['nom_curso'];   // nombre del curso guardado 
				$id_categoria= $fila['id_categoria'];   // categoria del curso guardado 
				$id_subcategoria= $fila['id_subcategoria'];  
			}
		
			// Libera el conjunto de resultados
			$result2->free();
		} else {
			throw new Exception('Error en la consulta: ' . $mysqli->error);
		
		}
	
		/*consulta empresa */
		// si no es idependiente 
		
		if($IdEmpresa!=="0")
		{
				/*consulta empresa */
			$consulEmpresas= "SELECT * FROM empresas where empresas.IdEmpresa=$IdEmpresa";
			$result3 = $mysqli->query($consulEmpresas);
	
			if ($result3) {
				// Recorre los resultados
				while ($fila4= $result3->fetch_assoc()) {
					$NombreEmpre= $fila4['NombreEmpresa']; // nombre del empresa que esta en la tabla 
				}
			
				// Libera el conjunto de resultados
				$result3->free();
			} else {
				throw new Exception('Error en la consulta: ' . $mysqli->error);
			
			}

			$ciudadRe="" ; 
				$empTra= "";
				$cargoE="" ;
				$telId= "";
				$email= "";
			
		}else{
			
	
			$consulIdependiente= "SELECT * FROM independiente where independiente.num_doc='$doc' and id_curso=$idCurso";
			$total1= $mysqli->query($consulIdependiente);

			if ($total1->num_rows > 0) 
	        {
				// Recorre los resultados
				while ($fila5= $total1->fetch_assoc()) {
					$ciudadRe= $fila5['CiudadResidencia']; 
					$empTra=$fila5['Empresatrabaja'];
					$cargoE=$fila5['Cargo'];
					$telId=$fila5['tel'];
					$email=$fila5['email'];
				
				}
				
			} else{
				$ciudadRe="" ; 
				$empTra= "";
				$cargoE="" ;
				$telId= "";
				$email= "";
			}
	
		}
	
	?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
    <link rel="stylesheet" type="text/css" href="css/titulos.css">
    <link rel="stylesheet" type="text/css" href="css/busqueda.css">
    <link rel="shortcut icon" type="image/x-icon"  href="imagenes/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/forempleado.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/saphv2.css" rel="stylesheet">
    <title> Editar certificado</title>
</head>
<body >
	<?php include('include/header.php'); ?>
	<div class="container">
    <div class="row">
    <?php include('include/menu.php'); ?>
   	<div class="col-md-9">
    <div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-desktop"></i> Inicio</div>
    	<div class="panel-body">
        <br>
        <center>
        <!-- INICIO FORMULARIO --> 

        	<h1>Editar datos del certificado</h1>
         <form name="ejecuta" method="post" action="mod_cert3.php?id=<?php echo $v1; ?>&ci=<?php echo $idCurso; ?>" class="form-horizontal" onSubmit="return validar()"> 
                  
            <!-- inicio del while --> 

                              
  
            <!--Nombre  -->
  			<div class="form-group">
    		<label for="nombre" class="col-lg-3 control-label" > Nombres y apellidos:</label>
    			<div class=" col-lg-8">
            	<input type="text" name="nombre" required=required value="<?php echo $nombre; ?>"pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" class="form-control"/>
           		</div>
            </div>
            <!-- Fin Nombre  -->
            
            
            <!--tipo documento  -->
            <div class="form-group">
            <label for="ti_doc"  class="col-lg-3 control-label"> Tipo Documento: </label>
            <div class=" col-lg-8">
            <select  name="ti_doc"  id="ti_doc" class="form-control" required >
                
            	<option value="1" <?php if (!(strcmp(1, htmlentities($tipo_documento, ENT_COMPAT, 'UTF-8'))))
							  		{echo "SELECTED";} ?>>	Cédula</option>

           		<option value="2" <?php if (!(strcmp(2, htmlentities($tipo_documento, ENT_COMPAT, 'UTF-8'))))
						      		{echo "SELECTED";} ?>> Pasaporte</option>

            	<option value="3" <?php if (!(strcmp(3, htmlentities($tipo_documento, ENT_COMPAT, 'UTF-8'))))
						      		{echo "SELECTED";} ?>>Cédula de Extranjería</option>
                                    
                <option value="4" <?php if (!(strcmp(4, htmlentities($tipo_documento, ENT_COMPAT, 'UTF-8'))))
						      		{echo "SELECTED";} ?>>Visa</option>
            </select> 
            </div>
            </div>
            <!--Fin tipo de Documento  -->
            
                              
            
            
            
            <!-- # documento  -->
            <div class="form-group">
            <label for="no_documento" class="col-lg-3 control-label">Número de Documento:</label>
            	<div class=" col-lg-8">
            	<input type="text" name="no_documento"  id="doc"   class="form-control" value="<?php echo $doc; ?>"  required/>
            	</div>
            </div>
            <!-- documento coulto para mirar si cambiamos # de doc --> 
            <input type="hidden" name="docu_ante"    value="<?php echo $doc; ?>" />
            <!-- documento coulto para mirar si cambiamos # de doc --> 
            
            <!-- fin # documento  --> 
            
        
            
            
                        <!-- CURSOS  --> 
                        
                <!--CURSOS 0 el escogido-->
                <div id="curso0" style="display:block;" class="form-group"> 
                
                  <label for="cursos" class="col-lg-3 control-label">Cursos:</label>
                 <div class=" col-lg-8">
                
               
                <?php
                $consultaCurso="SELECT * FROM curso";  
				$curso = $mysqli->query($consultaCurso);
				?>
                <select name='curso' id='curso' class="form-control">
                                 
                <!-- el curso guardado en la tabla certificado -->
				<option  value="<?php echo $idCurso; ?>" ><?php echo  $Nombrecurso ;?></option>
                <!-- el curso guardado en la tabla certificado -->
                                       
				<?php 
				while($row1 = $curso->fetch_assoc())
                     { echo "<option value='$row1[id_curso]'>".$row1['nom_curso']."</option>";  }
				echo " </select>" ;?>            
                                       
            	</div>

                </div>
                 <!-- FIN CURSOS 0 el escogido-->

            
               <!-- FIN CURSOS-->    
            
            
  
                                  
            <!--MODULO TIPO CERITICACIÓN-->

            <!--TIPO CERTIFICACION  -->
            <div class="form-group">
            <label for="tipo_cert" class="col-lg-3 control-label" > Tipo De Certificación: </label>
                <div class=" col-lg-8">
                <select  name="tipo_cert"  id="tipo_cert"  required class="form-control" >
                    <option  value="<?php echo $IdEmpresa; ?>" ><?php if($IdEmpresa==0){ echo"INDEPENDIENTE"; } else { echo"EMPRESA"; } ;?></option>
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
                    
												
                $consultaEmpresas="SELECT * FROM empresas";
				$empres= $mysqli->query( $consultaEmpresas);
                
				echo " <select  name='empresa'  required id='empresa' class='form-control' >";
				
				/*si no es idependiente que muestre nombre */ 
				if($IdEmpresa !== 0) {echo "<option  value= '$IdEmpresa'>".$NombreEmpre."</option>";};
				/*si no es idependiente que muestre nombre */ 
								
				while($row3= $empres->fetch_assoc())
                {echo "<option value='$row3[IdEmpresa]'>".$row3['NombreEmpresa']."</option>";}
				echo " </select>" ;?>
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
                	
                    $expedicion3="SELECT * FROM ciudad ORDER BY ciudad. ciudad ASC"; 
					$rec3 = $mysqli->query($expedicion3); 
                  
					echo " <select  name='CiudadResidencia' class='form-control'>"; 
					?>
                    <option value="<?php echo $ciudadRe; ?>" ><?php echo  $ciudadRe; ?></option>
					<?php 
					while($row5=$rec3->fetch_assoc())
                    { echo "<option value='$row5[ciudad]'>".$row5['ciudad']."</option>";}
					echo " </select>" ; ?> 
                    </div> 
                </div> 
                <!-- Fin Ciudad Residencia -->
            
                <!-- empresa del independiente -->
                <div class="form-group">
                <label for="Empresatrabaja" class="col-lg-3 control-label">Empresa donde trabaja :	</label>
                	<div class=" col-lg-8">
            		<input   type="text" name="Empresatrabaja" value="<?php echo $empTra;  ?>" class="form-control" />
                	</div>
                </div>
                <!-- empresa del independiente -->
                
                 <!-- cargo del independiente -->
                <div class="form-group">
                <label for="Cargo" class="col-lg-3 control-label">Cargo :</label>
                	<div class=" col-lg-8">
                	<input type="text" name="Cargo" class="form-control" value="<?php echo $cargoE;  ?>"/>
               		</div>
                </div>
                <!-- cargo del independiente -->
            
            
                <!-- Tel del independiente -->
                <div class="form-group">
                <label for="tel" class="col-lg-3 control-label">Teléfono</label>
                	<div class=" col-lg-8">
                	<input type="tel" name="tel" id="tel" class="form-control" value="<?php echo $telId;  ?>"/>
               		 </div>
                </div>
                <!-- Tel del independiente -->
                
                <!-- email del independiente -->
                <div class="form-group">
                <label for="email" class="col-lg-3 control-label">E-mail</label>
                	<div class=" col-lg-8">
                	<input type="email" name="email" class="form-control" value="<?php echo $email; ?>" />
                	</div>
                </div>
                <!-- email del independiente -->
            

            </div>
            <!--FIN  DIV INDEPENDIENTES-->
            <!--FIN MODULO TIPO CERITICACIÓN--> 

            
            <!--MODULO ESTADO DE CERTIFICACIÓN-->
            <!--ESTADO CERTIFICADO --> 
            <div class="form-group">
            <label for="estado" class="col-lg-3 control-label" > Estado Certificación: </label>
            	<div class=" col-lg-8">
            	<select  name="certificacion"  id="certificacion" class="form-control"  required >
                	
                	<option value="En proceso de Certificación" <?php if (!(strcmp('En proceso de Certificación', htmlentities($EstadoCe, ENT_COMPAT, 'UTF-8'))))
							  		{echo "SELECTED";} ?>>	En proceso de Certificación</option>

                    <option value="En proceso de formación" <?php if (!(strcmp('En proceso de formación', htmlentities($EstadoCe, ENT_COMPAT, 'UTF-8'))))
						      		{echo "SELECTED";} ?>> En proceso de formación</option>

                    <option value="Certificado" <?php if (!(strcmp('Certificado', htmlentities($EstadoCe, ENT_COMPAT, 'UTF-8'))))
						      		{echo "SELECTED";} ?>	>Certificado</option>

            	</select> 
            	</div>
            </div>
            <!--ESTADO CERTIFICADO --> 
            
            
            <!--DIV solo visible cuando este certificado  -->
            <div id="oculto" style="display:none;" class="form-group"> 
                
                <!-- fecha -->
                <div class="form-group">
                <label for="fecha" class="col-lg-3 control-label" > Fecha de expedición</label>
                	<div class=" col-lg-8">
                	<input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $fechaCe; ?>"/>
               		</div>
                </div>
                <!-- fecha -->
                
                <!--imprimir-->
                <div class="form-group">
                <label for="imprimir" class="col-lg-3 control-label"> Permitir Imprimir:</label>
                	<div class=" col-lg-8">
                	<select name="imprimir" id="Activo" class="form-control">
                    	<option value="0" <?php if (!(strcmp(0, htmlentities($imprimir, ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>No</option>
                        <option value="1" <?php if (!(strcmp(1, htmlentities($imprimir, ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Si</option>
                	</select>
                	</div>
                </div>
                <!--imprimir-->
                   <!-- ciudad de expedición -->
                 
                   
                <div class="form-group">
                <label class="col-lg-3 control-label">Ciudad de expedición:</label>
                <div class=" col-lg-8">
                <?php 

                $expedicion1="SELECT * FROM ciudad ORDER BY ciudad. ciudad ASC"; 
				$rec1 = $mysqli->query($expedicion1);
				echo " <select  name='ciudad_exp'class='form-control'>";
				?>
				
				 <option value="<?php echo $CiudadExp; ?>" ><?php echo $CiudadExp; ?></option>
				
				<?php 
                while($row4=$rec1->fetch_assoc())
                { echo "<option value='$row4[ciudad]'>".$row4['ciudad']."</option>";}
				echo " </select>" ; ?> 
                </div> 
                </div> 
                <!-- ciudad de expedición -->
                
                
                
            </div>
            <!-- FIN MODULO ESTADO DE CERTIFICACIÓN--> 
            
          

            <!--botones -->
 			<input type="submit" value="Editar Datos"  class="btn btn-primary btn-lg"/>
            <input type="button" onClick="javascrip:location.href='mod_cert.php';"value="Cancelar" class="btn btn-primary btn-lg"/>
							
			</form>
            <!-- FIN FORMULARIO --> 
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
    
        
   
    <!--Script q habilita los div de pais ciudad,etc dependiendo de lo escojigo en tipo de documento -->  
	<script>
    	prevVal = "";
	
	 	//Variable  que  guarda el tipo de documento  sin edirar para mostrarlo de primeras 
		var vaiableJS = "<?=$tipo_documento; ?>";  
		//Variable  que  guarda el tipo de documento  sin edirar 
	

</script>


         <!--CRIPT TIPO CERTIFICADO EMPRESA O INDEPENT --> 
     <script>
 
	
    	prevVal = "";
		
		// verificamos  si es empresa o independite 
	    var IEmpresa ="<?=$IdEmpresa; ?>"; 

	    // variable donde vamos aguardar si cambio de estado si de indepente paso a empresa o empresa a indpent
	 	var cambioIE;  
	 
		if(IEmpresa === "0") // indepentiente
    	{  
    		document.getElementById('divEmpresa').style.display = 'none';
        	document.getElementById('divIndep').style.display = 'block';
			document.getElementById("tel").required = true;    //volvemos obligatorio el telefono
			cambioIE="0";
		}
		else // empresa
    	{   
    		document.getElementById('divEmpresa').style.display = 'block';
        	document.getElementById('divIndep').style.display = 'none';
	    	document.getElementById("tel").required = false;    //telefono no obligatorio
			cambioIE="1";
		} ;
	
	
	//funcion que complementa
	$('#tipo_cert').change(function(){ 
	
		/*comprobamos si es empresa o independiente*/
		if(this.value === "1") // empresa
    	{   
    		document.getElementById('divEmpresa').style.display = 'block';
        	document.getElementById('divIndep').style.display = 'none';
	    	document.getElementById("tel").required = false;    //telefono no obligatorio
			cambioIE="1";
		}

    	if(this.value === "0") // indepentiente
    	{   
    		document.getElementById('divEmpresa').style.display = 'none';
        	document.getElementById('divIndep').style.display = 'block';
			document.getElementById("tel").required = true;    //volvemos obligatorio el telefono
			cambioIE="0";
		} 
	});
    </script>
    <!--FIN CRIPT TIPO CERTIFICADO EMPRESA O INDEPENT  -->
    
    
    <!--CRIPT ESTADO DE LA CERTIFICACION -->  
	<script>
    	prevVal = "";
	    
	    //estado inicial del certificado 
	 	var EstadoCe ="<?=$EstadoCe ?>";
	
		if(EstadoCe === "Certificado")   
    	{   
    		document.getElementById('oculto').style.display = 'block';
        	document.getElementById("fecha").required = true;   //fecha obligatorio
    	}
		if(EstadoCe === "En proceso de Certificación" || EstadoCe ==="En proceso de formación" ) 
    	{   
    		document.getElementById('oculto').style.display = 'none';
			document.getElementById("fecha").required = false;   //quitamos lo obligatorio de la fecha
		}
	
	//fucion complementaria
	$('#certificacion').change(function(){ 

		/*comprobamos estado de el certificado si certificado o en proceso o formacion*/
		if(this.value === "Certificado")  
    	{   
    		document.getElementById('oculto').style.display = 'block';
        	document.getElementById("fecha").required = true;   //fecha obligatorio
    	}
		if(this.value === "En proceso de Certificación" || this.value ==="En proceso de formación" ) 
    	{   
    		document.getElementById('oculto').style.display = 'none';
			document.getElementById("fecha").required = false;   //quitamos lo obligatorio de la fecha
		} 
	});
	</script>
    <!--FIN CRIPT ESTADO DE LA CERTIFICACION-->
     
  
  
  
  
  <!-- SCRIPT VALIDACION DOCUMENTO AL ENVIAR  PARA EVITAR CAMPS VACIOS-->
    <script>
		
	function validar()
	{
			
				
		var tE =0; // variable que me ayuda  para saber si el campo sigue valuando  indepente
		var nombreAp=document.getElementById('empresa').value;
		         
		// verificamos que el campo no me evaule cero por que cero es de idepentienes
		if(nombreAp == 0)
		{	
			tE =1; // evalua todabia independiente
		} 
		else
		{
			tE =0;
		}
		
		
			
		// ahora verificamos si paso de idepeniente a empresa  agrege una empresa
		if (IEmpresa == 0 && cambioIE == 1 && tE == 1)
		{
			alert("Por favor agrege una empresa valida ");
			return false;
		}
				 
		
			
	};
	</script>
     <!-- SCRIPT VALIDACION DOCUMENTO AL ENVIAR  PARA EVITAR CAMPS VACIOS-->
   
   
   

	

</body>
</html>