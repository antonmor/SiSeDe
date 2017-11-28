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
			//$this->load->view('body/vOficial');
			//$this->load->view('body/vMenu1');
			$this->load->view('prueba1');
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

	public function oficial(){
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
/**************************************************************************/
	public function demanda(){
			
			$this->load->model('mLogin');
			$datos['expedientes'] = $this->mLogin->per_exp();
			$datos['secretario_a'] = $this->mLogin->get_SA();
			$datos['envios'] = $this->mLogin->get_envios_sa();
			if ($_POST) {

				$id_anexopdf=$this->input->post('id_exp' );
				$id_logeado=$this->input->post('id_log' );
				$id_sa=$this->input->post('id_sa' );
				
				$insercion = $this->mLogin->enviar($id_anexopdf,$id_logeado,$id_sa);

				if($insercion){
                $this->session->set_flashdata('actualizado', 'El expediente se envio correctamente');
              		redirect(base_url('index.php/cOficial/demanda'));
              	}
			}
			$this->load->view('header2');
			$this->load->view('body/vOficial');		  
		    $this->load->view('body/vDemandanew',$datos);
			$this->load->view('footer');
	}
	public function recuperar(){

		$this->load->model('mLogin');
		$id_expediente = $_GET['expediente'];
		$anexos_pdf = $this->mLogin->get_anexos(['id_Expediente'=>$id_expediente]);
		$datos = ['anexos'=>$anexos_pdf];
		header("Content-Type: application/json; encoding=UTF-8");
		echo json_encode($datos);
	}

/**************************************************************************/
	public function nueva_demanda(){
			//$this->load->model('mLogin');
			$this->load->view('header2');
			$this->load->view('body/vOficial');
			$this->load->view('body/vDemanda1');
			$this->load->view('footer');	
	}

	public function acuerdos(){
		    $this->load->view('header2');
		    $this->load->view('body/vOficial');
			$this->load->view('body/vAcuerdos');
			$this->load->view('footer');
	}

	public function seguimiento(){
		    $this->load->view('header2');
		    $this->load->view('body/vOficial');
			$this->load->view('body/vSeguimiento');
			$this->load->view('footer');
	}
	public function sentencia(){
		    $this->load->view('header2');
		    $this->load->view('body/vOficial');
			$this->load->view('body/vSentencias');
			$this->load->view('footer');
	}

	public function miperfil(){
			//$this->load->model('mLogin');
			$this->load->view('header2');
			$this->load->view('body/vOficial');
			$this->load->view('body/vPerfil');
			$this->load->view('footer');
	}

	public function buscar_persona(){
		$this->load->model('mLogin');
			//print_r( $this->mLogin->persona($_GET['term'])); //se envia el rol
		
		$buscar =$this->input->post('valorBusqueda'); 
		echo(json_encode($this->mLogin->persona($buscar)));
		
	}
}

?>
