<?php
class mLogin extends CI_Model{	
	//funcion para realizar logeo y variables de sesion atrae los datos de la persona, domicilio, rol
	public function loggin($usr,$pass){		 
		$var= $this->db->query("
			select * from 
			(persona p join RolesPeriodo rp on rp.idPersona=p.id 
				and rp.status=1
			    and p.usuario='".$usr."'
			    and p.password='".$pass."') 
			 join Rol r on r.idroles=rp.idroles
			 left join Domicilio d on d.id_persona = p.id and d.status=1;
			");	
		 return $var->result();  
		
	}
	public function persona($param,$idRoles)
	{
	  /*  $var=$this->db->query("select p.id as id,CONCAT(Nombre,' ',Apat,' ',Amat) as NAME from 
			(persona p join RolesPeriodo rp on rp.idPersona=p.id 
			and rp.status=1
            and (idRoles = 7))join Rol r on r.idroles=rp.idroles  
            left join Domicilio d on d.id_persona = p.id;");  //idRoles corresponde a los usuarios externos
	  */
    if($idRoles == 7)
     $cad1="select *,p.id as idFisica  from 
			(persona p join RolesPeriodo rp on rp.idPersona=p.id 
			and rp.status=1
            and (idRoles = ".$idRoles.")
            )join Rol r on r.idroles=rp.idroles  
            left join Domicilio d on d.id_persona = p.id
			where (p.nombre like '%".$param."%') or (p.Apat like '%".$param."%')";
      else
     if($idRoles == 8) {
     	$cad1 = "select *,p.id as idFisica  from 
			(persona p join RolesPeriodo rp on rp.idPersona=p.id 
			and rp.status=1
            and (idRoles = ".$idRoles.")
            )join Rol r on r.idroles=rp.idroles  
            left join Domicilio d on d.id_persona = p.id
			where (p.RazonSocial like '%".$param."%')";
						}
        $var =$this->db->query($cad1);   

       return $var->result();
            				
	}

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
	//	$var= $this->db->query("call Expediente;");
	//	return $var->result_array();
	$arr=$this->db->query("select *, pd.Nombre as 'Demandante', pd.Apat as 'ApatD', pd.Amat as 'AmatD', pd.CURP as 'curpD' , pdo.RazonSocial as 'Demandado' from Expediente e join AnexoPDF a on e.id = a.id_Expediente join Persona pr on pr.id = e.id_Ppresenta join Persona pd on pd.id = e.id_PDemandante join Persona pdo on pdo.id = e.id_PDemandado;");
		//$arr=$this->db->query("call Expediente();");
			$data=$arr->result_array();
			return $data;
		}

	public function save_demanda($jsonTabla,$tabla){
		$this->db->trans_begin();
		$this-> db->insert($tabla,$jsonTabla);
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
		SELECT e.Id as id_expediente, e.Fecha, pdo.id as id_razonsocial, pdo.RazonSocial as Demandado, pde.id as id_demandante, CONCAT(pde.Nombre,' ',pde.Apat,' ',pde.Amat) as Demandante, e.Descripcion as Resumen
		FROM expediente e
		INNER JOIN persona pde on pde.Id = e.id_PDemandante
		INNER JOIN persona pdo on pdo.Id = e.id_PDemandado;");

		$data=$arr->result_array();
		return $data;
	}
	public function get_SA(){
		$query=$this->db->query("
		SELECT p.id, CONCAT(p.Nombre,' ',p.Apat,' ',p.Amat) as Persona
		FROM persona p
		INNER JOIN rolesperiodo rp on  rp.IdPersona = p.id
		WHERE rp.IdRoles = 3;");
		$array=$query->result_array();
		return $array;
	}
	function get_anexos($opts=array()) {
		$this->db->from('anexopdf');
		if (!empty($opts['id_Expediente'])) {
			$this->db->where('id_Expediente',$opts['id_Expediente']);
		}
		$query=$this->db->get();
		return $query->result();
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

	public function get_envios_sa(){
		$query=$this->db->query("
		SELECT e.id,e.id_Exp 
		FROM enviasa e;");
		$array=$query->result_array();
		return $array;
	}
//obtiene el ultimo expediente y lo incrementa en 1
	public function get_ultimoexp(){ 

		/*concat(date_format(now(),'%m%y'),'-',*/

		$query=$this->db->query("
			SELECT max(e.Expediente)+1 as 'FExpediente' 
			from Expediente e" );
		$array=$query->result_array();
		return $array;

	}



}//mLogin

?>