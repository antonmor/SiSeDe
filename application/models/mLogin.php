<?php
/**Constructor del modelo gogo**/
class mlogin extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
/*******************************/

	public function loggin($usr,$pass){
		$var= $this->db->query("
			 SELECT p.id, CONCAT(p.Nombre,' ',p.Apat,' ',p.Amat) as Nombre, r.idroles, r.Tipo
			FROM persona p
			INNER JOIN rolesperiodo rp on rp.idpersona=p.id
			INNER JOIN rol r on r.idroles=rp.idroles
			WHERE rp.Status = 1 and p.Usuario = '$usr' and
			AES_DECRYPT(p.Password,'sistema2016') = '$pass'");
			//p.Password='$pass'");
		return $var->result();
	}
	public function persona($param,$idroles)
	{
		if($idroles == 7)
		$cad1="SELECT DISTINCT p.id, concat(p.Nombre,' ',p.Apat,' ',p.Amat) as 'Nombre' from
			(persona p join rolesperiodo rp on rp.idpersona=p.id
				and rp.status=1
				and (idroles = ".$idroles.")
				)join rol r on r.idroles=rp.idroles
			    left join domicilio d on d.id_persona = p.id
				WHERE (p.nombre like '%".$param."%') or (p.Apat like '%".$param."%')";
		//$cad1="SELECT id, Nombre FROM persona WHERE id=12;";
		else
		if($idroles == 8) {
		$cad1 = "SELECT DISTINCT p.id, p.RazonSocial as 'razon'  from
		(persona p join rolesperiodo rp on rp.idpersona=p.id
		and rp.status=1
		and (idroles = ".$idroles.")
		)join rol r on r.idroles=rp.idroles
		left join domicilio d on d.id_persona = p.id
		where (p.RazonSocial like '%".$param."%')";
	}
	$var=$this->db->query($cad1);
	//print_r($cad1);
	return $var->result();
	//return $cad1;

}
//encryption_key
public function save_bd($tipo,$nombre,$apat,$amat,$rsocial,$genero,$identificacion,$referencia,$tf,$movil,$email,$cemail,$Estado,$Municipio,$Dom,$interior,$exterior,$cp,$Estado1,$Municipio1,$Dom1,$interior1,$exterior1,$cp1,$refe,$user,$pass,$curp){
	$this->db->trans_begin();
	$this->db->query("call personadom "."('" .$tipo ."','" .$nombre ."','" .$apat ."','" .$amat ."','" .$rsocial ."','" .$genero ."','" .$identificacion ."','" .$referencia ."','" .$tf ."','" .$movil ."','" .$email ."','" .$cemail ."','" .$Estado ."','" .$Municipio ."','" .$Dom ."','" .$interior ."','" .$exterior ."','" .$cp ."','" .$Estado1 ."','" .$Municipio1 ."','" .$Dom1 ."','" .$interior1 ."','" .$exterior1 ."','" .$cp1 ."','" .$refe ."','" .$user ."','" .$pass ."','" .$curp ."');");
	if($this->db->trans_status() === FALSE){
		$this->db->trans_rollback();
		return 0;
	} else {
		$this->db->trans_commit();
		return 1;
	}

}//save_bd

public function getExp(){

	$arr=$this->db->query("select *, pd.Nombre as 'Demandante', pd.Apat as 'ApatD', pd.Amat as 'AmatD', pd.CURP as 'curpD' , pdo.RazonSocial as 'Demandado' from expediente e join anexopdf a on e.id = a.id_expediente join persona pr on pr.id = e.id_Ppresenta join persona pd on pd.id = e.id_PDemandante join persona pdo on pdo.id = e.id_PDemandado;");
	$data=$arr->result_array();
	return $data;
}

public function save_demanda($jsonTabla,$tabla){
	$this->db->trans_begin();
	$this->db->insert($tabla,$jsonTabla);
	$last_id=$this->db->insert_id();

	if($this->db->trans_status() === FALSE){
		$this->db->trans_rollback();
		return 0;
	} else {
		$this->db->trans_commit();
		return $last_id;
	}
}

/*
ISMAEL
*/
public function per_exp(){
	$arr=$this->db->query("
		SELECT e.Id as id_expediente, e.expediente, DATE_FORMAT(e.fechasis, '%d-%m-%Y %T') as fechasis, pdo.id as id_razonsocial, pdo.RazonSocial as Demandado, pde.id as id_demandante, CONCAT(pde.Nombre,' ',pde.Apat,' ',pde.Amat) as Demandante, e.Descripcion as Resumen
		FROM expediente e
		INNER JOIN persona pde on pde.Id = e.id_PDemandante
		INNER JOIN persona pdo on pdo.Id = e.id_PDemandado
		WHERE e.Status = 1
		order by e.expediente desc");
	$data=$arr->result_array();
	return $data;
}
public function exp_x_sa($persona_id){
	if ($persona_id == 1 ) {
		$sql=$this->db->query("
		SELECT e.Id as id_expediente, e.expediente, DATE_FORMAT(e.fechasis, '%d-%m-%Y %T') as fechasis, pdo.id as id_razonsocial, pdo.RazonSocial as Demandado, pde.id as id_demandante, CONCAT(pde.Nombre,' ',pde.Apat,' ',pde.Amat) as Demandante, e.Descripcion as Resumen, en.FechaEnviado as FechaEnvio
		FROM expediente e
		INNER JOIN persona pde on pde.Id = e.id_PDemandante
		INNER JOIN persona pdo on pdo.Id = e.id_PDemandado
		INNER JOIN enviasa en on en.id_Exp = e.Id
		WHERE e.Status = 1
		group by e.Id
		order by e.expediente desc");
	}else{
		$sql=$this->db->query("
		SELECT e.Id as id_expediente, e.expediente,DATE_FORMAT(e.fechasis, '%d-%m-%Y %T') as fechasis, pdo.id as id_razonsocial, pdo.RazonSocial as Demandado, pde.id as id_demandante, CONCAT(pde.Nombre,' ',pde.Apat,' ',pde.Amat) as Demandante, e.Descripcion as Resumen, en.FechaEnviado as FechaEnvio
		FROM expediente e
		INNER JOIN persona pde on pde.Id = e.id_PDemandante
		INNER JOIN persona pdo on pdo.Id = e.id_PDemandado
		INNER JOIN enviasa en on en.id_Exp = e.Id
		WHERE e.Status = 1 and en.id_SA = ".$persona_id."
		group by e.Id
		order by e.expediente desc");
	}
	$data=$sql->result_array();
	return $data;
}
public function get_SA($id){
	$query=$this->db->query("
		SELECT p.id, CONCAT(p.Nombre,' ',p.Apat,' ',p.Amat) as persona
		FROM persona p
		INNER JOIN rolesperiodo rp on  rp.Idpersona = p.id
		WHERE rp.Idroles = ".$id.";");
	$array=$query->result_array();
	return $array;
}
function get_anexos($opts=array()) {
	$this->db->distinct();
	$this->db->select('DATE_FORMAT(a.FechaUp, "%d-%m-%Y %T") as FechaUp, a.PathAnexo,a.Folio, a.NomFile, act.Tipo ',FALSE)
	->from('anexopdf a')
	->join('acuerdotipo act', 'act.id = a.id_Tipo')
	->join('notificacion n','n.id_anexo = a.id','left');
	if (!empty($opts['id_expediente'])) {
		$this->db->where('a.id_expediente',$opts['id_expediente']);
	}
	$query=$this->db->get();
	return $query->result_array();
}
public function enviar($id_exp,$id_logeado,$id_sa) {

	$data = array('id_Exp' => $id_exp,
		'id_persona' 	=> $id_logeado,
		'id_SA' => $id_sa,
		'Status' => 1,
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

public function get_envios_sa(){
	$query=$this->db->query("
		SELECT e.id,e.id_Exp
		FROM enviasa e;");
	$array=$query->result_array();
	return $array;
}
public function get_ultimoexp(){
	$query=$this->db->query("
		SELECT if(max(e.expediente)+1 is NULL or max(e.expediente)+1 ='',1, max(e.expediente)+1) as 'Fexpediente'
		from expediente e" );
	$array=$query->result_array();
	return $array;

}
public function get_last_doc($id_exp){
	$query=$this->db->query("
		SELECT e.expediente as 'Fexpediente', a.Folio, cast(substring_index(a.Folio,'_',-1) as signed integer) as num
		from expediente e
		INNER JOIN anexopdf a on a.id_expediente = e.id
		WHERE a.id_expediente = $id_exp
		group by a.Folio
		order by num DESC
		limit 1" );
	$row = $query->row_array();
	return $row;
}
public function add_new_doc($folio,$tipo,$id_expediente,$path,$archivo_nombre,$op,$modulo,$fecha1,$obs,$tdesecha,$datelim,$id_invol,$rol){
	 $data = array('Folio' => $folio,
		'id_Tipo' 	=> $tipo,
		'id_expediente' => $id_expediente,
		'PathAnexo'=> $path,
		'NomFile'=> $archivo_nombre,
		'Status'=> '',
		'StatusCrea'=> '',
		);
	$this->db->insert('anexopdf',$data);
	$last_idanexo=$this->db->insert_id();
	$seguimiento = array(
		'idmodulo'=>$modulo,
		'id_op'=>$op,
		'mov'=>'insitu',
		'idexpediente' => $id_expediente,
		'id_Tseguimiento'=> '16',
		'Fecha'=> $fecha1,
		'anexopdf_id'=>$last_idanexo,
		'Comentarios'=> $obs,
		'Status1'=>'0'
	 );
	$this->db->insert('seguimiento',$seguimiento);
	$admite = array('id_exp' => $id_expediente,
					 'id_op' => $op,
					 'fecha' => $fecha1,
					 'obs'=> $obs,
					 'status'=>'0'
	 );
	$desecha = array('id_exp' => $id_expediente,
					 'id_op' => $op,
					 'dfecha' => $fecha1,
					 'tdesecha'=> $tdesecha,
					 'obs'=> $obs,
					 'status'=>'0'
		);

	if($tipo == 1){
		$this->db->insert('admision',$admite);
	}
	if($tipo == 4){
		$this->db->insert('desechado',$desecha);
	}
	if($rol == 5){
			$query=$this->db->query("SELECT p.id AS 'id_destper',if(Razonsocial is NULL or Razonsocial ='',concat(p.Nombre,' ', p.Apat,' ', p.Amat),Razonsocial)as 'razon', p.Email FROM involucrados i JOIN persona p on p.id = i.id_persona AND i.id_exp = ".$id_expediente.";");

	foreach ($query->result_array() as $row) {
	$notificacion = array('id_ac' =>$op ,
						   'id_destper'=>$row['id_destper'],//$id_invol,
						   'id_exp'=>$id_expediente,
						   'id_anexo'=>$last_idanexo,
						   'fechasol'=>$fecha1,
						   'fechalimite'=>$datelim,
						   'autosub'=>'1'
		 );
		$this->db->insert('notificacion',$notificacion);

	}

//	$array = $row->result_array();
//		$this->db->insert('notificacion',$notificacion);
		//return(json_decode($notificacion));
	}



}
public function recuperar_datos($email){
	$this->db->select("id,Usuario,AES_DECRYPT(Password,'sistema2016') as contrasena")
			 ->from('persona')
			 ->where('Email =', $email);

        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
        	return $query->result();
        }else{
            return false;
        }
}

public function get_tipoacuerdo($id){    // consulta para obtener todos los tipos de acuerdos
	$row=$this->db->query('SELECT * FROM acuerdotipo where nivels = '.$id.';');
	$array=$row->result_array();
	return $array;
}
public function get_tipodocumento(){
	$row=$this->db->query('SELECT * FROM Tipo;');
	$array=$row->result_array();
	return $array;
}

public function get_tipodesecha(){
	$row=$this->db->query('SELECT * FROM tipodesecha;');
	$array=$row->result_array();
	return $array;
}

public function get_involed($id){
	$row=$this->db->query("SELECT p.id AS 'id_persona',if(Razonsocial is NULL or Razonsocial ='',concat(p.Nombre,' ', p.Apat,' ', p.Amat),Razonsocial)as 'razon', p.Email FROM involucrados i JOIN persona p on p.id = i.id_persona AND i.id_exp = ".$id.";");
	$array = $row->result_array();
	return $array;
}
public function get_mailinvol($id){
	$row=$this->db->query("SELECT p.razonsocial as 'razon',p.Email FROM involucrados i JOIN persona p on p.id = i.id_persona AND i.id_exp = ".$id.";");
	$array = $row->result_array();
	return $array;
}

public function get_perfill($id){
	$row=$this->db->query("SELECT Nombre, Apat, Amat, IDoficial, NumeroIDOficial, Cel, Email, Tel, Usuario, domicilio, Colonia FROM persona p left join domicilio d on p.id = d.id_persona WHERE p.id = ".$id.";");
	$array = $row->result_array();
	return $array;
}
public function get_track(){
	$sql=$this->db->query("
		SELECT e.Id as id_expediente, e.expediente, DATE_FORMAT(e.fechasis, '%d-%m-%Y %T') as fechasis, pdo.id as id_razonsocial, pdo.RazonSocial as Demandado, pde.id as id_demandante, CONCAT(pde.Nombre,' ',pde.Apat,' ',pde.Amat) as Demandante, e.Descripcion as Resumen, DATE_FORMAT(en.FechaEnviado, '%d-%m-%Y %T') as FechaEnvio
		FROM expediente e
		INNER JOIN persona pde on pde.Id = e.id_PDemandante
		INNER JOIN persona pdo on pdo.Id = e.id_PDemandado
		LEFT JOIN enviasa en on en.id_Exp = e.Id
		WHERE e.Status = 1
		group by e.Id
		order by e.expediente desc");
		$data=$sql->result_array();
	return $data;
}
public function get_seguimiento($opts=array()){
	$this->db->SELECT('DATE_FORMAT(s.fechasis, "%d-%m-%Y %T") as fechasis,expediente,if(ap.Folio is null,"",ap.Folio) as Folio, ap.PathAnexo, ap.NomFile, s.mov,if(act.Tipo is null,"",act.Tipo) as "Tipox",TS.Tipo, if(act.Tipo is null,"",act.Tipo), m.modulo, concat(p.nombre," ",p.Apat," ",p.Amat) as "Responsable",if(s.Comentarios is null,"",s.Comentarios) as Comentarios',FALSE)
				->FROM('seguimiento s')
				->JOIN('modulo m', 'm.idmodulo = s.idmodulo')
				->JOIN('persona p','p.id = s.id_op')
				->JOIN('expediente e','e.id = s.idexpediente','left')
				->JOIN('tiposeguimiento TS','TS.Id_Ts = s.id_Tseguimiento','left')
				->JOIN('anexopdf ap','ap.id = s.anexopdf_id','left')
				->JOIN('acuerdotipo act','act.id = ap.id_Tipo','left');
	if (!empty($opts['id_expediente'])) {
		$this->db->where('s.idexpediente',$opts['id_expediente']);
		$this->db->order_by('s.fechasis','asc');
	}
	$query=$this->db->get();
	return $query->result_array();
}

public function val_curp($curp){
	$this->db->select("curp")
			 ->from('persona')
			 ->where('curp =', $curp);

        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
        	return 0;
        }else{
            return 1;
        }
}

/*************************GOGO*************************/
	public function nuevoproyecto($data){
		$this->db->insert('proyectos',$data);
	}
	public function editproy($data){
		$this->db->where('nombre', $data['nombre']);
		$this->db->update('proyectos',array('estado'=>$data['status']));
	}
	public function editproym($data2){
		$this->db->where('nombre', $data2['nombre']);
		$this->db->update('proyectos',array('estado'=>$data2['status'],'comentarios'=>$data2['comentarios']));
	}

	public function getlac(){
		$query=$this->db->query("
			SELECT e.id,e.Tipo
			FROM acuerdotipo e;");
		$array=$query->result_array();
		return $array;
	}
	public function insertmov($datos){
		date_default_timezone_set('America/Mexico_City');
		$time = time();
		$fecha = date("Y-m-d H:i:s", $time);
		$this->db->insert('seguimiento',array('idmodulo'=>5,'id_op'=>$datos['id'],'mov'=>'in',
			'idexpediente'=>$datos['expediente'],'id_Tseguimiento'=>13,'Fecha'=>$time,'Comentarios'=>"En proceso de redacción"));
	}
	public function insertmovm($datos){
		date_default_timezone_set('America/Mexico_City');
		$time = time();
		$fecha = date("Y-m-d H:i:s", $time);
		$row=$this->db->query('SELECT expediente FROM proyectos where nombre = '."'".$datos['archivored']."'");
		$array=$row->result_array();
		$this->db->insert('seguimiento',array('idmodulo'=>5,'id_op'=>$datos['id'],'mov'=>'out',
			'idexpediente'=>$array[0]['expediente'],'id_Tseguimiento'=>14,'FechaVisto'=>$fecha,'Comentarios'=>"Enviado a revisión"));
		$this->db->insert('enviasa',array('id_Exp'=>$array[0]['expediente'],'id_persona'=>$datos['id'],'id_SA'=>10,'Status'=>1));
	}
	
	public function getarc($estado){
		$row=$this->db->query('SELECT * FROM proyectos where estado = '.$estado);
		$array=$row->result_array();
		return $array;
	}
	public function getsent(){
		$row=$this->db->query('SELECT DISTINCT * FROM anexopdf WHERE id_Tipo = 26');
		$array=$row->result_array();
		return $array;
	}
	public function datarc($archivo){
		$row2=$this->db->query('SELECT * FROM proyectos where nombre = '.$archivo);
		$array2=$row2->result_array();
		return array_unique($array2);
	}
	public function getexpe($expediente){
		$arr=$this->db->query("select *, pd.Nombre as 'Demandante', pd.Apat as 'ApatD', pd.Amat as 'AmatD', pd.CURP as 'curpD' , pdo.RazonSocial as 'Demandado' from expediente e join anexopdf a on e.id = a.id_expediente join persona pr on pr.id = e.id_Ppresenta join persona pd on pd.id = e.id_PDemandante join persona pdo on pdo.id = e.id_PDemandado where id_expediente=".$expediente);
		$data=$arr->result_array();
		return $data;
	}


/******************************************************/
}//mLogin

?>
