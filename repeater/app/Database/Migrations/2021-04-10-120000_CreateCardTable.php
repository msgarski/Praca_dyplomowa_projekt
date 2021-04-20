<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCardTable extends Migration
{
	//! pole lesson_id powinno być wymagane!
	public function up()
	{
		$fields = [
			'id'          => [
				'type'          => 'INT',
				'constraint'    => 9,
				'unsigned'      => true,
				'auto_increment'=> true
			],
            'lesson_id'       =>  [
                'type'          =>  'INT',
                'constraint'    =>  7,
                'unsigned'      =>  true,
            ],
			'question'       => [
				'type'       	=> 'VARCHAR',
				'constraint'	=> '50',
				'null'			=>	true,
				'unique'     	=> false,
			],
			'answer'       => [
                'type'          => 'VARCHAR',
                'constraint'    => '50',
                'unique'        => false,
				'null'			=>	true,
            ],
            'pronounciation' => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  '50',
                'default'       =>  null,
            ],
            'sentence'      =>  [
                'type'          =>  'VARCHAR',
                'constraint'    =>  '200',
                'default'       =>  null,
            ],
            'image'         =>  [
                'type'          =>  'BLOB',
				'default'		=>	null,
            ],
			'answer_sound'		=>	[
				'type'			=>	'BLOB',
				'default'		=>	null,
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
		//? A dlaczego nie PrimaryKey?
        $this->forge->addKey('id', true);
		//! klucz obcy na razie nie ma jak dodać:
		//$forge->addForeignKey('lesson_id','lesson','id');

        $this->forge->createTable('card');
	}

	public function down()
	{
		$this->forge->dropTable('card');
		
	}
}
