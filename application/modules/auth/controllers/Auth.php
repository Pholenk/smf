<?php

/**
 * author: Pholenk
 * email: pholenkadi17@gmail.com
 * github: Pholenk
 */

class Auth extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->helper('url');
	}

	public function index()
	{
		($this->_is_login() === FALSE ? $this->load->view('login') : redirect(base_url('users/')));
	}

	/**
	 * login method
	 * create user's session
	 */
	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$query = $this->AuthModel->login($email, $password);
		if(!empty($query))
		{
			$id = $query->id;
			$jabatan = $query->jabatan;
			$nama = $query->name_full;
			if(!empty($id) && !empty($jabatan))
			{
				$data = array(
				'id' => $id,
				'nama' => $nama,
				'jabatan' => $jabatan,
				'logged_in' => TRUE
				);
				$this->session->set_userdata($data);
				echo 'TRUE';
			}
		}
	}

	/**
	 * is_login method
	 * check that user is currently logged in
	 */
	function _is_login()
	{
		return (!empty($this->session->userdata('logged_in')) ? TRUE : FALSE);
	}

	/**
	 * logout method
	 * destroy user's session
	 */
	public function logout()
	{
		$this->session->unset_userdata('id','jabatan','logged_in');
		session_destroy();
		redirect(base_url());
	}

	/**
	 * privileges_read method
	 * allow or disallow user to access a page
	 */
	public function privileges_read($column)
	{
		$id = $this->session->id;
		$query = $this->AuthModel->privileges_read($id, $column);
		if($this->_is_login() && $query === 1)
		{
			return TRUE;
		}
		elseif ($this->_is_login() && $query !== 0)
		{
			$this->load->view('head');
			$this->load->view('navbar');
			$this->load->view('Unauthorize');
			$this->load->view('sidebar');
			$this->load->view('foot');
		}
		else
		{
			return FALSE;
		}
	}

}