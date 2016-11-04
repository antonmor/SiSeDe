<?php 
	
	class cUpload extends CI_Controller{

		public function __construct()
		{
				parent::__construct();
				$this->load->helper(array('form','url'));

		}
		public function index(){
			$this->load->model('mLogin');
			$this->load->view('header2');
			$this->load->view('body/vOficial');
			$this->load->view('body/vDemanda1');
			$this->load->view('footer');	
		}

		public function do_upload()
		{
			$this->load->model('mLogin'); //llamamos al modelo
			
			//tabla Expediente debe llevar:
		    $jsonTExpediente  = array('idCreaEx' =>  $this->input->post('status'));

			//$idExp =           //id Expediente control de la tabla
			$idCreaExp=$_SESSION["Persona_id"]; //idPersona sesion que crea la demanda
		    $idPDemandante=$this->input->post('idPDemandante'); //demandante
			$idPDemandado=$this->input->post('idPDemandado'); //demandado
			$fecha=$this->input->post('fecha'); // fecha en que se crea.
			//Expediente
			$Descripcion=$this->input->post('Des'); //Descripci[on]
			$est=$this->input->post('status');
			$tipo=$this->input->post('tipo'); //tipo del documento que se va a subir (Demanda)
			echo json_encode($jsonTExpediente);
			//$idPpresenta

			/*
				$config['upload_path'] = './Historico/';
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = '3024';

				$this->load->library('upload',$config);
		  
		  if ( ! $this->upload->do_upload('userfile'))
    			{
       				 $error = array('error' => $this->upload->display_errors());
 					$this->load->view('header2');
					$this->load->view('body/vOficial');
					$this->load->view('body/vDemanda');
					$this->load->view('footer');
  				      // uploading failed. $error will holds the errors.	
 				   }
  			  else
 			   {
 			       $data = array('upload_data' => $this->upload->data());
		 			$this->load->view('header2');
					$this->load->view('body/vOficial');
					$this->load->view('body/vDemanda1');
					$this->load->view('footer');
  		      // uploading successfull, now do your further actions
   				 }

			*/
		}

	
	}

?>