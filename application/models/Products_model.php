<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model
{
	public function __construct()
	{
		parent:: __construct();
	}
	
public function get($id = null){
        if(!is_null($id)){
		   $query = $this->db->query("select * from `tec_productos` where id = ".$id);
		   
		   if($query->num_rows() === 1){
			   return $query->row_array();
		    }
		   
		   return false;
	    }
		
	   $query = $this->db->query("select * from `tec_productos`");
	   
	   if($query->num_rows() > 0){
			return $query->result_array();
	    }
		   
		return false;       
   }

   public function insert($product)
   {    
       $this->db->set($this->_products($product))->insert('tec_productos');

       if($this->db->affected_rows() === 1)
       {    
           return $this->db->insert_id();
       }
         
        return false;
   }

   public function update($id,$product)
   {
	   $this->db->set($this->_product($product))->where('id', $id)->update('tec_productos');

       if($this->db->affected_rows() === 1)
       {    
           return true;
       }
         
        return false;
   }

   public function delete($id){
       $result = $this->db->query("delete from `tec_productos` where id = $id");
       if($result)
       {
           return true;
       }
       
	   return false;       
   }
   
   private function _product($product)
   {
	    return array(
			'id' => $product['id'],
			'producto' => $product['producto'],
			'precio' => $product['precio'],
			'imagen' => $product['imagen']
		);
   }
}