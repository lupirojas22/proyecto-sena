<div class="col-md-3">
	<div class="panel panel-default">
    	<div class="panel-heading">
        	<i class="fa fa-bars"></i> Menú
            <i class="showmenu fa fa-angle-down pull-right"></i>
        </div>
        <div id="sider-menu" class="panel-body">
        	<a href="panel.php" ><i class="fa fa-home"></i> Inicio</a>
            <a href="panel_cert.php" ><i class="fa fa-graduation-cap" aria-hidden="true"></i> Módulo Certificados</a>
        
            <?php   /* <a href="panel_cont.php" ><i class="fa fa-money" aria-hidden="true"></i> Módulo Contable</a> */
            
             if($_SESSION['nivel']=='a'){
                 echo " <a href='panel_adm.php'><i class='fa fa-cog' aria-hidden='true'></i> Módulo Adm</a>";
			  }
			     
            ?>
          
            <br/>
        </div>
    </div>
</div>