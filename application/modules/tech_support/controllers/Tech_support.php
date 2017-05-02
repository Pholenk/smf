<?php

/**
* 
*/
class Tech_support extends MX_Controller
{
	private $_access;

	function __construct()
	{
		parent::__construct();
		$this->load->module('auth');
		$this->load->model('Tech_supportModel');
		$this->_access = $this->auth->privileges_read('ts');
	}

	public function index()
	{
		$this->_browse();
	}

	/**
	 * browse method
	 */
	function _browse()
	{
		if ($this->_access)
		{
			$data['users_data'] = $this->Tech_supportModel->browse_users();
			$data['count_breeder'] = (count($this->Tech_supportModel->count_tech_support()) > 0 ? $this->Tech_supportModel->count_tech_support() : array());
			$data['ts_data'] = $this->Tech_supportModel->browse_users_ts();
			// echo "<pre>";
			// print_r(count($data['count_ts_breeder']));
			// echo "<pre>";
			$this->_show_interface('browse', $data);
		}
		else
		{
			redirect(base_url());
		}
		
	}

	/**
	 * add method
	 */
	public function add($id)
	{
		if ($this->_access)
		{
			(!empty($id) && $this->Tech_supportModel->add($id, array('tech_support' => 1)) ? redirect(base_url('tech_support')) : redirect(base_url()));
		}
		else
		{
			redirect(base_url());
		}
		
	}

	/**
	 * delete method
	 */
	public function delete($id)
	{
		if ($this->_access)
		{
			(!empty($id) && $this->Tech_supportModel->delete($id, array('tech_support' => 0)) ? redirect(base_url('tech_support')) : redirect(base_url()));
		}
		else
		{
			redirect(base_url());
		}
	}

	/**
	 * show_interface method
	 */
	function _show_interface($page = 'Unauthorize', $data = '')
	{
		if(!empty($page && $data))
		{
			$this->load->view('head');
			$this->load->view('navbar');
			$this->load->view($page, $data);
			$this->load->view('sidebar');
			$this->load->view('foot');
		}
	}
}