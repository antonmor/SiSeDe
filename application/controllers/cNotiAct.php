<?php
defined('BASEPATH')or exit('No direct script access allowed');

class cnotiact extends CI_controller{
	public function cnotiact(){
		    $this->load->view('header2');
			$this->load->view('actuario/vNotificacionActuario');
			$this->load->view('footer');
	}
}