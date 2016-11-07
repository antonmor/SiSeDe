<?php
defined('BASEPATH')or exit('No direct script access allowed');

class cproyectista extends CI_controller{

	public function index(){

		    $this->load->view('header2');
			$this->load->view('proyectista/vProyectista');
			$this->load->view('footer');

	}
}