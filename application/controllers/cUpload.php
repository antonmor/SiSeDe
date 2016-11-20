<?php 
	
	class cUpload extends CI_Controller{

		public function __construct()
		{
				parent::__construct();
				$this->load->helper(array('form','url','date'));

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
			 $pathS='./Historico/' . $this->input->post("FolioExp");
			
			 
			    $config['upload_path'] = './Historico/';
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = '3024';
			    $config['file_name'] = $this->input->post("file");


				$this->load->library('upload',$config);
				if(!file_exists($pathS)){
						mkdir($pathS,0777);
				}

			
			 
			//tabla Expediente debe llevar:
		    $jsonTExpediente  = 
		    array(
//			idExpediente autoincrementable
		    	  'idCreaEx'=>  $this->input->post('status'),
		    	  'idCreaEx'=> $_SESSION["Persona_id"],
		    	  'idPDemandante'=> $this->input->post('idPDemandante'),
		    	  'idPDemandado'=> $this->input->post('idPDemandado'),
		    	  'fecha'=>  $this->input->post('fecha'), //date(time()), //$this->input->post('fecha'),
		    	  'Descripcion'=> $this->input->post('Des'),
		    	  'status'=>$this->input->post('status')    	
		    	);
			echo json_encode($jsonTExpediente);	//TABLA EXPEDIENTE		

			$jsonTAnexoPDF = 
			array(
				//id
				//Folio
				'tipo'=>$this->input->post('tipo'), // Tipo 
				//id_Expediente
				'fecha'=>  $this->input->post('fecha'),//fecha
				//pathAnexo		
				'NomFile'=> $config['file_name'], //NomFile
				//NomFileSis
				'Status'=>'1',//Status
				'StatusCrea'=>'0'//StatusCrea
				);
  			echo json_encode($jsonTAnexoPDF); //TABLA ANEXOPDF
  			$jsonTSeguimiento = 
  			array(
  				'id'=>'',	//id
  				'idExpediente'=>'',//idexpediente
  				'Status'=>'0', //status
  				'Fecha'=>$this->input->post('fecha'),//fecha
  				'Status1'=>'1',//Status1
  				'idAnexo'=>'',//anexopdf	
  				'FechaVisto'=>'' // fecha de visto por notificaci[on]
  				);
  			echo json_encode($jsonTSeguimiento);


/*				
		  
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