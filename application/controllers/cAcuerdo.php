<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cAcuerdo extends CI_Controller {
	
	public function index(){

		if ($this->session->userdata('logueado')) {

	        $this->load->model('Mlogin');
			$this->load->view('header2');
			$this->load->view('body/vAcuerdo');
			$this->load->view('body/vMenu1');
			$this->load->view('footer');

	    } else {
			redirect('Welcome/inicio_sesion');
	    }

	}



	public function acuerdo(){
		
		if ($this->session->userdata('logueado')) {
				$this->load->model('Mlogin');
				
				$datos['expedientes'] = $this->Mlogin->per_exp();

				/*if ($_POST) {
					$id_exp=$this->input->post('id_exp' );
					$id_logeado=$this->input->post('id_log' );
					$id_sa=$this->input->post('id_sa' );

					$jsonTSeguimiento = 
			  			array(
			  					//id
			  				'idExpediente'=>$id_exp,//idexpediente
			  				'id_Tseguimiento'=>'4', //status Corresponde a enviado a SA...
			  				'Status1'=>'0'//,//Status1
			  				//'AnexoPDF_id'=>$last_id_AnexoPDF//anexopdf	
			  				 // fecha de visto por notificaci[on]
			  				);

			  			 $this->Mlogin->save_demanda($jsonTSeguimiento,"Seguimiento");

					$insercion = $this->Mlogin->enviar($id_exp,$id_logeado,$id_sa);
					if($insercion){
		            $this->session->set_flashdata('actualizado', 'El expediente se envio correctamente');
		          		redirect(base_url('index.php/cOficial/acuerdo'));
		          	}
				}*/

				$datos['secretario_a'] = $this->Mlogin->get_SA(4);
				print_r($datos['secretario_a']);
				$datos['envios'] = $this->Mlogin->get_envios_sa();
				$this->load->view('header2');
				$this->load->view('body/vOficial');		  
			    $this->load->view('body/vAcuerdo',$datos);
				$this->load->view('footer');

	    } else {
			redirect('Welcome/inicio_sesion');
	    }

	}

		public function recuperar(){

		$this->load->model('Mlogin');
		$id_expediente = $_GET['expediente'];
		$anexos_pdf = $this->Mlogin->get_anexos(['id_Expediente'=>$id_expediente]);
		$datos = ['anexos'=>$anexos_pdf];
		header("Content-Type: application/json; encoding=UTF-8");
		echo json_encode($datos);
	}


public function add_file(){
		$this->load->model('Mlogin');
		$id_expediente=$this->input->post('expediente'); 
		$tipo=$this->input->post('id_tipo');
		$exp = $this->Mlogin->get_last_doc($id_expediente);
		$expediente = $exp['FExpediente'];
		$ultimo_Folio = $exp['num'];
		$path ='./Historico/' . $expediente;		
        $config['upload_path'] = $path;
        $config['file_name'] = $_FILES['pdf_file']['name'];
        $config['allowed_types'] = "pdf";
        $config['max_size'] = "503024";
        $archivo_nombre = $config['file_name'];
        $this->load->library('upload');
        $this->upload->initialize($config);
		$nuevo = $ultimo_Folio+1;
		$folio = $expediente."_".$nuevo;

        if (!$this->upload->do_upload('pdf_file')) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }
        $data['uploadSuccess'] = $this->upload->data();

		$insert = $this->Mlogin->add_new_doc($folio,$tipo,$id_expediente,$path,$archivo_nombre);
		redirect(base_url('index.php/cOficial/acuerdo'));
	}
}
?>