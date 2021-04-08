<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';

class Users extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}
	
	public function list_get()
	{
		$users = $this->users_model->list();
		
		if(!is_null($users)) {
			$this->response(array('response' => $users), 200);
		} else {
			$this->response(array('error' => 'No hay usuarios'), 404);
		}
	}
	
	public function find_get($id)
	{
		if(!$id) {
			$this->response(null, 400);
		}
		
		$user = $this->users_model->list($id);
		
		if (!is_null($user)) {
			$this->response(array('response' => $user), 200);
		} else {
			$this->response(array('error' => 'No existe ese usuario'), 404);
		}		
	}
	
	public function user_post()
	{
		if(!$this->post('user')) {
			$this->response(null, 400);
		}
		
		$id = $this->users_model->insert($this->post('user'));
		
		if(!is_null($id)) {
			$this->response(array('response' => $id), 200);
		} else {
			$this->response(array('error' => 'Error en el Servidor'), 400);
		}
	}
	
	public function user_put($id)
	{
		if(!$this->post('user') || $id) {
			$this->response(null, 400);
		}
		
		$update = $this->users_model->update($this->post('user'));
		
		if(!is_null($update)) {
			$this->response(array('response' => 'Usuario actualizado correctamente'), 200);
		} else {
			$this->response(array('error' => 'Error en el Servidor'), 400);
		}		
	}
	
	public function user_delete($id)
	{
		if(!$id){
			$this->response(null, 400);
		}
		
		$delete = $this->users_model->delete($id);
		
		if(!is_null($delete)) {
			$this->response(array('response' => 'Usuario eliminado correctamente'), 200);
		} else {
			$this->response(array('error' => 'Error en el Servidor'), 400);
		}
	}
}
