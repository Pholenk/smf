<?php

class Privileges extends MX_Controller
{
	private $_access;
	private $headersColumn = array(
					'privileges' => 'Privileges',					
					'users' => 'Users',
					'standard' => 'Standard',
					'contract' => 'Contract',
					'ring' => 'Ring',
					'ts' => 'Technical Support',
					'breeder' => 'Breeder',
					'supplier' => 'Supplier',
					'supplier_prod' => 'Supplier Products',
					'buyer' => 'Buyer',
					'breeder_score' => 'Breeder Score',
				);

	function __construct()
	{
		parent::__construct();
		$this->load->module('auth');
		$this->load->model('PrivilegesModel');
		$this->_access = $this->auth->privileges_read('privileges');
	}


	public function index()
	{
		$this->_browse();
	}

	function _browse()
	{
		if ($this->_access)
		{
			$data['users_data'] = $this->PrivilegesModel->browse();
			$this->show_interface('browse', $data);
		}
		else
		{
			redirect(base_url());
		}
	}

	public function read($email = '')
	{
		if ($this->_access && !empty($email))
		{
			$user_privileges = $this->PrivilegesModel->read($email);
			foreach ($this->headersColumn as $header => $headervalue)
			{
				echo "<tr><th style='width:25%;'>".$headervalue."</th>";
				echo "<td align='center'>";
				foreach ($user_privileges as $data) {
					echo ($data->$header == 1 ? "<i class='fa fa-check' style='color:green;'></i>" : "<i class='fa fa-circle-o'></i>");
				}
				echo "</td>";
				echo "</tr>";
			}
		}
		else
		{
			echo '!LOGIN';
		}
	}

