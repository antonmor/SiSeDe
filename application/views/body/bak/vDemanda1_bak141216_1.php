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
		<input type="hidden" class="tags_id" name="tags_id" id="tags_id" >
		<input type="hidden" class="tags_id" name="tags_id2" id="tags_id2" >

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
			<form accept-charset="utf-8" method="POST">
				<div class="col-md-5 col-md-offset-1">
					<input type="text" class="form-control input-sm" name="busqueda" value="" placeholder="" maxlength="50" autocomplete="off" onkeyup="buscar(this.value);" />
					<table id="tbDatos" width="100%"  border="0" cellspacing="0" cellpadding="0" style="font-size:12px"> </table>
				</div>	
				<div class="col-md-5 col-md-offset-1">
					<input type="text" class="form-control input-sm" name="busqueda2" value="" placeholder="" maxlength="50" autocomplete="off" onkeyup="buscar2(this.value);" >
					<table id="tbDatos2" width="100%"  border="0" cellspacing="0" cellpadding="0" style="font-size:12px"> </table>
				</div>	
			</form>
	<!--		<div id="resultadoBusqueda"></div>	<br> 
	-->
	

	<!--			<input id="Demandante" class="form-control input-sm" type="text" name="Demandante" placeholder="buscar" > </br>
			
			
	-->		

	<!--		<div class="col-md-5 col-md-offset-1">
				<input class="form-control input-sm" type="text" name="Demandado" id="Demandado" placeholder="buscar">
			
			</div>
 	-->	
		
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


function Roles(roles){
	 $("#TRol").text("Rol del "+ roles );
}

// funcion que se sejecuta cuando se abre la pagina
$(document).ready(function(){
//folio del expediente

$.ajax({
	Type:"POST",
	url:"<?php echo base_url().'index.php/cOficial/obtener_exp'; ?>",
	success:function(result){
			
			var Data = jQuery.parseJSON(result);		 	
						$("#FolioExp").val(Data[0].FExpediente);
					 } 
	  });


// Selecciona al demandante
$('#say_hello').click(function(){
	hello();
});

//Etiqueta para la busqueda de usuario
	$("#resultadoBusqueda").html('<p><p>');
// Fin buscar usuario...


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

		});

});//LOAD

//buscar persona demandante
function buscar(str){
var textoBusqueda = $("input#busqueda").val();
	if($("input#busqueda") != ""){
		$.ajax({
			type:'POST',
			url:"<?php echo base_url().'index.php/cOficial/buscar_persona'; ?>",
			data: { 'valorBusqueda': str,
					'idRoles':'7'},
			success:function(mensaje){
					var da = mensaje;
					//alert(da);
						var Data = jQuery.parseJSON(mensaje);
					 //$("#resultadoBusqueda").html(mensaje);
				if(mensaje.length <= 2) 
				    {
				    	$('#tags_id').val('');
				    	//alert(mensaje.length);
				    }	 

					 $('#tbDatos').html("");													//style="display: none"		
					 $('#tbDatos').append('<table class ="table table-striped" id="example"><thead><tr><th>Id </th><th>Nombre</th> <th>CURP</th></table>');
					 var table = $('#tbDatos').children().addClass("display");
					 for(var i=0;i<Data.length; i++) {
					 	table.append("<tr class='success' id="+Data[i].idFisica +"'><td>"+ Data[i].idFisica + "</td><td>"+Data[i].Nombre+ " " + Data[i].Apat + " " + Data[i].Amat 
					 		+" <td>" + "<td class='info' name='CURP'>"+ "<a href='#' id='say_hello'>" + Data[i].CURP+"</a><td></tr>");
					 }
			$('#tags_id').val(Data[0].idFisica);
			},
			error: function(){
				alert('error: ' + mensaje);
			}

		});
	} else {
		 $('#tbDatos').html("");
		 $('#tbDatos').append("");
	}
};

/*
Buscar personas demandado
*/
function buscar2(str){
var textoBusqueda = $("input#busqueda2").val();
	if($("input#busqueda2") != ""){
		$.ajax({
			type:'POST',
			url:"<?php echo base_url().'index.php/cOficial/buscar_persona'; ?>",
			data: { 'valorBusqueda': str,
			'idRoles':'8'},
			success:function(mensaje){
					var da = mensaje;
					//alert(da);
						var Data = jQuery.parseJSON(mensaje);
					 //$("#resultadoBusqueda").html(mensaje);
				if(mensaje.length <= 2) 
				    {
				    	$('#tags_id2').val('');
				    	//alert(mensaje.length);
				    }	 

					 $('#tbDatos2').html("");													//style="display: none"		
					 $('#tbDatos2').append('<table class ="table table-striped" id="example"><thead><tr><th>Id </th><th>Nombre</th> <th>CURP</th></table>');
					 var table = $('#tbDatos2').children().addClass("display");
					 for(var i=0;i<Data.length; i++) {
					 	table.append("<tr class='success' id="+Data[i].idFisica +"'><td>"+ Data[i].idFisica + "</td><td>"+Data[i].RazonSocial+ "( "+Data[i].Nombre + " " + Data[i].Apat + " " + Data[i].Amat + " ) " 
					 		+" <td>" + "<td class='info' name='CURP'>"+ "<a href='#' id='say_hello'>" + Data[i].CURP+"</a><td></tr>");
					 }
			$('#tags_id2').val(Data[0].idFisica);
			},
			error: function(){
				alert('error: ' + mensaje);
			}

		});
	} else {
		 $('#tbDatos2').html("");
		 $('#tbDatos2').append("");

	}

};



/*


*/

function hello(){
	alert(" ids: ");
};






/* fuentes de apoyo...
http://es.stackoverflow.com/questions/14502/como-poner-en-mi-tabla-en-json-jquery-un-pdf-de-sql
https://mimentevuela.wordpress.com/2015/08/09/busqueda-instantanea-con-ajax-php-y-mysql/comment-page-1/
http://stackoverflow.com/questions/8612554/calling-javascript-function-inside-html-tag
*/











//fin buscar una persona

$('#cancelar').on('click',function (){
	window.location.href='<?php echo base_url().'index.php/cOficial/demanda';?>';
});
	
 </script>