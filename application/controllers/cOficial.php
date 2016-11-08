<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cOficial extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){

		if($this->session->userdata("Nombre") == NULL){
			redirect('Welcome/inicio_sesion');
		}else{
			
			$this->load->model('mLogin');
			$this->load->view('header2');
			$this->load->view('body/vOficial');
			$this->load->view('body/vMenu1');
			$this->load->view('footer');

		}

	}
	public function principal(){

			$this->load->model('mLogin');
			$this->load->view('header2');
			$this->load->view('body/vOficial');
			$this->load->view('body/vMenu1');
			$this->load->view('footer');

	}
	public function notificacion(){
			$this->load->model('mLogin');
			$this->load->view('header2');
			$this->load->view('body/vOficial');
			$this->load->view('body/vNotificaciones');
			$this->load->view('footer');

	}
	public function demanda(){
			$this->load->model('mLogin');
			$this->load->view('header2');
			$this->load->view('body/vOficial');
			$this->load->view('body/vDemanda');
			$this->load->view('footer');
	}
	public function nueva_demanda(){
			$this->load->model('mLogin');
			$this->load->view('header2');
			$this->load->view('body/vOficial');
			$this->load->view('body/vDemanda1');
			$this->load->view('footer');	
	}
	public function miperfil(){
			$this->load->model('mLogin');
			$this->load->view('header2');
			$this->load->view('body/vOficial');
			$this->load->view('body/vPerfil');
			$this->load->view('footer');
	}

	public function buscar_persona(){
		$this->load->model('mLogin');
		
		$rol = $this->input->post('idRoles');
		$resultado=$this->mLogin->persona($rol);
		echo json_encode($resultado);
		
	}
}
