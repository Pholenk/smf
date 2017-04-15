<?php

/**
 * author: Pholenk
 * email: pholenkadi17@gmail.com
 * github: Pholenk
 */

class Breeder extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('BreederModel');
		$this->load->module('auth');
	}

	public function index()
	{
		$this->browse();
	}

	public function browse()
	{
		# code...
	}

	public function read($id)
	{
		# code...
	}

	public function edit($id)
	{
		# code...
	}

	public function add()
	{
		# code...
	}

	public function delete($id)
	{
		# code...
	}

	public function show_interface($page, $data)
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