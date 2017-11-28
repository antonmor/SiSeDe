<?
	session_start();
var_dump($_SESSION);
 echo $_SESSION['hola']; ?>
  
<a href="index.php">GO TO 1</a>


<?php
	$_SESSION['hola']="VALOR 22 DESDE INDEX_2 ";	
	
?>