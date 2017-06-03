<?php
defined('BASEPATH')or exit('No direct script access allowed');
	public function des_textarea(){
		document.getElementByName("descripcion").disabled="false";
	}
	public function archivos(){
		$directorio = opendir("."); //ruta actual
		while ($archivo = readdir($directorio)){ //obtenemos un archivo y luego otro sucesivamente
		    if (is_dir($archivo)){//verificamos si es o no un directorio
		        echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
		    }
		    else{
		        echo $archivo . "<br />";
		    }
		}
	}
	

?>