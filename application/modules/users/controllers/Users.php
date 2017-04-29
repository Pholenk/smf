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
		else
		{
			redirect(base_url());
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
			$data["user_data"] = $this->UsersModel->read($email);
			$this->_show_interface('edit', $data);
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
				$ktp = $this->_uploadPhoto($id, './assets/ktp', 'ktp_img');
				$photo = $this->_uploadPhoto($id, './assets/photo', 'photo');
				$npwp = (!empty($this->input->post('npwp_img')) ? $this->_uploadPhoto($id, './assets/npwp', 'npwp_img') : '' );
				$data = array(
						'users' => array(
								'email' => $this->input->post('email'),
								'password' => $this->input->post('password'),
								'jabatan' => $this->input->post('jabatan'),
								'name_full' => $this->input->post('nama'),
								'ktp_no' => $this->input->post('ktp_no'),
								'ktp_img' => $ktp['_fileName'],
								'alamat' => $this->input->post('alamat'),
								'telepon_primer' => $this->input->post('telepon_primer'),
								'rekening_no' => $this->input->post('rekening_no'),
								'rekening_bank' => $this->input->post('rekening_bank'),
								'agama' => $this->input->post('agama'),
								'status' => $this->input->post('status'),
								'anak' => $this->input->post('anak'),
								'photo' => $photo['_fileName'],
								'thumbnail' => $photo['_thumbName'],
						),
						'details' => array(
								'telepon_sekunder' => ($this->input->post('telepon_sekunder') === '' ? 'null' : $this->input->post('telepon_sekunder')),
								'telepon_pin' => ($this->input->post('telepon_pin') === '' ? 'null' : $this->input->post('telepon_pin')),
								'telepon_whatsapp' => ($this->input->post('telepon_whatsapp') === '' ? 'null' : $this->input->post('telepon_whatsapp')),
								'npwp_no' => ($this->input->post('npwp_no') === '' ? 'null' : $this->input->post('npwp_no')),
								'npwp_img' => ($this->input->post('npwp_img') === '' ? 'null' : $npwp['_fileName']),
								'created_at' => mdate($datestring, time()),
								'edited_at' => mdate($datestring, time())
						),
					);				
				if($this->UsersModel->edit($id, $data['users'], $data['details']))
				{
					redirect(base_url());
				}
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
			
			if (!empty($this->input->post('email')))
			{
				$ktp = $this->_uploadPhoto($id, './assets/ktp', 'ktp_img');
				$photo = $this->_uploadPhoto($id, './assets/photo', 'photo');
				$npwp = (!empty($this->input->post('npwp_img')) ? $this->_uploadPhoto($id, './assets/npwp', 'npwp_img') : '' );

				$data = array(
					'users' => array(
								'id' => $id,
								'email' => $this->input->post('email'),
								'password' => $this->input->post('password'),
								'jabatan' => $this->input->post('jabatan'),
								'name_full' => $this->input->post('nama'),
								'ktp_no' => $this->input->post('ktp_no'),
								'ktp_img' => $ktp['_fileName'],
								'alamat' => $this->input->post('alamat'),
								'telepon_primer' => $this->input->post('telepon_primer'),
								'rekening_no' => $this->input->post('rekening_no'),
								'rekening_bank' => $this->input->post('rekening_bank'),
								'agama' => $this->input->post('agama'),
								'status' => $this->input->post('status'),
								'anak' => $this->input->post('anak'),
								'photo' => $photo['_fileName'],
								'thumbnail' => $photo['_thumbName'],
								'tech_support' => 0,
					),
					'details' => array(
								'id' => $id,
								'telepon_sekunder' => ($this->input->post('telepon_sekunder') === '' ? 'null' : $this->input->post('telepon_sekunder')),
								'telepon_pin' => ($this->input->post('telepon_pin') === '' ? 'null' : $this->input->post('telepon_pin')),
								'telepon_whatsapp' => ($this->input->post('telepon_whatsapp') === '' ? 'null' : $this->input->post('telepon_whatsapp')),
								'npwp_no' => ($this->input->post('npwp_no') === '' ? 'null' : $this->input->post('npwp_no')),
								'npwp_img' => ($npwp === '' ? 'null' : $npwp['_fileName']),
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

				if($this->UsersModel->add($data['users'], $data['details'], $data['privileges']))
				{
					redirect(base_url());
				}
			}
			else
			{
				$data['user_id'] = $this->UsersModel->idGen();
				$this->_show_interface('add', $data);
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

	/**
	 * _uploadPhoto method
	 * processing upload photo
	 */
	function _uploadPhoto($id = 'IU000', $path = './assets/', $input = '_img')
	{
		$_name = '';
		/**
		 * initialize config
		 */
		$uploadConfig = array(
			'allowed_types' => 'jpg|png|jpeg',
			'max_size' => '10000',
			'file_name' => $id,
			'overwrite' => TRUE,
		);
		$resizeConfig = array(
			'image_library' => 'gd2',
			'create_thumb' => TRUE,
			'maintain_ratio' => TRUE,
			'file_permissions' => 0777,
			'width' => 600,
		);

		/**
		 * call library upload
		 */
		$this->load->library('upload', $uploadConfig);
		$this->load->library('image_lib',$resizeConfig);

		$uploadConfig['upload_path'] = $path;
		$this->upload->initialize($uploadConfig);

		/**
		 * execute upload photo
		 */
		if($this->upload->do_upload($input))
		{
			$_name['_fileName'] = $this->upload->data('file_name');

			/**
			 * change file permission
			 */
			chmod($this->upload->data('full_path'), 0777);

			$resizeConfig['source_image'] = $this->upload->data('full_path');
			$this->image_lib->initialize($resizeConfig);

			/**
			 * execute resize photo
			 */
			if ($this->image_lib->resize())
			{
				$_name['_thumbName'] = ''.$id.'_thumb'.$this->upload->data('file_ext');
			}
			
		}
		
		return $_name ;
	}
}