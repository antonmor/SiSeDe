<nav class="navbar navbar-default navbar-static-top">
	<div class="navbar-header">
		<a class="navbar-brand" href="<?php echo site_url('Coficial'); ?>">SISeDe v1.0 </a>
	</div>
	<div class="collapse navbar-collapse pull-right">
		<ul class="nav navbar-nav">
			<li class="active">


			</li>

			<!--<li class="active">
				<a href="#">Notificiones <span class="badge badge-error">42</span></a>
			</li>
			<li class="active">
				<a href="<?php echo site_url('Coficial/acuerdo'); ?>">Acuerdos <span class="badge badge-error">42</span></a>
			</li>-->
			<li class="dropdown">
 			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta(
 				<?php
					print_r($_SESSION["Rol"]);
				?> ) <!--PHP-->
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
 					<li><a href="<?php echo site_url('Coficial/acuerdo'); ?>">Acuerdos</a></li>
					<li><a href="<?php echo site_url('Coficial/demanda'); ?>">Demandas</a></li>
					<li><a href="<?php echo site_url('Coficial/nwacuerdo'); ?>">Redacción de documento</a></li>
					<li>
						<a href="<?php echo site_url('Coficial/notificacion'); ?>">Notificaciones</a>
					</li>
					<li><a href="<?php echo site_url('Coficial/seguimiento'); ?>">Seguimiento</a></li>
					 <li role="separator" class="divider"></li>
					 <li>
					 	<a href="<?php echo site_url('Coficial/miperfil'); ?>">Editar Perfil
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
