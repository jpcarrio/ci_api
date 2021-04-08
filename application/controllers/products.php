<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';

class Products extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('products_model');
	}
	
	public function list_get()
	{
		$products = $this->products_model->get();
		
		if(!is_null($products)) {
			$this->response(array('response' => $products), 200);
		} else {
			$this->response(array('error' => 'No hay Productos'), 404);
		}
	}
	
	public function find_get($id)
	{
		if(!$id) {
			$this->response(null, 400);
		}
		
		$product = $this->products_model->get($id);
		
		if (!is_null($product)) {
			$this->response(array('response' => $product), 200);
		} else {
			$this->response(array('error' => 'No existe ese producto'), 404);
		}		
	}
	
	public function product_post()
	{
		if(!$this->post('product')) {
			$this->response(null, 400);
		}
		
		$id = $this->products_model->insert($this->post('product'));
		
		if(!is_null($id)) {
			$this->response(array('response' => $id), 200);
		} else {
			$this->response(array('error' => 'Error en el Servidor'), 400);
		}
	}
	
	public function product_put($id)
	{
		if(!$this->post('product') || $id) {
			$this->response(null, 400);
		}
		
		$update = $this->products_model->update($this->post('product'));
		
		if(!is_null($update)) {
			$this->response(array('response' => 'Producto actualizado correctamente'), 200);
		} else {
			$this->response(array('error' => 'Error en el Servidor'), 400);
		}		
	}
	
	public function product_delete($id)
	{
		if(!$id){
			$this->response(null, 400);
		}
		
		$delete = $this->products_model->delete($id);
		
		if(!is_null($delete)) {
			$this->response(array('response' => 'Producto eliminado correctamente'), 200);
		} else {
			$this->response(array('error' => 'Error en el Servidor'), 400);
		}
	}
}
