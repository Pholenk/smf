<?php
/**
* 
*/
class Route_ringModel extends CI_Model
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
		$query = $this->db->get('route_ring');
		return $query->result();
	}

	/**
	 * read method
	 */
	public function read($id)
	{
		$query = $this->db->get_where('route_ring', array('id' => $id));
		return $query->result();
	}

	/**
	 * edit method
	 */
	public function edit($id, $payload)
	{
		$this->db->where('id', $id);
		return ($this->db->update('route_ring', $payload) ? TRUE : FALSE);
	}

	/**
	 * add method
	 */
	public function add($payload)
	{
		$query = $this->db->insert('route_ring', $payload);
		return ( $query ? TRUE : FALSE);
	}

	/**
	 * delete method
	 */
	public function delete($id)
	{
		$this->db->where('id', $id);
		return ($this->db->delete('route_ring') ? true : false);
	}
}