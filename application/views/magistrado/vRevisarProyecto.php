<section>
		<br>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<form action="http://localhost:8000/SiSeDe/index.php/cGuardarProyecto/guardar" method="post">
				<textarea class="form-control" rows="3" name="descripcion">
					<?php
						$fichero = "Proyectos/prueba1.txt"; 
						$fp = fopen($fichero,"r"); 
						$contenido = fread ($fp, filesize ($fichero)); 
						fclose($fp); 
						echo $contenido;
					?>
				</textarea>
				<script>CKEDITOR.replace('descripcion');</script>
				<br>
				<input type="button" value="Editar" onclick="desactivar()"/>
			</form>
		</div>
	</div>
	<br>

	<script type="text/javascript">
		function habilitar(){
			document.getElementById('mitext2').disabled=false;
		}
	</script>
	 <!--<div class="row">
		<div class="col-xs-12 col-xs-offset-5">
				<input type="radio" name="rad" onclick="descripcion.disabled = false" />
               <button type="button"  onclick="descripcion.disabled = false" class="btn btn-success">Editar</button>
		</div>
	</div>

	<script type="text/javascript">
		function habilitar(){
			document.getElementByName("descripcion").disabled="false";
		}
	</script>
	
   
	<div style="width:70%; height:100%; margin-left:5%; margin-top:5%;  float:left;">
		<div class="row">
			<div class="col-sm-12">
				<textarea class="form-control" rows="3" name="descripcion"></textarea>
				<script>CKEDITOR.replace('descripcion');</script>
			</div>
		</div>
	</div>
	<div style="width:20%; height:100%; margin-right:5%; float:right; ">
		<br><br><br>
		<div class="row">
			<div class="col-sm-2 col-sm-offset-4">
				<a href="#">
					<img src="<?php echo base_url();  ?>Imagenes/buscdoc.png" title="Leer Documentos" style="width:40px;height:40px;"/>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-5 col-sm-offset-4" >
				<a class="text-center" href="#" style="text-decoration:none; color:black; text-align:center; active{text-decoration:none; color:black; text-align:center;}">
					<p style="font-size:11px;"><strong>Leer Documentos</strong></p>
				</a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-2 col-sm-offset-4">
				<a href="#">
					<img src="<?php echo base_url();  ?>Imagenes/edit.png" title="Editar" style="width:40px;height:40px;"/>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4" >
				<a class="text-center" href="#" style="text-decoration:none; color:black; text-align:center; active{text-decoration:none; color:black; text-align:center;}">
					<p  style="font-size:11px;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Editar</strong></p>
				</a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-2 col-sm-offset-4">
				<a href="#">
					<img src="<?php echo base_url();  ?>Imagenes/save.png" title="Guardar" style="width:40px;height:40px;"/>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4" >
				<a class="text-center" href="#" style="text-decoration:none; color:black; text-align:center; active{text-decoration:none; color:black; text-align:center;}">
					<p  style="font-size:11px;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Guardar</strong></p>
				</a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-2 col-sm-offset-4">
				<a href="#">
					<img src="<?php echo base_url();  ?>Imagenes/canc.png" title="Cancelar" style="width:40px;height:40px;"/>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-5 col-sm-offset-4" >
				<a href="#" style="text-decoration:none; color:black; text-align:center; active{text-decoration:none; color:black; text-align:center;}">
					<p class="text-center" style="font-size:11px;"><strong>	Cancelar</strong></p>
				</a>
			</div>
		</div>
	</div>-->
</section>