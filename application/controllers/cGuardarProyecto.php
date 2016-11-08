<?php
defined('BASEPATH')or exit('No direct script access allowed');

	class cGuardarProyecto extends CI_controller{

		public function index(){

			    $this->load->view('header2');
				$this->load->view('magistrado/vMagistrado');
				$this->load->view('footer');

		}

	 	public function guardar(){
			$ar=fopen("Proyectos/prueba1.txt","a") or
			die("Problemas en la creacion");
			fputs($ar,$_REQUEST['descripcion']);
			fclose($ar);
			echo "Los datos se cargaron correctamente.";
		}
	}
?>

