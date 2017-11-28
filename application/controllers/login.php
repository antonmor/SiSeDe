<?php

class Login extends CI_Controller{
	public funcion index(){
		$usuario=$this->input->post('user');
		$pass=$this->input->post('password');
		
		echo $usuario. " " . $pass;
	}
}