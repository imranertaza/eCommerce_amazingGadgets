<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Country extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'country_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
            ],
            'iso_code_2' => [
                'type' => 'VARCHAR',
                'constraint' => 2,
            ],
            'iso_code_3' => [
                'type' => 'VARCHAR',
                'constraint' => 3,
            ],
            'address_format' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'postcode_required' => [
                'type' => 'TINYINT',
                'constraint' => 1,
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
            ],
        ]);

        $this->forge->addKey('country_id', true);
        $this->forge->createTable('cc_country');
    }

    public function down()
    {
        $this->forge->dropTable('cc_country');
    }
}
