<?php

/**
 * author: Pholenk
 * email: pholenkadi17@gmail.com
 * github: Pholenk
 */

class Breeder extends MX_Controller
{
	private $is_login;

	function __construct()
	{
		parent::__construct();
		$this->load->model('BreederModel');
		$this->load->module('auth');
		$this->is_login = $this->auth->is_login();
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
		if ($this->is_login)
		{
			$access = $this->auth->privileges_read('breeder_browse');
			if ($access)
			{
				$data['breeder_data'] = $this->BreederModel->browse_breeder();
				$this->_show_interface('browse', $data);
			}
			else
			{
				$this->_show_interface('Unauthorize', '');
			}
			
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
		if ($this->is_login)
		{
			$access = $this->auth->privileges_read('breeder_edit');
			if ($access)
			{
				$datestring = '%d - %m - %Y';
				$breeder_read_data = $this->BreederModel->read($id);
				$browse_ts_data = $this->BreederModel->browse_ts();
				$browse_route_ring_data = $this->BreederModel->browse_route_ring();
				foreach ($breeder_read_data as $data)
				{
					echo "
					<div class='modal-header'>
					<h1 class='modal-title'>Edit Breeder</h1>
					</div>
					<form class='form-horizontal' method='post' id='edit_form_breeder'>
					<div class='modal-body'>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Nama</label>
					<div class='col-xs-7'>
					<input name='nama' id='nama_edit' type='text' class='form-control' value='".$data->nama."' required>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Alamat</label>
					<div class='col-xs-7'>
					<input name='alamat' id='alamat_edit' type='text' class='form-control' value='".$data->alamat."' required>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Kampung</label>
					<div class='col-xs-7'>
					<input name='kampung' id='kampung_edit' type='text' class='form-control' value='".$data->kampung."' required>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Kelurahan</label>
					<div class='col-xs-7'>
					<select name='kelurahan' id='kelurahan_edit' class='form-control' required>".$data->kelurahan."
					<option> </option>";
					foreach ($browse_route_ring_data as $route)
					{
						echo "<option value='".$route->id."'>".$route->desa."</option>";
					}
					echo "
					</select>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Kecamatan</label>
					<div class='col-xs-7'>
					<input name='kecamatan' id='kecamatan_edit' type='text' class='form-control' value='".$data->kecamatan."' required>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Kabupaten</label>
					<div class='col-xs-7'>
					<input name='kabupaten' id='kabupaten_edit' type='text' class='form-control' value='".$data->kabupaten."' required>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Provinsi</label>
					<div class='col-xs-7'>
					<input name='provinsi' id='provinsi_edit' type='text' class='form-control' value='".$data->provinsi."' required>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Telepon Primer</label>
					<div class='col-xs-7'>
					<input name='telepon_primer' id='telepon_primer_edit' type='number' class='form-control' value='".$data->telepon_primer."' required>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Telepon Sekunder</label>
					<div class='col-xs-7'>
					<input name='telepon_sekunder' id='telepon_sekunder_edit' type='number' class='form-control' value='".$data->telepon_sekunder."' required>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Populasi</label>
					<div class='col-xs-7'>
					<input name='populasi' id='populasi_edit' type='number' class='form-control' value='".$data->populasi."' required>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Technical Support</label>
					<div class='col-xs-7'>
					<select name='ts_id' id='ts_id_edit' type='' class='form-control' value='".$data->ts_id."' required>
					<option> </option>";
					foreach ($browse_ts_data as $ts) {
						echo "<option value='".$ts->id."'>".$ts->name_full."</option>";						
					}
					echo "
					<select>
					</div>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Ring</label>
					<label class='col-xs-7 control-label' id='ring_edit' style='text-align:left;'>".$data->ring."</label>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Jalur</label>
					<label class='col-xs-7 control-label' id='route_edit' style='text-align:left;'>".$data->jalur."</label>
					</div>
					<div class='form-group'>
					<label class='col-xs-4 control-label'>Tanggal Gabung</label>
					<div class=''>
					<label class='col-xs-7 control-label' style='text-align:left;'>".mdate($datestring, time($data->created_at))."</label>
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
			else
			{
				$this->_show_interface('Unauthorize', '');
			}	
		}
		else
		{
			redirect(base_url());
		}
	}

	/**
	 * read_route_ring method
	 */
	public function read_route($id = '')
	{
		if (!empty($id))
		{
			$result = [];
			$route_data = $this->BreederModel->read_route_ring($id);
			foreach ($route_data as $key)
			{
				$result = array(
					'route' => $key->jalur,
					'ring' => $key->ring,
				);
			}
			header('Content-Type: application/json');
			echo json_encode($result);
		}
	}

	/**
	 * edit method
	 */
	public function edit($id = '')
	{
		if ($this->is_login)
		{
			$access = $this->auth->privileges_read('breeder_edit');
			if ($access && !empty($id))
			{
				$datestring = '%Y-%m-%d';
				$breeder_edit_data = array(
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'kampung' => $this->input->post('kampung'),
					'kelurahan' => $this->input->post('kelurahan'),
					'kecamatan' => $this->input->post('kecamatan'),
					'kabupaten' => $this->input->post('kabupaten'),
					'provinsi' => $this->input->post('provinsi'),
					'telepon_primer' => $this->input->post('telepon_primer'),
					'telepon_sekunder' => $this->input->post('telepon_sekunder'),
					'populasi' => $this->input->post('populasi'),
					'ts_id' => $this->input->post('ts_id'),
					'edited_at' => mdate($datestring, time()),
				);
				echo($this->BreederModel->edit($id, $breeder_edit_data) ? 'success' : '!success');
				
			}
			else
			{
				$this->_show_interface('Unauthorize','');
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
		if ($this->is_login)
		{
			$access = $this->auth->privileges_read('breeder_add');
			if ($access && !empty($this->input->post('nama')))
			{
				$id = $this->BreederModel->idGen();
				$datestring = '%Y-%m-%d';
				$breeder_add_data = array(
					'id' => $id,
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'kampung' => $this->input->post('kampung'),
					'kelurahan' => $this->input->post('kelurahan'),
					'kecamatan' => $this->input->post('kecamatan'),
					'kabupaten' => $this->input->post('kabupaten'),
					'provinsi' => $this->input->post('provinsi'),
					'telepon_primer' => $this->input->post('telepon_primer'),
					'telepon_sekunder' => $this->input->post('telepon_sekunder'),
					'populasi' => $this->input->post('populasi'),
					'ts_id' => $this->input->post('ts_id'),
					'created_at' => mdate($datestring,time()),
				);
				echo($this->BreederModel->add($breeder_edit_data) ? 'success' : '!success');
			}
			elseif ($access && empty($this->input->post('nama')))
			{
				$datestring = '%d - %m - %Y';
				$browse_ts_data = $this->BreederModel->browse_ts();
				$browse_route_ring_data = $this->BreederModel->browse_route_ring();
				echo "
				<div class='modal-header'>
				<h1 class='modal-title'>Add Breeder</h1>
				</div>
				<form class='form-horizontal' method='post' id='add_form_breeder'>
				<div class='modal-body'>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Nama</label>
				<div class='col-xs-7'>
				<input name='nama' id='nama_add' type='text' class='form-control' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Alamat</label>
				<div class='col-xs-7'>
				<input name='alamat' id='alamat_add' type='text' class='form-control' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Kampung</label>
				<div class='col-xs-7'>
				<input name='kampung' id='kampung_add' type='text' class='form-control' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Kelurahan</label>
				<div class='col-xs-7'>
				<select name='kelurahan' id='kelurahan_add' class='form-control' required>
				<option> </option>";
				
				foreach ($browse_route_ring_data as $route)
				{
					echo "<option value='".$route->id."'>".$route->desa."</option>";
				}
				
				echo "
				</select>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Kecamatan</label>
				<div class='col-xs-7'>
				<input name='kecamatan' id='kecamatan_add' type='text' class='form-control' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Kabupaten</label>
				<div class='col-xs-7'>
				<input name='kabupaten' id='kabupaten_add' type='text' class='form-control' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Provinsi</label>
				<div class='col-xs-7'>
				<input name='provinsi' id='provinsi_add' type='text' class='form-control' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Telepon Primer</label>
				<div class='col-xs-7'>
				<input name='telepon_primer' id='telepon_primer_add' type='number' class='form-control' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Telepon Sekunder</label>
				<div class='col-xs-7'>
				<input name='telepon_sekunder' id='telepon_sekunder_add' type='number' class='form-control' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Populasi</label>
				<div class='col-xs-7'>
				<input name='populasi' id='populasi_add' type='number' class='form-control' required>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Technical Support</label>
				<div class='col-xs-7'>
				<select name='ts_id' id='ts_id_add' class='form-control' required>
				<option> </option>";
				
				foreach ($browse_ts_data as $ts) {
					echo "<option value='".$ts->id."'>".$ts->name_full."</option>";						
				}

				echo "
				<select>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Ring</label>
				<label class='col-xs-7 control-label' id='ring_edit' style='text-align:left;'>0</label>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Jalur</label>
				<label class='col-xs-7 control-label' id='route_edit' style='text-align:left;'>0</label>
				</div>
				<div class='form-group'>
				<label class='col-xs-4 control-label'>Tanggal Gabung</label>
				<div class=''>
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
				$this->_show_interface('Unauthorize','');
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
	public function delete($id = '')
	{
		if ($this->is_login)
		{
			$access = $this->auth->privileges_read('breeder_delete');
			if ($access && !empty($id))
			{
				($this->BreederModel->delete($id) ? redirect(base_url('breeder')) : redirect(base_url()));
			}
			elseif ($access && empty($id))
			{
				redirect(base_url('breeder'));
			}
			else
			{
				$this->_show_interface('Unauthorize', '');
			}
			
		}
		else
		{
			redirect(base_url());
		}
		
	}

	/**
	 * _show_interface method
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