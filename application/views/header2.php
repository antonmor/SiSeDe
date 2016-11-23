<?php 

defined('BASEPATH') or exit('No direct script access allowd');

?>

<!DOCTYPE html>
<html ng-app>
<head>
	<meta charset="utf-8">
	<!-- PARA INCLUIR BOOTSTRAP DE FORMA LOCAL -->
	<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
 


 <!--ANGULAR 1.5.8 -->
<script type="text/javascript" src="<?php echo base_url("angular-1.5.8/angular.min.js"); ?>"></script>
  

	<!--PARA INCLUIR EL JAVASCRIPT DE JQUERY Y DE BOOTSTRAP-->
	<script type="text/javascript" src="<?php echo base_url("bootstrap/js/jquery-3.0.0.min.js"); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("bootstrap/js/bootstrap.js"); ?>"></script> 
 
	<!--jquery ui-->
	<link   href="<?php echo base_url(); ?>jquery-ui-1.11.4/jquery-ui.min.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>jquery-ui-1.11.4/external/jquery/jquery.js"></script>
	<script src="<?php echo base_url(); ?>jquery-ui-1.11.4/jquery-ui.min.js"></script>
	<script src="<?php echo base_url(); ?>jquery-ui-1.11.4/jquery-ui.js"></script>
	<script src="<?php echo base_url(); ?>jquery-ui-1.11.4/jquery-ui.css"></script>

<!-- ... Datepicker 3 
  <script src="<?php echo base_url(); ?>jquery1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>bower_components/moment/min/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script> 
  <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/transition.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/collapse.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
--><!-- ... -->




  <title>Seguimiento de Demandas y Sentencias </title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap3.3.6.min.css"); ?>" />
  <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
  <script type="text/javascript" src="<?php echo base_url("bootstrap/js/bootstrap3.3.6.min.js"); ?>"></script> 

  <!--CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("bootstrap/css/byAnton.css"); ?>">

<!--CKEditor-->
  <!--<script type="text/javascript" src="<?php echo base_url("/ckeditor/ckeditor.js"); ?>"></script>-->
  <script type="text/javascript" src="<?php echo base_url("/ckeditor_full/ckeditor.js"); ?>"></script>
<!-- -->



<title>SiSeDe</title>
 <header id="header2">
    <br>
<!--<div class="container">-->
    <div class="row">	
    <div class="col-sm-1 col-md-1 col-md-offset-3">
      <img id="logoppal" src="<?php echo base_url();  ?>Imagenes/logo.png" title="logo">
    	<!--<img src="<?php echo base_url();  ?>Imagenes/logo.png" width="25" height="25" title="logo">
    Tribunal de lo Contencioso Administrativo del Estado de Colima</br>-->
   	</div>
    <div class="col-sm-4 col-md-4">
      <h4>Tribunal de lo Contencioso Administrativo del Estado de Colima</h4>
    </div>
    </div><!--row-->
<!-- </div><!--container-->
  <br><br>
  </header>

</head>


<body>

<legend>  </legend>