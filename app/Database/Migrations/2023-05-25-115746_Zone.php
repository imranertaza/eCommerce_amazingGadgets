<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Zone extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'zone_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'country_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'status' => [
                'type' => 'tinyint',
                'constraint' => 1,
                'default' => '1',
            ],
        ]);

        $this->forge->addKey('zone_id', true);
        $this->forge->createTable('cc_zone');
    }

    public function down()
    {
        $this->forge->dropTable('cc_zone');
    }
}
