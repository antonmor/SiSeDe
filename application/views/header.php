<?php 

defined('BASEPATH') or exit('No direct script access allowd');

?>

<!DOCTYPE html>
<html ng-app>
<head>
	<meta charset="utf-8">
	<!-- PARA INCLUIR BOOTSTRAP DE FORMA LOCAL -->
	<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
	<!-- <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap-datetimepicker.css"); ?>" /> -->


 <!--ANGULAR 1.5.8 -->
 <script type="text/javascript" src="<?php echo base_url("angular-1.5.8/angular.min.js"); ?>"></script>


	<!--PARA INCLUIR EL JAVASCRIPT DE JQUERY Y DE BOOTSTRAP-->
	<script type="text/javascript" src="<?php echo base_url("bootstrap/js/jquery-3.0.0.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("bootstrap/js/bootstrap.js"); ?>"></script>	
	<script type="text/javascript" src="<?php echo base_url("bootstrap/js/bootstrap-datetimepicker"); ?>"></script> 

	<!--jquery ui-->
	<link   href="<?php echo base_url(); ?>jquery-ui-1.11.4/jquery-ui.min.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>jquery-ui-1.11.4/external/jquery/jquery.js"></script>
	<script src="<?php echo base_url(); ?>jquery-ui-1.11.4/jquery-ui.min.js"></script>
	<script src="<?php echo base_url(); ?>jquery-ui-1.11.4/jquery-ui.js"></script>
	<script src="<?php echo base_url(); ?>jquery-ui-1.11.4/jquery-ui.css"></script>

 
 <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap3.3.6.min.css"); ?>" />
 

 <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
  <script type="text/javascript" src="<?php echo base_url("bootstrap/js/bootstrap3.3.6.min.js"); ?>"></script> 


<!--CKEditor-->
	<script type="text/javascript" src="<?php echo base_url("/ckeditor/ckeditor.js"); ?>"></script>
<!-- -->


  <!--CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("bootstrap/css/byAnton.css"); ?>">





	<title>SiSeDe</title>
 <header class="class-general">
    <br>
    <h1 id="HF_txt">Acceso al Sistema de Información para el seguimiento de las demandas en el Tribunal de lo Contencioso Administrativo del Estado de Colima</h1>
  </header>

</head>


<body>


