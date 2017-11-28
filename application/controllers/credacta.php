<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class credacta extends CI_Controller {

	public function nwacuerdo(){

		if ($this->session->userdata('logueado')) {
  	  $this->load->model('mLogin');
			$this->load->view('header2');
			$this->load->view('body/vAcuerdo');
			$this->load->view('redaccion/vnwacuerdo');
			$this->load->view('footer');

	    } else {
			redirect('Welcome/inicio_sesion');
	    }

	}
}
?>
