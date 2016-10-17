<?php 
$attributes = array('id'=>'form1');
echo  form_open('cLogin/registrar_nuevo');
?>

<div class="container">
<p>Registro de usuario</p>
<div id="accordion">
<h3>Datos personales o Institucionales</h3>
	<div> 
	<p class="justificar">Instrucciones lea detenidamente el siguiente formulario y llene la información correspondiente que se le solicita.
	</p>
		<div class="row">
	     	<div class="col-xs-12 col-md-6">
	     		<label class="justificar"> Tipo de persona</label> <br>
	     		<label><input type="radio" id="tipo" name="tipo" onclick="tipo_persona(this.value);" value="Fisica" checked > Física </label>
	    		<label><input type="radio" id="tipo" name="tipo" onclick="tipo_persona(this.value);" value="Moral"> Moral	</label>
	    		<label><input type="radio" id="tipo" name="tipo" onclick="tipo_persona(this.value);" value="institucion"> Institución</label>
	     	</div> <!--Col-->
		</div><!--Row-->
		<div class="row">
			<div class="col-xs-12 col-md-4">
				<label class="justificar" id="Ttipo" name="Ttipo"> Persona  </label>
			</div> <!--Col-->			
		</div> <!--Row-->
		<div class="row">
		   	<div class="col-xs-12 col-md-8">
	    		<input class="form-control input-sm" id="rsocial" type="text" name="rsocial" placeholder="Razón Social" style="display: none" >	  
	    	</div>
		</div> <!--Row-->
		<div class="row">
			<div class="col-xs-12 col-md-4">
				<label class="justificar" id="Representante" name="Representante" style="display: none"> Representante  </label>
			</div> <!--Col-->			
		</div> <!--Row-->
		<div class="row">	
	     	<div class="col-xs-12 col-md-4">
	    		<input class="form-control input-sm" id="nombre" type="text" name="nombre" placeholder="Nombre(s)"  >	
	    	</div><!--Col-->
	    	<div class="col-xs-12 col-md-4">
	    		<input class="form-control input-sm" id="apat" type="text" name="apat" placeholder="Apellido Paterno"  >	    		
	    	</div><!--Col-->
	    	<div class="col-xs-12 col-md-4">
	    		<input class="form-control input-sm" id="amat" type="text" name="amat" placeholder="Apellido Materno"  >	    		
	    	</div>

	    </div><!--Row-->
	    <div class="row">	
	     	<div class="col-xs-12 col-md-6">
	   		  	<label class="justificar"> Genero  </label> <br>
	    		<label><input type="radio" id="genero" name="genero" value="Masculino" checked> Masculino </label>
	    		<label><input type="radio" id="genero" name="genero" value="Femenino"> Femenino </label>
	    	</div><!--Col-->
	    </div><!--Row-->
	    <div class="row">
		  	<div class="col-xs-8 col-md-2"> <label class="justificar"> Identificación  </label> 	</div>
		  	<div class="col-xs-8 col-md-2"> <label class="justificar"> Referencia  </label> 	</div>
		  	<div class="col-xs-8 col-md-2"> <label class="justificar"> CURP  </label> 	</div>
	    </div>
	    <div class="row">	
	     	<div class="col-xs-3 col-md-2">
	   		  	<select id="identificacion">
	   		  		<option id="identificacion" name="identificacion" value="Credencial INE">Credencial INE</option>
	   		  		<option id="identificacion" name="identificacion" value="Cartilla Militar">Cartilla Militar</option>
	   		  		<option id="identificacion" name="identificacion" value="Cedula Profesional">Cedula profesional</option>
	   		   		<option id="identificacion" name="identificacion" value="Pasaporte">Pasaporte</option>
	   		  	</select>
	    	</div><!--Col-->
	     	<div class="col-xs-4 col-md-2">
	    		<input class="form-control input-sm" type="text" id="referencia" name="referencia"  placeholder="# referencia">	    		
	    	</div><!--Col-->
			<div class="col-xs-4 col-md-2">
				<input class="form-control input-sm" type="text" id="curp" name="curp" placeholder="CURP">
			</div><!--Col-->	

	    </div><!--Row-->
	    <div class="row">	
			<div class="col-xs-4 col-md-2">
				<label>Teléfono</label>
				<input class="form-control input-sm" type="text" id="tf" name="tf"   >
			</div><!--Col-->	
			<div class="col-xs-4 col-md-2">
				<label>Móvil</label>
				<input class="form-control input-sm" type="text" id="movil" name="movil">
			</div><!--Col-->	
	    </div><!--Row-->
	    <div class="row">	
			<div class="col-xs-4 col-md-2">
				<label>Email</label>
				<input class="form-control input-sm" type="email" id="email" name="email"  placeholder="Introduce email">
			</div><!--Col-->	
			<div class="col-xs-4 col-md-2">
				<label>Confirmar</label>
				<input class="form-control input-sm" type="email" id="cemail" name="cemail"  placeholder="Confirma email">
			</div><!--Col-->	
	    </div><!--Row-->


	</div><!--Seccion datos-->
