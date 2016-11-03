<div class="container">
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
			<div class="col-md-5 col-md-offset-1"> 
				<label id="fecha" >
						Fecha
				</label>
				
			</div>
		</div><!--Row-->

		<input type="hidden" id="idRoles" value="<?php print_r($_SESSION["Persona_id"]); ?>" > <!--BD persona que crea el expediente usuario interno(O.Partes) o externo-->
		<input type="hidden"  id="Tiporol" value="<?php print_r($_SESSION["Rol"]); ?>" > <!--BD Tipo de rol del usuario -->

			<div class="row">
			 <div class="col-md-5 col-md-offset-1">
				<input id="Regristra" class="form-control input-sm" type="text" name="Registra"  value="<?php print_r($_SESSION["Nombre"]." ".$_SESSION["Apat"]." ".$_SESSION["Amat"]); ?>"> </br>
			 </div> <!--col-Registra-->
		
			<div class="col-md-5 col-md-offset-1">  
			<!---	<input type="text" id="datepicker" name="datepicker"> -->
				<div class="form-group">	
					<div class="input-group date" id="datetimepicker1">
                    	<input type='text' class="form-control" id ="datecadena" />
                    	<span class="input-group-addon">
                        	<span class="glyphicon glyphicon-calendar"></span>
                    	</span>
                    </div><!--DateTimer--> 	
                </div>  <!--formGroup-->  
            </div><!--Col-->	
      
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
	   	</div>

	 <div class="row">
	  <div class="col-md-6">
	  	<div ng-app="fapp" ng-controller="fFilesToUp"> <!--Angularjs-->		
	   	  <table id="tbfiles" class="table">
	   		<thead>
	   			 <!--Encabezado-->
	   			<tr>
	   				<th><center> Archivo</center> </th>
	   				<th><center> Tipo </center></th>
	   				<th><center>Descripción</center></th>
	   			</tr>
	   		</thead>	
	   		<tbody>
	   				 <!--Aqui deberia ir tr no-repeat="x in names| filter:filtro" en caso de ser Angularjs -->
	   				<tr id="first"> 
	   				 <td id="partida">
	   				 <div class = "row">	  
	   	  				<div class="col-md-3 "> 	
	   	  	 			<input type="file" id="userfile" name="userfile" accept="application/pdf">
	   	  				</div>
 					 </div>
 					 </td>
	   				
	   				 <td id="combodoc2">
						<div id="divdoc2" class="col-md-3 col-md-offset-1">
				   		  	<select id="doc2" name="doc2" style="width: 200px;">
			   		  			<option  value="Boleta de Infracción" selected="selected" >Boleta de Infracción</option>
			   		  			<option  value="Concesion">Concesión</option>
	   				  			<option  value="Demanda">Demanda</option>
	   		   					<option  value="Nombramiento">Nombramiento</option>
	   		   					<option  value="Pleitos">Pleitos y Cobranzas</option>
	   		   					<option  value="Promocion">Promoción</option>
	   		   					<option  value="Oficio">Oficio</option>
	   		   					<option  value="Otros">Otros</option>	   		
	   		  				</select> 	
	   					</div><!--Col-->  
	   				 </td>
	   				 <td>	   		
	   				 	<div clas="col-md-4"> 
	   				 		<textarea id="tDescrip"></textarea>
	   				 	</div>
			  		 </td>
			  		 <td>
			  		 	<div class="col-md-5"> 
	   						<button class="btn btn-primary" id="adddemanda" name="adddemanda"> Agregar</button> 
	   					</div>	
			  		 </td>
	   				</tr> 
	   		
	   		</tbody>
	   	  </table>
	   	</div> <!--fin angular-->
	  </div><!--Col--> 	
	 </div> <!--Row--> 	
	</div><!--Documentos anexar-->
