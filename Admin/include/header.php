<nav id="top-menu" class="navbar navbar-default">
<div class="container">
    <div class="navbar-header">
    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        	<span class="sr-only"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
      	</button>
      	<a class="navbar-brand Animacion"  href="panel.php" >SV & SST</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    	<ul class="nav navbar-nav navbar-right">
            <li id="user-setting" class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <img src="imagenes/user.jpg">
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><center><?php echo $_SESSION['nombre'] ?><center></li>
                    <li><a href="usu_clave.php">Cambiar clave</a></li>
                    <li class="divider"></li>
                    <li><a href="cierra.php">Cerrar sesión</a></li>
                </ul>
            </li>
		</ul>
	</div>
</div>
</nav>
