<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth_model
 * Class objective is to perform Authentication related CRUD operations on DB in the users table.
 */
class Auth_model extends CI_Model
{
	/**
	 * @param $data Array of input data of login form.
	 * @return bool
	 */
	public function login($data)
	{

		$this->db->from('users');
		$this->db->where('users.username', $data['username']);

		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return false;
		}
		else{
			//Compare the password attempt with the password we have stored.
			$result = $query->row_array();
		    $validPassword = password_verify($data['password'], $result['password']);
		    if($validPassword){
		        return $result = $query->row_array();
		    }
		}
	}

	/**
	 * @param $data Array of input data of register form.
	 * @return bool
	 */
	public function register($data)
	{
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}

	/**
	 * @param $data Array of user's data to be updated in users table.
	 * @param $update_id
	 * @return bool
	 */
	public function update_user($data, $update_id)
	{
		$this->db->where('id', $update_id);
		$this->db->update('users', $data);
		return true;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function get_user_by_id($id)
	{
		return $this->db->get_where('users', array(
			'id' => $id))->row();
	}

	/**
	 * This function verifies the code user has received in his/her email to verify his/her email.
	 * @param $code
	 * @return bool
	 */
	public function email_verification($code)
	{
		$this->db->select('email, token, is_active');
		$this->db->from('users');
		$this->db->where('token', $code);
		$query = $this->db->get();
		$result= $query->result_array();
		$match = count($result);
		if($match > 0){
			$this->db->where('token', $code);
			$this->db->update('users', array('is_verify' => 1, 'token'=> ''));
			return true;
		} else {
			return false;
		}
	}

	/**
	 * This method checks the existence of user's email in the DB during the forgot password process.
	 * @param $email
	 * @return bool
	 */
    function check_user_mail($email)
    {
    	$result = $this->db->get_where('users', array('email' => $email));

    	if($result->num_rows() > 0){
    		$result = $result->row_array();
    		return $result;
    	}
    	else {
    		return false;
    	}
    }

	/**
	 * Updating the password reset code in DB during forgot password process
	 * @param $reset_code
	 * @param $user_id
	 */
    public function update_reset_code($reset_code, $user_id)
	{
    	$data = array('password_reset_code' => $reset_code);
    	$this->db->where('id', $user_id);
    	$this->db->update('users', $data);
    }

	/**
	 * Checking the valid password reset code in the DB.
	 * @param $code
	 * @return bool
	 */
    public function check_password_reset_code($code)
	{

    	$result = $this->db->get_where('users',  array('password_reset_code' => $code ));
    	if($result->num_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }

	/**
	 * @param $id
	 * @param $new_password
	 * @return bool
	 */
    public function reset_password($id, $new_password)
	{
	    $data = array(
			'password_reset_code' => '',
			'password' => $new_password
	    );
		$this->db->where('password_reset_code', $id);
		$this->db->update('users', $data);
		return true;
    }

	/**
	 * @param $id
	 * @return mixed
	 */
	public function user_by_id($id)
	{
		return $this->db->get_where('users', array(
			'id' => $id))->row();
	}

}
