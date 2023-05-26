<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Customer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'customer_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'firstname' => [
                'type'       => 'VARCHAR',
                'constraint' => 32,
            ],
            'lastname' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 96,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '40',
            ],
            'salt' => [
                'type' => 'VARCHAR',
                'constraint' => '9',
            ],
            'wishlist' => [
                'type' => 'TEXT',
                'null' => true,
                'default' => null,
            ],
            'newsletter' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => '0',
            ],
            'address_id' => [
                'type' => 'INT',
                'constraint' => '11',
                'default' => '0',
            ],
            'ip' => [
                'type' => 'VARCHAR',
                'constraint' => '40',
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => '1',
            ],
            'createdDtm' => [
                'type' => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'createdBy' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'default' => null,
            ],
            'updatedBy' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'default' => null,
            ],
            'updatedDtm DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('customer_id', true);
        $this->forge->createTable('cc_customer');
    }

    public function down()
    {
        $this->forge->dropTable('cc_customer');
    }
}
