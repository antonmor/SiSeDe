<?php
class mLogin2 extends CI_Model{	
	public function loggin($usr,$pass){		 
		$var= $this->db->query("
			SELECT p.id, CONCAT(p.Nombre,' ',p.Apat,' ',p.Amat) as Nombre, r.idRoles, r.Tipo
			FROM persona p
			INNER JOIN rolesperiodo rp on rp.idPersona=p.id
			INNER JOIN rol r on r.idRoles=rp.idRoles
			WHERE rp.Status = 1 and p.Usuario = '$usr' and 
			AES_DECRYPT(p.Password,'sistema2016') = '$pass'");
			//p.Password='$pass'");	
		return $var->result();  
	}
	public function persona($param,$idRoles)
	{
if($idRoles == 7)

$cad1="SELECT p.id, concat(p.Nombre,' ',p.Apat,' ',p.Amat) as 'Nombre' from 
(Persona p join RolesPeriodo rp on rp.idPersona=p.id 
and rp.status=1
and (idRoles = ".$idRoles.")
)join Rol r on r.idroles=rp.idroles  
left join Domicilio d on d.id_persona = p.id
WHERE (p.nombre like '%".$param."%') or (p.Apat like '%".$param."%')";
//$cad1="SELECT id, Nombre FROM Persona WHERE id=12;";
else
	if($idRoles == 8) {
		$cad1 = "SELECT p.id, p.RazonSocial as 'razon'  from 
		(persona p join RolesPeriodo rp on rp.idPersona=p.id 
		and rp.status=1
		and (idRoles = ".$idRoles.")
		)join Rol r on r.idroles=rp.idroles  
		left join Domicilio d on d.id_persona = p.id
		where (p.RazonSocial like '%".$param."%')";
	}
	$var=$this->db->query($cad1); 
	//print_r($cad1);  
	return $var->result();

}
//encryption_key
public function save_bd($tipo,$nombre,$apat,$amat,$rsocial,$genero,$identificacion,$referencia,$tf,$movil,$email,$cemail,$Estado,$Municipio,$Dom,$interior,$exterior,$cp,$Estado1,$Municipio1,$Dom1,$interior1,$exterior1,$cp1,$refe,$user,$pass,$curp){
	$this->db->trans_begin();
	$this->db->query("call PersonaDom "."('" .$tipo ."','" .$nombre ."','" .$apat ."','" .$amat ."','" .$rsocial ."','" .$genero ."','" .$identificacion ."','" .$referencia ."','" .$tf ."','" .$movil ."','" .$email ."','" .$cemail ."','" .$Estado ."','" .$Municipio ."','" .$Dom ."','" .$interior ."','" .$exterior ."','" .$cp ."','" .$Estado1 ."','" .$Municipio1 ."','" .$Dom1 ."','" .$interior1 ."','" .$exterior1 ."','" .$cp1 ."','" .$refe ."','" .$user ."','" .$pass ."','" .$curp ."');");
	if($this->db->trans_status() === FALSE){
		$this->db->trans_rollback();
		return 0;
	} else {
		$this->db->trans_commit();
		return 1;
	}

}//save_bd

public function getExp(){

	$arr=$this->db->query("select *, pd.Nombre as 'Demandante', pd.Apat as 'ApatD', pd.Amat as 'AmatD', pd.CURP as 'curpD' , pdo.RazonSocial as 'Demandado' from Expediente e join AnexoPDF a on e.id = a.id_Expediente join Persona pr on pr.id = e.id_Ppresenta join Persona pd on pd.id = e.id_PDemandante join Persona pdo on pdo.id = e.id_PDemandado;");
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
public function per_exp($id){
	$arr=$this->db->query("
		SELECT e.Id as id_expediente, e.Expediente, e.Fecha, pdo.id as id_razonsocial, pdo.RazonSocial as Demandado, pde.id as id_demandante, CONCAT(pde.Nombre,' ',pde.Apat,' ',pde.Amat) as Demandante, e.Descripcion as Resumen
		FROM expediente e
		INNER JOIN persona pde on pde.Id = e.id_PDemandante and e.id_PDemandante = $id
		INNER JOIN persona pdo on pdo.Id = e.id_PDemandado
		WHERE e.Status = 1
		order by e.Expediente desc");
	$data=$arr->result_array();
	return $data;
}
public function exp_x_sa($Persona_id){
		$sql=$this->db->query("
		SELECT e.Id as id_expediente, e.Expediente, e.Fecha, pdo.id as id_razonsocial, pdo.RazonSocial as Demandado, pde.id as id_demandante, CONCAT(pde.Nombre,' ',pde.Apat,' ',pde.Amat) as Demandante, e.Descripcion as Resumen, en.FechaEnviado as FechaEnvio
		FROM expediente e
		INNER JOIN persona pde on pde.Id = e.id_PDemandante
		INNER JOIN persona pdo on pdo.Id = e.id_PDemandado
		INNER JOIN enviasa en on en.id_Exp = e.Id
		WHERE e.Status = 1 and en.id_SA = ".$Persona_id."
		order by e.Expediente asc");	
	$data=$sql->result_array();
	return $data;
}
public function get_SA($id){
	$query=$this->db->query("
		SELECT p.id, CONCAT(p.Nombre,' ',p.Apat,' ',p.Amat) as Persona
		FROM persona p
		INNER JOIN rolesperiodo rp on  rp.IdPersona = p.id
		WHERE rp.IdRoles = ".$id.";");
	$array=$query->result_array();
	return $array;
}
function get_anexos($opts=array()) {
	$this->db->from('anexopdf');
	$this->db->join('AcuerdoTipo', 'AcuerdoTipo.id = anexopdf.id_Tipo');
	$this->db->join('notificacion','notificacion.id_anexo = anexopdf.id','left');
	if (!empty($opts['id_Expediente'])) {
		$this->db->where('id_Expediente',$opts['id_Expediente']);
	}
	$query=$this->db->get();
	return $query->result_array();
}
public function enviar($id_exp,$id_logeado,$id_sa) {

	$data = array('id_Exp' => $id_exp,
		'id_Persona' 	=> $id_logeado,
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
		SELECT max(e.Expediente)+1 as 'FExpediente' 
		from Expediente e" );
	$array=$query->result_array();
	return $array;

}
public function get_last_doc($id_exp){
	$query=$this->db->query("
		SELECT e.Expediente as 'FExpediente', a.Folio, cast(substring_index(a.Folio,'_',-1) as signed integer) as num
		from expediente e
		INNER JOIN anexopdf a on a.id_Expediente = e.id
		WHERE a.id_Expediente = $id_exp
		group by a.Folio
		order by num DESC
		limit 1" );
	$row = $query->row_array();
	return $row;
}
public function add_new_doc($folio,$tipo,$id_expediente,$path,$archivo_nombre,$op,$modulo,$fecha1,$obs,$tdesecha,$datelim,$id_invol){
	$data = array('Folio' => $folio,
		'id_Tipo' 	=> $tipo,
		'id_Expediente' => $id_expediente,
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
		'idExpediente' => $id_expediente,
		'id_Tseguimiento'=> '16',
		'Fecha'=> $fecha1,
		'AnexoPDF_id'=>$last_idanexo,
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
	$notificacion = array('id_ac' =>$op ,
						   'id_destper'=>$id_invol,
						   'id_exp'=>$id_expediente,
						   'id_anexo'=>$last_idanexo,
						   'fechasol'=>$fecha1.' curtime()',
						   'fechalimite'=>$datelim,
						   'autosub'=>'1'
		 );

	if($tipo == 1){
		$this->db->insert('admision',$admite);	
	}
	if($tipo == 4){
		$this->db->insert('desechado',$desecha);
	}
	if($op == 5){
		$this->db->insert('notificacion',$notificacion);
	}



}
public function recuperar_datos($email){
	$this->db->select('id,Usuario,Password')
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
	$row=$this->db->query('SELECT * FROM AcuerdoTipo where nivels = '.$id.';');
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
	$row=$this->db->query("SELECT p.id AS 'id_persona',if(Razonsocial is NULL,concat(p.Nombre,' ', p.Apat,' ', p.Amat),Razonsocial)as 'razon' FROM involucrados i JOIN persona p on p.id = i.id_persona AND i.id_exp = ".$id.";");
	$array = $row->result_array();
	return $array;
}

public function get_perfill($id){
	$row=$this->db->query("SELECT Nombre, Apat, Amat, IDoficial, NumeroIDOficial, Cel, Email, Tel, Usuario, Domicilio, Colonia FROM Persona p left join Domicilio d on p.id = d.id_Persona WHERE p.id = ".$id.";");
	$array = $row->result_array();
	return $array;
}

}//mLogin

?>