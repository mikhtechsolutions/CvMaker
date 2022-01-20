<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Testimonial_model
 * Primary objective of this class is to perform CRUD operations on DB in testimonials table.
 */
class Testimonial_model extends CI_Model
{
	/**
	 * @param $id
	 * @param string $active_flag Get active/inactive records based upon this flag (1/0).
	 * @return mixed
	 */
	public function get_testimonials_by_user_id($id, $active_flag = '')
	{
		$this->db->select();
		$this->db->from('testimonials');
		$this->db->where('user_id', $id);
		if ($active_flag != '') {
			$this->db->where('status', $active_flag);
		}
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
		$this->db->insert('testimonials',$data);
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
		$this->db->update('testimonials', $data);
		return $id;
	}

	/**
	 * @param $id
	 * @return bool
	 */
	function delete($id)
	{
		$this->db->delete('testimonials',
			array('id' => $id,
				'user_id'=>$this->session->userdata('user_id')));
		return true;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	function get_testimonial_by_id($id)
	{
		return $this->db->get_where('testimonials', array(
			'id' => $id ,
			'user_id' => $this->session->userdata('user_id')))->row();
	}

}

