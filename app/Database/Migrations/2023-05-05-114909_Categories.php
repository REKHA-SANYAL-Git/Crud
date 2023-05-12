<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'c_name' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => 100,
                ],
                'created_at' => [
                    'type' => 'datetime',
                    'null' => true,
                ],
                'updated_at' => [
                    'type' => 'datetime',
                    'null' => true,
                ]
            ]
        );
        $this->forge->addKey('id', true);
        $this->forge->createTable('category');
    }

    public function down()
    {
        $this->forge->dropTable('category');
    }
}
