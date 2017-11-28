<?php
defined('BASEPATH')or exit('No direct script access allowed');

class cLogin extends CI_controller{

	public function index(){

		    $this->load->view('header');
			$this->load->view('body/vRegistro');
			$this->load->view('footer');

	}

	public function uploadsave(){
	}

	public function registrar_nuevo(){		
			$this->load->model('Mlogin'); //Guardar
			//DATOS DEL USUARIO
				$tipo=$this->input->post('tipo');
				$nombre=$this->input->post('nombre' );
				$apat=$this->input->post('apat' );
				$amat=$this->input->post('amat' );
				$rsocial=$this->input->post('rsocial' );
				$genero=$this->input->post('genero' );
				$identificacion=$this->input->post('identificacion' );
				$referencia=$this->input->post('referencia' );
				$tf=$this->input->post('tf' );
				$movil=$this->input->post('movil' );
				$email=$this->input->post('email' );
				$cemail=$this->input->post('cemail' );
				$curp=$this->input->post('curp');
			//DATOS DEL DOMICILIO DEL USUARIO
				$Estado=$this->input->post('Estado' );
				$Municipio=$this->input->post('Municipio' );
				$Dom=$this->input->post('Dom' );
				$interior=$this->input->post('interior' );
				$exterior=$this->input->post('exterior' );
				$cp=$this->input->post('cp' );
			//DATOS DEL DOMICILIO A NOTIFICAR DEL USUARIO	
				$Estado1=$this->input->post('Estado1' );
				$Municipio1=$this->input->post('Municipio1' );
				$Dom1=$this->input->post('Dom1' );
				$interior1=$this->input->post('interior1' );
				$exterior1=$this->input->post('exterior1' );
				$cp1=$this->input->post('cp1' );
				$refe=$this->input->post('refe' );
			//DATOS DEL USUARIO
				$user=$this->input->post('user' );
				$pass=$this->input->post('pass' );
				$pass1=$this->input->post('pass1' );	
//	   header("Content-Type: application/json; encoding=UTF-8");
		header("Content-Type: application/json; encoding=UTF-8");
	      	
		  
		  
		   if($this->Mlogin->val_curp($curp) == 0){
		    die();
		  }
		  else{
		  	echo json_encode($this->Mlogin->save_bd($tipo,$nombre,$apat,$amat,$rsocial,$genero,$identificacion,$referencia,$tf,$movil,$email,$cemail,$Estado,$Municipio,$Dom,$interior,$exterior,$cp,$Estado1,$Municipio1,$Dom1,$interior1,$exterior1,$cp1,$refe,$user,$pass,$curp));
	  
	  }
//echo json_encode($tipo,$nombre,$apat,$amat,$rsocial,$genero,$identificacion,$referencia,$tf,$movil,$email,$cemail,$Estado,$Municipio,$Dom,$interior,$exterior,$cp,$Estado1,$Municipio1,$Dom1,$interior1,$exterior1,$cp1,$refe,$user,$pass,$curp);

	}

	public function recuperar(){
		$this->load->model('Mlogin');
		$this->load->library("email");

		$email = $this->input->post('email');
		$datos = $this->Mlogin->recuperar_datos($email);

		if ($datos) {
			foreach ($datos as $item ) {				
				//cargamos la libreria email de ci
		 
				//configuracion para gmail
				$configGmail = array(
					'protocol' => 'mail',
					'smtp_host' => 'p3plcpnl0885.prod.phx3.secureserver.net',
					'smtp_port' => 465,
					'smtp_user' => 'info@sisede.tcacolima.com',
					'smtp_pass' => '0pmR=Z1s[Ovk',
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'priority' => 1,
					'newline' => "\r\n"
				);    
		 
				//cargamos la configuración para enviar con gmail
				$this->email->initialize($configGmail);
				$this->email->from('info@sisede.tcacolima.com');
				$this->email->to($email);
				$this->email->bcc('info@sisede.tcacolima.com');
				$this->email->subject('Datos de usuario');
				$this->email->message('<h3>Usuario: '.$item->Usuario .'</h3>
									   <h3>Password: '.$item->contrasena .'</h3>
									   <hr>
									   <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis minus voluptas mollitia, veritatis nam, dignissimos, esse molestiae pariatur laudantium blanditiis delectus amet perferendis. Officiis, obcaecati quisquam tempora, odit quos aperiam. ');
				if ($this->email->send())
				{
					$this->session->set_flashdata('msj', '<div class="alert alert-success" style="margin-top: 20px;">
				 	 <strong>Éxito</strong> Los datos fueron envidos exitosamente al correo '.$email.'
					</div>');
				}
				else 	{
				echo $this->email->print_debugger();
				$this->session->set_flashdata('msj', '<div class="alert alert-danger" style="margin-top: 20px;">
				 	 <strong>Error</strong> Los datos no se enviaron al correo '.$email.'
					</div>'.  $this->email->print_debugger());
				}
				
			/*	//con esto podemos ver el resultado
				//var_dump($this->email->print_debugger());
				$this->session->set_flashdata('msj', '<div class="alert alert-success" style="margin-top: 20px;">
				  <strong>Éxito</strong> Los datos fueron envidos exitosamente al correo '.$email.'
				</div>');
			*/	redirect(base_url('index.php/Welcome/recuperar_datos'));
			
			}

			}else{
				//$this->session->set_flashdata('msj', 'El correo'.$email.' no se encuentra regitrado en el sistema');
				$this->session->set_flashdata('msj', '<div class="alert alert-danger" style="margin-top: 20px;">
				  <strong>Error!</strong> El correo '.$email.' no existe en el sistema.
				</div>');
				redirect(base_url('index.php/Welcome/recuperar_datos'));
			}
	}
}

?>