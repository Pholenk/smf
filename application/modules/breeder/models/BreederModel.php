<?php

/**
* 
*/
class BreederModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * browse_breeder method
	 */
	public function browse_breeder()
	{
		$this->db->select('breeder.*, route_ring.*')->from('breeder');
		$this->db->join('route_ring', 'breeder.kelurahan = route_ring.id');
		$this->db->where('breeder.deleted_at is null');
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

	/**
	 * browse_route_ring method
	 */
	public function browse_route_ring()
	{
		$query = $this->db->get('route_ring');
		return $query->result();
	}

	/**
	 * read method
	 */
	public function read($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('breeder');
		return $query->result();
	}

	/**
	 * read_route_ring method
	 */
	public function read_route_ring($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('route_ring');
		return $query->result();
	}

	/**
	 * edit method
	 */
	public function edit($id, $breeder_data)
	{
		$this->db->where('id', $id);
		return ($this->db->update('breeder', $breeder_data) ? true : false);
	}

	/**
	 * add method
	 */
	public function add($breeder_data)
	{
		return ($this->db->insert('breeder', $breeder_data) ? true : false);
	}

	/**
	 * delete method
	 */
	public function delete($id, $force = 'FALSE')
	{
		$datestring = '%Y-%m-%d %H:%i:%s';

 		if($force === 'FALSE')
 		{
 			$data = array(
 					'deleted_at' => mdate($datestring, time())
 				);

 			$this->db->where('id', $id);
 			return ($this->db->update('breeder', $data) ? TRUE : FALSE);
 		}
 		else
 		{
 			$tables = array('breeder');
 			$this->db->where('id', $id);
 			return ($this->db->delete($tables) ? TRUE : FALSE);
 		}
	}


	/**
 	 * getting last id from presistence storage
 	 */
	function _getLastID()
 	{
 		$this->db->select('SUBSTRING(max(id),3,4) as id', FALSE)->from('breeder');
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
			$id = 'IP0001';
			return $id;
		}
		elseif($result > 0 && $result < 9)
		{
			$id = $result+1;
			return 'IP000'.$id;
		}
		elseif($result > 8 && $result < 99)
		{
			$id = $result+1;
			return 'IP00'.$id;
		}
		elseif($result > 98 && $result < 999)
		{
			$id = $result+1;
			return 'IP0'.$id;
		}
		elseif ($result > 998 && $result < 9999) {
			$id = $result+1;
			return 'IP'.$id;
		}
	}
}