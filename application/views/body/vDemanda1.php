<div id="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-5">
			<h4><img class="imgview" src="<?php echo base_url();  ?>Imagenes/Promociones.png" title="Demandas" width="10" height="10">
			<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nueva Demanda</strong></h4>
    </div>
    <br>
    <br>
    <br>   
    <br>
	</div> <!--Imgane demanda-->
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div id="accordion">
	<h3>Información del Demandante y Demandado</h3>
	<div>
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<label id="Oficial">Presenta</label> </br>
			</div> <!--col-->
		</div><!--Row-->

		<input type="hidden" id="idRoles" value="<?php print_r($_SESSION["Persona_id"]); ?>" > <!--BD persona que crea el expediente usuario interno(O.Partes) o externo-->
		<input type="hidden"  id="Tiporol" value="<?php print_r($_SESSION["Rol"]); ?>" > <!--BD Tipo de rol del usuario -->

			<div class="row">
			 <div class="col-md-5 col-md-offset-1">
				<input id="Regristra" class="form-control input-sm" type="text" name="Registra"  value="<?php print_r($_SESSION["Nombre"]." ".$_SESSION["Apat"]." ".$_SESSION["Amat"]); ?>"> </br>
			 </div> <!--col-Registra-->
		</div><!--Row-->
		<div class="row">		
			<div class="col-md-5 col-md-offset-1">
				<label id="demandado" name="demandado">Demandante</label> </br>
			</div> <!--col-->	
			<div class="col-md-5 col-md-offset-1">
				<label id="Tdemandado">Demandado</label>
			</div> <!--col--> 
		</div><!--Row-->
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<input id="Demandante" class="form-control input-sm" type="text" name="Demandante" placeholder="buscar " > </br>
			</div><!--col Demandante-->
			<div class="col-md-5 col-md-offset-1">
				<input class="form-control input-sm" type="text" name="Demandado" id="Demandado" placeholder="buscar">
			</div> <!--col Demandado --> 
		</div><!--Row-->
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
	   			<label id="TRol" name="TRol">Rol</label>
	   		</div><!--Col-->
			<div class="col-md-5 col-md-offset-1">
				<label name="domicilio" >Domicilio: </label> 
			</div><!--Col-->
		</div> <!--Row-->		
	   	<div class="row">
	   		<div class="col-md-5 col-md-offset-1">
	   		  	<select id="rol" style="width: 100%;">
	   		  		<option id="rol" name="rol" value="Actor" selected="selected" onclick="Roles(this.value);">Actor</option>
	   		  		<option id="rol" name="rol" value="Apoderado Legal" onclick="Roles(this.value);">Apoderado Legal</option>
	   		  		<option id="rol" name="rol" value="Demandado" onclick="Roles(this.value);">Demandado</option>
	   		   		<option id="rol" name="rol" value="Tercero Interesado" onclick="roles(this.value);">Tercero Interesado</option>
	   		  	</select> </br>
	   		</div><!--Col-->  
	   	</div><!--row-->
	   		  	
	</div><!--Demandante - Demandado -->
	<h3>Documentos</h3>
	<div>
	<!--Para agregar documentos-->	
	   	<div class = "row">
	   		<div class="col-md-3 "> 
	   			<label> Agregar documentos</label>

	   	    </div>
	   		<div class="col-md-4 col-md-offset-2"> 	   	    
	   	    	<label>Tipo de documento  y descripción</label>
	   	    </div>
	   	</div>
	   	<br>
	 	<div class = "row">	  
	   	  <div class="col-md-3 "> 	
	   	  	 <input type="file" id="userfile" name="userfile" size="20" multiple accept="application/pdf">
	   	  </div>
 	<!--Fin de agregar documentos-->
	<!-- <?php echo form_open_multipart('upload/do_upload');?> -->
	   		<div class="col-md-3 col-md-offset-1">
	   		  	<select id="doc" style="width: 200px;">
	   		  		<option id="doc" name="doc" value="Actor" selected="selected" >Boleta de Infracción</option>
	   		  		<option id="doc" name="doc" value="Concesion">Concesión</option>
	   		  		<option id="doc" name="doc" value="Demanda">Demanda</option>
	   		   		<option id="doc" name="doc" value="Nombramiento">Nombramiento</option>
	   		   		<option id="doc" name="doc" value="Pleitos">Pleitos y Cobranzas</option>
	   		   		<option id="doc" name="doc" value="Promocion">Promoción</option>
	   		   		<option id="doc" name="doc" value="Oficio">Oficio</option>
	   		   		<option id="doc" name="doc" value="Otros">Otros</option>	   		
	   		  	</select> 	
	   		</div><!--Col-->  
	   		<div clas="col-md-3"> <textarea id="tDescrip"></textarea></div>
	   		<div class="col-md-3"> <button> Agregar</button> </div>	
	   	</div><!--row-->	
	  
	   	<br>
	 <div class="row">
	  <div class="col-md-6">
	  	<div ng-app="fapp" ng-controller="fFilesToUp"> <!--Angularjs-->		
	   	  <table id="tbfiles" class="table">
	   		<thead>
	   			<tr> <!--Encabezado-->
	   				<th>#</th>
	   				<th>Archivo</th>
	   				<th>Tipo</th>
	   				<th>descripción</th>
	   				
	   			</tr>
	   		</thead>	
	   		<tbody>
	   				 <!--Aqui deberia ir tr no-repeat="x in names| filter:filtro" en caso de ser Angularjs -->
	   		</tbody>
	   	  </table>
	   	</div> <!--fin angular-->
	  </div><!--Col--> 	
	 </div> <!--Row--> 	
	   	<!--submit para subir archivo-->
 		<div class = "row">	  
	   	  <div class="col-md-5 col-md-offset-5"> 	
		   	<input type="submit" class="btn btn-success" id="updemanda" value="Guardar">
	   	  </div> <!--Row-->
	   	</div> <!--Col-->
 
	   	
	</div><!--Documentos anexar-->
