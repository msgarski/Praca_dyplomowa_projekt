<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FirstTable extends Migration
{
	//$forge = \Config\Database::forge();
	public function up()
	{
		$fields = [
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true
			],
			'title'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
					'unique'         => true,
			],
			'author'      => [
					'type'           =>'VARCHAR',
					'constraint'     => 100,
					'default'        => 'King of Town',
			],
			'description' => [
					'type'           => 'TEXT',
					'null'           => true,
			],
			'status'      => [
					'type'           => 'ENUM',
					'constraint'     => ['publish', 'pending', 'draft'],
					'default'        => 'pending',
			],
	];

	$this->forge->addField($fields);
	$this->forge->addKey('id', true);

	$this->forge->createTable('first_table');


	}

	public function down()
	{
		$this->forge->dropTable('first_table');
	}
}
