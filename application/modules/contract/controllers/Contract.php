<?php

/**
* 
*/
class Contract extends MX_Controller
{
	private $_access;

	function __construct()
	{
		parent::__construct();
		$this->load->module('auth');
		$this->load->model('ContractModel');
		$this->_access = $this->auth->privileges_read('contract');
	}

	/**
	 * index method
	 */
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
			$type_contract = array(
					'doc',
					'pakan',
					'ovk',
					'harga_beli',
					'selisih_fcr',
					'bonus_pasar',
				);
			foreach ($type_contract as $table) {
				$data[$table] = $this->ContractModel->browse($table);
			}
			$this->_show_interface('browse', $data);
		}
		else
		{
			$this->_show_interface('Unauthorize', '');
		}
	}

	/**
	 * read method
	 */
	public function read($type_contract, $id)
	{
		if ($this->_access && !empty($type_contract) && !empty($id))
		{
			if ($type_contract == 'doc' || $type_contract == 'pakan' || $type_contract == 'ovk' )
			{
				$contract_detail = $this->ContractModel->read($type_contract, $id);
				foreach ($contract_detail as $data)
				{
					echo "
						<div class='modal-header'>
						<h1 class='modal-title'>Edit ".str_replace('-', ' ', $type_contract)." contract</h1>
						</div>
						<form class='form-horizontal' method='post' id='edit_form_contract'>
						<div class='modal-body'>
						<div class='form-group'>
						<label class='col-xs-4 control-label'>Jenis</label>
						<div class='col-xs-7'>
						<input name='jenis' id='jenis_edit' type='text' class='form-control' value='".$data->jenis."'required>
						</div>
						</div>
						<div class='form-group'>
						<label class='col-xs-4 control-label'>Harga</label>
						<div class='col-xs-7'>
						<input name='harga' id='harga_edit' type='number' step=1 min=0 class='form-control' value='".$data->harga."' required>
						</div>
						</div>
						<div class='modal-footer'>
						<div class='col-xs-6'>
						<button class='btn btn-success' type='submit' id='save_edit_contract'><i class='fa fa-save'></i> Save</button>
						</div>
						<div class='col-xs-6 push-left'>
						<button class='btn btn-danger push-left' type='button' data-dismiss='modal'><i class='fa fa-times'></i> Cancel</button>
						</div>
						</div>
						</div>
						</form>";
				}
			}

			else
			{
				$contract_detail = $this->ContractModel->read($type_contract, $id);
				foreach ($contract_detail as $data)
				{
					echo "
						<div class='modal-header'>
						<h1 class='modal-title'>Edit ".str_replace('-', ' ', $type_contract)." contract</h1>
						</div>
						<form class='form-horizontal' method='post' id='edit_form_contract'>
						<div class='modal-body'>
						<div class='form-group'>
						<label class='col-xs-4 control-label'>Range / Bobot</label>
						<div class='col-xs-2'>
						<input name='bobot_from' id='bobot_from' type='text' class='form-control' value='".$data->from."' required>
						</div>
						<label class='col-xs-3 control-label' style='text-align:center;'>sampai dengan</label>
						<div class='col-xs-2'>
						<input name='bobot_to' id='bobot_to' type='text' class='form-control' value='".$data->to."' required>
						</div>
						</div>
						<div class='form-group'>
						<label class='col-xs-4 control-label'>Mortalitas</label>
						<div class='col-xs-7'>
						<input name='harga' id='harga_edit' type='number' step=1 min=0 class='form-control' value='".$data->harga."' required>
						</div>
						</div>
						<div class='modal-footer'>
						<div class='col-xs-6'>
						<button class='btn btn-success' type='submit' id='save_edit_contract'><i class='fa fa-save'></i> Save</button>
						</div>
						<div class='col-xs-6 push-left'>
						<button class='btn btn-danger push-left' type='button' data-dismiss='modal'><i class='fa fa-times'></i> Cancel</button>
						</div>
						</div>
						</div>
						</form>";
				}
			}
		}
		else
		{
			$this->_show_interface('Unauthorize', '');
		}		
	}

	/**
	 * edit method
	 */
	public function edit($type_contract, $id)
	{
		if ($this->_access && !empty($type_contract) && !empty($id))
		{
			$save_data = '';
			if ($type_contract == 'doc' || $type_contract == 'pakan' || $type_contract == 'ovk' )
			{
				$save_data = array(
						'id' => $id,
						'jenis' => $this->input->post('jenis'),
						'harga' => $this->input->post('harga'),
					);
			}
			else
			{
				$save_data = array(
						'id' => $id,
						'from' => $this->input->post('bobot_from'),
						'to' => $this->input->post('bobot_to'),
						'harga' => $this->input->post('harga'),
					);
			}
			echo($this->ContractModel->edit(str_replace('-', '_', $type_contract), $save_data) ? 'success' : '!success');
		}
		else
		{
			#code
		}
	}

	/**
	 * add method
	 */
	public function add($type_contract)
	{
		if ($this->_access && !empty($type_contract))
		{
			if (empty($this->input->post('harga')))
			{
				if ($type_contract == 'doc' || $type_contract == 'pakan' || $type_contract == 'ovk' )
				{
					echo "
						<div class='modal-header'>
						<h1 class='modal-title'>Add ".str_replace('-', ' ', $type_contract)." contract</h1>
						</div>
						<form class='form-horizontal' method='post' id='add_form_contract'>
						<div class='modal-body'>
						<div class='form-group'>
						<label class='col-xs-4 control-label'>Jenis</label>
						<div class='col-xs-7'>
						<input name='jenis' id='jenis_add' type='text' class='form-control' required>
						</div>
						</div>
						<div class='form-group'>
						<label class='col-xs-4 control-label'>Harga</label>
						<div class='col-xs-7'>
						<input name='harga' id='harga_add' type='number' step=1 min=0 class='form-control' required>
						</div>
						</div>
						<div class='modal-footer'>
						<div class='col-xs-6'>
						<button class='btn btn-success' type='submit' id='save_add_contract'><i class='fa fa-save'></i> Save</button>
						</div>
						<div class='col-xs-6 push-left'>
						<button class='btn btn-danger push-left' type='button' data-dismiss='modal'><i class='fa fa-times'></i> Cancel</button>
						</div>
						</div>
						</div>
						</form>";
					
				}
				else
				{
					echo "
						<div class='modal-header'>
						<h1 class='modal-title'>Add ".str_replace('-', ' ', $type_contract)." contract</h1>
						</div>
						<form class='form-horizontal' method='post' id='add_form_contract'>
						<div class='modal-body'>
						<div class='form-group'>
						<label class='col-xs-4 control-label'>Range / Bobot</label>
						<div class='col-xs-2'>
						<input name='bobot_from' id='bobot_from' type='text' class='form-control' required>
						</div>
						<label class='col-xs-3 control-label' style='text-align:center;'>sampai dengan</label>
						<div class='col-xs-2'>
						<input name='bobot_to' id='bobot_to' type='text' class='form-control' required>
						</div>
						</div>
						<div class='form-group'>
						<label class='col-xs-4 control-label'>Mortalitas</label>
						<div class='col-xs-7'>
						<input name='harga' id='harga_add' type='number' step=1 min=0 class='form-control' required>
						</div>
						</div>
						<div class='modal-footer'>
						<div class='col-xs-6'>
						<button class='btn btn-success' type='submit' id='save_add_contract'><i class='fa fa-save'></i> Save</button>
						</div>
						<div class='col-xs-6 push-left'>
						<button class='btn btn-danger push-left' type='button' data-dismiss='modal'><i class='fa fa-times'></i> Cancel</button>
						</div>
						</div>
						</div>
						</form>";	
				}
			}
			else
			{
				$save_data = '';
				if ($type_contract == 'doc' || $type_contract == 'pakan' || $type_contract == 'ovk' )
				{
					$save_data = array(
							'jenis' => $this->input->post('jenis'),
							'harga' => $this->input->post('harga'),
						);
				}
				else
				{
					$save_data = array(
							'from' => $this->input->post('bobot_from'),
							'to' => $this->input->post('bobot_to'),
							'harga' => $this->input->post('harga'),
						);
				}
				echo($this->ContractModel->add(str_replace('-', '_', $type_contract), $save_data) ? 'success' : '!success');
			}
		}
		else
		{
			redirect(base_url('contract/'));
		}
	}

	/**
	 * delete method
	 */
	public function delete($type_contract, $id)
	{
		if ($this->_access && !empty($type_contract) && !empty($id))
		{
			echo($this->ContractModel->delete(str_replace('-', '_', $type_contract), $id) ? redirect(base_url('contract')) : redirect(base_url()));
		}
		else
		{
			redirect(base_url('contract'));
		}
	}

	/**
	 * _show_interface method
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