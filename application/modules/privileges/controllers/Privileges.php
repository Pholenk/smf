<?php

class Privileges extends MX_Controller
{
	private $is_login;
	private $headersColumn = array(
					'privileges_browse' => 'Privileges Browse',
					'privileges_read' => 'Privileges Read',
					'privileges_edit' => 'Privileges Edit',
					'users_browse' => 'Users Browse',
					'users_read' => 'Users Read',
					'users_edit' => 'Users Edit',
					'users_add' => 'Users Add',
					'users_delete' => 'Users Delete',
					'standard_browse' => 'Standard Browse',
					'standard_edit' => 'Standard Edit',
					'standard_add' => 'Standard Add',
					'standard_delete' => 'Standard Delete',
					'contract_browse' => 'Contract Browse',
					'contract_read' => 'Contract Read',
					'contract_edit' => 'Contract Edit',
					'contract_add' => 'Contract Add',
					'contract_delete' => 'Contract Delete',
					'ring_browse' => 'Ring Browse',
					'ring_read' => 'Ring Read',
					'ring_edit' => 'Ring Edit',
					'ring_add' => 'Ring Add',
					'ring_delete' => 'Ring Delete',
					'ts_browse' => 'Technical Support Browse',
					'ts_read' => 'Technical Support Read',
					'ts_edit' => 'Technical Support Edit',
					'ts_add' => 'Technical Support Add',
					'ts_delete' => 'Technical Support Delete',
					'breeder_browse' => 'Breeder Browse',
					'breeder_read' => 'Breeder Read',
					'breeder_edit' => 'Breeder Edit',
					'breeder_add' => 'Breeder Add',
					'breeder_delete' => 'Breeder Delete',
					'supplier_browse' => 'Supplier Browse',
					'supplier_read' => 'Supplier Read',
					'supplier_edit' => 'Supplier Edit',
					'supplier_add' => 'Supplier Add',
					'supplier_delete' => 'Supplier Delete',
					'supplier_prod_browse' => 'Supplier Products Browse',
					'supplier_prod_read' => 'Supplier Products Read',
					'supplier_prod_edit' => 'Supplier Products Edit',
					'supplier_prod_add' => 'Supplier Products Add',
					'supplier_prod_delete' => 'Supplier Products Delete',
					'buyer_browse' => 'Buyer Browse',
					'buyer_read' => 'Buyer Read',
					'buyer_edit' => 'Buyer Edit',
					'buyer_add' => 'Buyer Add',
					'buyer_delete' => 'Buyer Delete',
					'breeder_score_browse' => 'Breeder Score Browse',
					'breeder_score_read' => 'Breeder Score Read',
					'breeder_score_edit' => 'Breeder Score Edit',
					'breeder_score_add' => 'Breeder Score Add',
					'breeder_score_delete' => 'Breeder Score Delete',
				);

	function __construct()
	{
		parent::__construct();
		$this->load->module('auth');
		$this->load->model('PrivilegesModel');
		$this->is_login = $this->auth->is_login();
	}


	public function index()
	{
		$this->browse();
	}

	public function browse()
	{
		if ($this->is_login)
		{
			$access = $this->auth->privileges_read('privileges_browse');
			if ($access)
			{
				$this->load->model('UsersModel');
				$data['users_data'] = $this->UsersModel->browse();
				$this->show_interface('browse', $data);
			}
			else
			{
				$this->show_interface('Unauthorize', '');
			}
		}
		else
		{
			redirect(base_url());
		}
	}

	public function read($id)
	{
		if ($this->is_login)
		{
			$access = $this->auth->privileges_read('privileges_read');
			if ($access)
			{
				$user_privileges = $this->PrivilegesModel->read($id);
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
				$this->show_interface('Unauthorize', '');
			}
		}
		else
		{
			echo '!LOGIN';
		}
	}

	public function edit($id)
	{
		if ($this->is_login)
		{
			$access = $this->auth->privileges_read('privileges_edit');
			if ($access)
			{
				if(substr($id, 0, 2) !== 'IU')
				{
					$data['old_data'] = $this->PrivilegesModel->read($id);
					$data['headersColumn'] = $this->headersColumn;
					$this->show_interface('edit', $data);
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

					if($this->PrivilegesModel->edit($id, $data['privileges']))
					{
						redirect(base_url('/privileges'));
					}
				}
			}
			else
			{
				$this->show_interface('Unauthorize', '');				
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