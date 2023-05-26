<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Modules extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'module_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'module_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 155,
            ],
            'module_key' => [
                'type' => 'VARCHAR',
                'constraint' => 155,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['1', '0'],
                'default' => '1',
            ],
        ]);

        $this->forge->addKey('module_id', true);
        $this->forge->createTable('cc_modules');
    }

    public function down()
    {
        $this->forge->dropTable('cc_modules');
    }
}
