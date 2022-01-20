<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Blog_model
 * Primary objective of this class is to perform CRUD operations on DB in blog table.
 */
class Blog_model extends CI_Model
{
	/**
	 * @param $id
	 * @param string $active_flag Get active/inactive records based upon this flag (1/0).
	 * @return mixed
	 */
	public function get_posts_by_user_id($id, $active_flag = '')
	{
		$this->db->select('a.*, b.name as cat_name');
		$this->db->from('blog a');
		$this->db->join('blog_categories b', 'a.cat_id = b.id');
		$this->db->where('a.user_id', $id);
		if ($active_flag != '') {
			$this->db->where('a.status', $active_flag);
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
		$this->db->insert('blog',$data);
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
		$this->db->update('blog', $data);
		return $id;
	}

	/**
	 * @param $id
	 * @return bool
	 */
	function delete($id)
	{
		$this->db->delete('blog',
			array('id' => $id,
				'user_id'=>$this->session->userdata('user_id')));
		return true;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	function get_post_by_id($id)
	{
		return $this->db->get_where('blog', array(
			'id' => $id ,
			'user_id' => $this->session->userdata('user_id')))->row();
	}


	/**
	 * @param $data
	 * @return mixed
	 */
	public function save_cat($data)
	{
		$this->db->insert('blog_categories',$data);
		return $this->db->insert_id();
	}

	/**
	 * @param $data
	 * @param $id
	 * @return mixed
	 */
	public function edit_cat($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('blog_categories', $data);
		return $id;
	}

	/**
	 * @param $id
	 * @return bool
	 */
	function delete_cat($id)
	{
		$this->db->delete('blog_categories',
			array('id' => $id,
				'user_id'=>$this->session->userdata('user_id')));
		return true;
	}


	/**
	 * @param $id
	 * @return mixed
	 */
	public function get_cats_by_user_id($id)
	{
		$this->db->select();
		$this->db->from('blog_categories');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		$query = $query->result();
		return $query;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	function get_cat_by_id($id)
	{
		return $this->db->get_where('blog_categories', array(
			'id' => $id ,
			'user_id' => $this->session->userdata('user_id')))->row();
	}

}

