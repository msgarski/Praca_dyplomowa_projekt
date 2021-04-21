<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLessonTable extends Migration
{
	public function up()
	{
		$fields = [
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 7,
					'unsigned'       => true,
					'auto_increment' => true
			],
            'course_id'          => [
                    'type'          => 'INT',
                    'constraint'    => 7,
                    'unsigned'      => true
            ],
			'name'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
					'unique'         => false,
			],
			'description'      => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '200',
                    'unique'         => false,
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
			]
	];

	$this->forge->addField($fields);
	$this->forge->addKey('id', true);
    //$this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'CASCADE');
	$this->forge->createTable('course', true);
	}

	public function down()
	{
        //$this->forge->dropForeignKey('course', 'course_user_id_foreign');
		$this->forge->dropTable('course');
	}
}
