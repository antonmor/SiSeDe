<?php 
	
	class Upload extends CI_Controller{

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
				$config['upload_path'] = './Imagenes/';
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

		}

	
	}

?>