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
			$this->load->model('mLogin');
			$time=time();
			//llamamos al modelo
		   	$pathS='./Historico/' . $this->input->post('FolioExp'); //Folio de expediente
			$archivo_nombre = $_FILES['usr_file']['name'];			//Nombre del archivo
			$fecha = date(); // Fehca de expediente
		    $fecha1= date("Y-m-d H:i:s", strtotime("$fecha"));
			$Des = 	 $this->input->post('tDescrip');				//Descripcion de expediente
			    $config['upload_path'] = $pathS;
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = '6024';
			   $this->load->library('upload');
			   $this->upload->initialize($config);
			 	$cad1="";
		    $jsonTExpediente  = 
		    array(
		    	  'id_Persona'=> $_SESSION["Persona_id"],		//crea la expediente
		    	  'id_Ppresenta' => $this->input->post('rol'), //Presenta
		    	  'id_PDemandante'=> $this->input->post('tags_id'),
		    	  'id_PDemandado'=> $this->input->post('tags_id2'),
		    	  'Fecha'=>  $fecha1 , 
		    	  'Expediente'=>$this->input->post('FolioExp'),    //Folio      
		    	  'Descripcion'=> $Des,
		    	  'status'=>'1'									//Status creado
		    	);		
			$last_id_Exp=$this->mLogin->save_demanda($jsonTExpediente,"Expediente");
			 for($i=0; $i<count($_FILES['usr_file']['name']); $i++)
				{
					$_FILES['userfile']['name'] = $_FILES['usr_file']['name'][$i];
					$_FILES['userfile']['type'] = $_FILES['usr_file']['type'][$i];
					$_FILES['userfile']['tmp_name'] = $_FILES['usr_file']['tmp_name'][$i];
					$_FILES['userfile']['error'] = $_FILES['usr_file']['error'][$i];
					$_FILES['userfile']['size'] = $_FILES['usr_file']['size'][$i];
			$jsonTAnexoPDF = 
			array(
				'Folio'=>$this->input->post('FolioExp')."_".$i,//Folio
				'id_tipo'=>$this->input->post('doc2'), // Tipo de documento
				'id_Expediente'=> $last_id_Exp,    //  id Expediente 
			//	'FechaUp'=>  $fecha1 ,//fecha
				'PathAnexo'=> $pathS,	//pathAnexo		
				'NomFile'=> $_FILES['usr_file']['name'][$i], //NomFile
				'NomFileSis' => 'null',
				'Status'=>'0',//Status
				'StatusCrea'=>'0'//StatusCrea
				);
  			//echo json_encode($jsonTAnexoPDF); //TABLA ANEXOPDF
			$last_id_AnexoPDF=$this->mLogin->save_demanda($jsonTAnexoPDF,"AnexoPDF"); // id de la tabla anterior creada
  			
  			$jsonTSeguimiento = 
  			array(
  					//id
  				'idmodulo'=>'2',
  				'id_op'=>$_SESSION["Persona_id"],
  				'mov'=>'in',
  				'idExpediente'=>$last_id_Exp,//idexpediente
  				'id_Tseguimiento'=>'2', //status Corresponde a Ingresado, en espera...
  				'Fecha'=>$fecha1,
  				'AnexoPDF_id'=>$last_id_AnexoPDF,//anexopdf	
  				'FechaVisto'=>null, // fecha de visto por notificaci[on]
  				'Comentarios'=> $Des,
  				'Status1'=>'0',//Status1
  				);
  			 $this->mLogin->save_demanda($jsonTSeguimiento,"Seguimiento");
  			 $jsoninvolucrados = 
  			 array(
  			 	'id_persona' =>$this->input->post('tags_id'),
  			 	'id_exp'=>$last_id_Exp,
  			 	'id_tiporol'=>2,//demandante
  			 	'status'=>1,
  			 	);
  			 $this->mLogin->save_demanda($jsoninvolucrados,"involucrados");
  			 $jsoninvolucrados = 
  			 array(
  			 	'id_persona' =>$this->input->post('tags_id2'),
  			 	'id_exp'=>$last_id_Exp,
  			 	'id_tiporol'=>1, //demandado
  			 	'status'=>1,
  			 	);
  			 $this->mLogin->save_demanda($jsoninvolucrados,"involucrados");
				if( !file_exists($pathS) ){
						mkdir($pathS,0777);
				}
			  if ( ! $this->upload->do_upload('userfile'))
    			{
       				$error = array('error' => $this->upload->display_errors());
 				   }
  			  else
 			   {
 			       $data = array('upload_data' => $this->upload->data());
 			       redirect(base_url('index.php/cOficial/demanda'));
   				 }
			
   		 }		 

		}
	 
	
	}
	
?>