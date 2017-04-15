<?php

/**
 * author: Pholenk
 * email: pholenkadi17@gmail.com
 * github: Pholenk
 */

 class UsersModel extends CI_Model
 {
 	function __construct()
 	{
 		parent:: __construct();
 	}

 	/**
 	 * select all data from persistence storage
 	 */
 	public function browse()
 	{
 		$this->db->select('*');
 		$this->db->from('users');
 		$this->db->join('users_details','users.id = users_details.id');
 		$this->db->where('users_details.deleted_at is null');
 		$query = $this->db->get();
 		return $query->result();
 	}

 	/**
 	 * select a row data that belongs to $email
 	 */
 	public function read($email)
 	{
 		$this->db->select('*');
 		$this->db->from('users');
 		$this->db->join('users_details','users.id = users_details.id');
 		$this->db->where('users.email', $email);
 		$this->db->where('users_details.deleted_at is null');
 		$query = $this->db->get();
 		return $query->result();
 	}

 	/**
 	 * edit data that belongs to $id
 	 */
 	public function edit($id, $users, $details)
 	{
 		$this->db->where('id', $id);
 		if($this->db->update('users', $users))
 		{
 			$this->db->where('id', $id);
 			$this->db->update('users_details', $details);
			return TRUE;
 		}
 	}

 	/**
 	 * insert new data
 	 */
 	public function add($users, $details, $privileges)
 	{
 		if($this->db->insert('users',$users))
 		{
			if($this->db->insert('users_details',$details))
			{
				$this->db->insert('users_priv',$privileges);
				return TRUE;
			}
 		}
 	}

 	/**
 	 * delete data with 2 method
 	 * soft_delete: just update column deleted at
 	 * force_delete: drop the data that belongs to $id
 	 */
 	public function delete($id, $force)
 	{
 		$datestring = '%Y-%m-%d %H:%i:%s';

 		if($force === FALSE)
 		{
 			$data = array(
 					'deleted_at' => mdate($datestring, time())
 				);

 			$this->db->where('id', $id);
 			if($this->db->update('users_details', $data))
 			{
 				return TRUE;
 			}
 		}
 		else
 		{
 			$tables = array('users_details','users','users_priv');
 			$this->db->where('id', $id);
 			$this->db->delete($tables);
 		}
 	}

 	/**
 	 * getting last id from presistence storage
 	 */
 	function _getLastID()
 	{
 		$this->db->select('SUBSTRING(max(id),3,4) as id', FALSE)->from('users');
 		$query = $this->db->get();
 		return $query->row();
 	}

 	/**
 	 * id generator
 	 * make new id for new insertions
 	 */
 	public function idGen()
 	{
 		$result = $this->_getLastID()->id;
 		if($result < 0)
 		{
 			$id = 'IU0001';
 			return $id;
 		}
 		elseif($result > 0 && $result < 9)
 		{
 			$id = $result+1;
 			return 'IU000'.$id;
 		}
 		elseif($result > 8 && $result < 99)
 		{
 			$id = $result+1;
 			return 'IU00'.$id;
 		}
 		elseif($result > 98 && $result < 999)
 		{
 			$id = $result+1;
 			return 'IU0'.$id;
 		}
 		elseif ($result > 998 && $result < 9999) {
 			$id = $result+1;
 			return 'IU'.$id;
 		}
 	}
 }