<?php $archivo=$this->input->Post('archivo');
$folder=$this->input->post('folder');
$comentarios=$this->input->post('comentarios');
?>
<section>

	<div class="row">
		<div class="col-xs-2 col-xs-offset-9">
			<a data-toggle="modal" href="#comentario"><span class="glyphicon glyphicon-align-justify"> </span> Leer comentario</a>
		</div>
			<!--<a href="/SiSeDe/index.php/crevproy2/ceditproy"><span class="glyphicon glyphicon-pencil"> </span> Editar</a>-->

	</div>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<textarea class="form-control" rows="10" name="descripcion" disabled>
					<?php
						$fichero = $folder.$archivo;
						$fp = fopen($fichero,"r");
						$contenido = fread ($fp, filesize ($fichero));
						fclose($fp);
						echo $contenido;
					?>
				</textarea>
				<script>CKEDITOR.replace('descripcion');</script>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-2 col-xs-offset-10">
			<form action="/SiSeDe/index.php/crevproy2/ceditproy" method="post">
				<input type="hidden" value="<?php echo $folder; ?>" name="folder">
				<input type="hidden" value="<?php echo $archivo; ?>" name="archivo">
				<button class="btn btn-primary" title="Revisar " name="Revisar" type="submit">
						Editar</button>
			</form>
		</div>
			<!--<a href="/SiSeDe/index.php/crevproy2/ceditproy"><span class="glyphicon glyphicon-pencil"> </span> Editar</a>-->

	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="comentario" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="text-align:center;">Comentarios</h4>
			</div>
			<div class="modal-body">
				<div class="row" style="text-align:center;">
					<?php
							echo $comentarios;
					?>
				</div>
			</div>
			<div class="modal-footer">
				<p style="text-align:center;">
					Dirección Francisco Zarco #1460, Colonia Girasoles<br/>
					Teléfono: 01 312 314 8203 </br>
					C.P. 28018, Colima, Colima, México<br/>
						contencioso@tcacolima.org.mx </br>
						&copy; Derechos Reservados Julio 2016. Tribunal de lo Contencioso Administrativo del Estado de Colima</br>
				</p>
			</div>
		</div>
	</div>
</div>