<h3>Domicilio</h3>
	<div>
		<div class="row">	
	     	<div class="col-xs-4 col-md-3"> 
	     		<label class="justificar"> Estado:  </label> 
	     	</div>
	     	<div class="col-xs-4 col-md-2"> 
	     		<label class="justificar"> Municipio:  </label> 
	     	</div><!--Col-->
	    </div><!--Row-->
		<div class="row">	
	     	<div class="col-xs-12 col-md-3">
	   		  	<select id="Estado">
	   		  		<option id="Estado" name="Estado" value="Colima" selected="selected">Colima</option>
	   		  		<option id="Estado" name="Estado" value="Jalisco">Jalisco</option>
	   		  	</select>
	    	</div><!--Col-->
	     	<div class="col-xs-12 col-md-2">
	   		  	<select id="Municipio">
	   		  		<option id="Municipio" name="Municipio" value="Colima" selected="selected">Colima</option>
	   		  		<option id="Municipio" name="Municipio" value="Jalisco">Jalisco</option>
	   		  	</select>
	    	</div><!--Col-->	    	
	    </div><!--Row-->
		<div class="row">	
	     	<div class="col-xs-4 col-md-3"> 
	     		<label class="justificar"> Dirección:  </label> 
	     	</div><!--Col-->
	    </div><!--Row-->
		<div class="row">	
	     	<div class="col-xs-12 col-md-6"> 
	    		<input class="form-control input-sm" type="text" id="Dom" name="Dom" placeholder="Domicilio" >
	     	</div><!--Col-->
	    </div><!--Row-->
	    <div class="row">
	   	 <div class="col-xs-4 col-md-2"> 
	    	<label class="justificar">Número Interior</label>
	     </div><!--Col-->		
	   	 <div class="col-xs-4 col-md-2"> 
	    	<label class="justificar">Número Exterior</label>
	     </div><!--Col-->		
	   	 <div class="col-xs-4 col-md-2"> 
	    	<label class="justificar">Código postal</label>
	     </div><!--Col-->		
	    </div><!--Row-->
		<div class="row">	
	     	<div class="col-xs-4 col-md-2"> 
	    		<input class="form-control input-sm" type="text" id="interior" name="interior" >
	     	</div><!--Col-->
	     	<div class="col-xs-4 col-md-2"> 
	    		<input class="form-control input-sm" type="text" id="exterior" name="exterior" >
	     	</div><!--Col-->
	     	<div class="col-xs-4 col-md-2"> 
	    		<input class="form-control input-sm" type="text" id="cp" name="cp" >
	     	</div><!--Col-->
	    </div><!--Row-->
