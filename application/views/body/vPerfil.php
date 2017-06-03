<div id="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-5">
            <h4><img class="imgview" src="<?php echo base_url();  ?>Imagenes/edit_perf.png" title="Perfil" width="10" height="10">
            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Editar Perfil</strong></h4>
    	</div>
    </div>
    <br>
    <br>
    <br>
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<label class="labprf">Rol:</label>
    		<input class="txtin" id="txttp" name="txttp" type="text" value="<?php print_r($_SESSION["Rol"]);?>"> 
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<label class="labprf">NOMBRE DEL USUARIO:</label>
    		<input class="txtin"  name="txtnom" id="txtnom" type="text">
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<label class="labprf">IDENTIFICACION OFICIAL:</label>
    		<input class="txtin" name="txtidof" id="txtidof" type="text"> 
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<label class="labprf">REFERENCIA:</label>
    		<input class="txtin" name="txtref" id="txtref" type="text"> 
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<label class="labprf">TELÉFONO FIJO:</label>
    		<input class="txtin" name="txttelf" id="txttelf" type="text"> 
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<label class="labprf">MÓVIL:</label>
    		<input class="txtin" name="txtmov" id="txtmov" type="text"> 
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<label class="labprf">E-MAIL:</label>
    		<input class="txtin" name="txtem" id="txtem" type="email"> 
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<label class="labprf">DIRECCIÓN:</label>
    		<input class="txtin" name="txtdir" id="txtdir" type="text"> 
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<label class="labprf">MUNICIPIO:</label>
    			<select class="txtin">
    				<option value="municipio">Colima</option>
  					<option value="Copia Identificación Oficial">Jalisco</option>
  					<option value="Boleta Infracción">Michoacan</option>
  					<option value="Otro">Otro</option>
				</select>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<label class="labprf">ESTADO:</label>
    			<select class="txtin">
    				<option value="municipio">Colima</option>
  					<option value="Copia Identificación Oficial">Comala</option>
  					<option value="Boleta Infracción">Villa de Álvarez</option>
  					<option value="Otro">Otro</option>
				</select> 
    	</div>
    </div>
    <br>
    <div class="row">
    	<div class="col-md-4 col-md-offset-3">
    		<label class="labprft">CAMBIAR CONTRASEÑA</label>
    	</div>
    </div>
    <br>
     <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<label class="labprf">PASSWORD:</label>
    		<input class="txtin" name="txtpsw" type="password"> 
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<label class="labprf">NUEVO PASSWORD:</label>
    		<input class="txtin" name="txtnpsw" type="password"> 
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<label class="labprf">CONFIRMAR PASSWORD:</label>
    		<input class="txtin" name="txtcpsw" type="password"> 
    	</div>
    </div>	
    <br>
    <br>
    <div class="row">
			<div class="col-md-2 col-md-offset-5">
				<button type="button" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
</div>

<script>

$(document).ready(function(){
           
    $.ajax({
        url:"<?php echo base_url().'index.php/cOficial/get_perfil'; ?>",
        type:"POST",
        success:function(result){
          
            $(result).each(function(i,v){
                  $('#txtnom').val(v.Nombre+' '+v.Apat+' '+v.Amat);
                  $('#txtidof').val(v.IDoficial);  
                  $('#txtref').val(v.NumeroIDOficial);                    
                  $('#txtem').val(v.Email);
                  $('#txtmov').val(v.Cel);
                  $('#txttelf').val(v.Tel);
                  $('#txtdir').val(v.Domicilio + ' ' + v.Colonia);

                });
            
        }

    });
});

</script>
