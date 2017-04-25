<?php

/**
* 
*/
class Route_ring extends MX_Controller
{
	private $_access;

	function __construct()
	{
		parent::__construct();
		$this->load->model('Route_ringModel');
		$this->load->module('auth');
		$this->_access = $this->auth->privileges_read('ring');
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
			$data['area_data'] = $this->Route_ringModel->browse();
			$this->_show_interface('browse',$data);			
		}
		else
		{
			redirect(base_url());
		}
		
	}

	/**
	 * read method
	 */
	public function read($id)
	{
		if ($this->_access)
		{
			$detail_route_ring = $this->Route_ringModel->read($id);
			foreach ($detail_route_ring as $data)
			{
				echo "
				<div class='modal-header'>
				<h1 class='modal-title'>Edit Route and Ring</h1>
				</div>
				<form class='form-horizontal' method='post'  id='edit_form_route'>
				<div class='modal-body'>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Desa</label>
				<div class='col-xs-7'>
				<input name='desa' id='desa_edit' type='text' class='form-control' value='".$data->desa."'required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Jalur</label>
				<div class='col-xs-7'>
				<input name='jalur' id='jalur_edit' type='number' step=1 min=0 class='form-control' value='".$data->jalur."'required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Ring</label>
				<div class='col-xs-7'>
				<input name='ring' id='ring_edit' type='number' step=1 min=0 class='form-control' value='".$data->ring."'required>
				</div>
				</div>
				</div>
				<div class='modal-footer'>
				<div class='col-xs-6'>
				<button class='btn btn-success' type='submit' id='save_edit_route'><i class='fa fa-save'></i> Save</button>
				</div>
				<div class='col-xs-6 push-left'>
				<button class='btn btn-danger push-left' type='button' data-dismiss='modal'><i class='fa fa-times'></i> Cancel</button>
				</div>
				</div>
				</form>
				";
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
		if ($this->_access)
		{
			$save_route_data = array(
				'desa' => $this->input->post('desa'),
				'jalur' => $this->input->post('jalur'),
				'ring' => $this->input->post('ring'),
			);
			echo ($this->Route_ringModel->edit($id, $save_route_data) ? redirect(base_url('route_ring')) : '!save');
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
		if ($this->_access)
		{
			if (empty($this->input->post('desa')))
			{
				echo "
				<div class='modal-header'>
				<h1 class='modal-title'>Add Route and Ring</h1>
				</div>
				<form class='form-horizontal' method='post'  id='add_form_route'>
				<div class='modal-body'>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Desa</label>
				<div class='col-xs-7'>
				<input name='desa' id='desa_add' type='text' class='form-control' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Jalur</label>
				<div class='col-xs-7'>
				<input name='jalur' id='jalur_add' type='number' step=1 min=0 class='form-control' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Ring</label>
				<div class='col-xs-7'>
				<input name='ring' id='ring_add' type='number' step=1 min=0 class='form-control' required>
				</div>
				</div>
				</div>
				<div class='modal-footer'>
				<div class='col-xs-6'>
				<button class='btn btn-success' type='submit' id='save_add_route'><i class='fa fa-save'></i> Save</button>
				</div>
				<div class='col-xs-6 push-left'>
				<button class='btn btn-danger push-left' type='button' data-dismiss='modal'><i class='fa fa-times'></i> Cancel</button>
				</div>
				</div>
				</form>
				";
			}
			else
			{
				$save_route_data = array(
					'desa' => $this->input->post('desa'),
					'jalur' => $this->input->post('jalur'),
					'ring' => $this->input->post('ring'),
				);
				$this->Route_ringModel->add($save_route_data) ? redirect(base_url('route_ring')) : '!save';
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
		if ($this->_access)
		{
			echo($this->Route_ringModel->delete($id) ? 'success' : '!success');
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