<section>
	<form action="http://localhost:8000/SiSeDe/index.php/cGuardarProyecto/guardar" method="post">
		<div style="width:70%; height:100%; margin-left:5%; float:left;">
			<div class="row">
				<div class="col-sm-12">
					<textarea class="form-control" rows="3" name="descripcion"></textarea>
						<script>CKEDITOR.replace('descripcion');</script>
				</div>
			</div>
		</div>
		<div style="margin-right:10%; float:right;">
			<input type="submit" value="Guardar">
		</div>
	</form>
		<!--<div style="width:20%; height:300px; margin-right:5%; float:right; ">
			<br><br><br>
			<div class="row">
				<div class="col-sm-2 col-sm-offset-4">
					<a href="#">
						<img src="<?php echo base_url();  ?>Imagenes/save.png" title="Guardar" style="width:40px;height:40px;"/>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2 col-sm-offset-5" >
					<a href="#" style="text-decoration:none; color:black; text-align:center; active{text-decoration:none; color:black; text-align:center;}">
						<p  class="text-center" style="font-size:11px;"><strong>Guardar</strong></p>
					</a>
				</div>
			</div>
			<br><br><br>
			<div class="row">
				<div class="col-sm-2 col-sm-offset-4">
					<a href="#">
						<img src="<?php echo base_url();  ?>Imagenes/canc.png" title="Cancelar" style="width:40px;height:40px;"/>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2 col-sm-offset-5" >
					<a href="#" style="text-decoration:none; color:black; text-align:center; active{text-decoration:none; color:black; text-align:center;}">
						<p class="text-center" style="font-size:11px;"><strong>Cancelar</strong></p>
					</a>
				</div>
			</div>
		</div>-->
</section>