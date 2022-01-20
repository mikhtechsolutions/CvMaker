<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Site_model
 * Basic purpose of this class is to provide overall site settings CRUD to Admin user.
 */
class Site_model extends CI_Model
{
	/**
	 * @return mixed
	 */
	public function count_all_users()
	{
		return $this->db->count_all('users');
	}

	/**
	 * @return mixed
	 */
	public function get_active_users()
	{
		$this->db->where('is_active', 1);
		return $this->db->count_all_results('users');
	}

	/**
	 * @return mixed
	 */
	public function get_deactive_users()
	{
		$this->db->where('is_active', 0);
		return $this->db->count_all_results('users');
	}

	/**
	 * @param int $days
	 * @return mixed
	 */
	public function get_recent_users($days = 15)
	{
		$this->db->select('count(*) as recent_users');
		$this->db->from('users');
		$this->db->where('`created_date` >= (DATE(NOW()) - INTERVAL '.$days.' DAY)');
		$query = $this->db->get()->row_array()['recent_users'];
		return $query;
	}

	/**
	 * @return mixed
	 */
	public function get_site_settings()
	{
		return $this->db->get('settings')->row_array();
	}

	/**
	 * @param $data
	 * @param $id
	 * @return bool
	 */
	public function edit_site_settings($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('settings', $data);
		return true;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function get_user_by_id($id)
	{
		return $this->db->get_where('users', array(
			'id' => $id))->row_array();
	}

	/**
	 * @param string $user_type
	 * @return mixed
	 */
	public function get_all_users($user_type='')
	{
		$this->db->from('users');
		$this->db->where('is_admin !=', 1);
		if ($user_type === 'active') { // active users
			$this->db->where('is_active =', 1);
		} else if ($user_type === 'inactive') { // in active users
			$this->db->where('is_active =', 0);
		} else if ($user_type === 'recent') { // Recently joined users
			$this->db->where('`created_date` >= (DATE(NOW()) - INTERVAL 15 DAY)');
		}
		$this->db->order_by('created_date', 'DESC');
		return $this->db->get()->result();
	}

	/**
	 * @param $data
	 * @param $id
	 * @return bool
	 */
	public function change_user_status($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('users', $data);
		return true;
	}
		

	/**
	 * @param string $active_flag Empty means All records
	 * @return mixed
	 */
	public function get_screen_shots($active_flag = '')
	{
		$this->db->select();
		$this->db->from('screen_shots');
		if ($active_flag != '') {
			$this->db->where('is_active', $active_flag);
		}
		$query = $this->db->get();
		$query = $query->result();
		return $query;
	}

	/**
	 * @param $data
	 * @param $id
	 * @return mixed
	 */
	public function edit_shot($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('screen_shots', $data);
		return $id;
	}

	/**
	 * @param $data
	 * @return mixed
	 */
	public function save_shot($data)
	{
		$this->db->insert('screen_shots',$data);
		return $this->db->insert_id();
	}

	/**
	 * @param $shot_id
	 * @return bool
	 */
	function delete_shot($shot_id)
	{
		$this->db->delete('screen_shots',
			array('id' => $shot_id,
				'user_id'=>$this->session->userdata('user_id')));
		return true;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	function get_shot_by_id($id)
	{
		return $this->db->get_where('screen_shots', array(
			'id' => $id ,
			'user_id' => $this->session->userdata('user_id')))->row();
	}


	/**
	 * @return mixed
	 */
	public function get_admin_user_id()
	{
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('is_admin', 1);
		$query = $this->db->get();
		$query = $query->row();
		return $query;
	}

	public function get_all_users_datatable()
	{
		$wh =array();
		$SQL ='SELECT * FROM users';
		$wh[] = " is_admin = 0";
		if(count($wh)>0)
		{
			$WHERE = implode(' and ',$wh);
			return $this->datatable->LoadJson($SQL,$WHERE);
		}
		else
		{
			return $this->datatable->LoadJson($SQL);
		}
	}

	// -----------------------------------------------------------
	// dynamic pages

    public function get_page_by_slug($slug)
    {
    	return $this->db->get_where('pages',array('slug' => $slug, 'is_active' => 1))->row_array();
    }

}

