<?php

/**
* 
*/
class Tech_supportModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * browse_users method
	 */
	public function browse_users()
	{
		$this->db->select('users.id, users.name_full, users.email')->from('users');
		$this->db->join('users_details', 'users.id = users_details.id');
		$this->db->where('users_details.deleted_at is null');
		$this->db->where('users.tech_support = 0');
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * browse_ts method
	 */
	public function browse_ts()
	{
		$this->db->select('users.id, users.name_full, users.email')->from('users');
		$this->db->join('users_details', 'users.id = users_details.id');
		$this->db->where('users_details.deleted_at is null');
		$this->db->where('users.tech_support = 1');
		$query = $this->db->get();
		return $query->result();
	}

	public function browse_tech_support()
	{
		$this->db->select('breeder.ts_id, (count(breeder.id)) as breeder_count, (SUM(breeder.populasi)) as populasi');
		$this->db->from('breeder');
		$this->db->join('users', 'users.id = breeder.ts_id');
		$this->db->group_by('users.id');
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * add method
	 */
	public function add($id, $tech_support_data)
	{
		$this->db->where('id', $id);
		$this->db->update('users', $tech_support_data);
		return true;
	}

	/**
	 * delete method
	 */
	public function delete($id, $tech_support_data)
	{
		$this->db->select('(COUNT(tech_support.breeder_id)) as breeder_count')->from('tech_support');
		$this->db->where('ts_id', $id);
		$count = $this->db->get();

		if ($count->result > 0)
		{
			return false;
		}
		else
		{
			$this->db->where('id', $id);
			$this->db->update('users', $tech_support_data);
			return true;
		}	
	}
}