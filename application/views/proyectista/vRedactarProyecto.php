<?php
	$expediente=$tipo=$this->input->post('expediente');
	$carpeta="Proyectos/Redactados";
	if (!file_exists($carpeta)) {
		mkdir($carpeta, 0777, true);
		echo "se creo la carpeta";
	}
	$hoy=getdate();
	$fechared=$hoy['mday']."-".$hoy['mon']."-".$hoy['year']."  ".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds'];
	//echo $fechared;
?>

<br>
<section>
	<form action="<?php echo site_url('coficial/guardar_an'); ?>" method="post">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					<textarea class="form-control" rows="10" name="descripcion">
					</textarea>
						<script>CKEDITOR.replace('descripcion');</script>
				</div>
			</div>
			<input type="hidden" value="<?php echo $expediente ?>" name="expediente">
			<input type="hidden" value="<?php echo $fechared ?>" name="fechared">
	</form>
	<br>
</section>
