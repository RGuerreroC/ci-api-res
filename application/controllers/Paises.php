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
  }

  public function index()
  {
    // 
  }

}


/* End of file Paises.php */
/* Location: ./application/controllers/Paises.php */