</div> <!--Seccion domicilio-->
<h3>Domicilio para recibir notificaciones</h3>
<div>	
		<div class="row">	
	     	<div class="col-xs-4 col-md-3"> 
	     		<label class="justificar"> Estado  </label> 
	     	</div>
	     	<div class="col-xs-4 col-md-2"> 
	     		<label class="justificar"> Municipio  </label> 
	     	</div><!--Col-->
	    </div><!--Row-->
		<div class="row">	
	     	<div class="col-xs-12 col-md-3">
	   		  	<select id="Estado1">
	   		  		<option id="Estado1" name="Estado1" value="Colima" selected="selected">Colima</option>
	   		  		<option id="Estado1" name="Estado1" value="Jalisco">Jalisco</option>
	   		  	</select>
	    	</div><!--Col-->
	     	<div class="col-xs-12 col-md-2">
	   		  	<select id="Municipio1">
	   		  		<option id="Municipio1" name="Municipio1" value="Colima" selected="selected">Colima</option>
	   		  		<option id="Municipio1" name="Municipio1" value="Jalisco">Jalisco</option>
	   		  	</select>
	    	</div><!--Col-->	    	
	    </div><!--Row-->
		<div class="row">	
	     	<div class="col-xs-4 col-md-3"> 
	     		<label class="justificar"> Dirección  </label> 
	     	</div><!--Col-->
	    </div><!--Row-->
		<div class="row">	
	     	<div class="col-xs-12 col-md-6"> 
	    		<input class="form-control input-sm" type="text" id="Dom1" name="Dom1" placeholder="Domicilio" >
	     	</div><!--Col-->
	    </div><!--Row-->
	    <div class="row">
	   	 <div class="col-xs-4 col-md-2"> 
	    	<label class="justificar">Número Interior</label>
	     </div><!--Col-->		
	   	 <div class="col-xs-4 col-md-2"> 
	    	<label class="justificar">Número Exterior</label>
	     </div><!--Col-->		
	   	 <div class="col-xs-4 col-md-2"> 
	    	<label class="justificar">Código postal</label>
	     </div><!--Col-->		
	    </div><!--Row-->
		<div class="row">	
	     	<div class="col-xs-4 col-md-2"> 
	    		<input class="form-control input-sm" type="text" id="interior1" name="interior1" >
	     	</div><!--Col-->
	     	<div class="col-xs-4 col-md-2"> 
	    		<input class="form-control input-sm" type="text" id="exterior1" name="exterior1" >
	     	</div><!--Col-->
	     	<div class="col-xs-4 col-md-2"> 
	    		<input class="form-control input-sm" type="text" id="cp1" name="cp1" >
	     	</div><!--Col-->
	    </div><!--Row-->
		<div class="row">	
			<div class="col-xs-4 col-md-6">
				<label>Referencias cercanas a la dirección del contacto</label>
			</div><!--Col-->	
	    </div><!--Row-->
		<div class="row">	
			<div class="col-xs-4 col-md-6">
				<textarea id="refe" class="form-control input-sm" name="refe" ></textarea>
			</div><!--Col-->	
	    </div><!--Row-->	

</div><!--Sección para recibir notificaciones-->
<h3>Datos de usuario (Ingreso a plataforma)</h3>
<div>
	<div class="row">
		<div class="col-xs-4- col-md-2">
			<label>Usuario</label>	
		</div>
		<div class="col-xs-4- col-md-2">
			<label>Contraseña</label>	
		</div>
		<div class="col-xs-4- col-md-4">
			<label>Confirmar contraseña</label>	
		</div>
			
	</div> <!--Row-->
	<div class="row">	
	     	<div class="col-xs-4 col-md-2"> 
	    		<input class="form-control input-sm" type="text" id="user" name="user"  placeholder="Usuario">
	     	</div><!--Col-->

	     	<div class="col-xs-4 col-md-2"> 
	    		<input class="form-control input-sm" type="password" id="pass" name="pass"  placeholder="Contraseña">
	     	</div><!--Col-->

	     	<div class="col-xs-4 col-md-2"> 
	    		<input class="form-control input-sm" type="password" id="pass1" name="pass1"  placeholder="Confirma Contraseña">
	     	</div><!--Col-->
	</div><!--Row-->	
