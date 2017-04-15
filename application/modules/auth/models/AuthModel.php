<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');
/**
 * author: Pholenk
 * email: pholenkadi17@gmail.com
 * github: Pholenk
 */

class AuthModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
 	 * inherit doc
 	 */
 	public function login($email, $password)
 	{
 		$data = array(
 				'users.email' => $email,
 				'users.password' => $password,
 				'users_details.deleted_at' => null
 			);
 		$this->db->select('*');
 		$this->db->from('users');
 		$this->db->join('users_details','users.id = users_details.id');
 		$this->db->where($data);
 		$query = $this->db->get();
 		return $query->row();
 	}

 	/**
 	 * inherit doc
 	 */
 	public function privileges_read($id, $column)
 	{
 		$data = array(
 				'id' => $id
 				);
 		$this->db->select($column);
 		$query = $this->db->get_where('users_priv',$data);
 		return $query->row();
 	}
}