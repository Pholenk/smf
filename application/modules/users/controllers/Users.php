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
		$this->_access = $this->auth->privileges_read('users_browse');
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
	public function read($email)
	{
		$this->_access = $this->auth->privileges_read('users_read');
		if($this->_access)
		{
			$data['user_data'] = $this->UsersModel->read($email);
			$this->_show_interface('read', $data);
		}
		else
		{
			redirect(base_url());
		}
	}

	/**
	 * edit method
	 * edit the user data in persistence storage
	 */
	public function edit($id)
	{
		$this->_access = $this->auth->privileges_read('users_edit');
		if($this->_access)
		{
			$datestring = '%Y-%m-%d %H:%i:%s';
			if (substr($id, 0, 2) !== 'IU') {
				$data['user_data'] = $this->UsersModel->read($id);
				$this->_show_interface('edit', $data);
			}
			else
			{
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
							)
					);
				($this->UsersModel->edit($id, $data['users'], $data['details']) ? redirect(base_url("/users/read/".$data['users']['email'])) : redirect(base_url()));
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
		$this->_access =$this->auth->privileges_read('users_add');
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
										'privileges_browse' => 0,
										'privileges_read' => 0,
										'privileges_edit' => 0,
										'users_browse' => 0,
										'users_read' => 0,
										'users_edit' => 0,
										'users_add' => 0,
										'users_delete' => 0,
										'standard_browse' => 0,
										'standard_edit' => 0,
										'standard_add' => 0,
										'standard_delete' => 0,
										'contract_browse' => 0,
										'contract_read' => 0,
										'contract_edit' => 0,
										'contract_add' => 0,
										'contract_delete' => 0,
										'ring_browse' => 0,
										'ring_read' => 0,
										'ring_edit' => 0,
										'ring_add' => 0,
										'ring_delete' => 0,
										'ts_browse' => 0,
										'ts_read' => 0,
										'ts_edit' => 0,
										'ts_add' => 0,
										'ts_delete' => 0,
										'breeder_browse' => 0,
										'breeder_read' => 0,
										'breeder_edit' => 0,
										'breeder_add' => 0,
										'breeder_delete' => 0,
										'supplier_browse' => 0,
										'supplier_read' => 0,
										'supplier_edit' => 0,
										'supplier_add' => 0,
										'supplier_delete' => 0,
										'supplier_prod_browse' => 0,
										'supplier_prod_read' => 0,
										'supplier_prod_edit' => 0,
										'supplier_prod_add' => 0,
										'supplier_prod_delete' => 0,
										'buyer_browse' => 0,
										'buyer_read' => 0,
										'buyer_edit' => 0,
										'buyer_add' => 0,
										'buyer_delete' => 0,
										'breeder_score_browse' => 0,
										'breeder_score_read' => 0,
										'breeder_score_edit' => 0,
										'breeder_score_add' => 0,
										'breeder_score_delete' => 0
									)
								);
						
							($this->UsersModel->add($data['users'], $data['details'], $data['privileges'])) ? redirect(base_url('/users/read/'.$this->input->post('email'))) : redirect(base_url('/users/add')) ;
						}
						else
						{
							$data['error'] = $this->image_lib->display_errors();
							$this->load->view('test',$data);
						}
					}
				}
				
				else
				{
					$error = $this->upload->display_error();
					$this->load->view('test',$error);
				}
			}

			else
			{
				$data['id'] = $this->UsersModel->idGen();
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
	public function delete($id)
	{
		$this->_access = $this->auth->privileges_read('users_delete');
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
		else
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