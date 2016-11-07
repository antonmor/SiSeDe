<?php
defined('BASEPATH')or exit('No direct script access allowed');

class cexppendproy extends CI_controller{

	public function index(){

		    $this->load->view('header2');
			$this->load->view('proyectista/vExpedientesPendientes');
			$this->load->view('footer');

	}
}