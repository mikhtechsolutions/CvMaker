<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Skill_model
 * Primary objective of this class is to perform CRUD operations on DB in skills table.
 */
class Skill_model extends CI_Model{
	/**
	 * @param $user_id
	 * @return mixed
	 */
	public function get_skills_by_user_id($user_id)
	{
		$this->db->select();
		$this->db->from('skills');
		$this->db->where('user_id', $user_id);
		$this->db->where('parent_id', 0);
		$this->db->order_by('user_id','DESC');
		$query = $this->db->get();
		$query = $query->result();
		return $query;
	}

	/**
	 * @param $user_id
	 * @param string $active_flag Get active/inactive records based upon this flag (1/0).
	 * @return mixed
	 */
	function get_subskills_by_user_id($user_id, $active_flag = '')
	{
		$this->db->select('a.name as parent_skill, b.*');
		$this->db->from('skills a');
		$this->db->join('skills b', 'a.id = b.parent_id');
		$this->db->where('a.user_id =', $user_id);
		if ($active_flag != '') {
			$this->db->where('b.status', $active_flag);
		}
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	/**
	 * Add new skill
	 * @param $data
	 * @return mixed
	 */
	public function save($data)
	{
		$this->db->insert('skills',$data);
		return $this->db->insert_id();
	}

	/**
	 * Update a skill
	 * @param $data
	 * @param $id
	 * @return mixed
	 */
	public function edit($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('skills', $data);
		return $id;
	}

	/**
	 * Delete a skill / subskill
	 * @param $skill_id
	 * @return bool
	 */
	function delete($skill_id)
	{
		$this->db->delete('skills',
			array('id' => $skill_id,
				'user_id'=>$this->session->userdata('user_id')));
		return true;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	function get_skill_by_id($id)
	{
		return $this->db->get_where('skills', array(
			'id' => $id ,
			'parent_id' => 0,
			'user_id' => $this->session->userdata('user_id')))->row();
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	function get_sub_skill_by_id($id)
	{
		return $this->db->get_where('skills', array(
			'id' => $id ,
			'user_id' => $this->session->userdata('user_id')))->row();
	}

	/**
	 * @param $parent_id
	 * @return mixed
	 */
	function get_sub_skills_by_parent_id($parent_id)
	{
		return $this->db->get_where('skills', array(
			'parent_id' => $parent_id,
			'user_id' => $this->session->userdata('user_id')))->row();
	}
}
