<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH.'vendor/chriskacerguis/codeigniter-restserver/application/libraries/REST_Controller.php';
require APPPATH.'vendor/chriskacerguis/codeigniter-restserver/application/libraries/Format.php';

use Restserver\Libraries\REST_Controller;
/**
 *
 * Controller Auth
 *
 * This controller for ...
 *
 * @category  Controller
 * @author    Raul Guerrero <r.g.c@me.com>
 * @param     ...
 * @return    ...
 *
 */

class Auth extends REST_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function token_post()
  {
	$user = $this->post('username');
	$pswd = $this->post('pswd');

	if ($this->valid_user_pswd($user,$pswd)){
        $tokenData = array();
        $tokenData['header'] = array("typ" => "JWT", "alg" => "HS256");
        $tokenData['payload'] = array(
            'sub' => $user,
            'exp' => time() + (7 * 24 * 60 * 60),
            'iat' => time(),
            'jti' => 1
        ); 
        $output['token'] = AUTHORIZATION::generateToken($tokenData);
        $this->set_response($output, REST_Controller::HTTP_OK);
    } else
    {
       $this->set_response("Unauthorized", REST_Controller::HTTP_UNAUTHORIZED);
    } 
  }

  	public function valid_user_pswd($user,$pswd){
		return true;
	}

}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
