<?php
defined('BASEPATH')or exit('No direct script access allowed');
	class cGuardarProyecto extends CI_controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('mlogin');
		}

		public function index(){

			    /*$this->load->view('header2');
		    	$this->load->view('body/vOficial');
				$this->load->view('magistrado/vMagistrado');
				$this->load->view('footer');*/

		}

	 	public function guardar(){
	 		$hoy=getdate();
	 		$expediente=$tipo=$this->input->post('expediente');
	 		$fechared=$tipo=$this->input->post('fechared');
			if ($hoy['mday']<=9) {
				$dia="0".$hoy['mday'];
			}else{
				$mes=$hoy['mday'];
			}
			if ($hoy['mon']<=9) {
				$mes="0".$hoy['mday'];
			}else{
				$mes=$hoy['mon'];
			}
			$fechacre=$dia."-".$mes."-".$hoy['year']." ".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds'];
	 		$folder="Proyectos/Redactados/";
	 		$archivo=$expediente."-".$dia."-".$mes."-".$hoy['year'].".tca";
			$ar=fopen($folder.$archivo,"w+") or
			die("Problemas en la creacion");
			fputs($ar,$_REQUEST['descripcion']);
			fclose($ar);
			echo $expediente;
			$data=array(
				'nombre'=>$archivo,
				'folder'=>$folder,
				'fechared'=>$fechared,
				'fechacre'=>$fechacre,
				'estado'=>1
			);
			echo "<script>alert('Se guardo el registro con exito...')</script>";
			$this->mLogin->nuevoproyecto($data);
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
			$this->load->view('redaccion/vRevisarActa',$data);
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
			echo "<script>alert('Enviado para revisión a ".$persona."')</script>";
			$this->load->view('header2');
		 $this->load->view('body/vOficial');
			$this->load->view('proyectista/vProyectista');
			$this->load->view('footer');
			//document.getElementById('descripcion').disabled="false";
		}
		public function enviarproy(){
			$archivo=$this->input->post('archivo');
			$persona=$this->input->post('persona');
			echo "<script>alert('Enviado para revisión a ".$persona."')</script>";
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
	}

/***************************************************************************************/

?>
