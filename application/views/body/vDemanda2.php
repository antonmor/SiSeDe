	<!-- <?php echo form_open_multipart('Cupload2/do_guardar');?> 	 -->
	<?php $attributes = array('id'=>'form1');
	echo form_open_multipart('Cupload2/do_guardar',$attributes);
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
				<!-- <div class="col-md-4 col-md-offset-4"> 
					<label>Serie</label>--> 
					<input type="hidden" id="Serie" name="Serie" style="text-align:right;">
				<!-- </div> -->  <!--col-->
				<!-- <div class="col-md-4 col-md-offset-4">
					<!-- <label>Folio</label>-->
					<input type="hidden" id="folioexp" name="folioexp" style="text-align:right;"> 
				<!--</div> -->
			</div> <!--Row-->
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div id="accordion">
						<h3 accept-charset="utf-8">Información del Demandante y Demandado</h3>
						<div>
							<div class="row">
								<div class="col-md-5 col-md-offset-1">
									<label id="Oficial">Presenta</label> </br>
								</div> <!--col-->
							<!--	<div class="col-md-5 col-md-offset-1"> 
									<label id="fecha" >
										Fecha
									</label>
								</div>
							-->	
							</div><!--Row-->
							<!-- <form method="POST" class="myform" enctype="multipart/form-data"> -->
							<input type="hidden" id="idRoles" value="<?php print_r($_SESSION["Persona_id"]); ?>" > <!--BD persona que crea el expediente usuario interno(O.Partes) o externo-->
							<input type="hidden"  id="Tiporol" value="<?php print_r($_SESSION["Rol"]); ?>" > <!--BD Tipo de rol del usuario -->
							<!--DEMANDANTE Y DEMANDADO-->
							<input type="hidden" id="d1" name="d1"> <!--Demandante o Demandado-->
							<input type="hidden" id="d2" name="d2"> <!--Demandante o Demandado-->
							<div class="row">
								<div class="col-md-5 col-md-offset-1">
									<input id="Regristra" class="form-control input-sm" type="text" name="Registra"  value="<?php print_r($_SESSION["Nombre"]); ?>"> </br>
								</div> <!--col-Registra-->
							<!--	<div class="col-md-5 col-md-offset-1"> 
								<script>
									 $(function () {
									    //$("#datepicker").datepicker(d/m/y);	
									    $.datepicker.setDefaults($.datepicker.regional["es"]);
									    $("#datepicker").datepicker({ minDate: 0 });
									    								 });
								</script>
									<input type="text" class="form-control" id="datepicker" name="datepicker"  style="text-align: center">
								</div>   <!--Col-->
							
							</div><!--Row-->
							<div class="row">		
							<!-- <div class="col-md-5 col-md-offset-1"> -->
									<!-- <label id="demandado" name="demandado">Demandante</label> </br> -->
							<!-- </div> -->  <!--col-->
							       <div class="col-md-5 col-md-offset-1 ">
									<label id="Tdemandado">Institución a Demandar</label>
								</div> <!--col--> 
							</div><!--Row-->
							<div class="row">
								<form accept-charset="utf-8" method="POST" enctype="multipart/form-data">
									<input type="hidden" class="tags_id" name="tags_id" id="tags_id" >
									<input type="hidden" class="tags_id" name="tags_id2" id="tags_id2" >
								<!--		<div class="col-md-5 col-md-offset-1">
								<input type="text" class="form-control input-sm" id="busqueda" name="busqueda" value="" placeholder="Introduce institución" maxlength="50" autocomplete="off"/>
										<select id="slt-demandante" class="form-control"></select> 
									</div>	-->
									<div class="col-md-5 col-md-offset-1">
										<input type="text" class="form-control input-sm" id="busqueda2" name="busqueda2" value="" placeholder="" maxlength="50" autocomplete="off">
										<select id="slt-demandado" class="form-control"></select>
									</div>	
								</form>
	</div><!--Row-->
	 <div class="row">
		<div class="col-md-5 col-md-offset-1">
			<label id="TRol" name="TRol">Rol</label>
		</div>  <!--Col-->
	</div>  <!--Row-->		
	 <div class="row">
		<div class="col-md-5 col-md-offset-1">
			<select id="rol" name="rol" style="width: 100%;">
				<option value="1" selected="selected" onclick="Roles(this.value);">Actor</option>
				<option  value="2" onclick="Roles(this.value);">Apoderado Legal</option>
				<option value="3" onclick="Roles(this.value);">Demandado</option>
				<option value="4" onclick="roles(this.value);">Tercero Interesado</option>
			</select> </br>
		</div> <!--Col-->  
	 </div>  <!--row-->
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
										<input type="file" class="multi" id="usr_file" name="usr_file[]" size="20" multiple="" accept="application/pdf">
									</div>
								</div>
							</td>
							<td id="combodoc2">
								<div id="divdoc2" class="col-md-3 col-md-offset-1">
									
									<select id="doc2" name="doc2" style="width: 200px;">
				                    <?php foreach ($tipoacuerdo as  $ta): ?>
				                    	
				                    <?php 
				                    	if($ta['id'] == 15){
				                    	?>	
				                    	 <option value="<?=$ta['id']?>"selected="selected" ><?=$ta['Tipo']?></option> 
				                    <?php }
				                      else {
				                    ?>		
				                    	  <option value="<?=$ta['id']?>"><?= $ta['Tipo']?></option> 
				                    	  
    					             <?php } ?>       					              			                  
					                <?php endforeach; ?>
									</select> 	
								
								</div><!--Col-->   
							</td>
							<td>	   		
								<div clas="col-md-4"> 
									<textarea id="tDescrip" name="tDescrip" rows="4" cols="30"></textarea>
								</div>
							</td>
							<td>
									
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
		<button type="submit" class="btn btn-success" name="adddemanda"> Agregar</button>
		<input type="button" class="btn btn-danger" id="cancelar" value="Cancelar">
	</div> <!--Col-->
