<?php

/**
* 
*/
class Buyer extends MX_Controller
{
	private $is_login;

	function __construct()
	{
		parent::__construct();
		$this->load->model('BuyerModel');
		$this->load->module('auth');
		$this->is_login = $this->auth->is_login();
	}

	/**
	 * index method
	 */
	public function index()
	{
		$this->_browse();
	}

	/**
	 * _browse method
	 */
	function _browse()
	{
		if ($this->is_login)
		{
			$access = $this->auth->privileges_read('buyer_browse');
			if ($access)
			{
				$data['buyer_data'] = $this->BuyerModel->browse();
				$this->_show_interface('browse', $data);
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
	 * read method
	 */
	public function read($id = '')
	{
		if ($this->is_login)
		{
			$access = $this->auth->privileges_read('buyer_edit');
			if ($access && !empty($id))
			{
				
			}
			elseif ($access && empty($id))
			{
				redirect(base_url('buyer'));
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
	 * edit method
	 */
	public function edit($id)
	{
		if ($this->is_login)
		{
			$access = $this->auth->privileges_read('buyer_edit');
			if ($access && !empty($id))
			{
				
			}
			elseif ($access && empty($id))
			{
				redirect(base_url('buyer'));
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
	 * add method
	 */
	public function add()
	{
		if ($this->is_login)
		{
			$access = $this->auth->privileges_read('buyer_add');
			if ($access && !empty($this->input->post('nama')))
			{
				
			}
			elseif ($access && empty($this->input->post('nama')))
			{
				redirect(base_url('buyer'));
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
			$access = $this->auth->privileges_read('buyer_delete');
			if ($access && !empty($id))
			{
				
			}
			elseif ($access && empty($id))
			{
				redirect(base_url('buyer'));
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
	 * _show_interface method
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