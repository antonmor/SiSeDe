	<!-- <?php echo form_open_multipart('cupload/do_guardar');?> 	 -->
<?php
	$attributes = array('id'=>'form1');
	echo form_open_multipart('cupload/do_guardar',$attributes);
	echo validation_errors();
	?>
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
	<div class="col-md-4 col-md-offset-4">
		<label>Folio</label>
		<input type="text" id="FolioExp" name="FolioExp" autofocus style="text-align:right;">
	</div>

</div>
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div id="accordion">
	<h3>Información del Demandante y Demandado</h3>
	<div>
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<label id="Oficial">Presenta</label> </br>
			</div> <!--col-->
			<div class="col-md-2 col-md-offset-1"> 
				<label id="fecha" >
						Fecha
				</label>
			</div>
			<div class="col-md-2 col-md-offset-1">
				<label>
						Hora:Min
				</label>
			</div>
		</div><!--Row-->
<!-- <form method="POST" class="myform" enctype="multipart/form-data"> -->
		<input type="hidden" id="idRoles" value="<?php print_r($_SESSION["Persona_id"]); ?>" > <!--BD persona que crea el expediente usuario interno(O.Partes) o externo-->
		<input type="hidden"  id="Tiporol" value="<?php print_r($_SESSION["Rol"]); ?>" > <!--BD Tipo de rol del usuario -->
		<!--DEMANDANTE Y DEMANDADO-->
		<input type="hidden" id="d1" name="d1"> <!--Demandante o Demandado-->
		<input type="hidden" id="d2" name="d2"> <!--Demandante o Demandado-->
		

		<div class="row">
			
			 <div class="col-md-5 col-md-offset-1">
				<input id="Regristra" class="form-control input-sm" type="text" name="Registra"  value="<?php print_r($_SESSION["Nombre"]." ".$_SESSION["Apat"]." ".$_SESSION["Amat"]); ?>"> </br>
			 </div> <!--col-Registra-->
		
			<div class="col-md-5 col-md-offset-1">  
                 	<input  type='text' id="datepicker" name="datepicker" placeholder="<?php echo Date('Y-m-d'); ?>" style="width: 25%;"/>
                        	<span class="glyphicon glyphicon-calendar"></span>                

                 	<input type='text' id="dHours" name="dHours" pattern="[0-23]" size="2" />
                    <input type="text" id="dMin"   name="dMin" pattern="[0-59]"	 size="2" > 
				
							<span class="glyphicon glyphicon-time"></span>
            </div>   <!--Col-->
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
				<input id="Demandante" class="form-control input-sm" type="text" name="Demandante" placeholder="buscar" > </br>
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
	   		  	<select id="rol" name="rol" style="width: 100%;">
	   		  		<option value="1" selected="selected" onclick="Roles(this.value);">Actor</option>
	   		  		<option  value="2" onclick="Roles(this.value);">Apoderado Legal</option>
	   		  		<option value="3" onclick="Roles(this.value);">Demandado</option>
	   		   		<option value="4" onclick="roles(this.value);">Tercero Interesado</option>
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
	   	  	 			<input type="file" id="userfile" name="userfile" size="20" accept="application/pdf">
	   	  				</div>
 					 </div>
 					 </td>
	   				
	   				 <td id="combodoc2">
						<div id="divdoc2" class="col-md-3 col-md-offset-1">
				   		  	<select id="doc2" name="doc2" style="width: 200px;">
			   		  			<option  value="1">Boleta de Infracción</option>
			   		  			<option  value="2">Concesión</option>
	   				  			<option  value="3"selected=" selected">Demanda</option>
	   		   					<option  value="4">Nombramiento</option>
	   		   					<option  value="5">Pleitos y Cobranzas</option>
	   		   					<option  value="6">Promoción</option>
	   		   					<option  value="7">Oficio</option>
	   		   					<option  value="8">Otros</option>	   		
	   		  				</select> 	
	   					</div><!--Col-->  
	   				 </td>
	   				 <td>	   		
	   				 	<div clas="col-md-4"> 
	   				 		<textarea id="tDescrip" name="tDescrip" ></textarea>
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
		   	<input type="button" class="btn btn-success" id="updemanda" value="Guardar"> 
	   	 	<input type="button" class="btn btn-danger" id="cancelar" value="Cancelar">
	   	  </div> <!--Col-->
	   	</div> <!--Row-->

<!-- </form> -->
</div> <!--Container-->
<?php echo form_close(); ?>


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
 		$('#dHours').spinner({
 			numberFormat: "nn",
 			max:23
 		});
 		$('#dMin').spinner({
 			numberFormat: "nn",
 			max:59
 		});

 		$("#datepicker").datepicker({
 			yearRange: "2015:2020",
 			dateFormat: "yy-mm-dd"

 		});
 	});//javascripUI
 

function requiredAutocomplete(idRoles,id){
		var persona=[];
	//	var fdate = $('#datetimepicker2')

	$.post("<?php echo site_url('cOficial/buscar_persona');?>",
			 {idRoles:id},
			function(data){

			for(var l=0; l<data.length;l++){
				if(id == 7){  // Fisica/moral
					idPd1 = data[l].idPersona;
					persona.push(data[l].idPersona + " " + id + " " + " " + data[l].Nombre + " " + data[l].Apat + " " + data[l].Amat);
					
					$("#d1").val(data[l].idPersona);
				//persona.push(data[l]);
				//	alert(data);
					}
				if(id == 8)
				   {idPd = data[l].idPersona;
				   	persona.push(data[l].idPersona + " "+id + " "+ idRoles+" " + data[l].RazonSocial); 
					
					$("#d2").val(data[l].idPersona);
					//Institucion
					//alert(persona);
				   }
				}
			
			},"json");//post
		return persona;
	}//requiredAutocomplete()

	$("#Demandante").autocomplete({
		source:requiredAutocomplete("data",7),
		select: function(event, ui){
			 alert($("#d1").val());

		}
	}); // demandante
	$("#Demandado").autocomplete({
		source:requiredAutocomplete("idRoles",8),
		select: function(){
			alert($("#d2").val());
		}
	}); //demandado
	
	

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
	//	alert(document.getElementById('FolioExp').value);
	event.preventDefault();
	var formData = $(this).serialize();
		$.ajax({
				url:"<?php echo base_url().'index.php/cupload/do_guardar'; ?>",
				type:'POST',
				/*data:{
						
						FolioExp:document.getElementById('FolioExp').value,//id expediente
						tipo:document.getElementById('doc2').value, //tipo de documento
						//idCreaExp: es de la sesi[on] actual
						idPDemandante: $("#d1").val(), //Demandante
						idPDemandado:  $("#d2").val(), //Demandado
						fecha: document.getElementById('datepicker').value + ' ' + document.getElementById('dHours').value + ':' + document.getElementById('dMin').value , 
						Des: document.getElementById('tDescrip').value, //descripcioon
						status:'1',
						//file:document.getElementById('userfile').value

					 },*/
					 data:formData, 
					 async:false,
					// mimeType: "multipart/form-data",
					 contentType:false,
					 cache:false,
					 processData:true,
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

$('#cancelar').on('click',function (){
	window.location.href='<?php echo base_url().'index.php/cOficial/demanda';?>';
});
	
 </script>