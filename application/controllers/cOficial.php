<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class coficial extends CI_Controller {

	/** Antonio MORENO JAUREGUI
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
		//print_r($this->session->userdata('Id_rol'));
  		if ($this->session->userdata('logueado')) {
  			if(($this->session->userdata('Id_rol')==7)||($this->session->userdata('Id_rol')==8)){
	   			redirect('Coficial2');
	  		}
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
  			}else if($this->session->userdata('Id_rol')==3){
  				$this->load->model('mLogin');
  				$this->load->view('header2');
  		    		$this->load->view('body/vOficial');
  				$this->load->view('body/vmenusa');
  				$this->load->view('footer');
  			}else{
  				$this->load->model('mLogin');
  				$this->load->view('header2');
  				$this->load->view('body/vOficial');
  				$this->load->view('body/vMenu1');
  				$this->load->view('footer');
  			}
  	    } else {
  	   
  			//redirect('Welcome/inicio_sesion');
  			
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
			  				'mov'=>'Salida',
			  				'idExpediente'=>$id_exp,//idexpediente
			  				'id_Tseguimiento'=>$id_ts, //status Corresponde a enviado a SA...
			  				'Fecha'=>$fecha1,
			  				'Status1'=>'0'//,//Status1
			  				);

			  			 $this->mLogin->save_demanda($jsonTSeguimiento,"seguimiento"); // salida

			  		$jsonTSeguimiento =
			  			array(
			  				'idmodulo'=>$modDest,
			  				'id_op'=>$id_sa,
			  				'mov'=>'Entrada',
			  				'idExpediente'=>$id_exp,//idexpediente
			  				'id_Tseguimiento'=>$id_ts, //status Corresponde a enviado a SA...
			  				'Fecha'=>$fecha1,
			  				'Comentarios'=>$obs,
			  				'Status1'=>'0'//,//Status1
			  				);
			  			 $this->mLogin->save_demanda($jsonTSeguimiento,"seguimiento");	//ingreso
					$insercion = $this->mLogin->enviar($id_exp,$id_logeado,$id_sa);
					if($insercion){
		            $this->session->set_flashdata('actualizado', 'El expediente se envio correctamente');
		          		redirect(base_url('index.php/Coficial/demanda'));
		          	}
				}
				$datos['secretario_a'] = $this->mLogin->get_SA(3);
				$datos['envios'] = $this->mLogin->get_envios_sa();
				$datos['tipodoc'] = $this->mLogin->get_tipoacuerdo(1);				
				$this->load->view('header2');
				$this->load->view('body/vOficial');
			   
			    $this->load->view('body/vDemandanew',$datos);
				$this->load->view('footer');
	    } else {
			redirect('Welcome/inicio_sesion');
	    }
	}


	public function recuperar(){
		$this->load->model('mLogin');
		$id_expediente = $_GET['expediente'];
		$anexos_pdf = $this->mLogin->get_anexos(['id_expediente'=>$id_expediente]);
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
		$fecha = $this->input->post('date').$time; // Fecha de expediente
		$fecha1= date("Y-m-d H:i:s", strtotime("$fecha"));
		$fecha2 = $this->input->post('datelim');
		$datelim = date("Y-m-d ", strtotime("$fecha2"));
		$id_invol = $this->input->post('slt-involucrados');
		$exp = $this->mLogin->get_last_doc($id_expediente);
		$expediente = $exp['Fexpediente'];
		$ultimo_Folio = $exp['num'];
		$path ='./Historico/' . $expediente;
        	$config['upload_path'] = $path;
        	$config['file_name'] = $_FILES['pdf_file']['name'];
	        $config['allowed_types'] = "pdf";
        	$config['max_size'] = "503024";
       		$archivo_nombre = $config['file_name'];
        	$involed = $this->mLogin->get_involed($id_expediente);
        	$correoe = $this->mLogin->get_mailinvol($id_expediente);
        	//echo ($correoe[0]);
        	//die();
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
	  if($_SESSION["Id_rol"] == 5 ) {
	  $modulo=4; //usr:Actu  mod: 4
	  $this->load->library('email');
	  foreach ($correoe as $address)
		{
 
   			 $this->email->clear();
    		         $this->email->to($address);
  		         $this->email->from('info@sisede.tcacolima.com');
  		         $this->email->cc('info@sisede.tcacolima.com');
  		         $this->email->subject('Notificación en SiSeDe TCA Colima');
   		         $this->email->message('Usted tiene nueva notificacion que requiere de su atención, es necesario ingresar a sisede.tcacolima.com con su usuario y contraseña para cualquier duda contactar al tel. 312 314 8203'); 
		         $this->email->send();
		}
	  }
          if($_SESSION["Id_rol"] == 6 ) $modulo=6; //usr:magis mod: 6
          if($_SESSION["Id_rol"] == 7 ) $modulo=1; //usr:usr    mod:1
          if($_SESSION["Id_rol"] == 8 ) $modulo=1; //usr:instit mod:1
		$insert = $this->mLogin->add_new_doc($folio,$tipo,$id_expediente,$path,$archivo_nombre,$_SESSION["Persona_id"],$modulo,$fecha1,$obs,$tdesecha,$datelim,$id_invol,$_SESSION['Id_rol']);
		if($_SESSION["Id_rol"] == 5 ) redirect(base_url('index.php/Coficial/notificacion'));
		if($_SESSION["Id_rol"] == 2 ) redirect(base_url('index.php/Coficial/demanda'));
		if($_SESSION["Id_rol"] == 3 ) redirect(base_url('index.php/Coficial/acuerdo'));
		if($_SESSION["Id_rol"] == 1 ) redirect(base_url('index.php/Coficial/demanda'));
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
		header("Content-Type: application/json; encoding=UTF-8");
		echo (json_encode($this->mLogin->get_ultimoexp()));
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
		$anexos_pdf = $this->mLogin->get_seguimiento(['id_expediente'=>$id_expediente]);
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
/**********************************************GOGO***************************************************/
	
	public function sentencias(){
		$this->load->model('mLogin');
		$Persona_id = $this->session->userdata('Persona_id');
		$datos['expedientes'] = $this->mLogin->get_track($Persona_id);
		$this->load->view('header2');
	  	$this->load->view('body/vOficial');
		$this->load->view('body/vsent_2',$datos);
		$this->load->view('footer');
	}
	
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
		
	public function proyect_expen(){ //proyectista expedientes pendientes
		$this->load->model('mLogin');
		$Persona_id = $this->session->userdata('Persona_id');	
		$datos['expedientes'] = $this->mLogin->exp_x_sa($Persona_id);
		$datos['proyectista'] = $this->mLogin->get_SA(4);
		$datos['magistrado'] = $this->mLogin->get_SA(6);
		$datos['actuario'] = $this->mLogin->get_SA(5);		
		$datos['tipoacuerdo'] = $this->mLogin->get_tipoacuerdo(2);
		$datos['desecha']= $this->mLogin->get_tipodesecha();
		$this->load->view('header2');
		$this->load->view('body/vOficial');
		$this->load->view('proyectista/vExpedientesPendientes',$datos);
		$this->load->view('footer');
	}
	public function proyect_lp(){ //proyectista leer proyectos
		$this->load->model('mLogin');
		$Persona_id = $this->session->userdata('Persona_id');
		$datos['expedientes'] = $this->mLogin->exp_x_sa($Persona_id);
		$datos['proyectista'] = $this->mLogin->get_SA(4);
		$datos['magistrado'] = $this->mLogin->get_SA(6);
		$datos['actuario'] = $this->mLogin->get_SA(5);
		$datos['tipoacuerdo'] = $this->mLogin->get_tipoacuerdo(2);
		$datos['desecha']= $this->mLogin->get_tipodesecha();
		$this->load->view('header2');
		$this->load->view('body/vOficial');
		$this->load->view('proyectista/vexpeds',$datos);
		$this->load->view('footer');

	}
	public function proyect_rp(){ //proyectista redactar proyecto
		$this->load->model('mLogin');
		$expediente=$this->input->post('expediente');
		$id=$_SESSION["Persona_id"];
		$datos=array('expediente'=>$expediente,'id'=>$id);
		//$this->mLogin->insertmov($data);
		date_default_timezone_set('America/Mexico_City');
		$time = time();
		$fecha = date("Y-m-d H:i:s", $time);
		$this->db->insert('seguimiento',array('idmodulo'=>5,'id_op'=>$datos['id'],'mov'=>'Entrada',
			'idexpediente'=>$datos['expediente'],'id_Tseguimiento'=>13,'Fecha'=>$time,'Comentarios'=>"En proceso de redacción"));
		$this->load->view('header2');
		$this->load->view('proyectista/vMenuProy');
		$this->load->view('proyectista/vRedactarProyecto');
		$this->load->view('footer');
	}
	/*MANIPULACIÓN DE ARCHIVOS*/
	public function guardar_an(){ //Guardar archivo nuevo
		date_default_timezone_set('America/Mexico_City');
		$usuario=$this->session->userdata('Persona_id');
		$time = time();
		$fecha = date("dmY", $time);
	 	$expediente=$tipo=$this->input->post('expediente');
	 	$folder="Proyectos/Redactados/";
	 	$archivo=$expediente.$fecha.".tca";
		$ar=fopen($folder.$archivo,"w+") or
		die("Problemas en la creacion");
		fputs($ar,$_REQUEST['descripcion']);
		fclose($ar);
		$datos=array(
			'nombre'=>$archivo,
			'folder'=>$folder,
			'usuario'=>$usuario,
			'expediente'=>$expediente,
			'estado'=>1
		);
		echo "<script>alert('Se guardo el registro con exito...')</script>";
		$this->db->insert('proyectos',$datos);
		$this->load->view('header2');
	  	$this->load->view('body/vOficial');
		$this->load->view('proyectista/vProyectista');
		$this->load->view('footer');
	}
	public function guardaract(){
		$name=$tipo=$this->input->post('nombre');
		$archivo=$name.".tca";
		$ar=fopen("Actas/".$archivo,"a+") or
		die("Problemas en la creacion");
		fputs($ar,$_REQUEST['descripcion']);
		fclose($ar);
		echo "<script>alert('Se guardo el registro con exito...')</script>";
		$data['archivo']=$archivo;
		$this->load->view('header2');
	  	$this->load->view('body/vOficial');
		$this->load->view('redaccion/vrevisaracta',$data);
		$this->load->view('footer');
	}
	public function guardarnew(){
	 	$name=$tipo=$this->input->post('nombre');
		$ar=fopen("ListaActas/".$name.".tca","a+") or
		die("Problemas en la creacion");
		fputs($ar,$_REQUEST['descripcion']);
		fclose($ar);
		echo "<script>alert('Se guardo el registro con exito...')</script>";
		$this->load->view('header2');
		$this->load->view('actuario/vOficial');
		$this->load->view('actuario/vtacta');
		$this->load->view('footer');
	}
	public function abrir(){
		//document.getElementById('descripcion').disabled="true";
		$expediente=$tipo=$this->input->post('expediente');
		$fichero = "Historico/".$expediente."/"."Proyectos/Proyecto_".$expediente.".tca";
		$fp = fopen($fichero,"r+");
		$contenido = fread ($fp, filesize ($fichero));
		fclose($fp);
		echo "<textarea name='texto'>".$contenido."</textarea><br>";
	}
	public function enviarmag(){
		$expediente=$this->input->post('expediente');
		$archivo=$this->input->post('archivo');
		$persona=$this->input->post('persona');
		echo "<script>alert('Enviado para revisi贸n a ".$persona."')</script>";
		$this->load->view('header2');
	 	$this->load->view('body/vOficial');
		$this->load->view('proyectista/vProyectista');
		$this->load->view('footer');
		//document.getElementById('descripcion').disabled="false";
	}
	public function enviarproy(){
		$archivo=$this->input->post('archivo');
		$persona=$this->input->post('persona');
		echo "<script>alert('Enviado para revisi贸n a ".$persona."')</script>";
		$this->load->view('header2');
		$this->load->view('body/vOficial');
		$this->load->view('magistrado/vProyectosPendientes');
		$this->load->view('footer');
		//document.getElementById('descripcion').disabled="false";
	}
	public function enviar($id_anexopdf,$id_logeado,$id_sa) {
		$data = array('id' 	=> NULL,
			  'id_Exp' => $id_anexopdf,
			  'id_Persona' 	=> $id_logeado,
			  'id_SA' => $id_sa,
			  'FechaEnviado' => date('Y-m-d H:i:s'),
			  );
	    	$this->db->insert('enviasa',$data);
	        if($this->db->trans_status() === FALSE){
	            $this->db->trans_rollback();
	            return 0;
	        } else {
	            $this->db->trans_commit();
	            return 1;
	        }
	}
	//PROYECTOS
	public function editar_p(){
	 	$archivo=$this->input->post('archivo');
		$ar=fopen("Proyectos/Redactados/".$archivo,"w+") or
		die("Problemas en la creacion");
		fputs($ar,$_REQUEST['descripcion']);
		fclose($ar);
		echo "<script>alert('Se guardo el registro con exito...')</script>";
		$this->db->where('nombre',$archivo);
		$this->db->update('proyectos',array('estado'=>1));
		$this->load->view('header2');
		$this->load->view('proyectista/vMenuProy');
		$this->load->view('proyectista/vexpeds',$archivo);
		$this->load->view('footer');

	}
	public function editarm(){
		$expediente=$this->input->post('expediente');
		$archivo=$this->input->post('archivo');
		$ar=fopen("Proyectos/Redactados/".$archivo,"w+") or
		die("Problemas en la creacion");
		fputs($ar,$_REQUEST['descripcion']);
		fclose($ar);
		echo "<script>alert('Se guardo el registro con exito...')</script>";
		$this->load->view('header2');
		$this->load->view('body/vOficial');
		$this->load->view('magistrado/vMagistrado');
		$this->load->view('footer');
	}
	
	//MANIPULACION DE ESTADOS DE PROYECTOS
	public function guardarmag(){
		$archivored=$this->input->post('archivored');
		$id=$_SESSION["Persona_id"];
		$data=array('archivored'=>$archivored,'id'=>$id);
		date_default_timezone_set('America/Mexico_City');
		$time = time();
		$fecha = date("Y-m-d H:i:s", $time);
		$row=$this->db->query('SELECT expediente FROM proyectos where nombre = '."'".$data['archivored']."'");
		$array=$row->result_array();
		$this->db->insert('seguimiento',array('idmodulo'=>5,'id_op'=>$data['id'],'mov'=>'Salida',
			'idexpediente'=>$array[0]['expediente'],'id_Tseguimiento'=>14,'FechaVisto'=>$fecha,'Comentarios'=>"Enviado a revisi贸n"));
		$this->db->insert('enviasa',array('id_Exp'=>$array[0]['expediente'],'id_persona'=>$data['id'],'id_SA'=>10,'Status'=>1));
		date_default_timezone_set('America/Mexico_City');
		$time = time();
		$fecha = date("dmY", $time);
		$this->load->model('mLogin');
		$Persona_id = $this->session->userdata('Persona_id');
		$datos['expedientes'] = $this->mLogin->exp_x_sa($Persona_id);
		$datos['proyectista'] = $this->mLogin->get_SA(4);
		$datos['magistrado'] = $this->mLogin->get_SA(6);
		$datos['actuario'] = $this->mLogin->get_SA(5);
		$datos['tipoacuerdo'] = $this->mLogin->get_tipoacuerdo(2);
		$datos['desecha']= $this->mLogin->get_tipodesecha();
		$data2=array(
			'nombre'=>$archivored,
			'folder'=>"Proyectos/Redactados/",
			'status'=>2
			);
		echo "<script>alert('Enviado al magistrado...');</script>";
		$this->mLogin->editproy($data2);
	  	$this->load->view('header2');
		$this->load->view('body/vOficial');
		$this->load->view('proyectista/vProyectista',$datos);
		$this->load->view('footer');
	}
	public function aprobarmag(){
		$archivored=$this->input->post('archivo');
		$comentarios=$this->input->post('comentarios');
		$folder=$tipo=$this->input->post('folder');
		$expediente=$this->input->post('expediente');
		$hoy=getdate();
		$row=$this->db->query('SELECT expediente FROM proyectos where nombre = '."'".$archivored."'");
		$array=$row->result_array();
		$id=$_SESSION["Persona_id"];
		$fecha=$hoy['mday'].$hoy['mon'].$hoy['year'].$hoy['hours'].$hoy['minutes'];
		$data=array('archivo'=>$archivored,'folder'=>$folder,'expediente'=>$expediente);
		$this->db->insert('seguimiento',array('idmodulo'=>6,'id_op'=>$id,'mov'=>'Salida',
			'idexpediente'=>$array[0]['expediente'],'id_Tseguimiento'=>15,'FechaVisto'=>$fecha,'Comentarios'=>"Sententencia Aceptada"));
		$hoy=getdate();
		$estado=3;
		$fecha=$hoy['mday'].$hoy['mon'].$hoy['year'].$hoy['hours'].$hoy['minutes'];
		$this->load->model('mLogin');
		$Persona_id = $this->session->userdata('Persona_id');
		$datos['expedientes'] = $this->mLogin->exp_x_sa($Persona_id);
		$datos['proyectista'] = $this->mLogin->get_SA(4);
		$datos['magistrado'] = $this->mLogin->get_SA(6);
		$datos['actuario'] = $this->mLogin->get_SA(5);
		$datos['tipoacuerdo'] = $this->mLogin->get_tipoacuerdo(2);
		$datos['desecha']= $this->mLogin->get_tipodesecha();
		//$data1=$this->mLogin->datarc($archivored);
		$data2=array(
			'nombre'=>$archivored,
			'status'=>$estado,
			'comentarios'=>$comentarios
			);
		echo "<script>alert('Proyecto Aprobado...');</script>";
		if($this->mLogin->editproym($data2)){
			echo "<script>alert('Proyecto Aprobado...');</script>";
		}
		$this->load->view('header2');
		$this->load->view('body/vOficial');
		$this->load->view('magistrado/vProyectosPendientes');
		$this->load->view('footer');
	}
	public function rechazarmag(){
		$archivo=$this->input->post('archivo');
		$comentarios=$this->input->post('comentarios');
		$this->load->model('mLogin');
		$Persona_id = $this->session->userdata('Persona_id');
		$datos['expedientes'] = $this->mLogin->exp_x_sa($Persona_id);
		$datos['proyectista'] = $this->mLogin->get_SA(4);
		$datos['magistrado'] = $this->mLogin->get_SA(6);
		$datos['actuario'] = $this->mLogin->get_SA(5);
		$datos['tipoacuerdo'] = $this->mLogin->get_tipoacuerdo(2);
		$datos['desecha']= $this->mLogin->get_tipodesecha();
		//$data1=$this->mLogin->datarc($archivored);
		$data2=array(
			'nombre'=>$archivo,
			'folder'=>"Proyectos/Redactados/",
			'comentarios'=>$comentarios,
			'status'=>4
			);
		echo "<script>alert('Proyecto Rechazado...');</script>";
		$this->mLogin->editproym($data2);
		$this->load->view('header2');
		$this->load->view('body/vOficial');
		$this->load->view('magistrado/vProyectosPendientes');
		$this->load->view('footer');
	}
	//REVISAR PROYECTO PROYECTISTA
	public function revproy2(){
		$this->load->view('header2');
		$this->load->view('proyectista/vMenuProy');
		$this->load->view('proyectista/vLeerProyecto');
		$this->load->view('footer');
	}
	public function cverproy(){
		$this->load->view('header2');
		$this->load->view('proyectista/vMenuProy');
		$this->load->view('proyectista/vverProy');
		$this->load->view('footer');

	}
	public function ceditproy(){
		$this->load->view('header2');
		$this->load->view('proyectista/vMenuProy');
		$this->load->view('proyectista/veditproy');
		$this->load->view('footer');

	}
	public function revproymagi(){
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
		$expediente=$tipo=$this->input->post('expediente');
		$id=$_SESSION["Persona_id"];
		$hoy=getdate();
		$row=$this->db->query('SELECT expediente FROM proyectos where nombre = '."'".$archivo."'");
		$array=$row->result_array();
		$fecha=$hoy['mday'].$hoy['mon'].$hoy['year'].$hoy['hours'].$hoy['minutes'];
		$data=array('archivo'=>$archivo,'folder'=>$folder,'expediente'=>$expediente);
		$this->db->insert('seguimiento',array('idmodulo'=>6,'id_op'=>$id,'mov'=>'Entrada',
			'idexpediente'=>$array[0]['expediente'],'id_Tseguimiento'=>14,'FechaVisto'=>$fecha,'Comentarios'=>"Proyecto en revisi贸n"));
		$this->load->view('header2');
		$this->load->view('magistrado/vMenumag');
		$this->load->view('magistrado/vrevproye',$data);
		$this->load->view('footer');
	}
	public function revproym2(){
		$archivo=$tipo=$this->input->post('archivo');
		$folder=$tipo=$this->input->post('folder');
		$expediente=$tipo=$this->input->post('expediente');
		$data=array('archivo'=>$archivo,'folder'=>$folder,'expediente'=>$expediente);
		$this->load->view('header2');
		$this->load->view('magistrado/vMenumag');
		$this->load->view('magistrado/vRevisarProyecto',$data);
		$this->load->view('footer');
	}
	public function credproy(){
		$this->load->model('mLogin');
		$expediente=$this->input->post('expediente');
		$id=$_SESSION["Persona_id"];
		$data=array('expediente'=>$expediente,'id'=>$id);
		$this->mLogin->insertmov($data);
		$this->load->view('header2');
		$this->load->view('proyectista/vMenuProy');
		$this->load->view('proyectista/vRedactarProyecto');
		$this->load->view('footer');

	}
	//REVISAR PROYECTOS MAGISTRADO
	public function cproypend (){
		$this->load->model('mLogin');
		$Persona_id = $this->session->userdata('Persona_id');
		$datos['expedientes'] = $this->mLogin->exp_x_sa($Persona_id);
		$datos['proyectista'] = $this->mLogin->get_SA(4);
		$datos['actuario'] = $this->mLogin->get_SA(5);
		$datos['tipoacuerdo'] = $this->mLogin->get_tipoacuerdo(2);
		$datos['desecha']= $this->mLogin->get_tipodesecha();
		$this->load->view('header2');
		$this->load->view('body/vOficial');
		$this->load->view('magistrado/vProyectosPendientes',$datos);
		$this->load->view('footer');

	}

/******************************************************GOGO******************************************************/
	public function cnotiact(){
		    $this->load->view('header2');
		    $this->load->view('body/vOficial');
			$this->load->view('actuario/vNotificacionActuario');
			$this->load->view('footer');
	}
	
	
	/**********************************************FIN***************************************************/
}
?>
