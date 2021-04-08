<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buys_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}
	
public function list($id = null){
        if(!is_null($id)){
		   $query = $this->db->query("select * from `tec_compras` where user_id = ".$id);
		   
		   if($query->num_rows() === 1){
			   return $query->row_array();
		    }
		   
		   return false;
	    }
		
	   $query = $this->db->query("select * from `tec_compras`");
	   
	   if($query->num_rows() > 0){
			return $query->result_array();
	    }
		   
		return false;       
   }

   public function insert($compra)
   {    
       $this->db->set($this->_compra($compra))->insert('tec_compras');

       if($this->db->affected_rows() === 1)
       {    
           return true;
       }
         
        return false;
   }

   public function update($id,$compra)
   {
	   $this->db->set($this->_compra($compra))->where('user_id', $id)->update('tec_compras');

       if($this->db->affected_rows() === 1)
       {    
           return true;
       }
         
        return false;
   }

   public function delete($user_id, $product_id){
       $result = $this->db->query("delete from `tec_compras` where user_id = $user_id and product_id = $product_id");
       if($result)
       {
           return true;
       }
       
	   return false;       
   }
   
   private function _compra($compra)
   {
	    return array(
			'user_id' => $compra['user_id'],
			'product_id' => $compra['product_id']);
   }
}