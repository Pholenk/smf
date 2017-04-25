<?php

/**
* 
*/
class Breeder_score extends MX_Controller
{
	private $_access;

	function __construct()
	{
		parent::__construct();
		$this->load->model('Breeder_scoreModel');
		$this->load->module('auth');
		$this->_access = $this->auth->privileges_read('breeder_score');

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
		if ($this->_access)
		{
			$data['breeder_score_data'] = $this->Breeder_scoreModel->browse();
			$this->_show_interface('browse', $data);
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
		if ($this->_access && !empty($id))
		{
			$score_detail_data = $this->Breeder_scoreModel->read($id);
				foreach ($score_detail_data as $data)
				{
					echo "
					<div class='modal-header'>
					<h1 class='modal-title'>Edit Breeder Score</h1>
					</div>
					<form class='form-horizontal' method='post' id='edit_form_breeder_score'>
					<div class='modal-body'>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Selisih</label>
					<div class='col-xs-7'>
					<input name='selisih' id='selisih_edit' type='number' step=0.0001 class='form-control' value=".$data->selisih." required>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Score</label>
					<div class='col-xs-7'>
					<input name='score' id='score_edit' type='number' step=1 min=0 class='form-control' value=".$data->score." required>
					</div>
					</div>
					</div>
					<div class='modal-footer'>
					<div class='col-xs-6'>
					<button class='btn btn-success' type='submit' id='save_edit_breeder_score".$data->id."'><i class='fa fa-save'></i> Save</button>
					</div>
					<div class='col-xs-6 push-left'>
					<button class='btn btn-danger push-left' type='button' data-dismiss='modal'><i class='fa fa-times'></i> Cancel</button>
					</div>
					</div>
					</form>";
				}
		}
		elseif ($this->_access && empty($id))
		{
			redirect(base_url('/breeder_score'));
		}
		else
		{
			redirect(base_url());
		}
	}

	/**
	 * edit method
	 */
	public function edit($id = '')
	{
		if ($this->_access && !empty($id))
		{
			$breeder_score_data = array(
				'selisih' => $this->input->post('selisih'),
				'score' => $this->input->post('score'),
			);
			echo($this->Breeder_scoreModel->edit($id, $breeder_score_data) ? 'success' : '!succes');
		}
		elseif ($this->_access && empty($id))
		{
			redirect(base_url('/breeder_score'));
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
		if ($this->_access && !empty($this->input->post('selisih')))
		{
			$breeder_score_data = array(
				'selisih' => $this->input->post('selisih'),
				'score' => $this->input->post('score'),
			);
			echo($this->Breeder_scoreModel->add($breeder_score_data) ? 'success' : '!succes');
		}
		elseif ($this->_access && empty($this->input->post('selisih')))
		{
			echo "
			<div class='modal-header'>
			<h1 class='modal-title'>Add Breeder Score</h1>
			</div>
			<form class='form-horizontal' method='post' id='add_form_breeder_score'>
			<div class='modal-body'>
			<div class='form-group'>
			<label class='col-xs-4 control-label'>Selisih</label>
			<div class='col-xs-7'>
			<input name='selisih' id='selisih_add' type='number' step=0.0001 class='form-control' required>
			</div>
			</div>
			<div class='form-group'>
			<label class='col-xs-4 control-label'>Score</label>
			<div class='col-xs-7'>
			<input name='score' id='score_add' type='number' step=1 min=0 class='form-control' required>
			</div>
			</div>
			</div>
			<div class='modal-footer'>
			<div class='col-xs-6'>
			<button class='btn btn-success' type='submit' id='save_add_breeder_score'><i class='fa fa-save'></i> Save</button>
			</div>
			<div class='col-xs-6 push-left'>
			<button class='btn btn-danger push-left' type='button' data-dismiss='modal'><i class='fa fa-times'></i> Cancel</button>
			</div>
			</div>
			</form>";
		}
		else
		{
			redirect(base_url());
		}
	}

	/**
	 * delete method
	 */
	public function delete($id = '')
	{
		if ($this->_access && !empty($id))
		{
			($this->Breeder_scoreModel->delete($id) ? redirect(base_url('breeder_score')) : redirect(base_url()));
		}
		elseif ($this->_access && !empty($id))
		{
			redirect(base_url('/breeder_score'));
		}
		else
		{
			redirect(base_url());
		}
	}

	/**
	 * _show interface
	 */
	function _show_interface($page = 'Unauthorize', $data = '')
	{
		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view($page, $data);
		$this->load->view('sidebar');
		$this->load->view('foot');
	}
}