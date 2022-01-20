<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Package_model
 * Class objective is to perform Package related tasks
 */
class Package_model extends CI_Model
{
	/**
	 * @param string $active_flag Empty means All records
	 * @return mixed
	 */
	public function get_packages($type = '')
	{
		$this->db->select();
		$this->db->from('packages');
		if ($type != '') {
			$this->db->where('type', $type);
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
	public function edit_package($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('packages', $data);
		return $id;
	}

	/**
	 * @param $data
	 * @return mixed
	 */
	public function save_package($data)
	{
		$this->db->insert('packages', $data);
		return $this->db->insert_id();
	}

	public function get_package_by_user_id($user_id)
	{
		$this->db->select('a.*, b.*, datediff(b.expiry_date, curdate()) as remaining_days , 
		CASE
			WHEN b.expiry_date > curdate() THEN 1
			WHEN b.expiry_date < curdate() THEN -1
			WHEN b.expiry_date = curdate() THEN 0
		END AS expiry
			');
		$this->db->from('packages a');
		$this->db->join('user_package b', 'a.id = b.package_id');
		$this->db->where('b.user_id', $user_id);
		$query = $this->db->get();
		$query = $query->row();
		return $query;
	}

	/**
	 * @param $data
	 * @return mixed
	 */
	public function insert_payment($data)
	{
		$this->db->insert('payments',$data);
		return $this->db->insert_id();
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	function get_package_by_id($id)
	{
		return $this->db->get_where('packages', array(
			'id' => $id
			))->row();
	}

	/**
	 * @param $data
	 * @return bool
	 */
	public function save_package_features($data, $package_id)
	{
		if ($this->delete_package_features($package_id)) {
			$this->db->insert_batch('package_features', $data);
			return true;
		}
		return false;
	}

	/**
	 * @return bool
	 */
	function delete_package_features($package_id)
	{
		$this->db->delete('package_features',
			array(
				'package_id'=>$package_id));
		return true;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	function get_package_features_by_id($id)
	{
		return $this->db->select('feature_id')->get_where('package_features', array(
			'package_id' => $id
		))->result();
	}

	function get_packages_features($package_id = null, $show_active_only = false)
	{
		$this->db->select('a.*, c.id as feature_id, c.name as feature_name, c.description');
		$this->db->from('packages a');
		$this->db->join('package_features b', 'a.id = b.package_id');
		$this->db->join('features c', 'b.feature_id = c.id');
		if (isset($package_id)) {
			$this->db->where('a.id', $package_id);
		}
		if ($show_active_only) {
			$this->db->where('a.is_active', 1);
		}
		$this->db->where('c.display', 1);
		$this->db->order_by('a.id, c.id');
		$query = $this->db->get();
		$query = $query->result();
		return $query;
	}

	/**
	 * @param $data
	 * @return bool
	 */
	public function assign_package($data)
	{
		if ($this->delete_user_package($data['user_id'])) {
			$this->db->insert('user_package', $data);
			return $this->db->insert_id();
		}
		return false;
	}

	public function delete_user_package($user_id) {
		$this->db->delete('user_package',
			array(
				'user_id'=>$user_id));
		return true;
	}


	public function get_payments($user_id = null, $return_sql = false)
	{
		$this->db->select('a.*, concat(b.firstname, \' \', b.lastname) as user_name, c.name as package_name' );
		$this->db->from('payments a');
		$this->db->join('users b', 'a.user_id = b.id');
		$this->db->join('packages c', 'a.package_id = c.id');
		$this->db->where('a.admin_view',1);
		if (isset($user_id)) {
			$this->db->where('a.user_id', $user_id);
		}
		if (!$return_sql) {
			$this->db->order_by('a.created_date');
		}
		$query = $this->db->get();
		$sql = $this->db->last_query();
		if ($return_sql) {
			return $sql;
		}
		$query = $query->result();
		return $query;
	}

	public function get_all_payments_datatable($user_id = null, $return_sql = false)
	{
		$wh =array();
		$SQL = $this->get_payments($user_id, $return_sql);
		$wh = [];
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

}