</div> <!--Usuario-->
</div> <!--accordion-->
<div class="row">
	<div class="col-md-3 col-md-offset-4">
    	 <button type="button" class="btn btn-sm btn-success btn-block" onclick="registro_nuevo();">Guardar</button>	
    	 </br>
	</div>
</div><!--Row-->


</div> <!--CONTAINER-->


<?php echo form_close(); //se cierra formulario ?> 

<script lenguage="javascript" type="text/javascript">
 	$(function(){
 		$("#accordion").accordion();
 		$("#identificacion").selectmenu();
 		$("#Estado").selectmenu();
 		$("#Municipio").selectmenu();
 		$("#Estado1").selectmenu();
 		$("#Municipio1").selectmenu();
 	});
	
 	function tipo_persona(tipo){
 		
 		var ns=document.getElementById('nombre'); 
 		var am=document.getElementById('amat'); 
 		var ap=document.getElementById('apat'); 
 		var rs=document.getElementById('rsocial');

 		if(tipo == "Fisica")
 			{
 				document.getElementById('nombre').style.display="inline";
 				document.getElementById('amat').style.display="inline"; 
 				document.getElementById('apat').style.display="inline";
 				document.getElementById('rsocial').style.display = "none";
 				document.getElementById('Representante').style.display = "none";
 				$('#Ttipo').text("Persona");
				$('#rsocial').val("");
 			}else{
 				document.getElementById('Representante').style.display = "inline";
 			    document.getElementById('rsocial').style.display="inline";	
				$('#Ttipo').text("Razón Social");	
 			}
	} //Tipo_persona

 	function registro_nuevo(){
			var url='<?php echo base_url().'index.php/Welcome/inicio_sesion';?>';
 		$.ajax({url:"<?php echo base_url().'index.php/cLogin/registrar_nuevo'; ?>",
 			type:'POST',
 			data:{
					tipo:document.querySelector('input[name = "tipo"]:checked').value,
					nombre:document.getElementById('nombre').value,
					apat:document.getElementById('apat').value,
					amat:document.getElementById('amat').value,
					rsocial:document.getElementById('rsocial').value,
					genero:document.querySelector('input[name = "genero"]:checked').value,
					identificacion:document.getElementById('identificacion').value,
					referencia:document.getElementById('referencia').value,
					tf:document.getElementById('tf').value,
					curp:document.getElementById('curp').value,
					movil:document.getElementById('movil').value,
					email:document.getElementById('email').value,
					cemail:document.getElementById('cemail').value,
					Estado:document.getElementById('Estado').value,
					Municipio:document.getElementById('Municipio').value,
					Dom:document.getElementById('Dom').value,
					interior:document.getElementById('interior').value,
					exterior:document.getElementById('exterior').value,
					cp:document.getElementById('cp').value,
					Estado1:document.getElementById('Estado1').value,
					Municipio1:document.getElementById('Municipio1').value,
					Dom1:document.getElementById('Dom1').value,
					interior1:document.getElementById('interior1').value,
					exterior1:document.getElementById('exterior1').value,
					cp1:document.getElementById('cp1').value,
					refe:document.getElementById('refe').value,
					user:document.getElementById('user').value,
					pass:document.getElementById('pass').value,
					pass1:document.getElementById('pass1').value

 			},
 		success:function(result){
 			
			if(result !=0)
			{
				alert(' Se guardo el registro con exito...');
			} else{
				alert(' Ocurrio un error y no se guardo el registro...');				
			}
		 window.location.href=url;
 		}
	


 		});
 	}//Registro_nuevo
 		

 	

 </script>
 	
 

