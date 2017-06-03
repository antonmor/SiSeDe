<?php
defined('BASEPATH')or exit('No direct script access allowed');

class crevproy2 extends CI_controller{

	public function index(){

		    $this->load->view('header2');
		    $this->load->view('proyectista/vMenuproy');
			$this->load->view('proyectista/vLeerProyecto');
			$this->load->view('footer');
	}
	public function cverproy(){
		    $this->load->view('header2');
		    $this->load->view('proyectista/vMenuproy');
			$this->load->view('proyectista/vverProy');
			$this->load->view('footer');

	}
	public function ceditproy(){
		    $this->load->view('header2');
		    $this->load->view('proyectista/vMenuproy');
			$this->load->view('proyectista/veditproy');
			$this->load->view('footer');

	}
}