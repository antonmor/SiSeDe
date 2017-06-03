<section>
  <div class="row">
    <div class="col-xs-11" style="text-align:right;">
      <a href="<?php echo site_url('cOficial/acuerdo'); ?>"><span class="glyphicon glyphicon-circle-arrow-left"></span>Regresar</a>
    </div>
  </div>
  <div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<textarea class="form-control" rows="10" name="descripcion" disabled>
					<?php
	 					$folder='Actas/'.$archivo;
						$fichero = $folder;
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
</section>
