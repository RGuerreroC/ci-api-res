<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Editorial_model
 *
 * This Model for ...
*
 * @category	Model
 * @author    Raul Guerrero <r.g.c@me.com>
 * @param     ...
 * @return    ...
 *
 */

class Editorial_model extends CI_Model {

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
	$query = $this->db->get('editoriales');

	return $query->result_array();
  }

  public function getSingle($nombre)
  {
	$query = $this->db->get_where('editoriales', array('nombre' => $nombre));
	
	return $query->result_array();
  }

  public function add($data)
  {
	return $this->db->insert('editoriales', $data);
  }

  public function edit($id, $data)
  {
	$query = $this->db->get_where('editoriales', array('id' => $id));
	$old = $query->result_array();
	$this->db->where('id', $id);
	foreach ($data as $key => $value) {
		$this->db->set($key, $value);
	}

	return array("response" => $this->db->update('editoriales'), "old_data" => $old);
  }

  public function delete($id)
  {
	$query = $this->db->get_where('editoriales', array('id' => $id));
	$old = $query->result_array();

	return array("response" => $this->db->delete('editoriales', array('id' => $id)), "old_data" => $old);
  }
  // ------------------------------------------------------------------------
}

/* End of file Editorial_model.php */
/* Location: ./application/models/Editorial_model.php */
