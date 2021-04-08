<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';

class Buys extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('buys_model');
	}
	
	public function list_get()
	{
		$buys = $this->buys_model->list();
		
		if(!is_null($buys)) {
			$this->response(array('response' => $buys), 200);
		} else {
			$this->response(array('error' => 'No hay compras'), 404);
		}
	}
	
	public function find_get($id)
	{
		if(!$id) {
			$this->response(null, 400);
		}
		
		$buy = $this->buys_model->list($id);
		
		if (!is_null($buy)) {
			$this->response(array('response' => $buy), 200);
		} else {
			$this->response(array('error' => 'No existe esa compra'), 404);
		}		
	}
	
	public function buy_post()
	{
		if(!$this->post('buy')) {
			$this->response(null, 400);
		}
		
		$id = $this->buys_model->insert($this->post('buy'));
		
		if(!is_null($id)) {
			$this->response(array('response' => $id), 200);
		} else {
			$this->response(array('error' => 'Error en el Servidor'), 400);
		}
	}
	
	public function buy_put($id)
	{
		if(!$this->post('buy') || $id) {
			$this->response(null, 400);
		}
		
		$update = $this->buys_model->update($this->post('buy'));
		
		if(!is_null($update)) {
			$this->response(array('response' => 'Compra actualizada correctamente'), 200);
		} else {
			$this->response(array('error' => 'Error en el Servidor'), 400);
		}		
	}
	
	public function buy_delete($id)
	{
		if(!$id){
			$this->response(null, 400);
		}
		
		$delete = $this->buys_model->delete($id);
		
		if(!is_null($delete)) {
			$this->response(array('response' => 'Compra eliminada correctamente'), 200);
		} else {
			$this->response(array('error' => 'Error en el Servidor'), 400);
		}
	}
}
