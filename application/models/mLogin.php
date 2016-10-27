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
			");	// nuevo comentario	
		// prueba de hoy
		return $var->result();
	}
	public function persona($idRoles)
	{
	    $var=$this->db->query("select * from 
			(persona p join RolesPeriodo rp on rp.idPersona=p.id 
			and rp.status=1
            and idRoles = ".$idRoles." )join Rol r on r.idroles=rp.idroles;");
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
}//mLogin

?>