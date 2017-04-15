<?php

/**
* 
*/
class ProductionModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * browse method
	 */
	public function browse()
	{
		// $this->db->select('*');
		// $this->db->from();
		$query = $this->db->get('std_production');
		return $query->result();
	}

	/**
	 * read method
	 */
	public function read($id)
	{
		$this->db->select('*');
		$this->db->from('std_production');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * edit method
	 */
	public function edit($id, $std_production)
	{
		$this->db->where('id', $id);
		$this->db->update('std_production', $std_production);
		return TRUE;
	}

	/**
	 * add method
	 */
	public function add($std_production)
	{
		$this->db->insert('std_production', $std_production);
		return TRUE;
	}

	/**
	 * delete method
	 */
	public function delete($id)
	{
		$this->db->where('id', $id);
		if($this->db->delete('std_production'))
		{
			return TRUE;
		}
	}
}