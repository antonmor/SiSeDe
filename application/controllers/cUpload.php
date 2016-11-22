<?php 
	
	class cUpload extends CI_Controller{

		public function __construct()
		{
				parent::__construct();
		//	$this->load->helper(array('form','url','date'));
			$this->load->helper(array('form','url'));

		}
		public function index(){
			$this->load->model('mLogin');
			$this->load->view('header2');
			$this->load->view('body/vOficial');
			$this->load->view('body/vDemanda1');
			$this->load->view('footer');	
		}

		public function do_guardar()
		{
			$this->load->model('mLogin');							 //llamamos al modelo
		   	$pathS='./Historico/' . $this->input->post('FolioExp'); //Folio de expediente
			$archivo_nombre=$_FILES['userfile']['name'];			//Nombre del archivo
			$fecha = $this->input->post('datepicker')." ".$this->input->post('dHours').":".$this->input->post('dMin'); // Fehca de expediente
			$Des = 	 $this->input->post('tDescrip');				//Descripcion de expediente
			
			 	$this->load->library('upload');
			    $config['upload_path'] = $pathS;
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = '3024';
			    $config['file_name'] = $archivo_nombre;
				//$config['file_name']=$_FILES['userfile']['name'];
			    // cargamos la configuracion
			   $this->upload->initialize($config);
				//tabla Expediente debe llevar:
		    $jsonTExpediente  = 
		    array(
				  //			id  autoincrementable
		    	  'id_Persona'=> $_SESSION["Persona_id"],		//crea la expediente
		    	  'id_Ppresenta' => $this->input->post('rol'), //Presenta
		    	  'id_PDemandante'=> $this->input->post('d1'),
		    	  'id_PDemandado'=> $this->input->post('d2'),
		    	  'Fecha'=>  $fecha , 
		    	  'Expediente'=>$this->input->post('FolioExp'),    //Folio      
		    	  'Descripcion'=> $Des,
		    	  'status'=>'1'									//Status creado
		    	);
		//	echo json_encode($jsonTExpediente);	//TABLA EXPEDIENTE		
			$last_id_Exp=$this->mLogin->save_demanda($jsonTExpediente,"Expediente"); // id de la tabla anterior creada
			
			$jsonTAnexoPDF = 
			array(
				//id
				'Folio'=>$this->input->post('FolioExp'),//Folio
				'id_tipo'=>$this->input->post('doc2'), // Tipo de documento
				'id_Expediente'=> $last_id_Exp,    //  id Expediente 
				'FechaUp'=>  $fecha ,//fecha
				'PathAnexo'=> $pathS,	//pathAnexo		
				'NomFile'=> $config['file_name'], //NomFile
				'NomFileSis' => 'null',
				'Status'=>'0',//Status
				'StatusCrea'=>'0'//StatusCrea
				);
  			//echo json_encode($jsonTAnexoPDF); //TABLA ANEXOPDF
			$last_id_AnexoPDF=$this->mLogin->save_demanda($jsonTAnexoPDF,"AnexoPDF"); // id de la tabla anterior creada
  			
  			$jsonTSeguimiento = 
  			array(
  					//id
  				'id_Expediente'=>$last_id_Exp,//idexpediente
  				'Status'=>'0', //status Corresponde a Ingresado, en espera...
  				'Fecha'=>$fecha,//fecha Corresponde al dia ingresado
  				'Status1'=>'0',//Status1
  				'id_AnexoPDF'=>$last_id_AnexoPDF,//anexopdf	
  				'FechaVisto'=>'' // fecha de visto por notificaci[on]
  				);
  			 $this->mLogin->save_demanda($jsonTSeguimiento,"Seguimiento");
  		//echo json_encode($jsonTSeguimiento);
 						
				if( !file_exists($pathS) ){
						mkdir($pathS,0777);
				}
	
			  if ( ! $this->upload->do_upload('userfile'))
    			{
       				 $error = array('error' => $this->upload->display_errors());
 					$this->load->view('header2');
					$this->load->view('body/vOficial');
					$this->load->view('error/index');
					$this->load->view('footer');
  				      // uploading failed. $error will holds the errors.	
 				   }
  			  else
 			   {
 			       $data = array('upload_data' => $this->upload->data());
 			       
		 			$this->load->view('header2');
					$this->load->view('body/vOficial');
					$array = array ('Expedientes'=>$this->mLogin->getExp());
					$this->load->view('body/vDemanda',$array);
					$this->load->view('footer');
  		      // uploading successfull, now do your further actions	

   				 }
			


		}
	
	
	}
	
?>