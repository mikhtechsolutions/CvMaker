<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Portfolio_model
 * Primary objective of this class is to perform user's profile related operations on DB in users table.
 */
class Profile_model extends CI_Model
{
	/**
	 * @param $id
	 * @return mixed
	 */
	public function get_user_by_id($id)
	{
		$this->db->select('a.*, b.name as country_name');
		$this->db->from('users a');
		$this->db->join('countries b', 'a.country = b.id', 'left');
		$this->db->where('a.id', $id);
		$query = $this->db->get()->row_array();
		return $query;
	}

	/**
	 * @param $data
	 * @param $id
	 * @return bool
	 */
	public function edit($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('users', $data);
		return true;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function user_by_id($id)
	{
		return $this->db->get_where('users', array(
			'id' => $id))->row();
	}

	/**
	 * @param $username
	 * @return mixed
	 */
	public function get_user_by_username($username)
	{
		$this->db->select();
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->where('is_admin !=', 1);
		$this->db->where('is_active', 1);
		$query = $this->db->get()->row();
		return $query;
	}

	/**
	 * @return mixed
	 */
	public function get_admin()
	{
		return $this->db->get_where('users', array(
			'is_admin' => 1))->row();
	}
}
