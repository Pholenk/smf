<?php

class PrivilegesModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function browse()
	{
		$deleted = 'DELETED';
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('users_priv', 'users.id = users_priv.id');
		$this->db->where('users.id != ', $deleted);
		$query = $this->db->get();
		return $query->result();
	}

	public function read($email)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('users_priv', 'users.id = users_priv.id');
		$this->db->where('users.email', $email);
		$query = $this->db->get();
		return $query->result();
	}

	public function edit($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('users_priv', $data);
		return TRUE;
	}
}