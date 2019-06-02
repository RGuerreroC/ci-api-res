<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'vendor/chriskacerguis/codeigniter-restserver/application/libraries/REST_Controller.php';
require APPPATH . 'vendor/chriskacerguis/codeigniter-restserver/application/libraries/Format.php';

use Restserver\Libraries\REST_Controller;
/**
 *
 * Controller Paises
 *
 * This controller for ...
 *
 * @category  Controller
 * @author    Raul Guerrero <r.g.c@me.com>
 * @param     ...
 * @return    ...
 *
 */

class Paises extends REST_Controller
{
    
  public function __construct()
  {
	parent::__construct();
	$this->load->model('pais_model');
  }

  public function index_get($nombre=FALSE)
  {
	if($nombre===FALSE)
	{
		$response = $this->pais_model->getAll();
	}
	else
	{
		$response = $this->pais_model->getSingle($nombre);
	}

	$this->response($response);
  }

  public function index_post()
  {
	$arr_postData = json_decode($this->post('new'),true);
	$obj_postData = json_decode($this->post('new'));
	$validateJson = $this->validateJson($arr_postData);

	if($validateJson['status'] == 'success'){
		$model_call = true;
		$model_response = $this->pais_model->add($obj_postData);
	}else{
		$model_call = false;
		$model_response = '';
	}
	$this->response(array("data" => $obj_postData, "validation" => $validateJson, "model" => array("call" => $model_call, "response" => $model_response)));
  }

  public function index_put()
  {
	  $id = $this->input->get('id');
	  $arr_postData = json_decode($this->put('edit'),true);
	  $obj_postData = json_decode($this->put('edit'));
	  $validateJson = $this->validateJson($arr_postData);

	  if($validateJson['status'] == 'success')
	  {
		  $model_call = true;
		  $model_response = $this->pais_model->edit($id, $obj_postData);
	  }
	  else
	  {
		$model_call = false;
		$model_response = '';
	  }

	  $this->response(array("ID" => $id, "data" => $obj_postData, "validation" => $validateJson, "model" => array("call" => $model_call, "response" => $model_response)));
  }

  public function index_delete()
  {
	$id = $this->input->get('id');

	$model_response = $this->editorial_model->delete($id);
	$this->response(array("ID" => $id, "model_response" => $model_response));
  }

  private function validateJson($postData, $maxData=1)
  {
	  if ($postData == null) return array("status" => "error", "msg" => "No se han recibido datos");
	  if(sizeof($postData) > $maxData) return array("status" => "error", "msg" => "Hay demasiados parametros");
	  if (!isset($postData['nombre'])) return array("status" => "error", "msg" => "Faltan datos");
	  if ($postData['nombre'] === '' || $postData['nombre'] === null) return array("status" => "error", "msg" => "Falta el nombre de la editorial");


	  return array("status" => "success", "msg" => "Todo correcto");
  }
}


/* End of file Paises.php */
/* Location: ./application/controllers/Paises.php */
