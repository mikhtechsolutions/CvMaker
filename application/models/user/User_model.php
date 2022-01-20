<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class User_model
 * Primary objective of this class is to perform operations on DB in users table.
 */
class User_model extends CI_Model
{

	public function count_all_users()
	{
		$this->db->where('is_active',1);
		$this->db->where('is_admin',0);
		$this->db->from("users");
		return $this->db->count_all_results();
	}

	/**
	 * @param string $user_type
	 * @return mixed
	 */
	public function get_all_users($limit, $offset, $search_params = [])
	{
		$this->db->from('users');
		$this->db->where('is_admin', 0);
		$this->db->where('is_active', 1);
		if (!empty($search_params['username'])) {
			$this->db->like('concat(firstname," ", lastname)', $search_params['username']);
			$this->db->or_like('username', $search_params['username']);
		}
		if (!empty($search_params['designation'])) {
			$this->db->or_like('designation', $search_params['designation']);
		}
		if (!empty($search_params['country']) && $search_params['country'] != 0) {
			$this->db->where('country', $search_params['country']);
		}
		if (!empty($search_params['city'])) {
			$this->db->or_like('city', $search_params['city']);
		}
		if (isset($search_params['is_premium']) && $search_params['is_premium'] != '') {
			$is_premium = $search_params['is_premium'] == 'F' ? 0: 1;
			$this->db->where('is_premium', $is_premium);
		}

		$this->db->order_by('is_premium', 'DESC');
		$this->db->order_by('created_date', 'DESC');
		if ($limit !=-1 && $offset != -1) {
			$this->db->limit($limit, $offset);
		}
		$result = $this->db->get()->result();
		//echo $this->db->last_query();exit;
		return $result;
	}

}

