<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Languages_model
 * Class objective is to perform Package related tasks
 */
class Languages_model extends CI_Model
{
	public function save($data){
		$this->db->insert('site_languages', $data);
		return $this->db->insert_id();
	}

	public function get_all_languages(){
		$query = $this->db->get('site_languages');
		return $result = $query->result();
	}

	public function edit($data, $id){
		$this->db->where('id', $id);
		$this->db->update('site_languages', $data);
		return $id;

	}

	public function get_language_by_id($id){
		$query = $this->db->get_where('site_languages', array('id' => $id));
		return $result = $query->row();
	}

	public function delete($id) {
		$this->db->delete('site_languages', array('id' => $id));
		return true;
	}

	public function set_default_language($id){
		$language = $this->get_language_by_id($id);
		$this->db->update('settings', array('default_language' => $language->directory_name)); // setting in General settings table

		$this->db->update('site_languages', array('is_default' => 0)); // setting all previous to 0

		$this->db->where('id', $id);
		$this->db->update('site_languages', array('is_default' => 1));
		return true;

	}

}
