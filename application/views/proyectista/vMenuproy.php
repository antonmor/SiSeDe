<nav class="navbar navbar-default navbar-static-top">
	<div class="navbar-header">	
		<a class="navbar-brand" href="<?php echo site_url('coficial'); ?>">SISeDe v1.0 </a>  
	</div>
	<div class="collapse navbar-collapse pull-right">
		<ul class="nav navbar-nav">
			<li class="active">
				
								
			</li>

			<li class="dropdown"> 
 			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta(
 				<?php 
					print_r($_SESSION["Rol"]);
				?> ) <!--PHP-->			
				<span class="caret"></span></a> 
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('coficial/proyect_expen'); ?>">Expedientes Pendientes</a></li>
					 <li role="separator" class="divider"></li> 
					 <li>
					 	<a href="<?php echo site_url('coficial/miperfil'); ?>">Editar Perfil  
					 	<?php 
					 	print_r($_SESSION["Nombre"]); 
					 	?><!--PHP-->	
					 	</a>
					 </li>
				</ul>
			</li>
			</li>
			<li class="active">
				<a href="<?php echo site_url('Welcome/cerrar_sesion'); ?>">Cerrar sesión</a>
			</li>

		</ul>
	</div>
</nav>