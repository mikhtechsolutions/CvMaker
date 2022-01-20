<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Service_model
 * Primary objective of this class is to perform CRUD operations on DB in services table.
 */
class Service_model extends CI_Model
{
	/**
	 * @param $id
	 * @param string $active_flag Get active/inactive records based upon this flag (1/0).
	 * @return mixed
	 */
	public function get_services_by_user_id($id, $active_flag = '')
	{
		$this->db->select();
		$this->db->from('services');
		if ($active_flag != '') {
			$this->db->where('is_active', $active_flag);
		}
		$this->db->where('user_id', $id);
		$this->db->order_by('user_id','DESC');
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
		$this->db->insert('services',$data);
		return $this->db->insert_id();
	}

	/**
	 * @param $data
	 * @param $id
	 * @return mixed
	 */
	public function edit($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('services', $data);
		return $id;
	}

	/**
	 * @param $service_id
	 * @return bool
	 */
	function delete($service_id)
	{
		$this->db->delete('services',
			array('id' => $service_id,
				'user_id'=>$this->session->userdata('user_id')));
		return true;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	function get_service_by_id($id)
	{
		return $this->db->get_where('services', array(
			'id' => $id ,
			'user_id' => $this->session->userdata('user_id')))->row();
	}

}

