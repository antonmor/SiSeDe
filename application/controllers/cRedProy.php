<?php
defined('BASEPATH')or exit('No direct script access allowed');

class credproy extends CI_controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('mlogin');
	}
	public function index(){
		$expediente=$this->input->post('expediente');
		$id=$_SESSION["Persona_id"];
		$data=array('expediente'=>$expediente,'id'=>$id);
		$this->mLogin->insertmov($data);
		$this->load->view('header2');
		$this->load->view('proyectista/vmenuproy');
		$this->load->view('proyectista/vRedactarProyecto');
		$this->load->view('footer');

	}
}
