<?php
// defined('BASEPATH') OR exit('No direct scripts access allowed');

/**
 * author: Pholenk
 * email: pholenkadi17@gmail.com
 * github: Pholenk
 */

class Users extends MX_Controller
{
	private $_access;

	function __construct()
	{
		parent::__construct();
		$this->load->module('auth');
		$this->load->model('UsersModel');
		$this->load->helper('date');
		$this->_access = $this->auth->privileges_read('users');
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
	 * get all user's data from persistence storage
	 */
	public function _browse()
	{
		if($this->_access)
		{
			$data['users_data'] = $this->UsersModel->browse();
			$this->_show_interface('browse', $data);
		}
	}

	/**
	 * read method
	 * get a row user's data from persistence storage
	 */
	public function read($email = '')
	{
		if($this->_access && !empty($email))
		{
			$user_data = $this->UsersModel->read($email);
			foreach ($user_data as $data)
			{
				echo "
				<div class='modal-header'>
				<h1 class='modal-title'>Edit User</h1>
				</div>
				<form class='form-horizontal' method='post' id='user_edit_form_".$data->id."' enctype='multipart/form-data'>
				<div class='modal-body'>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>ID</label>
				<div class='col-xs-9'>
				<label class='control-label'>".$data->id."</label>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Nama</label>
				<div class='col-xs-9'>
				<input name='nama' type='text' class='form-control' value='".$data->name_full."' id='nama_edit'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Email</label>
				<div class='col-xs-9'>
				<input name='email' type='email' class='form-control' value='".$data->email."' id='email_edit'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Password</label>
				<div class='col-xs-9'>
				<div class='input-group'>
				<div class='input-group-btn'>
				<button type='button' class='btn btn-info' id='show_password'><i class='fa fa-eye'></i></button>
				</div>
				<input name='password' type='password' class='form-control' value='".$data->password."' id='password_edit'>
				</div>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>No KTP</label>
				<div class='col-xs-9'>
				<input name='ktp_no' type='number' class='form-control' value='".$data->ktp_no."' id='ktp_no_edit'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Scan KTP</label>
				<div class='col-xs-9'>
				<input name='ktp_img' type='file' class='form-control' value='".$data->ktp_img."' id='ktp_img_edit'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Alamat</label>
				<div class='col-xs-9'>
				<input name='alamat' type='text' class='form-control' value='".$data->alamat."' id='alamat_edit'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Telepon Primer</label>
				<div class='col-xs-9'>
				<input name='telepon_primer' type='number' class='form-control' value='".$data->telepon_primer."' id='telepon_primer_edit'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Telepon Sekunder</label>
				<div class='col-xs-9'>
				<input name='telepon_sekunder' type='number' class='form-control' value='".$data->telepon_sekunder."' id='telepon_sekunder_edit'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>PIN BB</label>
				<div class='col-xs-9'>
				<input name='telepon_pin' type='text' class='form-control' value='".$data->telepon_pin."' id='telepon_pin_edit'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>WhatsApp</label>
				<div class='col-xs-9'>
				<input name='telpon_whatsapp' type='number' class='form-control' value='".$data->telepon_whatsapp."' id='telpon_whatsapp_edit'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>No rekening</label>
				<div class='col-xs-9'>
				<input name='rekening_no' type='text' class='form-control' value='".$data->rekening_no."' id='rekening_no_edit'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Bank</label>
				<div class='col-xs-9'>
				<select name='rekening_bank' class='form-control' id='rekening_bank'>".$data->rekening_bank."
				<option>BRI</option>
				<option>BNI</option>
				<option>BCA</option>
				<option>Mandiri</option>
				</select>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Agama</label>
				<div class='col-xs-9'>
				<input name='agama' type='text' class='form-control' value='".$data->agama."' id='agama_edit'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>NO NPWP</label>
				<div class='col-xs-9'>
				<input name='npwp_no' type='text' class='form-control' value='".$data->npwp_no."' id='npwp_no_edit'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Scan NPWP</label>
				<div class='col-xs-9'>
				<input name='npwp_img' type='file' class='form-control' value='".$data->npwp_img."' id='npwp_img_edit'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Status</label>
				<div class='col-xs-9'>
				<div class='radio'>
				<label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
				<input name='status' type='radio' value='kawin' ".($data->status === 'kawin' ? 'checked' : '')." id='status_edit'> Kawin
				</label>
				<label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
				<input name='status' type='radio' value='tidak_kawin' ".($data->status === 'tidak_kawin' ? 'checked' : '')." id='status_edit'> Tidak / Belum Kawin
				</label>
				</div>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Anak</label>
				<div class='col-xs-9'>
				<div class='radio'>
				<label style='padding-right:12px;padding-left=8px;font-weight:bold;'><input name='anak' type='radio' value='1' ".($data->anak === '1' ? 'checked' : '')." id='anak_edit'> 1</label>
				<label style='padding-right:12px;padding-left=8px;font-weight:bold;'><input name='anak' type='radio' value='2' ".($data->anak === '2' ? 'checked' : '')." id='anak_edit'> 2</label>
				<label style='padding-right:12px;padding-left=8px;font-weight:bold;'><input name='anak' type='radio' value='3' ".($data->anak === '3' ? 'checked' : '')." id='anak_edit'> 3</label>
				<label style='padding-right:12px;padding-left=8px;font-weight:bold;'><input name='anak' type='radio' value='4' ".($data->anak === '4' ? 'checked' : '')." id='anak_edit'> 4</label>
				<label style='padding-right:12px;padding-left=8px;font-weight:bold;'><input name='anak' type='radio' value='5' ".($data->anak === '5' ? 'checked' : '')." id='anak_edit'> 5</label>
				<label style='padding-right:12px;padding-left=8px;font-weight:bold;'><input name='anak' type='radio' value='>5' ".($data->anak === '>5' ? 'checked' : '')." id='anak_edit'> >5 </label>
				</div>
				</div>  
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Photo</label>
				<div class='col-xs-9'>
				<input name='photo' type='file' class='form-control' value='".$data->photo."' id='photo'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Jabatan</label>
				<div class='col-xs-9'>
				<select name='jabatan' class='form-control' id='jabatan'>".$data->jabatan."
				<option>Admin</option>
				<option>Logistik</option>
				</select>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Tanggal gabung</label>
				<div class='col-xs-3'>
				<label class='control-label' style='text-align: left;'>".mdate('%d %F %Y', time($data->created_at))."</label>
				</div>
				</div>
				</div>
				<div class='modal-footer'>
				<div class='col-xs-6'>
				<button class='btn btn-success' type='submit' id='save_edit_user'><i class='fa fa-save'></i> Save</button>
				</div>
				<div class='col-xs-6 push-left'>
				<button class='btn btn-danger push-left' type='button' data-dismiss='modal'><i class='fa fa-times'></i> Cancel</button>
				</div>
				</div>
				</form>";
			}
		}
		elseif ($this->_access && empty($email))
		{
			redirect(base_url('/users'));
		}
		else
		{
			redirect(base_url());
		}
	}

	public function search($email = '')
	{
		if ($this->_access && !empty($email))
		{
			$search_result = $this->UsersModel->search($email);
			$i = 1;
			foreach ($search_result as $data)
			{
				echo"
				<tr>
				<td>".$i."</td>
				<td>".$data->id."</td>
				<td>".$data->name_full."</td>
				<td>".$data->email."</td>
				<td>".$data->jabatan."</td>
				<td>
					<button type='button' class='btn btn-info' data-toggle='modal' data-target='#modal' id='edit_user_".$data->email."'><i class='fa fa-edit'></i> EDIT</button>
					<a href='".base_url('/users/delete/'.$data->id)."'><button type='button' class='btn btn-danger'><i class='fa fa-trash'></i> DELETE</button></a>
				</td>
				</tr>
				";
				$i++;
			}
		}
		elseif ($this->_access && empty($email))
		{
			$data_result = $this->UsersModel->browse();
			$i = 1;
			foreach ($data_result as $data)
			{
				echo"
				<tr>
				<td>".$i."</td>
				<td>".$data->id."</td>
				<td>".$data->name_full."</td>
				<td>".$data->email."</td>
				<td>".$data->jabatan."</td>
				<td>
					<button type='button' class='btn btn-info' data-toggle='modal' data-target='#modal' id='edit_user_".$data->email."'><i class='fa fa-edit'></i> EDIT</button>
					<a href='".base_url('/users/delete/'.$data->id)."'><button type='button' class='btn btn-danger'><i class='fa fa-trash'></i> DELETE</button></a>
				</td>
				</tr>
				";
				$i++;
			}
		}
	}

	/**
	 * edit method
	 * edit the user data in persistence storage
	 */
	public function edit($id = '')
	{
		if($this->_access && !empty($id))
		{
			$datestring = '%Y-%m-%d %H:%i:%s';
			if(substr($id, 0, 2) === 'IU')
			{
				$upload_conf = array(
					'allowed_types' => 'jpg|png|jpeg',
					'max_size' => '10000',
					'file_name' => $id,
					'overwrite' => TRUE,
					'upload_path' => './assets/',
				);
				$resize_conf = array(
					'image_library' => 'gd2',
					'create_thumb' => TRUE,
					'maintain_ratio' => TRUE,
					'width' => 600,
				);
				$this->load->library('upload', $upload_conf);
				$this->load->library('image_lib',$resize_conf);

				if (!empty($this->input->post('ktp_img')))
				{
					$upload_conf['upload_path'] = './assets/ktp/';
					$this->upload->initialize($upload_conf);
					if($this->upload->do_upload('ktp_img'))
					{
						$ktp = ''.$id.''.$this->upload->data('file_ext');
						chmod($this->upload->data('full_path'), 0777);
					}
				}

				if (!empty($this->input->post('user_img')))
				{
					$upload_conf['upload_path'] = './assets/photo/';
					$this->upload->initialize($upload_conf);
					if($this->upload->do_upload('user_img'))
					{
						chmod($this->upload->data('full_path'), 0777);

						$resize_conf['source_image'] = $this->upload->data('full_path');
						$this->image_lib->initialize($resize_conf);
						if($this->image_lib->resize())
						{
							$img = $this->upload->data('file_name');
							$img_thumb = ''.$id.'_thumb'.$this->upload->data('file_ext');
						}
					}
				}

				if(!empty($this->input->post('npwp_img')))
				{
					$upload_conf['upload_path'] = './assets/npwp';
					$this->upload->initialize($upload_conf);
					$this->upload->do_upload('npwp_img');
					$npwp = ''.$id.''.$this->upload->data('file_ext');
				}

				$data = array(
						'users' => array(
								'email' => $this->input->post('email'), 
								'password' => $this->input->post('password'),
								'jabatan' => $this->input->post('jabatan'),
								'name_full' => $this->input->post('nama'),
								'ktp_no' => $this->input->post('ktp_no'),
								'ktp_img' => $this->input->post('ktp_img'),
								'alamat' => $this->input->post('alamat'),
								'telepon_primer' => $this->input->post('telepon_primer'),
								'rekening_no' => $this->input->post('rekening_no'),
								'rekening_bank' => $this->input->post('rekening_bank'),
								'agama' => $this->input->post('agama'), 
								'status' => $this->input->post('status'),
								'anak' => $this->input->post('anak'),
								'photo' => $this->input->post('photo')
						),
						'details' => array(
								'telepon_sekunder' => ($this->input->post('telepon_sekunder') === '' ? 'null' : $this->input->post('telepon_sekunder')),
								'telepon_pin' => ($this->input->post('telepon_pin') === '' ? 'null' : $this->input->post('telepon_pin')),
								'telepon_whatsapp' => ($this->input->post('telepon_whatsapp') === '' ? 'null' : $this->input->post('telepon_whatsapp')),
								'npwp_no' => ($this->input->post('npwp_no') === '' ? 'null' : $this->input->post('npwp_no')),
								'npwp_img' => ($this->input->post('npwp_img') === '' ? 'null' : $this->input->post('npwp_img')),
								'created_at' => mdate($datestring, time()),
								'edited_at' => mdate($datestring, time())
						),
					);
				echo($this->UsersModel->edit($id, $data['users'], $data['details']) ? 'success' : '!success');
			}
			else
			{
				redirect(base_url());
			}
		}
		else
		{
			redirect(base_url());
		}
	}

	/**
	 * add method
	 * insert a new user's data to persistence storage
	 */
	public function add()
	{
		if($this->_access)
		{
			$datestring = '%Y-%m-%d %H:%i:%s';
			$id = $this->UsersModel->idGen();
			$upload_conf = array(
				'allowed_types' => 'jpg|png|jpeg',
				'max_size' => '10000',
				'file_name' => $id,
				'overwrite' => TRUE,
			);
			$resize_conf = array(
				'image_library' => 'gd2',
				'create_thumb' => TRUE,
				'maintain_ratio' => TRUE,
				'width' => 600,
			);

			if(!empty($this->input->post('email')))
			{
				$upload_conf['upload_path'] = './assets/ktp';
				$this->load->library('upload', $upload_conf);
				$this->load->library('image_lib',$resize_conf);

				if($this->upload->do_upload('ktp_img'))
				{
					$ktp = ''.$id.''.$this->upload->data('file_ext');
					chmod($this->upload->data('full_path'), 0777);

					$upload_conf['upload_path'] = './assets/photo/';
					$this->upload->initialize($upload_conf);
					if($this->upload->do_upload('user_img'))
					{
						chmod($this->upload->data('full_path'), 0777);

						$resize_conf['source_image'] = $this->upload->data('full_path');
						$this->image_lib->initialize($resize_conf);
						if($this->image_lib->resize())
						{
							$img = $this->upload->data('file_name');
							$img_thumb = ''.$id.'_thumb'.$this->upload->data('file_ext');
							if(!empty($this->input->post('npwp_img')))
							{
								$upload_conf['upload_path'] = './assets/npwp';
								$this->upload->initialize($upload_conf);
								$this->upload->do_upload('npwp_img');
								$npwp = ''.$id.''.$this->upload->data('file_ext');
							}

							$data = array(
								'users' => array(
											'id' => $id,
											'email' => $this->input->post('email'),
											'password' => $this->input->post('password'),
											'jabatan' => $this->input->post('jabatan'),
											'name_full' => $this->input->post('nama'),
											'ktp_no' => $this->input->post('ktp_no'),
											'ktp_img' => $ktp,
											'alamat' => $this->input->post('alamat'),
											'telepon_primer' => $this->input->post('telepon_primer'),
											'rekening_no' => $this->input->post('rekening_no'),
											'rekening_bank' => $this->input->post('rekening_bank'),
											'agama' => $this->input->post('agama'),
											'status' => $this->input->post('status'),
											'anak' => $this->input->post('anak'),
											'photo' => $img,
											'thumbnail' => $img_thumb,
								),
								'details' => array(
											'id' => $id,
											'telepon_sekunder' => ($this->input->post('telepon_sekunder') === '' ? 'null' : $this->input->post('telepon_sekunder')),
											'telepon_pin' => ($this->input->post('telepon_pin') === '' ? 'null' : $this->input->post('telepon_pin')),
											'telepon_whatsapp' => ($this->input->post('telepon_whatsapp') === '' ? 'null' : $this->input->post('telepon_whatsapp')),
											'npwp_no' => ($this->input->post('npwp_no') === '' ? 'null' : $this->input->post('npwp_no')),
											'npwp_img' => ($npwp === '' ? 'null' : $npwp),
											'created_at' => mdate($datestring, time()),
											'edited_at' => mdate($datestring, time())
								),
								'privileges' => array(
											'id' => $id,
											'privileges' => 0,
											'users' => 0,
											'standard' => 0,
											'contract' => 0,
											'ring' => 0,
											'ts' => 0,
											'breeder' => 0,
											'supplier' => 0,
											'supplier_prod' => 0,
											'buyer' => 0,
											'breeder_score' => 0,
								)
							);
						
							echo($this->UsersModel->add($data['users'], $data['details'], $data['privileges']) ? 'success' : '!success') ;
						}
					}
				}
			}
			else
			{
				echo "
				<div class='modal-header'>
				<h1 class='modal-title'>Edit User</h1>
				</div>
				<form class='form-horizontal' method='post' id='user_add_form' enctype='multipart/form-data'>
				<div class='modal-body'>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>ID</label>
				<div class='col-xs-9'>
				<label class='control-label'>".$id."</label>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Nama</label>
				<div class='col-xs-9'>
				<input name='nama' type='text' class='form-control' id='nama_add'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Email</label>
				<div class='col-xs-9'>
				<input name='email' type='email' class='form-control' id='email_add'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Password</label>
				<div class='col-xs-9'>
				<div class='input-group'>
				<div class='input-group-btn'>
				<button type='button' class='btn btn-info' id='show_password'><i class='fa fa-eye'></i></button>
				</div>
				<input name='password' type='password' class='form-control' id='password_add'>
				</div>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>No KTP</label>
				<div class='col-xs-9'>
				<input name='ktp_no' type='number' class='form-control' id='ktp_no_add'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Scan KTP</label>
				<div class='col-xs-9'>
				<input name='ktp_img' type='file' class='form-control' id='ktp_img_add'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Alamat</label>
				<div class='col-xs-9'>
				<input name='alamat' type='text' class='form-control' id='alamat_add'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Telepon Primer</label>
				<div class='col-xs-9'>
				<input name='telepon_primer' type='number' class='form-control' id='telepon_primer_add'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Telepon Sekunder</label>
				<div class='col-xs-9'>
				<input name='telepon_sekunder' type='number' class='form-control' id='telepon_sekunder_add'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>PIN BB</label>
				<div class='col-xs-9'>
				<input name='telepon_pin' type='text' class='form-control' id='telepon_pin_add'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>WhatsApp</label>
				<div class='col-xs-9'>
				<input name='telpon_whatsapp' type='number' class='form-control' id='telpon_whatsapp_add'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>No rekening</label>
				<div class='col-xs-9'>
				<input name='rekening_no' type='text' class='form-control' id='rekening_no_add'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Bank</label>
				<div class='col-xs-9'>
				<select name='rekening_bank' class='form-control' id='rekening_bank_add'>
				<option>BRI</option>
				<option>BNI</option>
				<option>BCA</option>
				<option>Mandiri</option>
				</select>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Agama</label>
				<div class='col-xs-9'>
				<input name='agama' type='text' class='form-control' id='agama_add'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>NO NPWP</label>
				<div class='col-xs-9'>
				<input name='npwp_no' type='text' class='form-control' id='npwp_no_add'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Scan NPWP</label>
				<div class='col-xs-9'>
				<input name='npwp_img' type='file' class='form-control' id='npwp_img_add'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Status</label>
				<div class='col-xs-9'>
				<div class='radio'>
				<label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
				<input name='status' type='radio' value='kawin' id='status_add'> Kawin
				</label>
				<label style='padding-right:12px;padding-left=8px;font-weight:bold;'>
				<input name='status' type='radio' value='tidak_kawin' id='status_add'> Tidak / Belum Kawin
				</label>
				</div>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Anak</label>
				<div class='col-xs-9'>
				<div class='radio'>
				<label style='padding-right:12px;padding-left=8px;font-weight:bold;'><input name='anak' id='anak_add' type='radio' value='1'> 1</label>
				<label style='padding-right:12px;padding-left=8px;font-weight:bold;'><input name='anak' id='anak_add' type='radio' value='2'> 2</label>
				<label style='padding-right:12px;padding-left=8px;font-weight:bold;'><input name='anak' id='anak_add' type='radio' value='3'> 3</label>
				<label style='padding-right:12px;padding-left=8px;font-weight:bold;'><input name='anak' id='anak_add' type='radio' value='4'> 4</label>
				<label style='padding-right:12px;padding-left=8px;font-weight:bold;'><input name='anak' id='anak_add' type='radio' value='5'> 5</label>
				<label style='padding-right:12px;padding-left=8px;font-weight:bold;'><input name='anak' id='anak_add' type='radio' value='>5'> > 5 </label>
				</div>
				</div>  
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Photo</label>
				<div class='col-xs-9'>
				<input name='photo' type='file' class='form-control' id='photo_add'>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Jabatan</label>
				<div class='col-xs-9'>
				<select name='jabatan' class='form-control' id='jabatan_add'>
				<option>Admin</option>
				<option>Logistik</option>
				</select>
				</div>
				</div>
				<div class='form-group'>
				<label class='col-xs-3 control-label' style='text-align: left;'>Tanggal gabung</label>
				<div class='col-xs-3'>
				<label class='control-label' style='text-align: left;'>".mdate('%d %F %Y', time())."</label>
				</div>
				</div>
				</div>
				<div class='modal-footer'>
				<div class='col-xs-6'>
				<button class='btn btn-success' type='submit' id='save_add_user'><i class='fa fa-save'></i> Save</button>
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
	 * delete a user data from persistence storage
	 */
	public function delete($id = '')
	{
		if($this->_access && !empty($id))
		{
			if($this->UsersModel->delete($id, FALSE))
			{
				($id === $this->session->userdata ? redirect(base_url('auth/logout')) : redirect(base_url('/users')));
			}
			else
			{
				redirect(base_url());
			}
		}
		elseif ($this->_access && empty($id))
		{
			redirect(base_url());
		}
	}

	/**
	 * _show_interface method
	 * load user interface page which contain the $data
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