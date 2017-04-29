<?php

/**
* 
*/
class Supplier extends MX_Controller
{
	private $_access;

	function __construct()
	{
		parent::__construct();
		$this->load->model('SupplierModel');
		$this->load->module('auth');
		$this->_access = $this->auth->privileges_read('supplier');
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
			$data['supplier_data'] = $this->SupplierModel->browse();
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
			$datestring = '%d - %m - %Y';
			$supplier_read_data = $this->SupplierModel->read($id);
			foreach ($supplier_read_data as $data)
			{
				echo "
				<div class='modal-header'>
				<h1 class='modal-title'>Edit Supplier</h1>
				</div>
				<form class='form-horizontal' method='post' id='edit_form_supplier'>
				<div class='modal-body'>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Nama Perusahaan</label>
				<div class='col-xs-7'>
				<input name='nama_perusahaan' id='nama_perusahaan_edit' type='text' class='form-control' value='".$data->nama_perusahaan."'equired>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Alamat</label>
				<div class='col-xs-7'>
				<input name='alamat' id='alamat_edit' type='text' class='form-control' value='".$data->alamat."' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Telepon Primer</label>
				<div class='col-xs-7'>
				<input name='telepon_primer' id='telepon_primer_edit' type='number' step=1 min=0 class='form-control' value='".$data->telepon_primer."' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Telepon Sekunder</label>
				<div class='col-xs-7'>
				<input name='telepon_sekunder' id='telepon_sekunder_edit' type='number' step=1 min=0 class='form-control' value='".$data->telepon_sekunder."' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Telepon Tersier</label>
				<div class='col-xs-7'>
				<input name='telepon_tersier' id='telepon_Tersier_edit' type='number' step=1 min=0 class='form-control' value='".$data->telepon_tersier."' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Tanggal Gabung</label>
				<label class='col-xs-7 control-label' style='text-align:left;'>".mdate($datestring,time($data->created_at))."</label>
				</div>
				</div>
				<div class='modal-footer'>
				<div class='col-xs-6'>
				<button class='btn btn-success' type='submit' id='save_edit_supplier'><i class='fa fa-save'></i> Save</button>
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
			redirect(base_url('/supplier'));
		}
		else
		{
			echo "!LOGIN";
		}
	}

