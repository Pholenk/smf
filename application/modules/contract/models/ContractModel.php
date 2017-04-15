<?php

/**
* 
*/
class ContractModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * browse method
	 */
	public function browse($type_contract)
	{
		$query = $this->db->get($type_contract);
		return $query->result();
	}

	/**
	 * read method
	 */
	public function read($type_contract, $id)
	{
		$query = $this->db->get_where($type_contract, array('id'=>$id));
		return $query->result();
	}

	/**
	 * edit method
	 */
	public function edit($type_contract, $payload)
	{
		if ($this->db->update($type_contract, $payload, array('id' => $payload['id'])))
		{
			return true;
		}
	}

	/**
	 * add method
	 */
	public function add($type_contract, $payload)
	{
		if ($this->db->insert($type_contract, $payload)) {
			return true;
		}
	}


	/**
	 * delete method
	 */
	public function delete($type_contract, $id)
	{
		if($this->db->delete($type_contract, array('id' => $id))){
			return true;
		}
	}
}