<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cOficial extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function index(){

  		if ($this->session->userdata('logueado')) {
  			if($this->session->userdata('Id_rol')==4){
  				$this->load->model('mLogin');
  				$this->load->view('header2');
  		    $this->load->view('body/vOficial');
  				$this->load->view('proyectista/vProyectista');
  				$this->load->view('footer');
  			}else if($this->session->userdata('Id_rol')==6){
  				$this->load->model('mLogin');
  				$this->load->view('header2');
  		    	$this->load->view('body/vOficial');
  				$this->load->view('magistrado/vMagistrado');
  				$this->load->view('footer');
  			}else{
  				$this->load->model('mLogin');
  				$this->load->view('header2');
  				$this->load->view('body/vOficial');
  				$this->load->view('body/vMenu1');
  				$this->load->view('footer');
  			}


  	    } else {
  			redirect('Welcome/inicio_sesion');
  	    }

  	}
	public function principal(){

			$this->load->model('mLogin');
			$this->load->view('header2');
			$this->load->view('body/vOficial');
			$this->load->view('body/vMenu1');
			$this->load->view('footer');

	}
	public function notificacion(){
			$this->load->model('mLogin');
			$this->load->view('header2');
			$this->load->view('body/vOficial');
			$Persona_id = $this->session->userdata('Persona_id');
			$datos['expedientes'] = $this->mLogin->exp_x_sa($Persona_id);
			$datos['proyectista'] = $this->mLogin->get_SA(4);
			$datos['actuario'] = $this->mLogin->get_SA(5);

			$datos['tipoacuerdo'] = $this->mLogin->get_tipoacuerdo(2);

			$datos['desecha']= $this->mLogin->get_tipodesecha();
			$this->load->view('body/vNotificaciones',$datos);
			$this->load->view('footer');

	}
