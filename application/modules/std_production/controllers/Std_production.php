<?php

/**
* 
*/
class Std_production extends MX_Controller
{
	private $_access;

	function __construct()
	{
		parent::__construct();
		$this->load->module('auth');
		$this->load->model('ProductionModel');
		$this->_access = $this->auth->privileges_read('standard');
	}

	/**
	 * index method
	 */
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
			$data['production_data'] = $this->ProductionModel->browse();
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
			$production_read_data = $this->ProductionModel->read($id);
			foreach ($production_read_data as $data) 
			{
				echo "
				<div class='modal-header'>
				<h1 class='modal-title'>Edit Standard Production</h1>
				</div>
				<form class='form-horizontal' method='post'  id='edit_form_std_prod'>
				<div class='modal-body'>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Berat</label>
				<div class='col-xs-7'>
				<input name='berat_badan' id='berat_edit' type='number' step=0.0001 min=0 class='form-control' value='".$data->berat_badan."'required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Feed Convertion Ratio</label>
				<label class='col-xs-7 control-label' style='text-align:left;' id='fcr_edit'>".$data->fcr."</label>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Mortalitas</label>
				<div class='col-xs-7'>
				<input name='mortalitas' id='mortalitas_edit' type='number' step=0.0001 min=0 class='form-control' value='".$data->mortalitas."'required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Feed Intake</label>
				<div class='col-xs-7'>
				<input name='feed' id='feed_edit' type='number' step=0.0001 min=0 class='form-control' value='".$data->feed_intake."'required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Umur</label>
				<div class='col-xs-7'>
				<input name='age' id='age_edit' type='number' step=0.0001 min=0 class='form-control' value='".$data->age."'required>
				</div>
				</div>
				</div>
				<div class='modal-footer'>
				<div class='col-xs-6'>
				<button class='btn btn-success' type='submit' id='save_edit_std_prod'><i class='fa fa-save'></i> Save</button>
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
			redirect(base_url('/std_production'));
		}
		else
		{
			echo "!LOGIN";
		}
	}

	/**
	 * edit method
	 */
	public function edit($id = '')
	{
		if ($this->_access && !empty($id))
		{
			$fcr = $this->input->post('feed') / ($this->input->post('berat_badan') * 1000);
			$production_data_edit = array(
				'berat_badan' => $this->input->post('berat_badan'),
				'mortalitas' => $this->input->post('mortalitas'),
				'feed_intake' => $this->input->post('feed'),
				'age' => $this->input->post('age'),
				'fcr' => $fcr,
				);
			echo ($this->ProductionModel->edit($id, $production_data_edit) ? 'SUCCESS' : '!SUCCESS');
		}
		elseif ($this->_access && empty($id))
		{
			redirect(base_url('/std_production'));
		}
		else
		{
			echo "!LOGIN";
		}
	}

	/**
	 * add method
	 */
	public function add()
	{
		if ($this->_access && empty($this->input->post('berat_badan')))
		{
			echo "
			<div class='modal-header'>
			<h1 class='modal-title'>Add Standard Production</h1>
			</div>
			<form class='form-horizontal' method='post' id='add_form_std_prod'>
			<div class='modal-body'>
			<div class='form-group'>
			<label class='col-xs-4 control-label'>Berat</label>
			<div class='col-xs-7'>
			<input name='berat_badan' id='berat_add' type='number' step=0.0001 min=0 class='form-control' required>
			</div>
			</div>
			<div class='form-group'>
			<label class='col-xs-4 control-label'>Feed Convertion Ratio</label>
			<label class='col-xs-7 control-label' style='text-align:left;' id='fcr_add'></label>
			</div>
			<div class='form-group'>
			<label class='col-xs-4 control-label'>Mortalitas</label>
			<div class='col-xs-7'>
			<input name='mortalitas' id='mortalitas_add' type='number' step=0.0001 min=0 class='form-control' required>
			</div>
			</div>
			<div class='form-group'>
			<label class='col-xs-4 control-label'>Feed Intake</label>
			<div class='col-xs-7'>
			<input name='feed' id='feed_add' type='number' step=0.0001 min=0 class='form-control' required>
			</div>
			</div>
			<div class='form-group'>
			<label class='col-xs-4 control-label'>Umur</label>
			<div class='col-xs-7'>
			<input name='age' id='age_add' type='number' step=0.0001 min=0 class='form-control' required>
			</div>
			</div>
			</div>
			<div class='modal-footer'>
			<div class='col-xs-6'>
			<button class='btn btn-success' type='submit' id='save_add_std_prod'><i class='fa fa-save'></i> Save</button>
			</div>
			<div class='col-xs-6 push-left'>
			<button class='btn btn-danger push-left' type='button' data-dismiss='modal'><i class='fa fa-times'></i> Cancel</button>
			</div>
			</div>
			</form>";
		} 
		elseif($this->_access && !empty($this->input->post('berat_badan')))
		{
			$fcr = $this->input->post('feed') / ($this->input->post('berat_badan') * 1000);
			$production_data_add = array(
				'berat_badan' => $this->input->post('berat_badan'),
				'mortalitas' => $this->input->post('mortalitas'),
				'feed_intake' => $this->input->post('feed'),
				'age' => $this->input->post('age'),
				'fcr' => $fcr,
				);
			echo($this->ProductionModel->add($production_data_add) ? 'SUCCESS' : '!SUCCESS');
		}
		else
		{
			echo "!LOGIN";
		}
	}

	/**
	 * delete method
	 */
	public function delete($id = '')
	{
		if ($this->_access)
		{
			(empty($id) ? redirect(base_url('/std_production')) : $this->ProductionModel->delete($id) && redirect(base_url('/std_production')));
		}
		else
		{
			redirect(base_url());
		}
	}

	/**
	 * show interface
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
	}
}