<div class="row">
  <div class="col-xs-12" style="text-align:center;">
    <h3>Redacción de nuevo documento</h3>
    <br>
  </div>
</div>
<form action="/SiSeDe/index.php/cGuardarProyecto/guardaract" method="post">
			<div class="row">
				<div class="col-xs-4 col-xs-offset-8">
					<label>Nombre del documento: </label>
					<input type="text" id="nombre" name="nombre">

				</div>
			</div>
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					<textarea class="form-control" rows="3" name="descripcion"></textarea>
						<script>CKEDITOR.replace('descripcion');</script>
				</div>
			</div>
</form>
