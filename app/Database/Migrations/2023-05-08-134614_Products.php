<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
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

            'p_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'b_id' => [
                'type' => 'INT',
                'constraint' => 50
            ],
            'c_id' => [
                'type' => 'INT',
                'constraint' => 50
            ],
            'm_no' => [
                'type' => 'INT',
                'constraint' => 50,
                'unsigned' => true
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 50,
                'unsigned' => true
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'unsigned' => true
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

        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
