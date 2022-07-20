<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UsuarioModel extends CI_Model
{
	public function __construct()
    {
       parent::__construct();   
       $this->load->database(); 
    }

    public function get_usuario($user, $pass){
    	try {
    		$data =	$this->db->query("CALL universidad.getusuario ('$user', '$pass')");
    		return $data;
    	} catch (Exception $e) {
    		echo $this->db->last_query();
			return "ocurrio un error.";
    	}
    }
    public function getUsuarios(){
    	try {
    	 $res = $this->db->get("tbl_usuario");
    	 return $res->result();
    	} catch (Exception $e) {
    		echo $this->db->last_query();
			return "ocurrio un error.";
    	}
    }

    public function getinfoUsuario($id){
    	try {
    		$this->db->where("id",$id);
    	 $res = $this->db->get("tbl_usuario");
    	 return $res->result();
    	} catch (Exception $e) {
    		echo $this->db->last_query();
			return "ocurrio un error.";
    	}	
    }
    public function addUsuario($data){
    	try {
			$this->db->insert('tbl_usuario', $data);
			return true;
		} catch (Exception $e) {
			echo $this->db->last_query();
			return "ocurrio un error.";
		}
    }

    public function deleteUsuario($id){
    	try {
    		$this->db->where("id",$id);
			$this->db->delete('tbl_usuario');
			return true;
		} catch (Exception $e) {
			echo $this->db->last_query();
			return "ocurrio un error.";
		}
    }
    public function editUsuario($data,$id){
    	try {
    		$this->db->where("id",$id);
			$this->db->update('tbl_usuario',$data);
			return true;
		} catch (Exception $e) {
			echo $this->db->last_query();
			return "ocurrio un error.";
		}
    }
}