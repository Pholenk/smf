<?php

defined('BASEPATH') OR exit('No Direct Script Access Allowed');

class Migration_Improvement_database_supplier extends CI_Migration 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
	}

	public function up()
	{
		/**
		 * create users table
		 */
		$users_fields = array(
			'id' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE
			),
			'jabatan' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE
			),
			'name_full' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE
			),
			'ktp_no' => array(
				'type' => 'INT',
				'null' => FALSE
			),
			'ktp_img' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE
			),
			'alamat' => array(
				'type' => 'Text',
				'null' => FALSE
			),
			'telepon_primer' => array(
				'type' => 'INT',
				'null' => FALSE
			),
			'rekening_no' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => FALSE
			),
			'rekening_bank' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => FALSE
			),
			'agama' => array(
				'type' => 'VARCHAR',
				'constraint' => 15,
				'null' => FALSE
			),
			'status' => array(
				'type' => 'ENUM("kawin","tidak_kawin")',
				'null' => FALSE
			),
			'anak' => array(
				'type' => 'VARCHAR',
				'constraint' => 10,
				'null' => FALSE
			),
			'photo' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE
			),
			'thumbnail' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE
			),

		);
		$this->dbforge->add_field($users_fields);
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('users',TRUE);

		/**
		 * create users_details table
		 */
		$details_fields = array(
			'id' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE
			),
			'telepon_sekunder' => array(
				'type' => 'INT',
				'null' => TRUE
			),
			'telepon_pin' => array(
				'type' => 'VARCHAR',
				'constraint' => 30,
				'null' => TRUE
			),
			'telepon_whatsapp' => array(
				'type' => 'INT',
				'constraint' => 30,
				'null' => TRUE
			),
			'npwp_no' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE
			),
			'npwp_img' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			),
			'created_at' => array(
				'type' => 'DATE',
				'null' => TRUE
			),
			'edited_at' => array(
				'type' => 'DATE',
				'null' => TRUE
			),
			'deleted_at' => array(
				'type' => 'DATE',
				'null' => TRUE
			),
			);
		$this->dbforge->add_field($details_fields);
		$this->dbforge->create_table('users_details',TRUE);

		/**
		 * create users_priv table 
		 */
		$priv_fields = array(
			'id' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE
			),
			'privileges_browse' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'privileges_read' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'privileges_edit' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'users_browse' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'users_read' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'users_edit' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'users_add' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'users_delete' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'standard_browse' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'standard_browse' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'standard_edit' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'standard_add' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'standard_delete' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'contract_browse' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'contract_read' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'contract_edit' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'contract_add' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'contract_delete' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'ring_browse' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'ring_read' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'ring_edit' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'ring_add' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'ring_delete' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'ts_browse' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'ts_read' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'ts_edit' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'ts_add' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'ts_delete' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'breeder_browse' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'breeder_read' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'breeder_edit' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'breeder_add' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'breeder_delete' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'supplier_browse' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'supplier_read' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'supplier_edit' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'supplier_add' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'supplier_delete' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'supplier_prod_browse' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'supplier_prod_read' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'supplier_prod_edit' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'supplier_prod_add' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'supplier_prod_delete' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'buyer_browse' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'buyer_read' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'buyer_edit' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'buyer_add' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'buyer_delete' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'breeder_score_browse' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'breeder_score_read' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'breeder_score_edit' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'breeder_score_add' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'breeder_score_delete' => array(
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			),
			'edited_at' => array(
				'type' => 'DATE',
				'null' => TRUE
				),
			'edited_by' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
				),
		);
		$this->dbforge->add_field($priv_fields);
		$this->dbforge->create_table('users_priv',TRUE);

		/**
		 * create std_production table
		 */
		$std_production = array(
			'id' => array(
				'type' => 'INT',
				'null' => FALSE,
				'auto_increment' => TRUE,
			),
			'berat_badan' => array(
				'type' => 'float',
				'null' => FALSE
			),
			'fcr' => array(
				'type' => 'float',
				'null' => FALSE
			),
			'mortalitas' => array(
				'type' => 'float',
				'null' => FALSE
			),
			'feed_intake' => array(
				'type' => 'float',
				'null' => FALSE
			),
			'age' => array(
				'type' => 'float',
				'null' => FALSE
			),
			'created_at' => array(
				'type' => 'DATE',
				'null' => TRUE
				),
			'edited_at' => array(
				'type' => 'DATE',
				'null' => TRUE
				),
			'created_by' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
				),
			'edited_by' =>array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
				),
		);
		$this->dbforge->add_field($std_production);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('std_production',TRUE);

		/**
		 * create doc table
		 */
		$doc = array(
			'id' => array(
				'type' => 'INT',
				'null' => FALSE,
				'auto_increment' => TRUE,
				),
			'jenis' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => false,
				),
			'harga' => array(
				'type' => 'INT',
				'null' => false,
				),
		);
		$this->dbforge->add_field($doc);
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('doc', TRUE);

		/**
		 * create pakan table
		 */
		$pakan = array(
			'id' => array(
				'type' => 'INT',
				'null' => FALSE,
				'auto_increment' => TRUE,
				),
			'jenis' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
				),
			'harga' => array(
				'type' => 'INT',
				'null' => FALSE,
				),
		);
		$this->dbforge->add_field($pakan);
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('pakan', TRUE);

		/**
		 * create ovk table
		 */
		$ovk = array(
			'id' => array(
				'type' => 'INT',
				'null' => FALSE,
				'auto_increment' => TRUE,
				),
			'jenis' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
				),
			'harga' => array(
				'type' => 'INT',
				'null' => FALSE,
				),
		);
		$this->dbforge->add_field($ovk);
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('ovk', TRUE);

		/**
		 * create harga_beli table
		 */
		$harga_beli = array(
			'id' => array(
				'type' => 'INT',
				'null' => FALSE,
				'auto_increment' => TRUE,
				),
			'from' => array(
				'type' => 'float',
				'null' => FALSE,
				),
			'to' => array(
				'type' => 'float',
				'null' => FALSE,
				),
			'harga' => array(
				'type' => 'INT',
				'null' => FALSE,
				),
		);
		$this->dbforge->add_field($harga_beli);
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('harga_beli', TRUE);

		/**
		 * create selisih_fcr table
		 */
		$selisih_fcr = array(
			'id' => array(
				'type' => 'INT',
				'null' => FALSE,
				'auto_increment' => TRUE,
				),
			'from' => array(
				'type' => 'float',
				'null' => FALSE,
				),
			'to' => array(
				'type' => 'float',
				'null' => FALSE,
				),
			'harga' => array(
				'type' => 'INT',
				'null' => FALSE,
				),
		);
		$this->dbforge->add_field($selisih_fcr);
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('selisih_fcr', TRUE);

		/**
		 * create bonus_pasar table
		 */
		$bonus_pasar = array(
			'id' => array(
				'type' => 'INT',
				'null' => FALSE,
				'auto_increment' => TRUE,
				),
			'from' => array(
				'type' => 'float',
				'null' => FALSE,
				),
			'to' => array(
				'type' => 'float',
				'null' => FALSE,
				),
			'bonus' => array(
				'type' => 'float',
				'null' => FALSE,
				),
		);
		$this->dbforge->add_field($bonus_pasar);
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('bonus_pasar', TRUE);

		/**
		 * create route_ring table
		 */
		$route_ring = array(
			'id' => array(
				'type' => 'INT',
				'null' => FALSE,
				'auto_increment' => TRUE,
			),
			'desa' => array(
				'type' => 'Text',
				'null' => FALSE,
			),
			'jalur' => array(
				'type' => 'INT',
				'null' => FALSE,
			),
			'ring' => array(
				'type' => 'INT',
				'null' => FALSE,
			),
		);
		$this->dbforge->add_field($route_ring);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('route_ring', TRUE);

		/**
		 * create breeder_score table
		 */
		$breeder_score = array(
			'id' => array(
				'type' => 'INT',
				'null' => FALSE,
				'auto_increment' => TRUE,
			),
			'selisih' => array(
				'type' => 'float',
				'null' => FALSE,
			),
			'score' => array(
				'type' => 'INT',
				'null' => FALSE,
			),
		);
		$this->dbforge->add_field($breeder_score);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('breeder_score', TRUE);
		
		/**
		 * create supplier table
		 */
		$supplier = array(
			'id' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			),
			'nama_perusahaan' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			),
			'alamat' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			),
			'telepon_primer' => array(
				'type' => 'INT',
				'constraint' => 20,
				'null' => FALSE,
			),
			'telepon_sekunder' => array(
				'type' => 'INT',
				'constraint' => 20,
				'null' => FALSE,
			),
			'telepon_tersier' => array(
				'type' => 'INT',
				'constraint' => 20,
				'null' => FALSE,
			),
			'created_at' => array(
				'type' => 'DATE',
				'null' => FALSE
			),
			'edited_at' => array(
				'type' => 'DATE',
				'null' => TRUE,
			),
			'deleted_at' => array(
				'type' => 'DATE',
				'null' => TRUE,
			),
		);
		$this->dbforge->add_field($supplier);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('supplier', TRUE);

		/**
		 * create supplier_product table
		 */
		$supplier_product = array(
			'id' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			),
			'id_supp' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			),
			'jenis' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			),
			'nama' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			),
			'nominal' => array(
				'type' => 'INT',
				'constraint' => 200,
				'null' => FALSE,
			),
			'satuan' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => FALSE,
			),
			'harga_beli' => array(
				'type' => 'INT',
				'constraint' => 255,
				'null' => FALSE,
			),
		);
		$this->dbforge->add_field($supplier_product);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('supplier_product', TRUE);
	}

	public function down()
	{}
}