</div><!--Acordion-->
</div> <!--col-->
</div> <!--Row-->
</div> <!--Container-->

<script lenguage="javascript" type="text/javascript">
 	$(function(){
 		$("#accordion").accordion();
 		$("#rol").selectmenu();
 		$("#doc").selectmenu();
 		$("#Estado").selectmenu();
 		$("#Municipio").selectmenu();
 		$("#Estado1").selectmenu();
 		$("#Municipio1").selectmenu();
 	});//javascripUI
 

function requiredAutocomplete(idRoles,id){
		var persona=[];
	$.post("<?php echo site_url('cOficial/buscar_persona');?>",
			{ idRoles:id},
			function(data){
			for(var l=0; l<data.length;l++){
				if(id == 7){  // Fisica/moral
					persona.push(data[l].id + " " + id + " " + " " + data[l].Nombre + " " + data[l].Apat + " " + data[l].Amat);
				//persona.push(data[l]);
				//	alert(data);
					}
				if(id == 8)
					persona.push(data[l].id + " "+id + " "+ idRoles+" " + data[l].RazonSocial); //Institucion
					//alert(persona);
				}
			
			},"json");//post
		return persona;
	}//requiredAutocomplete()

	$("#Demandante").autocomplete({source:requiredAutocomplete("idRoles",7)});
	$("#Demandado").autocomplete({source:requiredAutocomplete("idRoles",8)});
	
		

function Roles(roles){
	 $("#TRol").text("Rol del "+ roles );
}

// funcion que se sejecuta cuando se abre la pagina
	$(document).ready(function(){
	if ($("#Tiporol").val() == "Usuario") {
		$("#Oficial").text("Registra el "+ $("#Tiporol").val());		
	} else{
		$("#Oficial").text("Registra el "+ $("#Tiporol").val());
	}

	//javascript para agregar los archivos en una lista
		$("#updemanda").on('click',function(){ 
			alert("Esta por subirse el archivo");
			var tds='<tr>';
			var ifile = $("#userfile");
				var files=ifile.prop("files");
					var names = $.map(files,function(val){ return val.name});
				$.each(names,function(i,name){
						tds += '<tr> <td>' + i + '</td>' + '<td>'+ name +'</td> </tr>';

				});	 
				tds += '</tr>';
				$("#tbfiles").append(tds);
			
		});

	});//LOAD

// funcion con ajax para subir archivos

	
 </script>