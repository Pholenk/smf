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

	public function read($id = '')
	{
		if ($this->_access && !empty($id))
		{
			$user_privileges = $this->PrivilegesModel->read($id);
			echo "
			<table class='table table-bordered table-hover'>
			<tbody>";
			foreach ($this->headersColumn as $header => $headervalue)
			{
				echo "
				<tr><th style='width:25%;'>".$headervalue."</th>
				<td align='center'>";
				foreach ($user_privileges as $data) {
					echo ($data->$header == 1 ? "<i class='fa fa-check' style='color:green;'></i>" : "<i class='fa fa-circle-o'></i>");
				}
				echo "
				</td>
				</tr>";
			}
			echo "
			</tbody>
			</table>";
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
			if(empty($this->input->post('privileges')))
			{
				$identifier='';
				$old_data = $this->PrivilegesModel->read($id);
				echo "<form class='form-horizontal' method='post' id='form_edit_privileges'>
				<div class='row'>				
				";
				foreach ($this->headersColumn as $key => $value)
				{
					foreach ($old_data as $data)
					{
						echo "
						<div class='checkbox'>
						<div class='col-sm-4'>
						<label style='font-weight:bold;'>".$value."</label>
						</div>
						<div class='col-sm-8' style='text-align:center;'>
						<input name='".$key."' type='checkbox' value = '1' ".($data->$key == 1 ? 'checked' : '').">
						</div>
						</div>";
						$identifier = $data->id;
					}
				}
				echo "
				</div>
				<div class='row'>
				<div class='col-sm-6'>
				<button type='button' class='btn btn-success pull-right' id='save_edit_priv_".$identifier."'><i class='fa fa-save'></i> Save</button>
				</div>
				<div class='col-sm-6'>
				<button class='btn btn-danger'id='cancel_edit_priv'><i class='fa fa-time'></i> Cancel</button>
				</div>
				</div>
				</form>";
			}
			else
			{
				$data['privileges'] = array(
						'privileges' => (empty($this->input->post('privileges')) ? 0 : 1),
						'users' => (empty($this->input->post('users')) ? 0 : 1),
						'standard' => (empty($this->input->post('standard')) ? 0 : 1),
						'contract' => (empty($this->input->post('contract')) ? 0 : 1),
						'ring' => (empty($this->input->post('ring')) ? 0 : 1),
						'ts' => (empty($this->input->post('ts')) ? 0 : 1),
						'breeder' => (empty($this->input->post('breeder')) ? 0 : 1),
						'supplier' => (empty($this->input->post('supplier')) ? 0 : 1),
						'supplier_prod' => (empty($this->input->post('supplier_prod')) ? 0 : 1),
						'buyer' => (empty($this->input->post('buyer')) ? 0 : 1),
						'breeder_score' => (empty($this->input->post('breeder_score')) ? 0 : 1),
				);

				echo($this->PrivilegesModel->edit($id, $data['privileges']) ? $this->read($id) : '!success');
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