	public function edit($id = '')
	{
		if ($this->_access && !empty($id))
		{
			if(substr($id, 0, 2) !== 'IU')
			{
				$old_data = $this->PrivilegesModel->read($id);

				echo "
				<div class='modal-header'>
				<h1 class='modal-title'>Edit User Privileges</h1>
				</div>
				<form class='form-horizontal' method='post'  id='edit_form_user_privileges'>
				<div class='modal-body'>";
				foreach ($this->headersColumn as $header => $headerValue)
				{
					echo
					"<div class='checkbox'>";
					foreach ($old_data as $data)
					{
						echo "
                  	<div class='col-xs-6'>
					<label class='pull-right' style='padding-right:12px;padding-left=8px;font-weight:bold;'>".$headerValue."</label>
					</div>
                  	<div class='col-xs-6'>
					<input name=".$header." type='checkbox' value = '1' ".($data->$header == 1 ? 'checked' : '').">
                  	</div>";
					}
					echo"
					</div>";
				}
				echo "
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
			else
			{
				$data['privileges'] = array(
						'privileges_browse' => (empty($this->input->post('privileges_browse')) ? 0 : 1),
						'privileges_read' => (empty($this->input->post('privileges_read')) ? 0 : 1),
						'privileges_edit' => (empty($this->input->post('privileges_edit')) ? 0 : 1),
						'users_browse' => (empty($this->input->post('users_browse')) ? 0 : 1),
						'users_read' => (empty($this->input->post('users_read')) ? 0 : 1),
						'users_edit' => (empty($this->input->post('users_edit')) ? 0 : 1),
						'users_add' => (empty($this->input->post('users_add')) ? 0 : 1),
						'users_delete' => (empty($this->input->post('users_delete')) ? 0 : 1),
						'standard_browse' => (empty($this->input->post('standard_browse')) ? 0 : 1),
						'standard_edit' => (empty($this->input->post('standard_edit')) ? 0 : 1),
						'standard_add' => (empty($this->input->post('standard_add')) ? 0 : 1),
						'standard_delete' => (empty($this->input->post('standard_delete')) ? 0 : 1),
						'contract_browse' => (empty($this->input->post('contract_browse')) ? 0 : 1),
						'contract_read' => (empty($this->input->post('contract_read')) ? 0 : 1),
						'contract_edit' => (empty($this->input->post('contract_edit')) ? 0 : 1),
						'contract_add' => (empty($this->input->post('contract_add')) ? 0 : 1),
						'contract_delete' => (empty($this->input->post('contract_delete')) ? 0 : 1),
						'ring_browse' => (empty($this->input->post('ring_browse')) ? 0 : 1),
						'ring_read' => (empty($this->input->post('ring_read')) ? 0 : 1),
						'ring_edit' => (empty($this->input->post('ring_edit')) ? 0 : 1),
						'ring_add' => (empty($this->input->post('ring_add')) ? 0 : 1),
						'ring_delete' => (empty($this->input->post('ring_delete')) ? 0 : 1),
						'ts_browse' => (empty($this->input->post('ts_browse')) ? 0 : 1),
						'ts_read' => (empty($this->input->post('ts_read')) ? 0 : 1),
						'ts_edit' => (empty($this->input->post('ts_edit')) ? 0 : 1),
						'ts_add' => (empty($this->input->post('ts_add')) ? 0 : 1),
						'ts_delete' => (empty($this->input->post('ts_delete')) ? 0 : 1),
						'breeder_browse' => (empty($this->input->post('breeder_browse')) ? 0 : 1),
						'breeder_read' => (empty($this->input->post('breeder_read')) ? 0 : 1),
						'breeder_edit' => (empty($this->input->post('breeder_edit')) ? 0 : 1),
						'breeder_add' => (empty($this->input->post('breeder_add')) ? 0 : 1),
						'breeder_delete' => (empty($this->input->post('breeder_delete')) ? 0 : 1),
						'supplier_browse' => (empty($this->input->post('supplier_browse')) ? 0 : 1),
						'supplier_read' => (empty($this->input->post('supplier_read')) ? 0 : 1),
						'supplier_edit' => (empty($this->input->post('supplier_edit')) ? 0 : 1),
						'supplier_add' => (empty($this->input->post('supplier_add')) ? 0 : 1),
						'supplier_delete' => (empty($this->input->post('supplier_delete')) ? 0 : 1),
						'supplier_prod_browse' => (empty($this->input->post('supplier_prod_browse')) ? 0 : 1),
						'supplier_prod_read' => (empty($this->input->post('supplier_prod_read')) ? 0 : 1),
						'supplier_prod_edit' => (empty($this->input->post('supplier_prod_edit')) ? 0 : 1),
						'supplier_prod_add' => (empty($this->input->post('supplier_prod_add')) ? 0 : 1),
						'supplier_prod_delete' => (empty($this->input->post('supplier_prod_delete')) ? 0 : 1),
						'buyer_browse' => (empty($this->input->post('buyer_browse')) ? 0 : 1),
						'buyer_read' => (empty($this->input->post('buyer_read')) ? 0 : 1),
						'buyer_edit' => (empty($this->input->post('buyer_edit')) ? 0 : 1),
						'buyer_add' => (empty($this->input->post('buyer_add')) ? 0 : 1),
						'buyer_delete' => (empty($this->input->post('buyer_delete')) ? 0 : 1),
						'breeder_score_browse' => (empty($this->input->post('breeder_score_browse')) ? 0 : 1),
						'breeder_score_read' => (empty($this->input->post('breeder_score_read')) ? 0 : 1),
						'breeder_score_edit' => (empty($this->input->post('breeder_score_edit')) ? 0 : 1),
						'breeder_score_add' => (empty($this->input->post('breeder_score_add')) ? 0 : 1),
						'breeder_score_delete' => (empty($this->input->post('breeder_score_delete')) ? 0 : 1),
				);

				echo($this->PrivilegesModel->edit($id, $data['privileges']) ? 'success' : '!success');
			}
		}
		else
		{
			redirect(base_url());
		}
	}

	/**
	 * show_interface method
	 * load user interface page which contain the $data
	 */
	private function show_interface($page, $data)
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