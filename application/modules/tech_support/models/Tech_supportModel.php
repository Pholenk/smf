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
		// if ($this->_count_row_tech_support() <= 0)
		// {	
			$this->db->select('users.id, users.name_full, users.email')->from('users');
			$this->db->join('users_details', 'users.id = users_details.id');
			$this->db->where('users_details.deleted_at is null');
			$this->db->where('users.tech_support = 1');
		// }
		// else
		// {
		// 	$this->db->select('users.id, users.name_full, users.email, count(breeder_id) as breeder_count, SUM(breeder.populasi) as populasi')
		// 		->from('users');
		// 	$this->db->join('users_details', 'users.id = users_details.id');
		// 	$this->db->join('tech_support','tech_support.ts_id = users.id');
		// 	$this->db->join('breeder','tech_support.breeder_id = breeder.id');
		// 	$this->db->where('users_details.deleted_at is null');
		// 	$this->db->where('users.tech_support = 1');
		// 	$this->db->group_by('tech_support.ts_id');
			
		// }
		$query = $this->db->get();
		return $query->result();
	}

	public function browse_tech_support()
	{
		$this->db->select('tech_support.ts_id, (count(breeder_id)) as breeder_count, (SUM(breeder.populasi)) as populasi');
		$this->db->from('tech_support');
		$this->db->join('breeder', 'breeder.id = tech_support.breeder_id');
		$this->db->join('users', 'users.id = tech_support.ts_id');
		$this->db->group_by('tech_support.ts_id');
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * _count_row_tech_support method
	 */
	function _count_row_tech_support()
	{
		$query = $this->db->get('tech_support');
		return $query->num_rows();
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