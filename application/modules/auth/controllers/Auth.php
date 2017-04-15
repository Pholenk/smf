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
		$this->load->module('users');
		$this->load->helper('url');
	}

	public function index()
	{
		if($this->is_login() === FALSE)
		{
			$this->load->view('login');
		}
		else
		{
			redirect(base_url('users/'));
		}
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
		// $this->load->view('test',$query);
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
	public function is_login()
	{
		return ($this->session->userdata('logged_in') ? TRUE : FALSE);
		echo($this->session->userdata('logged_in'));
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
		if(!empty($this->session->id))
		{
			$id = $this->session->id;
			$query = $this->AuthModel->privileges_read($id, $column);
			return ($query->$column == 1 ? TRUE : FALSE);
		}
		else
		{
			redirect(base_url());
		}
	}

}