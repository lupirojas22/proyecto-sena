<?php
require_once('Connections/conexion.php');
mysql_query("SET NAMES 'utf8'");
?>

<div class="divider">
	<div class="container">
		<div class="row">
		 	<?php
				$i=1;
				$total = mysql_query("SELECT * FROM curso WHERE curso.idcurso=$i")
				or die("Problema en la consulta de datos".mysql_error());
				$row_total =mysql_fetch_assoc($total);
        	?>        
        	<div class="col-md-12 col-sm-12">
				<div class="divider-wrapper divider-one">
					<i class="fa fa-building-o"></i>
					<h2><?php  echo $row_total['nom_curso']; ?></h2>
                    <a href="curso_alt.php" class="btn btn-default">IR</a>
				</div>
			</div>                       
			<?php
				$i=2;
				$total = mysql_query("SELECT * FROM curso WHERE curso.idcurso=$i")or die("Problema en la consulta de datos".mysql_error());
				$row_total =mysql_fetch_assoc($total);
            ?>
            <div class="col-md-12 col-sm-12">
				<div class="divider-wrapper divider-two">
					<i class="fa fa-columns" aria-hidden="true"></i>
					<h2><?php  echo $row_total['nom_curso']; ?></h2>
                    <a href="cursos2.php?id=<?php echo $row_total['idcurso']; ?>" class="btn btn-default">IR</a>
				</div>       
			</div>
			<?php
				$i=3;
				$total = mysql_query("SELECT * FROM curso WHERE curso.idcurso=$i")or die("Problema en la consulta de datos".mysql_error());
				$row_total =mysql_fetch_assoc($total);
 			?> 
			<div class="col-md-12 col-sm-12">
				<div class="divider-wrapper divider-three">
					<i class="fa fa-align-center" aria-hidden="true"></i>
					<h2><?php  echo $row_total['nom_curso']; ?></h2>
                    <a href="cursos2.php?id=<?php echo $row_total['idcurso']; ?>" class="btn btn-default">IR</a>
				</div>   
          	</div>
            <?php
				$i=4;
				$total = mysql_query("SELECT * FROM curso WHERE curso.idcurso=$i")or die("Problema en la consulta de datos".mysql_error());
				$row_total =mysql_fetch_assoc($total);
 			?> 
			<div class="col-md-12 col-sm-12">
				<div class="divider-wrapper divider-one">
					<i class="fa fa-street-view"></i>
					<h2><?php  echo $row_total['nom_curso']; ?></h2>
                    <a href="cursos2.php?id=<?php echo $row_total['idcurso']; ?>" class="btn btn-default">IR</a>
				</div>   
          	</div>
            <?php
				$i=5;
				$total = mysql_query("SELECT * FROM curso WHERE curso.idcurso=$i")or die("Problema en la consulta de datos".mysql_error());
				$row_total =mysql_fetch_assoc($total);
 			?> 
		
		
		</div>
	</div>
</div>