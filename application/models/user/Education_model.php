<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Education_model
 * Primary objective of this class is to perform CRUD operations on DB in education table.
 */
class Education_model extends CI_Model
{
	/**
	 * @param $user_id
	 * @param null $order_by ASC or DESC order parameter for DB query
	 * @param string $order Column name for 'order by' parameter for DB query.
	 * @param string $active_flag Get active/inactive records based upon this flag (1/0).
	 * @return mixed
	 */
	function get_education_by_user_id($user_id, $order_by = null, $order = 'ASC', $active_flag = '')
	{
		$this->db->select();
		$this->db->from('education');
		$this->db->where('user_id', $user_id);
		if ($active_flag != '') {
			$this->db->where('status', $active_flag);
		}
		if (isset($order_by)) {
			$this->db->order_by($order_by, $order);
		}
		$query = $this->db->get();
		$query = $query->result();
		return $query;
	}

	/**
	 * @param $data
	 * @return mixed
	 */
	public function save($data){
		$this->db->insert('education',$data);
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
		$this->db->update('education', $data);
		return $id;
	}

	/**
	 * @param $id
	 * @return bool
	 */
	function delete($id)
	{
		$this->db->delete('education',
			array('id' => $id,
				'user_id'=>$this->session->userdata('user_id')));
		return true;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	function get_education_by_id($id)
	{
		return $this->db->get_where('education', array(
			'id' => $id ,
			'user_id' => $this->session->userdata('user_id')))->row();
	}

}

