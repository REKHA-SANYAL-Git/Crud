<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use DateTime;

class Brand extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 50,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'b_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'created_at' => [
                'type' => 'DateTime',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DateTime',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('brand');
    }

    public function down()
    {
        $this->forge->dropTable('brand');
    }
}
