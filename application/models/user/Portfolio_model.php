<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Portfolio_model
 * Primary objective of this class is to perform CRUD operations on DB in portfolio table.
 */
class Portfolio_model extends CI_Model
{
	/**
	 * @param $id
	 * @param string $active_flag Get active/inactive records based upon this flag (1/0).
	 * @return mixed
	 */
	public function get_portfolios_by_user_id($id, $active_flag = '')
	{
		$this->db->select('a.*, b.name as cat_name');
		$this->db->from('portfolios a');
		$this->db->join('portfolio_categories b', 'a.cat_id = b.id');
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
		$this->db->insert('portfolios',$data);
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
		$this->db->update('portfolios', $data);
		return $id;
	}

	/**
	 * @param $id
	 * @return bool
	 */
	function delete($id)
	{
		$this->db->delete('portfolios',
			array('id' => $id,
				'user_id'=>$this->session->userdata('user_id')));
		return true;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	function get_portfolio_by_id($id)
	{
		return $this->db->get_where('portfolios', array(
			'id' => $id ,
			'user_id' => $this->session->userdata('user_id')))->row();
	}


	/**
	 * Get a list of portfolio categories by user id.
	 * @param $id
	 * @return mixed
	 */
	public function get_pf_cats_by_user_id($id)
	{
		$this->db->select();
		$this->db->from('portfolio_categories');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		$query = $query->result();
		return $query;
	}

	/**
	 * Add new portfolio category
	 * @param $data
	 * @return mixed
	 */
	public function save_cat($data)
	{
		$this->db->insert('portfolio_categories',$data);
		return $this->db->insert_id();
	}

	/**
	 * Update portfolio category
	 * @param $data
	 * @param $id
	 * @return mixed
	 */
	public function edit_cat($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('portfolio_categories', $data);
		return $id;
	}

	/**
	 * Delete portfolio category
	 * @param $id
	 * @return bool
	 */
	function delete_cat($id)
	{
		$this->db->delete('portfolio_categories',
			array('id' => $id,
				'user_id'=>$this->session->userdata('user_id')));
		return true;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	function get_cat_by_id($id)
	{
		return $this->db->get_where('portfolio_categories', array(
			'id' => $id ,
			'user_id' => $this->session->userdata('user_id')))->row();
	}
}