</div> <!--Row-->
<!-- </form> -->
</div> <!--Container-->
<?php echo form_close(); ?>

<script>
$("#busqueda").keyup(function(){
	var dem = $('#slt-demandante');
	if($(this).val() != ''){
		$.ajax({
			type:'POST',
			url:"<?php echo base_url().'index.php/Coficial/buscar_persona'; ?>",
			data:{id:7, valor:$(this).val()},
			success: function(r){	
				dem.find('option').remove();
				if(r.length == 0) $('#tags_id').val('');					
				$(r).each(function(i,v){
					dem.append('<option value="'+ v.id+'">'+v.Nombre+"</option>");
				});
				$('#tags_id').val(r[0].id);
			}
		});

	}else 
	 {	$('#tags_id').val('');
	 	dem.find('option').remove();
	 }
});	
</script>
<script>
$("#busqueda2").keyup(function(){
	var dem = $('#slt-demandado');
	if($(this).val() != ''){
		$.ajax({
			type:'POST',
			url:"<?php echo base_url().'index.php/Coficial/buscar_persona'; ?>",
			data:{id:8, valor:$(this).val()},
			success: function(r){
				dem.find('option').remove();
				if(r.length == 0) $('#tags_id2').val('');	
				$(r).each(function(i,v){
					dem.append('<option value="'+ v.id+'">'+v.razon+"</option>");
				});
				$('#tags_id2').val(r[0].id);
			}
		});
	}else 
	 {	$('#tags_id2').val('');
	 	dem.find('option').remove();
	 }
});	
</script>
<script>
	$('#slt-demandante').change(function(){
		var dem = $('#slt-demandante');
		$('#tags_id').val(dem.val());
	});
</script>
<script>
	$('#slt-demandado').change(function(){
		var dem = $('#slt-demandado');
		$('#tags_id2').val(dem.val());
	});
</script>



<script lenguage="javascript" type="text/javascript">
 	var idPd1,  // idPersona demandante
 	idPd; //idPersona demandado

 	$(function(){
 		$("#tags_id").val(<?=$_SESSION["Persona_id"]?>);
 		$("#accordion").accordion();
 		$("#rol").selectmenu();
 		$("#doc").selectmenu();
 		$("#doc2").selectmenu();
 		$("#Estado").selectmenu();
 		$("#Municipio").selectmenu();
 		$("#Estado1").selectmenu();
 		$("#datepicker").datepicker();
 		$("#Municipio1").selectmenu();
 		$('#dHours').spinner({
 			numberFormat: "nn",
 			max:23
 		});
 		$('#dMin').spinner({
 			numberFormat: "nn",
 			max:59
 		});
 		$.datepicker.setDefaults($.datepicker.regional["es"]);
		$("#datepicker").datepicker({ minDate: 0 });
 		/*$("#datepicker").datepicker({
 			yearRange: "2015:2020",
 			dateFormat: "yy-mm-dd"
 		});*/
 			
 	});//javascripUI

 	function Roles(roles){
 		$("#TRol").text("Rol del "+ roles );
 	}

// funcion que se sejecuta cuando se abre la pagina
$(document).ready(function(){
//folio del expediente
$.ajax({
	Type:"POST",
	url:"<?php echo base_url().'index.php/Coficial/obtener_exp'; ?>",
	success:function(result){
		//alert(result[0].Fexpediente);
		$('#folioexp').val(result[0].Fexpediente);
		//$('#Serie').val("jaja");
		var f = new Date();
		//var Data = jQuery.parseJSON(result);	
		$('#Serie').val(f.getMonth()+1+'-'+f.getFullYear());
		//$('#folioexp').val(result[0].Fexpediente);
		
	} 
});

// Selecciona al demandante
$('#say_hello').click(function(){
	hello();
});
/*
//Etiqueta para la busqueda de usuario
$("#resultadoBusqueda").html('<p><p>');
// Fin buscar usuario...
*/


if ($("#Tiporol").val() == "Usuario") {
	$("#Oficial").text( $("#Tiporol").val());		
} else{
	$("#Oficial").text($("#Tiporol").val());
}
	//javascript para agregar los archivos en una lista
	$("#adddemanda").on('click',function(){ 
	//alert("Esta por subirse el archivo");
	//	alert(document.getElementById('folioexp').value);
	//alert('entra');
	event.preventDefault();
	var formData = $(this).serialize();
	$.ajax({
		url:"<?php echo base_url().'index.php/Cupload2/do_guardar'; ?>",
		type:'POST',
				/*data:{
						folioexp:document.getElementById('folioexp').value,//id expediente
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
	window.location.href='<?php echo base_url().'index.php/Coficial2/demanda';?>';
});
        $(function () {
            $('#datetimepicker4').datetimepicker();
        });
</script>