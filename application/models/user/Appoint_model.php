<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Appoint_model
 * Primary objective of this class is to perform CRUD operations on DB in appointment table. 
 */
class Appoint_model extends CI_Model
{
	/**
	 * @param $id
	 * @return mixed
	 */
	public function get_appointments_by_user_id($id)
	{
		$this->db->select();
		$this->db->from('appointments');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		$query = $query->result();
		return $query;
	}

	/**
	 * @param $data
	 * @return mixed
	 */
	public function save($data)
	{
		$this->db->insert('appointments',$data);
		return $this->db->insert_id();
	}

	/**
	 * @param $data Array of input data of appointment form.
	 * @param $id
	 * @return mixed
	 */
	public function edit($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('appointments', $data);
		return $id;
	}

	/**
	 * @param $app_id
	 * @return bool
	 */
	function delete($app_id)
	{
		$this->db->delete('appointments',
			array('id' => $app_id,
				'user_id'=>$this->session->userdata('user_id')));
		return true;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function get_app_days_by_user_id($id)
	{
		$this->db->select();
		$this->db->from('appoint_days');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		$query = $query->result();
		return $query;
	}

	/**
	 * @param $data
	 * @return bool
	 */
	public function save_app_days($data)
	{
		if ($this->delete_app_days()) {
			$this->db->insert_batch('appoint_days', $data);
			return true;
		}
		return false;
	}

	/**
	 * @return bool
	 */
	function delete_app_days()
	{
		$this->db->delete('appoint_days',
			array(
				'user_id'=>$this->session->userdata('user_id')));
		return true;
	}

}

