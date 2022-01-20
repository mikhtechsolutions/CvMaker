<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Award
 * Primary objective of this class is to perform CRUD operations on DB in education Award.
 */
class Layout_model extends CI_Model
{
	/**
	 * @param $user_id
	 * @return array
	 */
	function get_layout_by_user_id($user_id)
	{
		$this->db->select('layout_id');
		$this->db->from('user_layout');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		if ($query) {
			if ($query->num_rows()) {
				return $query->row()->layout_id;
			}
		}
		return 0;
	}

	/**
	 * @return array
	 */

	function get_layouts($type = null)
	{
		$this->db->select();
		$this->db->from('layouts');
		if ($type == 'F') {
			$this->db->where('type', $type);
		}
		$query = $this->db->get();
		if ($query) {
			return $query->result();
		}
		return [];
	}

	/**
	 * @param $data
	 * @return mixed
	 */
	public function save($data){
		$this->db->insert('layouts',$data);
		return $this->db->insert_id();
	}

	/**
	 *
	 */

	function save_user_layout($data)
	{
		if (!$this->delete_user_layout($data['user_id'])) {
			return false;
		}
		$this->db->insert('user_layout',$data);
		return $this->db->insert_id();
	}

	function delete_user_layout($user_id)
	{
		$this->db->delete('user_layout',
			array('user_id'=>$user_id));
		return true;
	}
}

