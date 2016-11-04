<?php
defined('BASEPATH')or exit('No direct script access allowed');

class crevproy extends CI_controller{

	public function index(){

		    $this->load->view('header2');
			$this->load->view('magistrado/vRevisarProyecto');
			$this->load->view('footer');

	}
}