<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Pais_model
 *
 * This Model for ...
*
 * @category	Model
 * @author    Raul Guerrero <r.g.c@me.com>
 * @param     ...
 * @return    ...
 *
 */

class Pais_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
	parent::__construct();
	$this->load->database();
  }

  // ------------------------------------------------------------------------
  public function getAll()
  {
	  $this->db->order_by('nombre', 'asc');
	  $query = $this->db->get('paises');

	  return $query->result_array();
  }

  public function getSingle($nombre)
  {
	$query = $this->db->get_where('editoriales', array('nombre' => $nombre));

	return $query->result_array();
  }

  public function add($data)
  {
	  return $this->db->insert('paises', $data);
  }

  public function edit($id, $data)
  {
	  $query = $this->db->get_where('paises', array('id' => $id));
	  $old = $query->result_array();

	  $query = $this->db->where('id', $id);
	  foreach ($data as $key => $value) {
		  $this->db->set($key, $value);
	  }

	  return array("response" => $this->db->update('paises'), "old_data" => $old);
  }

  // ------------------------------------------------------------------------
  
}

/* End of file Pais_model.php */
/* Location: ./application/models/Pais_model.php */
