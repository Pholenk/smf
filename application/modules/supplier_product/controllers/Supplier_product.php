<?php

/**
* 
*/
class Supplier_product extends MX_Controller
{
	private $_access;

	function __construct()
	{
		parent::__construct();
		$this->load->model('Supplier_productModel');
		$this->load->module('auth');
		$this->_access = $this->auth->privileges_read('supplier_prod');
	}

	public function index()
	{
		$this->_browse();
	}

	/**
	 * _browse method
	 */
	function _browse()
	{
		if ($this->_access)
		{
			$data['supplier_data'] = $this->Supplier_productModel->supplier_browse();
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
	public function read($id)
	{
		if ($this->_access)
		{
			if (substr($id, 0, 2) !== 'PR')
			{
				$supplier_prod_data = $this->Supplier_productModel->read($id);
				echo "
				<thead>
				<tr>
					<th>Jenis Produk</th>
					<th>Nama Produk</th>
					<th>Nominal</th>
					<th>Satuan</th>
					<th>Harga Beli</th>
					<th>Action</th>
				</tr>
				</thead>";
				foreach ($supplier_prod_data as $data)
				{
					echo "
					<tr>
					<td>".$data->jenis."</td>
					<td>".$data->nama."</td>
					<td>".$data->nominal."</td>
					<td>".$data->satuan."</td>
					<td>".$data->harga_beli."</td>
					<td>
					<button type='button' class='btn btn-info' data-toggle='modal' data-target='#modal' id='edit_supplier_product_".$data->id."'><i class='fa fa-edit'></i> EDIT</button>
					<a href='/supplier_product/delete/".$data->id."'><button type='button' class='btn btn-danger'><i class='fa fa-trash'></i> DELETE</button></a>
					</td>
					</tr>
					";
				}
			}
			else
			{
				$supplier_prod_data = $this->Supplier_productModel->read($id);
				$supplier_data = $this->Supplier_productModel->supplier_browse();
				foreach ($supplier_prod_data as $data)
				{
					echo "
					<div class='modal-header'>
					<h1 class='modal-title'>Edit Supplier</h1>
					</div>
					<form class='form-horizontal' method='post' id='edit_form_supplier_product'>
					<div class='modal-body'>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Supplier</label>
					<div class='col-xs-7'>
					<select name='supplier' class='form-control' id='supplier_data_edit'> ";
					foreach ($supplier_data as $supplier) {
						echo "<option value='".$supplier->id."'>".$supplier->nama_perusahaan."</option>";
					}
					echo "
					</select>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Jenis Produk</label>
					<div class='col-xs-7'>
					<input name='jenis' id='jenis_edit' type='text' class='form-control' value='".$data->jenis."' required>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Nama Produk</label>
					<div class='col-xs-7'>
					<input name='nama' id='nama_edit' type='text' class='form-control' value='".$data->nama."' required>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Nominal</label>
					<div class='col-xs-7'>
					<input name='nominal' id='nominal_edit' type='number' step=1 min=0 class='form-control' value='".$data->nominal."' required>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Satuan</label>
					<div class='col-xs-7'>
					<input name='satuan' id='satuan_edit' type='text' class='form-control' value='".$data->satuan."' required>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Harga Beli</label>
					<div class='col-xs-7'>
					<input name='harga_beli' id='harga_beli_edit' type='number' step=1 min=0 class='form-control' value='".$data->harga_beli."' required>
					</div>
					</div>
					</div>
					<div class='modal-footer'>
					<div class='col-xs-6'>
					<button class='btn btn-success' type='submit' id='save_edit_supplier_product'><i class='fa fa-save'></i> Save</button>
					</div>
					<div class='col-xs-6 push-left'>
					<button class='btn btn-danger push-left' type='button' data-dismiss='modal'><i class='fa fa-times'></i> Cancel</button>
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
	public function edit($id)
	{
		if ($this->_access)
		{
			if (!empty($id))
			{
				$supplier_prod_data = array(
					'id_supp' => $this->input->post('supplier'),
					'jenis' => $this->input->post('jenis'),
					'nama' => $this->input->post('nama'),
					'nominal' => $this->input->post('nominal'),
					'satuan' => $this->input->post('satuan'),
					'harga_beli' => $this->input->post('harga_beli'),
				);
				($this->Supplier_productModel->edit($id, $supplier_prod_data) ? redirect(base_url('supplier_product')) : redirect(base_url()));
			}
			else
			{
				echo '!allowed';
				redirect(base_url('/supplier_product'));
			}
			
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
			if (!empty($this->input->post('supplier')))
			{
				$id = $this->Supplier_productModel->idGen();
				echo "<pre>";
				print_r($id);
				echo "</pre>";

				$supplier_prod_data = array(
					'id' => $id,
					'id_supp' => $this->input->post('supplier'),
					'jenis' => $this->input->post('jenis'),
					'nama' => $this->input->post('nama'),
					'nominal' => $this->input->post('nominal'),
					'satuan' => $this->input->post('satuan'),
					'harga_beli' => $this->input->post('harga_beli'),
				);
				echo ($this->Supplier_productModel->add($supplier_prod_data) ? 'success' : '!success');
			}
			elseif (empty($this->input->post('supplier')))
			{
				$supplier_data = $this->Supplier_productModel->supplier_browse();
				echo "
				<div class='modal-header'>
				<h1 class='modal-title'>Add Supplier</h1>
				</div>
				<form class='form-horizontal' method='post' id='add_form_supplier_product'>
				<div class='modal-body'>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Supplier</label>
				<div class='col-xs-7'>
				<select name='supplier' class='form-control' id='supplier_data_edit'> ";
				foreach ($supplier_data as $supplier) {
					echo "<option value=".$supplier->id.">".$supplier->nama_perusahaan."</option>";
				}
				echo "
				</select>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Jenis Produk</label>
				<div class='col-xs-7'>
				<input name='jenis' id='jenis_add' type='text' class='form-control' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Nama Produk</label>
				<div class='col-xs-7'>
				<input name='nama' id='nama_add' type='text' class='form-control' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Nominal</label>
				<div class='col-xs-7'>
				<input name='nominal' id='nominal_add' type='number' step=1 min=0 class='form-control' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Satuan</label>
				<div class='col-xs-7'>
				<input name='satuan' id='satuan_add' type='text' class='form-control' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Harga Beli</label>
				<div class='col-xs-7'>
				<input name='harga_beli' id='harga_beli_add' type='number' step=1 min=0 class='form-control' required>
				</div>
				</div>
				</div>
				<div class='modal-footer'>
				<div class='col-xs-6'>
				<button class='btn btn-success' type='submit' id='save_add_supplier_product'><i class='fa fa-save'></i> Save</button>
				</div>
				<div class='col-xs-6 push-left'>
				<button class='btn btn-danger push-left' type='button' data-dismiss='modal'><i class='fa fa-times'></i> Cancel</button>
				</div>
				</div>
				</form>";
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
			if (!empty($id))
			{
				($this->Supplier_productModel->delete($id) ? redirect(base_url('supplier_product')) : redirect(base_url()));
			}
			else
			{
				redirect(base_url('supplier_product'));
			}
			
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