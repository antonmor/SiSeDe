<?php
defined('BASEPATH')or exit('No direct script access allowed');

class cleerproyecto extends CI_controller{

	public function index(){
			$this->load->model('mLogin');
			$Persona_id = $this->session->userdata('Persona_id');
			$datos['expedientes'] = $this->mLogin->exp_x_sa($Persona_id);
			$datos['proyectista'] = $this->mLogin->get_SA(4);
			$datos['magistrado'] = $this->mLogin->get_SA(6);
			$datos['actuario'] = $this->mLogin->get_SA(5);
			$datos['tipoacuerdo'] = $this->mLogin->get_tipoacuerdo(2);
			$datos['desecha']= $this->mLogin->get_tipodesecha();
		  $this->load->view('header2');
		  $this->load->view('body/vOficial');
			$this->load->view('proyectista/vexpeds',$datos);
			$this->load->view('footer');

	}

}
