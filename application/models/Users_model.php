<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}
	
public function list($id = null){
        if(!is_null($id)){
		   $query = $this->db->query("select * from `tec_usuarios` where user_id = ".$id);
		   
		   if($query->num_rows() === 1){
			   return $query->row_array();
		    }
		   
		   return false;
	    }
		
	   $query = $this->db->query("select * from `tec_usuarios`");
	   
	   if($query->num_rows() > 0){
			return $query->result_array();
	    }
		   
		return false;       
   }

   public function insert($user)
   {    
       $this->db->set($this->_user($user))->insert('tec_usuarios');

       if($this->db->affected_rows() === 1)
       {    
           return $this->db->insert_id();
       }
         
        return false;
   }

   public function update($id,$user)
   {
	   $this->db->set($this->_user($user))->where('user_id', $id)->update('tec_usuarios');

       if($this->db->affected_rows() === 1)
       {    
           return true;
       }
         
        return false;
   }

   public function delete($id){
       $result = $this->db->query("delete from `tec_usuarios` where user_id = $id");
       if($result)
       {
           return true;
       }
       
	   return false;       
   }
   
   private function _user($user)
   {
	    return array(
			'user_id' => $user['user_id'],
			'user_name' => $user['user_name'],
			'user_password' => $user['user_password'],
			'user_type' => $user['user_type'],
			'nombre' => $user['nombre'],
			'sexo' => $user['sexo'],
			'idioma' => $user['idioma'],
			'pais' => $user['pais'],
			'estrellas' => $user['estrella'],
			'puntuacion' => $user['puntuacion'],
			'nivel' => $user['nivel']
		);
   }
}