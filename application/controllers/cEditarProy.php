<?php
defined('BASEPATH')or exit('No direct script access allowed');

class cEditarProy extends CI_controller{
	public function editar(){
	 		$archivo=$this->input->post('archivo');
	 		//print_r($_POST);
			$ar=fopen("Proyectos/Redactados/".$archivo,"w+") or
			die("Problemas en la creacion");
			fputs($ar,$_REQUEST['descripcion']);
			fclose($ar);
			echo "<script>alert('Se guardo el registro con exito...')</script>";
			$this->db->where('nombre',$archivo);
			$this->db->update('proyectos',array('estado'=>2));
			$this->load->view('header2');
		  	$this->load->view('proyectista/vMenuproy');
			$this->load->view('proyectista/vexpeds',$archivo);
			$this->load->view('footer');

		}
		public function editarm(){
	 		$expediente=$this->input->post('expediente');
	 		$archivo=$this->input->post('archivo');
			$ar=fopen("Proyectos/".$expediente."/".$archivo,"w+") or
			die("Problemas en la creacion");
			fputs($ar,$_REQUEST['descripcion']);
			fclose($ar);
			echo "<script>alert('Se guardo el registro con exito...')</script>";
			$this->load->view('header2');
		    $this->load->view('body/voficial');
			$this->load->view('magistrado/vMagistrado');
			$this->load->view('footer');

		}
	}
?>
