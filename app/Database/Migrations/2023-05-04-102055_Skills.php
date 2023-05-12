<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Skills extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tech_skill' => [
                'type' => 'VARCHAR',
                'constraint' => 125,
            ],
            'soft_skill' => [
                'type' => 'VARCHAR',
                'constraint' => 125,
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('skills');
    }

    public function down()
    {
        $this->forge->dropForeignKey('skills', 'user_id');
        $this->forge->dropTable('skills');
    }
}
