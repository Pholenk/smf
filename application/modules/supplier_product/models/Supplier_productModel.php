<?php

/**
* 
*/
class Supplier_productModel extends CI_Model
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
		$this->db->select('supplier.nama_perusahaan, supplier_product.*');
 		$this->db->from('supplier');
 		$this->db->join('supplier_product','supplier.id = supplier_product.id_supp');
 		$this->db->where('supplier.deleted_at is null');
 		$query = $this->db->get();
 		return $query->result();
	}

	/**
	 * read method
	 */
	public function read($id)
	{
		$this->db->select('*');
		(substr($id, 0, 2) !== 'PR' ? $this->db->where('id_supp', $id) : $this->db->where('id', $id));
		$query = $this->db->get('supplier_product');
		return $query->result();
	}

	/**
	 * edit method
	 */
	public function edit($id, $supplier_product_data)
	{
		$this->db->where('id', $id);
		$this->db->update('supplier_product', $supplier_product_data);
		return true;
	}

	/**
	 * add method
	 */
	public function add($supplier_product_data)
	{
		$this->db->insert('supplier_product', $supplier_product_data);
		return true;
	}

	/**
	 * delete method
	 */
	public function delete($id, $force = 'FALSE')
	{
		$this->db->where('id', $id);
		$this->db->delete('supplier_product');
		return true;
	}

	/**
	 * retrieve supplier's data
	 */
	public function supplier_browse()
	{
		$this->db->select('*')->from('supplier');
		$this->db->where('deleted_at is null');
		$query = $this->db->get();
		return $query->result();
	}

	/**
 	 * retrieve last id from presistence storage
 	 */
	function _getLastID()
 	{
 		$this->db->select('SUBSTRING(max(id),3,4) as id', FALSE)->from('supplier_product');
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
			$id = 'PR0001';
			return $id;
		}
		elseif($result > 0 && $result < 9)
		{
			$id = $result+1;
			return 'PR000'.$id;
		}
		elseif($result > 8 && $result < 99)
		{
			$id = $result+1;
			return 'PR00'.$id;
		}
		elseif($result > 98 && $result < 999)
		{
			$id = $result+1;
			return 'PR0'.$id;
		}
		elseif ($result > 998 && $result < 9999) {
			$id = $result+1;
			return 'PR'.$id;
		}
	}
}