</div><!--Acordion-->
</div> <!--col-->
</div> <!--Row-->
	   	<!--submit para subir archivo-->
 		<div class = "row">	  
	   	  <div class="col-md-3  col-md-offset-5"> 	
		   	<input type="submit" class="btn btn-success" id="updemanda" value="Guardar">
	   	 	<input type="submit" class="btn btn-danger" id="updemanda" value="Cancelar">
	   	  </div> <!--Col-->
	   	</div> <!--Row-->

	   	
</div> <!--Container-->

<script lenguage="javascript" type="text/javascript">
 	var idPd1,  // idPersona demandante
 	idPd; //idPersona demandado


 	$(function(){
 		$("#accordion").accordion();
 		$("#rol").selectmenu();
 		$("#doc").selectmenu();
 		$("#doc2").selectmenu();
 		$("#Estado").selectmenu();
 		$("#Municipio").selectmenu();
 		$("#Estado1").selectmenu();
 		$("#Municipio1").selectmenu();
  		$("#datetimepicker1").datetimepicker();		

 	});//javascripUI
 

function requiredAutocomplete(idRoles,id){
		var persona=[];
	$.post("<?php echo site_url('cOficial/buscar_persona');?>",
			{ idRoles:id},
			function(data){
			for(var l=0; l<data.length;l++){
				if(id == 7){  // Fisica/moral
					persona.push(data[l].idPersona + " " + id + " " + " " + data[l].Nombre + " " + data[l].Apat + " " + data[l].Amat);
					idPd1 = data[l].idPersona;
				//persona.push(data[l]);
				//	alert(data);
					}
				if(id == 8)
					persona.push(data[l].idPersona + " "+id + " "+ idRoles+" " + data[l].RazonSocial); 
					idPD = data[l].idPersona;

					//Institucion
					//alert(persona);
				}
			
			},"json");//post
		return persona;
	}//requiredAutocomplete()

	$("#Demandante").autocomplete({source:requiredAutocomplete("idRoles",7)}); // demandante
	$("#Demandado").autocomplete({source:requiredAutocomplete("idRoles",8)}); //demandado
	
		

function Roles(roles){
	 $("#TRol").text("Rol del "+ roles );
}

// funcion que se sejecuta cuando se abre la pagina
	$(document).ready(function(){
	if ($("#Tiporol").val() == "Usuario") {
		$("#Oficial").text( $("#Tiporol").val());		
	} else{
		$("#Oficial").text($("#Tiporol").val());
	}

	//javascript para agregar los archivos en una lista
	$("#adddemanda").on('click',function(){ 
			

			//alert("Esta por subirse el archivo");
		
		$.ajax({url:"<?php echo base_url().'index.php/cupload/do_upload'; ?>",
				type:'POST',
				data:{
						
						//id expediente
						tipo:document.getElementById('doc2').value, //tipo de documento
						//idCreaExp: es de la sesi[on] actual
						idPDemandante:idPd1, //Demandante
						idPDemandado:idPd, //Demandado
						//fecha:document.getElementById('datetimepicker1').value, //fecha de alta
						fecha: "cujc"
					 },
					 success:function(result){
					 	alert(result);

					 } 

			   });




/* multiples
			var tds='<tr>';
			var ifile = $("#userfile");
			
				var files=ifile.prop("files");
			    var names = $.map(files,function(val){ return val.name});	
					var i=1;
						
				$.each(names,function(i,name){
					alert(name);
						i+=1;	
						});	
		
			
			$("table tr#first:first").clone().find("files ").each(function(){
						$(this).attr({
							'id': function(_,id) {return id + i},
							'name': function(_,name){ return name + i},
							'value': ''
						});
					}).end().appendTo("#tbfiles"); 
		


			 
			//	alert(names); 	
			//$('select#divdoc2').append(options); 
			   // tds += '</tr>';
				//alert(tds);
				//$("#tbfiles").append(tds);
				//$('#doc2').clone().append('#tbfiles');
*/				//$('#divdoc2').clone().add();
		});

	});//LOAD

// funcion con ajax para subir archivos

	
 </script>