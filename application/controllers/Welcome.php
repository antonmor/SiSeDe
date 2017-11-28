<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		   
		    $this->load->view('header');
			$this->load->view('vlogin');
			$this->load->view('footer');

	}
	public function inicio_sesion(){

		    $this->load->view('header');
			$this->load->view('vlogin');
			$this->load->view('footer');

	}

	public function validar(){
		 $this->load->model('Mlogin');
		 $this->load->library('session');
		 $usuario=$this->input->post('user');
		 $pwd=$this->input->post('password');
		 $usuario=$this->Mlogin->loggin($usuario,$pwd);
		 
		if(count($usuario)>0)
		{	// session_start();
		         $data = array(
				'Persona_id' => $usuario[0]->id,			
				'Nombre' => $usuario[0]->Nombre,
				'Id_rol' => $usuario[0] ->idroles, //cambie de idRoles a idroles 17/08/2017
				'Rol' => $usuario[0] ->Tipo,
				'logueado' => TRUE
				);
				
		        $this->session->set_userdata($data);
		       
			//redirect('Coficial');
			
		}else{

			echo "0";
		}	
	}
        
	public function vregistrar(){
		    $this->load->view('header2');
			$this->load->view('body/vRegistro');
			$this->load->view('footer');
	}
	
	public function cerrar_sesion(){

		$user_data = array(
			'logueado' => FALSE
			);
		$this->session->set_userdata($user_data);
		$this->session->sess_destroy();
		redirect('Welcome/index');
	}
	public function recuperar_datos(){
		 	$this->load->view('header');
			$this->load->view('recuperar_datos');
			$this->load->view('footer');
	}
}
