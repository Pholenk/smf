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
		// $this->load->model('Tech_supportModel');
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
				// $data['tech_support_data'] = $this->Tech_supportModel->browse();
				$this->_show_interface('browse', '$data');
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
	 * read method
	 */
	public function read()
	{
		# code...
	}

	/**
	 * edit method
	 */

	/**
	 * add method
	 */

	/**
	 * delete method
	 */

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