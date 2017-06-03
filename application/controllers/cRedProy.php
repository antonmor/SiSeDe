<?php
defined('BASEPATH')or exit('No direct script access allowed');

class credproy extends CI_controller{

	public function index(){
			
		    $this->load->view('header2');
		    $this->load->view('proyectista/vmenuproy');
			$this->load->view('proyectista/vRedactarProyecto');
			$this->load->view('footer');

	}
}