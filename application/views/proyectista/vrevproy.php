<section>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<textarea class="form-control" rows="10" name="descripcion" disabled>
					<?php
						$archivo=$this->input->Post('archivo');
	 					$folder=$this->input->post('folder');
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
</section>