/**************************************************************************/
	public function demanda(){

		if ($this->session->userdata('logueado')) {
				$this->load->model('mLogin');
				$datos['expedientes'] = $this->mLogin->per_exp();
				if ($_POST) {
					$id_exp=$this->input->post('id_exp' );
					$id_logeado=$this->input->post('id_log' );
					$id_sa=$this->input->post('id_sa' );
					$id_ts=$this->input->post('idtiposeg');
					$fecha = $this->input->post('fecha'); // Fehca de expediente
		    		$fecha1= date("Y-m-d H:i:s", strtotime("$fecha"));
					$obs=$this->input->post('obs');
	 			         if($_SESSION["Id_rol"] == 1 ){
		 			          $modOrigen=8; //usr: administrador mod:administrador
		 			          $modDest = 8;
	 			         }
 				         if($_SESSION["Id_rol"] == 2 ){
 				         	$modOrigen=2; //usr: OP  mod: 2
 				         	$modDest=3;
 				         }
 				         if($_SESSION["Id_rol"] == 3 ){
 				         	$modOrigen=3; //usr:SA   mod: 3
 				         	$modDest=$this->input->post("modDestino");
 				         	 if($modDest == 4 ){
 				         	 	$id_ts = 8;
 				         	 }

 				         	 if($modDest == 5 ){
 				         	 	$id_ts = 12;
 				         	 }

 				         }

 				         if($_SESSION["Id_rol"] == 4 ){
 				         	$modOrigen=4; //usr:proy mod: 4
 				         }
				         if($_SESSION["Id_rol"] == 5 ){
				         	$modOrigen=5; //usr:Actu  mod: 5
				         }
      				     if($_SESSION["Id_rol"] == 6 ){
      				     	$modOrigen=6; //usr:magis mod: 6
      				     }
    			         if($_SESSION["Id_rol"] == 7 ){
    			         	$modOrigen=1; //usr:usr    mod:1
    			         	$modDest=2;
    			         }
                         if($_SESSION["Id_rol"] == 8 ){
                         	$modOrigen=1; //usr:instit mod:1
                         	$modDest=2;
                         }
					$jsonTSeguimiento =
			  			array(
			  				'idmodulo'=>$modOrigen,
			  				'id_op'=>$_SESSION["Persona_id"],
			  				'mov'=>'out',
			  				'idExpediente'=>$id_exp,//idexpediente
			  				'id_Tseguimiento'=>$id_ts, //status Corresponde a enviado a SA...
			  				'Fecha'=>$fecha1,
			  				'Status1'=>'0'//,//Status1
			  				);

			  			 $this->mLogin->save_demanda($jsonTSeguimiento,"Seguimiento"); // salida

			  		$jsonTSeguimiento =
			  			array(
			  				'idmodulo'=>$modDest,
			  				'id_op'=>$id_sa,
			  				'mov'=>'in',
			  				'idExpediente'=>$id_exp,//idexpediente
			  				'id_Tseguimiento'=>$id_ts, //status Corresponde a enviado a SA...
			  				'Fecha'=>$fecha1,
			  				'Comentarios'=>$obs,
			  				'Status1'=>'0'//,//Status1
			  				);
			  			 $this->mLogin->save_demanda($jsonTSeguimiento,"Seguimiento");	//ingreso
					$insercion = $this->mLogin->enviar($id_exp,$id_logeado,$id_sa);
					if($insercion){
		            $this->session->set_flashdata('actualizado', 'El expediente se envio correctamente');
		          		redirect(base_url('index.php/cOficial/demanda'));
		          	}
				}
				$datos['secretario_a'] = $this->mLogin->get_SA(3);
				$datos['envios'] = $this->mLogin->get_envios_sa();
				$datos['tipodoc'] = $this->mLogin->get_tipoacuerdo(1);
				$this->load->view('header2');
				$this->load->view('body/vOficial');
			    if($_SESSION["Id_rol"] == 3 ) redirect(base_url('index.php/cOficial/acuerdo'));
			    $this->load->view('body/vDemandanew',$datos);
				$this->load->view('footer');
	    } else {
			redirect('Welcome/inicio_sesion');
	    }
	}


	public function recuperar(){
		$this->load->model('mLogin');
		$id_expediente = $_GET['expediente'];
		$anexos_pdf = $this->mLogin->get_anexos(['id_Expediente'=>$id_expediente]);
		$datos = ['anexos'=>$anexos_pdf];
		header("Content-Type: application/json; encoding=UTF-8");
		echo json_encode($datos);
	}
	public function add_file(){
		$time = time();
		$this->load->model('mLogin');
		$id_expediente=$this->input->post('expediente');
		$tipo=$this->input->post('id_tipo');
		$tdesecha=$this->input->post('desecha');
		$obs=$this->input->post('obs');
		$fecha = $this->input->post('date').$time; // Fehca de expediente
		$fecha1= date("Y-m-d H:i:s", strtotime("$fecha"));
		$fecha2 = $this->input->post('datelim');
		$datelim = date("Y-m-d ", strtotime("$fecha2"));
		$id_invol = $this->input->post('slt-involucrados');
		$exp = $this->mLogin->get_last_doc($id_expediente);
		$expediente = $exp['FExpediente'];
		$ultimo_Folio = $exp['num'];
		$path ='./Historico/' . $expediente;
        $config['upload_path'] = $path;
        $config['file_name'] = $_FILES['pdf_file']['name'];
        $config['allowed_types'] = "pdf";
        $config['max_size'] = "503024";
        $archivo_nombre = $config['file_name'];
        $this->load->library('upload');
        $this->upload->initialize($config);
		$nuevo = $ultimo_Folio+1;
		$folio = $expediente."_".$nuevo;
        if (!$this->upload->do_upload('pdf_file')) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }
        $data['uploadSuccess'] = $this->upload->data();
          if($_SESSION["Id_rol"] == 1 ) $modulo=8; //usr: administrador mod:administrador
          if($_SESSION["Id_rol"] == 2 ) $modulo=2; //usr: OP  mod: 2
          if($_SESSION["Id_rol"] == 3 ) $modulo=3; //usr:SA   mod: 3
          if($_SESSION["Id_rol"] == 4 ) $modulo=5; //usr:proy mod: 5
	      if($_SESSION["Id_rol"] == 5 ) $modulo=4; //usr:Actu  mod: 4
          if($_SESSION["Id_rol"] == 6 ) $modulo=6; //usr:magis mod: 6
          if($_SESSION["Id_rol"] == 7 ) $modulo=1; //usr:usr    mod:1
          if($_SESSION["Id_rol"] == 8 ) $modulo=1; //usr:instit mod:1
		$insert = $this->mLogin->add_new_doc($folio,$tipo,$id_expediente,$path,$archivo_nombre,$_SESSION["Persona_id"],$modulo,$fecha1,$obs,$tdesecha,$datelim,$id_invol);
		if($_SESSION["Id_rol"] == 5 ) redirect(base_url('index.php/cOficial/notificacion'));
		if($_SESSION["Id_rol"] == 2 ) redirect(base_url('index.php/cOficial/demanda'));
		if($_SESSION["Id_rol"] == 3 ) redirect(base_url('index.php/cOficial/acuerdo'));
		if($_SESSION["Id_rol"] == 1 ) redirect(base_url('index.php/cOficial/demanda'));
	}
	public function nueva_demanda(){
		$this->load->model('mLogin');
		$this->load->view('header2');
		$this->load->view('body/vOficial');
		$datos['tipoacuerdo'] = $this->mLogin->get_tipoacuerdo(1);
		$this->load->view('body/vDemanda1',$datos);
		$this->load->view('footer');
	}
	public function miperfil(){
		$this->load->model('mLogin');
		$this->load->view('header2');
		$this->load->view('body/vOficial');
		$this->load->view('body/vPerfil');
		$this->load->view('footer');
}

	public function buscar_persona(){
		$this->load->model('mLogin');
		$buscar =$this->input->post('valor');
		$idRol=$this->input->post('id');
		$persona=$this->mLogin->persona($buscar,$idRol);
		header("Content-Type: application/json; encoding=UTF-8");
		echo(json_encode($persona));
	}
	public function obtener_exp(){
		$this->load->model('mLogin');
		print_r(json_encode($this->mLogin->get_ultimoexp()));
	}
	public function acuerdo(){
		$this->load->model('mLogin');
		$Persona_id = $this->session->userdata('Persona_id');
		$datos['expedientes'] = $this->mLogin->exp_x_sa($Persona_id);
		$datos['proyectista'] = $this->mLogin->get_SA(4);
		$datos['actuario'] = $this->mLogin->get_SA(5);
		$datos['tipoacuerdo'] = $this->mLogin->get_tipoacuerdo(2);
		$datos['desecha']= $this->mLogin->get_tipodesecha();
		$this->load->view('header2');
		$this->load->view('body/vOficial');
	    $this->load->view('body/vAcuerdo',$datos);
		$this->load->view('footer');
	}
	public function get_involed()
	{
		$id_Expediente = $_POST['id'];
		$this->load->model('mLogin');
		$involed = $this->mLogin->get_involed($id_Expediente);
		header("Content-Type: application/json; encoding=UTF-8");
		print_r(json_encode($involed));
	}
	public function get_perfil(){
		$this->load->model('mLogin');
		$perfil = $this->mLogin->get_perfill($this->session->userdata('Persona_id'));
		header("Content-Type: application/json; encoding=UTF-8");
	    print_r(json_encode($perfil));
	}
	public function track(){
		$this->load->model('mLogin');
		$id_expediente = $_GET['expediente'];
		$anexos_pdf = $this->mLogin->get_seguimiento(['id_Expediente'=>$id_expediente]);
		$datos = ['anexos'=>$anexos_pdf];
		header("Content-Type: application/json; encoding=UTF-8");
		echo json_encode($datos);
	}

	public function seguimiento(){
	if ($this->session->userdata('logueado')) {
			$this->load->model('mLogin');
			$this->load->view('header2');
			$this->load->view('body/vOficial');
			$Persona_id = $this->session->userdata('Persona_id');
			$datos['expedientes'] = $this->mLogin->get_track($Persona_id);
			$datos['proyectista'] = $this->mLogin->get_SA(4);
			$datos['actuario'] = $this->mLogin->get_SA(5);
			$datos['tipoacuerdo'] = $this->mLogin->get_tipoacuerdo(2);
			$datos['desecha']= $this->mLogin->get_tipodesecha();
			$this->load->view('body/vSeguimiento',$datos);
			$this->load->view('footer');
		}else {
			redirect('Welcome/inicio_sesion');
	    }

	}
	/***************************GOGO********************************/

	public function nwacuerdo(){

		if ($this->session->userdata('logueado')) {
			$this->load->model('mLogin');
			$this->load->view('header2');
			$this->load->view('body/vOficial');
			$this->load->view('redaccion/vnwacuerdo');
			$this->load->view('footer');

			} else {
			redirect('Welcome/inicio_sesion');
			}
		}
	/****************************fin********************************/
}
?>