	public function search($supplierCompany = '')
	{
		if ($this->_access && !empty($supplierCompany))
		{
			$companyData = $this->SupplierModel->search($supplierCompany);
			foreach ($companyData as $data)
			{
				echo "
				<tr id='edit_source_".$data->id."'>
				<td style='text-align:center;'>".$data->id."</td>
				<td style='text-align:center;'>".$data->nama_perusahaan."</td>
				<td style='text-align:center;'>
				<button type='button' class='btn btn-info' data-toggle='modal' data-target='#modal' id='edit_supplier_".$data->id."'><i class='fa fa-edit'></i> EDIT</button>
				<a href='".base_url('/supplier/delete/$data->id')."'>
				<button type='button' class='btn btn-danger'><i class='fa fa-trash'></i> DELETE</button>
				</a>
				</td>
				</tr>
				";
			}
		}
		elseif ($this->_access && empty($supplierCompany)) 
		{
			$companyData = $this->SupplierModel->browse();
			foreach ($companyData as $data)
			{
				echo "
				<tr id='edit_source_".$data->id."'>
				<td style='text-align:center;'>".$data->id."</td>
				<td style='text-align:center;'>".$data->nama_perusahaan."</td>
				<td style='text-align:center;'>
				<button type='button' class='btn btn-info' data-toggle='modal' data-target='#modal' id='edit_supplier_".$data->id."'><i class='fa fa-edit'></i> EDIT</button>
				<a href='".base_url('/supplier/delete/$data->id')."'>
				<button type='button' class='btn btn-danger'><i class='fa fa-trash'></i> DELETE</button>
				</a>
				</td>
				</tr>
				";
			}
		}
		else
		{
			echo "!LOGIN";
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
			$datestring = '%Y-%m-%d %H:%i:%s';
			$supplier_data = array(
				'nama_perusahaan' => $this->input->post('nama_perusahaan'),
				'alamat' => $this->input->post('alamat'),
				'telepon_primer' => $this->input->post('telepon_primer'),
				'telepon_sekunder' => $this->input->post('telepon_sekunder'),
				'telepon_tersier' => $this->input->post('telepon_tersier'),
				'edited_at' => mdate($datestring, time()),
			);
			echo($this->SupplierModel->edit($id, $supplier_data) ? 'success' : '!success');			
		}
		elseif ($this->_access && empty($id))
		{
			redirect(base_url('/supplier'));
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
		if ($this->_access && !empty($this->input->post('nama_perusahaan')))
		{
			$datestring = '%Y-%m-%d %H:%i:%s';
			$id = $this->SupplierModel->idGen();
			$supplier_data = array(
				'id' => $id,
				'nama_perusahaan' => $this->input->post('nama_perusahaan'),
				'alamat' => $this->input->post('alamat'),
				'telepon_primer' => $this->input->post('telepon_primer'),
				'telepon_sekunder' => $this->input->post('telepon_sekunder'),
				'telepon_tersier' => $this->input->post('telepon_tersier'),
				'created_at' => mdate($datestring, time()),
				'edited_at' => mdate($datestring, time()),
			);
			echo($this->SupplierModel->add($supplier_data) ? 'success' : '!success');
		}
		elseif ($this->_access && empty($this->input->post('nama_perusahaan')))
		{
			$datestring = '%d - %m - %Y';
			echo "
			<div class='modal-header'>
			<h1 class='modal-title'>Add Supplier</h1>
			</div>
			<form class='form-horizontal' method='post' id='add_form_supplier'>
			<div class='modal-body'>
			<div class='form-group'>
			<label class='col-xs-4 control-label'>Nama Perusahaan</label>
			<div class='col-xs-7'>
			<input name='nama_perusahaan' id='nama_perusahaan_add' type='text' class='form-control' required>
			</div>
			</div>
			<div class='form-group'>
			<label class='col-xs-4 control-label'>Alamat</label>
			<div class='col-xs-7'>
			<input name='alamat' id='alamat_add' type='text' class='form-control' required>
			</div>
			</div>
			<div class='form-group'>
			<label class='col-xs-4 control-label'>Telepon Primer</label>
			<div class='col-xs-7'>
			<input name='telepon_primer' id='telepon_primer_add' type='number' step=1 min=0 class='form-control' required>
			</div>
			</div>
			<div class='form-group'>
			<label class='col-xs-4 control-label'>Telepon Sekunder</label>
			<div class='col-xs-7'>
			<input name='telepon_sekunder' id='telepon_sekunder_add' type='number' step=1 min=0 class='form-control' required>
			</div>
			</div>
			<div class='form-group'>
			<label class='col-xs-4 control-label'>Telepon Tersier</label>
			<div class='col-xs-7'>
			<input name='telepon_tersier' id='telepon_Tersier_add' type='number' step=1 min=0 class='form-control' required>
			</div>
			</div>
			<div class='form-group'>
			<label class='col-xs-4 control-label'>Tanggal Gabung</label>
			<label class='col-xs-7 control-label' style='text-align:left;'>".mdate($datestring, time())."</label>
			</div>
			</div>
			<div class='modal-footer'>
			<div class='col-xs-6'>
			<button class='btn btn-success' type='submit' id='save_add_supplier'><i class='fa fa-save'></i> Save</button>
			</div>
			<div class='col-xs-6 push-left'>
			<button class='btn btn-danger push-left' type='button' data-dismiss='modal'><i class='fa fa-times'></i> Cancel</button>
			</div>
			</div>
			</form>";
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
		if ($this->_access && !empty($id))
		{
			echo($this->SupplierModel->delete($id) ? redirect(base_url('/supplier')) : redirect(base_url()));
		}
		elseif ($this->_access && empty($id))
		{
			redirect(base_url('/supplier'));
		}
		else
		{
			redirect(base_url());
		}
	}

	/**
	 * show_interface method
	 */
	function _show_interface($page = 'Unathorize', $data = '')
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