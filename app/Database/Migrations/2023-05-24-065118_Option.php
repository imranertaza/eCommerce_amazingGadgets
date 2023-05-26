<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Option extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'option_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 155,
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'sort_order' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
        ]);

        $this->forge->addKey('option_id', true);
        $this->forge->createTable('cc_option');
    }

    public function down()
    {
        $this->forge->dropTable('cc_option');
    }
}
