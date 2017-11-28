<?
//phpinfo();
phpini();
//exit;

	session_start();
?>


<? echo $_SESSION['hola']; ?>

<a href="index2.php">GO TO 2</a>


<?php
	$_SESSION['hola']="VALOR 11 DESDE INDEX_1";	
?>