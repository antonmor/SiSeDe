<?php
defined('BASEPATH')or exit('No direct script access allowed');

class cmagistrado extends CI_controller{

	public function index(){

		    $this->load->view('header2');
			$this->load->view('magistrado/vMagistrado');
			$this->load->view('footer');

	}
}