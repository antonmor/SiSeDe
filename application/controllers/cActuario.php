<?php
defined('BASEPATH')or exit('No direct script access allowed');

class cactuario extends CI_controller{

	public function index(){

		    $this->load->view('header2');
			$this->load->view('actuario/vActuario');
			$this->load->view('footer');

	}
}