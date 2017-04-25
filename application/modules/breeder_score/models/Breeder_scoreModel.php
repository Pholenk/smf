<?php

/**
* 
*/
class Breeder_scoreModel extends CI_Model
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
		$query = $this->db->get('breeder_score');
		return $query->result();
	}

	/**
	 * read method
	 */
	public function read($id)
	{
		$this->db->select('*');
		$this->db->from('breeder_score');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * edit method
	 */
	public function edit($id, $breeder_score_data)
	{
		$this->db->where('id', $id);
		return ($this->db->update('breeder_score', $breeder_score_data) ? TRUE : FALSE);
	}

	/**
	 * add method
	 */
	public function add($breeder_score_data)
	{
		return ($this->db->insert('breeder_score', $breeder_score_data) ? TRUE : FALSE);
	}

	/**
	 * delete method
	 */
	public function delete($id)
	{
		$this->db->where('id', $id);
		return ($this->db->delete('breeder_score') ? TRUE : FALSE);
	}
}