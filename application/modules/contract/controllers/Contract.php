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
		$this->_browse();
	}

	/**
	 * browse method
	 */
	function _browse()
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
			redirect(base_url());
		}
	}

	/**
	 * read method
	 */
	public function read($type_contract = '' , $id = '')
	{
		$typeContract = str_replace('-', '_', $type_contract);
		if ($this->_access && !empty($typeContract) && !empty($id))
		{
			if ($typeContract == 'doc' || $typeContract == 'pakan' || $typeContract == 'ovk' )
			{
				$contract_detail = $this->ContractModel->read($typeContract, $id);
				foreach ($contract_detail as $data)
				{
					echo "
						<div class='modal-header'>
						<h1 class='modal-title'>Edit contract ".str_replace('_', ' ', $typeContract)."</h1>
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
			
			elseif ($typeContract == 'selisih_fcr' || $typeContract == 'harga_beli')
			{
				$contract_detail = $this->ContractModel->read($typeContract, $id);
				foreach ($contract_detail as $data)
				{
					echo "
						<div class='modal-header'>
						<h1 class='modal-title'>Edit contract ".str_replace('_', ' ', $typeContract)."</h1>
						</div>
						<form class='form-horizontal' method='post' id='edit_form_contract'>
						<div class='modal-body'>
						<div class='form-group'>
						<label class='col-xs-3 control-label'>Range / Bobot</label>
						<div class='col-xs-3'>
						<input name='bobot_from' id='bobot_from' type='number' step=0.001 min=0 class='form-control' value='".$data->from."' required>
						</div>
						<label class='col-xs-3 control-label' style='text-align:center;'>sampai dengan</label>
						<div class='col-xs-3'>
						<input name='bobot_to' id='bobot_to' type='number' step=0.001 min=0 class='form-control' value='".$data->to."' required>
						</div>
						</div>
						<div class='form-group'>
						<label class='col-xs-3 control-label'>Harga</label>
						<div class='col-xs-9'>
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

			elseif ($typeContract == 'bonus_pasar' )
			{
				$contract_detail = $this->ContractModel->read($typeContract, $id);
				foreach ($contract_detail as $data)
				{
					echo "
						<div class='modal-header'>
						<h1 class='modal-title'>Edit contract ".str_replace('_', ' ', $typeContract)."</h1>
						</div>
						<form class='form-horizontal' method='post' id='edit_form_contract'>
						<div class='modal-body'>
						<div class='form-group'>
						<label class='col-xs-3 control-label'>Range / Bobot</label>
						<div class='col-xs-3'>
						<input name='bobot_from' id='bobot_from' type='number' step=0.001 min=0 class='form-control' value='".$data->from."' required>
						</div>
						<label class='col-xs-3 control-label' style='text-align:center;'>sampai dengan</label>
						<div class='col-xs-3'>
						<input name='bobot_to' id='bobot_to' type='number' step=0.001 min=0 class='form-control' value='".$data->to."' required>
						</div>
						</div>
						<div class='form-group'>
						<label class='col-xs-3 control-label'>Mortalitas</label>
						<div class='col-xs-9'>
						<input name='bonus' id='bonus_edit' type='number' step=1 min=0 class='form-control' value='".$data->bonus."' required>
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
			redirect(base_url());
		}		
	}

	/**
	 * edit method
	 */
	public function edit($type_contract = '' , $id)
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
			elseif ($typeContract == 'selisih_fcr' || $typeContract == 'harga_beli')
			{
				$save_data = array(
						'id' => $id,
						'from' => $this->input->post('bobot_from'),
						'to' => $this->input->post('bobot_to'),
						'harga' => $this->input->post('harga'),
					);
			}
			elseif ($typeContract == 'bonus_pasar' )
			{
				$save_data = array(
						'id' => $id,
						'from' => $this->input->post('bobot_from'),
						'to' => $this->input->post('bobot_to'),
						'bonus' => $this->input->post('bonus'),
					);
			}
			echo($this->ContractModel->edit(str_replace('-', '_', $type_contract), $save_data) ? 'success' : '!success');
		}
		else
		{
			redirect(base_url());
		}
	}

	/**
	 * add method
	 */
	public function add($typeContract = '')
	{
		$type_contract = str_replace('-', '_', $typeContract);
		if ($this->_access && !empty($typeContract))
		{
			$saveData = '';
			
			if ($type_contract == 'doc' || $type_contract == 'pakan' || $type_contract == 'ovk')
			{
				if (empty($this->input->post('harga')))
				{
					echo "
						<div class='modal-header'>
						<h1 class='modal-title'>Add contract ".str_replace('_',' ',$type_contract)."</h1>
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
					$saveData = array(
						'jenis' => $this->input->post('jenis'),
						'harga' => $this->input->post('harga'),
					);
					$result = $this->ContractModel->add($type_contract, $saveData);
					echo ($result ? 'success' : '!success');
				}
				
			}
			elseif ($type_contract == 'selisih_fcr' || $type_contract == 'harga_beli')
			{
				if (empty($this->input->post('harga')))
				{					
					echo "
					<div class='modal-header'>
					<h1 class='modal-title'>Add contract ".str_replace('_', ' ', $type_contract)."</h1>
					</div>
					<form class='form-horizontal' method='post' id='add_form_contract'>
					<div class='modal-body'>
					<div class='form-group'>
					<label class='col-xs-3 control-label'>Range / Bobot</label>
					<div class='col-xs-3'>
					<input name='bobot_from' id='bobot_from_add' type='number' step=0.001 min=0 class='form-control' required>
					</div>
					<label class='col-xs-3 control-label' style='text-align:center;'>sampai dengan</label>
					<div class='col-xs-3'>
					<input name='bobot_to' id='bobot_to_add' type='number' step=0.001 min=0 class='form-control' required>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-3 control-label'>Harga</label>
					<div class='col-xs-9'>
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
					$saveData = array(
						'from' => $this->input->post('bobot_from'),
						'to' => $this->input->post('bobot_to'),
						'harga' => $this->input->post('harga'),
					);
					$result = $this->ContractModel->add($type_contract, $saveData);
					echo ($result ? 'success' : '!success');
				}
			}
			elseif ($type_contract == 'bonus_pasar')
			{
				if (empty($this->input->post('bonus')))
				{
					echo "
					<div class='modal-header'>
					<h1 class='modal-title'>Add contract ".str_replace('_', ' ', $type_contract)."</h1>
					</div>
					<form class='form-horizontal' method='post' id='add_form_contract'>
					<div class='modal-body'>
					<div class='form-group'>
					<label class='col-xs-3 control-label'>Range / Bobot</label>
					<div class='col-xs-3'>
					<input name='bobot_from' id='bobot_from_add' type='number' step=0.001 min=0 class='form-control' required>
					</div>
					<label class='col-xs-3 control-label' style='text-align:center;'>sampai dengan</label>
					<div class='col-xs-3'>
					<input name='bobot_to' id='bobot_to_add' type='number' step=0.001 min=0 class='form-control' required>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-3 control-label'>Bonus</label>
					<div class='col-xs-9'>
					<input name='bonus' id='bonus_add' type='number' step=1 min=0 class='form-control' required>
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
					$saveData = array(
						'from' => $this->input->post('bobot_from'),
						'to' => $this->input->post('bobot_to'),
						'bonus' => $this->input->post('bonus'),
					);
					$result = $this->ContractModel->add($type_contract, $saveData);
					echo ($result ? 'success' : '!success');
				}
			}
		}
		elseif ($this->_access && empty($type_contract))
		{
			redirect(base_url('/contract'));
		}
		else
		{
			redirect(base_url());
		}
	}

	/**
	 * delete method
	 */
	public function delete($type_contract = '', $id = '')
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