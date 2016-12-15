<?php
defined('BASEPATH')or exit('No direct script access allowed');

class cLogin extends CI_controller{

	public function index(){

		    $this->load->view('header');
			$this->load->view('body/vRegistro');
			$this->load->view('footer');

	}

public function uploadsave(){



}

public function registrar_nuevo(){		
		$this->load->model('mLogin'); //Guardar
		//DATOS DEL USUARIO
			$tipo=$this->input->post('tipo');
			$nombre=$this->input->post('nombre' );
			$apat=$this->input->post('apat' );
			$amat=$this->input->post('amat' );
			$rsocial=$this->input->post('rsocial' );
			$genero=$this->input->post('genero' );
			$identificacion=$this->input->post('identificacion' );
			$referencia=$this->input->post('referencia' );
			$tf=$this->input->post('tf' );
			$movil=$this->input->post('movil' );
			$email=$this->input->post('email' );
			$cemail=$this->input->post('cemail' );
			$curp=$this->input->post('curp');
		//DATOS DEL DOMICILIO DEL USUARIO
			$Estado=$this->input->post('Estado' );
			$Municipio=$this->input->post('Municipio' );
			$Dom=$this->input->post('Dom' );
			$interior=$this->input->post('interior' );
			$exterior=$this->input->post('exterior' );
			$cp=$this->input->post('cp' );
		//DATOS DEL DOMICILIO A NOTIFICAR DEL USUARIO	
			$Estado1=$this->input->post('Estado1' );
			$Municipio1=$this->input->post('Municipio1' );
			$Dom1=$this->input->post('Dom1' );
			$interior1=$this->input->post('interior1' );
			$exterior1=$this->input->post('exterior1' );
			$cp1=$this->input->post('cp1' );
			$refe=$this->input->post('refe' );
		//DATOS DEL USUARIO
			$user=$this->input->post('user' );
			$pass=$this->input->post('pass' );
			$pass1=$this->input->post('pass1' );	
   echo $this->mLogin->save_bd($tipo,$nombre,$apat,$amat,$rsocial,$genero,$identificacion,$referencia,$tf,$movil,$email,$cemail,$Estado,$Municipio,$Dom,$interior,$exterior,$cp,$Estado1,$Municipio1,$Dom1,$interior1,$exterior1,$cp1,$refe,$user,$pass,$curp);

	

	}
}

?>