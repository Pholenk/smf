<?php

/**
* 
*/
class SupplierModel extends CI_Model
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
		$this->db->where('deleted_at is null');
		$query = $this->db->get('supplier');
		return $query->result();
	}

	/**
	 * read method
	 */
	public function read($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('supplier');
		return $query->result();
	}

	/**
	 * edit method
	 */
	public function edit($id, $supplier_data)
	{
		$this->db->where('id', $id);
		$this->db->update('supplier', $supplier_data);
		return true;
	}

	/**
	 * add method
	 */
	public function add($supplier_data)
	{
		$this->db->insert('supplier', $supplier_data);
		return true;
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
 			if($this->db->update('supplier', $data))
 			{
 				return TRUE;
 			}
 		}
 		else
 		{
 			$tables = array('supplier');
 			$this->db->where('id', $id);
 			$this->db->delete($tables);
 		}
	}

	/**
 	 * getting last id from presistence storage
 	 */
	function _getLastID()
 	{
 		$this->db->select('SUBSTRING(max(id),3,4) as id', FALSE)->from('supplier');
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
			$id = 'IS0001';
			return $id;
		}
		elseif($result > 0 && $result < 9)
		{
			$id = $result+1;
			return 'IS000'.$id;
		}
		elseif($result > 8 && $result < 99)
		{
			$id = $result+1;
			return 'IS00'.$id;
		}
		elseif($result > 98 && $result < 999)
		{
			$id = $result+1;
			return 'IS0'.$id;
		}
		elseif ($result > 998 && $result < 9999) {
			$id = $result+1;
			return 'IS'.$id;
		}
	}
}