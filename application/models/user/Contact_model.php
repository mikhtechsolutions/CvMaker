<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Contact_model
 * Primary objective of this class is to perform CRUD operations on DB in contact table.
 */
class Contact_model extends CI_Model
{
	/**
	 * @param $id
	 * @return mixed
	 */
	public function get_contacts_by_user_id($user_id = null, $return_sql = false)
	{
		$this->db->select();
		$this->db->from('contacts');
		if (isset($user_id)) {
			$this->db->where('user_id', $user_id);
		}
		$query = $this->db->get();
		$sql = $this->db->last_query();
		if ($return_sql) {
			return $sql;
		}
		$query = $query->result();
		return $query;
	}

	/**
	 * @param $data
	 * @return mixed
	 */
	public function save($data)
	{
		$this->db->insert('contacts',$data);
		return $this->db->insert_id();
	}

	/**
	 * @param $app_id
	 * @return bool
	 */
	function delete($app_id)
	{
		$this->db->delete('contacts',
			array('id' => $app_id,
				'user_id'=>$this->session->userdata('user_id')));
		return true;
	}

	/**
	 * @param $data
	 * @return mixed
	 */
	public function send_contact_message($data)
	{
		$this->db->insert('contacts',$data);
		return $this->db->insert_id();
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	function get_contact_by_id($id)
	{
		return $this->db->get_where('contacts', array(
			'id' => $id ,
			'user_id' => $this->session->userdata('user_id')))->row();
	}

	public function get_all_contacts_datatable($user_id = null, $return_sql = false)
	{
		$wh =array();
		$SQL = $this->get_contacts_by_user_id($user_id, $return_sql);
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

