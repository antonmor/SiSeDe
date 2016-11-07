<?php
defined('BASEPATH')or exit('No direct script access allowed');

class cleerexp extends CI_controller{

	public function index(){

		    $this->load->view('header2');
			$this->load->view('proyectista/vLeerExpediente');
			$this->load->view('footer');

	}
}