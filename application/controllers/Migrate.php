<?php


class Migrate extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        if (!$this->input->is_cli_request()) {
            exit('Direct access is not allowed. This is a command line tool, use the terminal');
        }
	}

	public function index()
    {
    	if($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        }
        else
        {
    		echo ($this->_seeder() ? 'migrating & seeding success' : 'migrating & seeding not success');
    	}
    }

    function _seeder()
    {
        $dataUser = array(
            'users' => array(
                'id' => 'IU0000',
                'email' => 'admin@admin',
                'password' => '12345',
                'jabatan' => 'super_admin',
                'name_full' => 'Super Admin',
                'ktp_no' => '12345',
                'ktp_img' => 'IU0000.jpg',
                'alamat' => 'Kantor',
                'telepon_primer' => '00',
                'rekening_no' => '00',
                'rekening_bank' => 'Bank',
                'agama' => 'null',
                'status' => 'kawin',
                'anak' => '0',
                'photo' => 'IU0000.jpg',
                'thumbnail' => 'IU0000_thumb.jpg',
                'tech_support' => '0',
            ),
            'details' => array(
                'id' => 'IU0000',
                'telepon_sekunder' => '00',
                'telepon_pin' => '00',
                'telepon_whatsapp' => '00',
                'npwp_no' => '00',
                'npwp_img' => '00',
                'created_at' => mdate('%Y=%m-d',time()),
                'edited_at' => mdate('%Y=%m-d',time()),
            ),
            'privileges' => array(
                'id' => 1,
                'privileges' => 1,
                'users' => 1,
                'standard' => 1,
                'contract' => 1,
                'ring' => 1,
                'ts' => 1,
                'breeder' => 1,
                'supplier' => 1,
                'supplier_prod' => 1,
                'buyer' => 1,
                'breeder_score' => 1,
            )
        );
        if($this->db->insert('users',$dataUser['users']))
        {
            if($this->db->insert('users_details',$dataUser['details']))
            {
                return ($this->db->insert('users_priv',$dataUser['privileges']) ? TRUE : FALSE);
            }
        }
    }
}