<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
	public function up()
	{
		$fields = [
			'id_user'          => [
					'type'           => 'INT',
					'constraint'     => 7,
					'unsigned'       => true,
					'auto_increment' => true
			],
			'name'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
					'unique'         => false,
			],
			'email'      => [
					'type'           => 'VARCHAR',
					'constraint'	 => '255',
			],
			'password_hashed' => [
					'type'           => 'VARCHAR',
					'constraint'	 => '255',
			],
			'created_at'      => [
					'type'     => 'DATETIME',
					'null'     => true,
					'default'  => null
			],
			'updated_at'      => [
					'type'     => 'DATETIME',
					'null'     => true,
					'default'  => null
			],
	];

	$this->forge->addField($fields);
	$this->forge->addKey('id_user', true);

	$this->forge->createTable('user');
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
