
<?php
defined('BASEPATH')or exit('No direct script access allowed');

	class cGuardarProyecto extends CI_controller{

		public function index(){

			    $this->load->view('header2');
				$this->load->view('magistrado/vMagistrado');
				$this->load->view('footer');

		}

	 	public function guardar(){
			$ar=fopen("Proyectos/prueba1.txt","w+") or
			die("Problemas en la creacion");
			fputs($ar,$_REQUEST['descripcion']);
			fclose($ar);?>
			<div class="alert alert-success">
  				<strong>Success!</strong> Indicates a successful or positive action.
			</div>			
			<?php	
				$this->load->view('header2');
				$this->load->view('magistrado/vMagistrado');
				$this->load->view('footer');
		}

		public function abrir(){
			document.getElementById('descripcion').disabled="true";
			$fichero = "Proyectos/prueba1.txt"; 
			$fp = fopen($fichero,"r+"); 
			$contenido = fread ($fp, filesize ($fichero)); 
			fclose($fp); 
			echo "<textarea name='texto'>".$contenido."</textarea><br>";
		}

		public function editar(){
			document.getElementById('descripcion').disabled="false";
		}
	}
?>

