<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'vendor/chriskacerguis/codeigniter-restserver/application/libraries/REST_Controller.php';
require APPPATH . 'vendor/chriskacerguis/codeigniter-restserver/application/libraries/Format.php';

use Restserver\Libraries\REST_Controller;
/**
 *
 * Controller Editoriales
 *
 * This controller for ...
 *
 * @category  Controller
 * @author    Raul Guerrero <r.g.c@me.com>
 * @param     ...
 * @return    ...
 *
 */

class Editoriales extends REST_Controller
{
    
  public function __construct()
  {
	parent::__construct();
	$this->load->database();
  }

  public function index_get()
  {
	$this->db->order_by('id', 'asc');
	$query = $this->db->get('editoriales');
	$this->response($query->result_array());
  }

  public function index()
  {
    // 
  }

}


/* End of file Editoriales.php */
/* Location: ./application/controllers/Editoriales.php */
