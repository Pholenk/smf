<?php

/**
* 
*/
class Tech_support extends MX_Controller
{
	private $is_login;

	function __construct()
	{
		parent::__construct();
		$this->load->module('auth');
		$this->load->model('Tech_supportModel');
		$this->is_login = $this->auth->is_login();
	}

	public function index()
	{
		$this->browse();
	}

	/**
	 * browse method
	 */
	public function browse()
	{
		if ($this->is_login)
		{
			$access = $this->auth->privileges_read('ts_browse');
			if ($access)
			{
				$data['users_data'] = $this->Tech_supportModel->browse_users();
				$data['tech_support_data'] = $this->Tech_supportModel->browse_tech_support();
				$data['ts_data'] = $this->Tech_supportModel->browse_ts();
				$this->_show_interface('browse', $data);

			}
			else
			{
				echo '!allowed';
			}
			
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
		if ($this->is_login)
		{
			$access = $this->auth->privileges_read('ts_add');
			if ($access)
			{
				(!empty($id) && $this->Tech_supportModel->add($id, array('tech_support' => 1)) ? redirect(base_url('tech_support')) : redirect(base_url()));
			}
			else
			{
				$this->_show_interface('Unauthorize', '');
			}			
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
		if ($this->is_login)
		{
			$access = $this->auth->privileges_read('ts_delete');
			if ($access)
			{
				(!empty($id) && $this->Tech_supportModel->delete($id, array('tech_support' => 0)) ? redirect(base_url('tech_support')) : redirect(base_url()));
			}
			else
			{
				$this->_show_interface('Unauthorize', '');
			}	
		}
		else
		{
			redirect(base_url());
		}
	}

	/**
	 * show_interface method
	 */
	function _show_interface($page, $data)
	{
		if(!empty($page && $data))
		{
			$this->load->view('head');
			$this->load->view('navbar');
			$this->load->view($page, $data);
			$this->load->view('sidebar');
			$this->load->view('foot');
		}
		elseif(empty($data))
		{
			$this->load->view('head');
			$this->load->view('navbar');
			$this->load->view($page);
			$this->load->view('sidebar');
			$this->load->view('foot');
		}
	}
}