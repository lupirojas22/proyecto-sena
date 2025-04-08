<div class="col-md-3">
	<div class="panel panel-default">
    	 
        <div class="panel-heading">
        	  <i class="fa fa-bars"></i> Menú
            <i class="showmenu fa fa-angle-down pull-right"></i>
        </div>

        <div id="sider-menu" class="panel-body">
	      <nav class="navbar navbar-default sidebar" role="navigation">
          <div class="container-fluid">
          <div class="navbar-header">
          <!--This this is button what permit see the menu in responsive of  screen  width  -->
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">          
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>      
          </div>

          <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <?php
			      if($_SESSION['nivel']=='a' || $_SESSION['nivel']=='u')
			      {
				        echo "<li class='active'><a href='panel.php'>Inicio<span style='font-size:16px;' class='pull-right hidden-xs showopacity glyphicon glyphicon-home'></span></a></li> ";
			     
            ?>
           
              
              <li><a href="cert.php"> <i class="fa fa-plus-square-o" aria-hidden="true"></i> Ingresar certificados </a></li>
          
              <li><a href="mod_cert.php"><i class="fa fa-pencil-square-o"></i> Editar certificados</a></li>
      
              <li><a href='cert_pdf.php'><i class="fa fa-print" aria-hidden="true"></i> Imprimir certificado</a></li>
              
            <?php  }?>
            
            
            <!-- MENU PARA PERSONAL  INVITADO O AYUDANTE olo quiere que ellos tienen certificados-->
           <?PHP  if($_SESSION['nivel']=='P' )
			      {
			?>
           
              <li class="active"><a href="panel.php">Inicio<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
              <li><a href='cert_pdf.php'><i class="fa fa-print" aria-hidden="true"></i> Imprimir certificado</a></li>
              
            <?php
			   }?>
           
            
            
            
            
    </div>
    </div>
    </nav>
    </div>
	</div>
</div>