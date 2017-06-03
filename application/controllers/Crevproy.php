<?php
defined('BASEPATH')or exit('No direct script access allowed');

class crevproy extends CI_controller{

	public function index(){

		    $this->load->view('header2');
			$this->load->view('magistrado/vRevisarProyecto');
			$this->load->view('footer');

	}
	public function revproyp(){

		    $this->load->view('header2');
			$this->load->view('proyectista/vMenuProy');
			$this->load->view('proyectista/vrevproy');
			$this->load->view('footer');

	}
	public function revproym(){
			$archivo=$tipo=$this->input->post('archivo');
			$folder=$tipo=$this->input->post('folder');
			$data=array('archivo'=>$archivo,'folder'=>$folder);
		    $this->load->view('header2');
			$this->load->view('magistrado/vMenuMag');
			$this->load->view('magistrado/vrevisarproyecto',$data);
			$this->load->view('footer');
	}
} 
