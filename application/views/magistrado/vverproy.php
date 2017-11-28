<?php
	$Persona=$this->mLogin->proyectista();
	$expediente=$this->input->Post('expediente');
	$archivo=$this->input->Post('archivo');
		/*if($Persona!=NULL){
		foreach ($Persona as $re) {
			echo $re['id'];
			echo " ";
			echo $re['Persona'];
		}
	}*/
?>
<section>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
				<textarea class="form-control" rows="10" name="descripcion" disabled>
					<?php
						$fichero = "Proyectos/".$expediente."/".$archivo; 
						$fp = fopen($fichero,"r+"); 
						$contenido = fread ($fp, filesize ($fichero)); 
						fclose($fp); 
						echo $contenido;
					?>
				</textarea>
				<script>CKEDITOR.replace('descripcion');</script>
				<br>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12" style="text-align:center">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#Enviar">Enviar</button>
			<!--<form action="<?php echo site_url('cnwacta/credact2'); ?>" method="post">
				<input type="hidden" value="<?php echo $fichero; ?>" name="fichero">
				<button title="Enviar" name="Ver Proyecto" type="submit"> Enviar </button>
			</form>-->
		</div>
	</div>
	<br>
</section>



<!-- Modal -->
<div id="Enviar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button"  class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align:center">Enviar a Magistrado para revisión</h4>
      </div>
      <div class="modal-body">
        <label>Enviar a:</label>
        <div class="row">
        	<div class="col-xs-12" style="text-align:center">
        		<select class="txtin">
		        	<?php
		        		if($Persona!=NULL){
							foreach ($Persona as $re) {
		        	?>
		        	<option><?php echo $re['Persona'];?></option>
		        	<?php
		        			}
		        		}
		        	?>
		        </select>
        	</div>
        </div>
        <br>
		<div class="row">
        	<div class="col-xs-3 col-xs-offset-3" style="text-align:center"> 
        		<form action="<?php echo site_url('coficial/enviarproy'); ?>" method="post">
        			<input type="hidden" value="<?php echo $expediente; ?>" name="expediente">
		            <input type="hidden" value="<?php echo $archivo; ?>" name="archivo">
		            <input type="hidden" value="<?php echo $re['Persona'];?>" name="persona">
        			<input type="submit" class="btn btn-success" value="Aprobado"/>
        		</form> 
        	</div>
        	<div class="col-xs-3" style="text-align:center"> 
        		<form action="<?php echo site_url('coficial/enviarproy'); ?>" method="post">
        			<input type="hidden" value="<?php echo $expediente; ?>" name="expediente">
		            <input type="hidden" value="<?php echo $archivo; ?>" name="archivo">
		            <input type="hidden" value="<?php echo $re['Persona'];?>" name="persona">
        			<input type="submit" class="btn btn-danger" value="Desaprobado"/>
        		</form> 
        	</div>	

        </div>
        <br>
      <div class="modal-footer">
        <?php $this->load->view('footer'); ?>
      </div>
    </div>

  </div>
</div>