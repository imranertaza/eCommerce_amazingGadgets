<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OptionValue extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'option_value_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'option_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 155,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'sort_order' => [
                'type' => 'INT',
                'constraint' => '3',
            ],
        ]);

        $this->forge->addKey('option_value_id', true);
        $this->forge->createTable('cc_option_value');
    }

    public function down()
    {
        $this->forge->dropTable('cc_option_value');
    }
}
