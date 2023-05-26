<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Address extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'address_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'customer_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'firstname' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'lastname' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'address_1' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'address_2' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'postcode' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'country_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => '0',
            ],
            'zone_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => '0',
            ],
            'custom_field' => [
                'type' => 'TEXT',
            ],
        ]);

        $this->forge->addKey('address_id', true);
        $this->forge->createTable('cc_address');
    }

    public function down()
    {
        $this->forge->dropTable('cc_address');
    }
}
