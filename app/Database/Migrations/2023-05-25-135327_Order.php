<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Order extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'invoice_no' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'default' => '0',
            ],
            'store_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'default' => '0',
            ],
            'customer_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true,
                'default' => '0',
            ],
            'firstname' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'null' => true,
                'default' => null,
            ],
            'lastname' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'null' => true,
                'default' => null,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 96,
                'null' => true,
                'default' => null,
            ],
            'telephone' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'null' => true,
                'default' => null,
            ],
            'payment_firstname' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'payment_lastname' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'payment_address_1' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'payment_address_2' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'payment_city' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'payment_postcode' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'payment_country' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'payment_country_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'payment_phone' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'payment_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'payment_method' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'payment_transection_code' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'shipping_firstname' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'null' => true,
                'default' => null,
            ],
            'shipping_lastname' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'null' => true,
                'default' => null,
            ],
            'shipping_address_1' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'shipping_address_2' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'shipping_city' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'shipping_postcode' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
                'default' => null,
            ],
            'shipping_country' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'shipping_country_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'default' => null,
            ],
            'shipping_phone' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'default' => null,
            ],
            'shipping_method' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
            ],
            'shipping_charge' => [
                'type' => 'decimal',
                'constraint' => '10,4',
                'null' => true,
                'default' => null,
            ],
            'comment' => [
                'type' => 'TEXT',
                'null' => true,
                'default' => null,
            ],
            'total' => [
                'type' => 'decimal',
                'constraint' => '15,4',
                'default' => '0.0000',
            ],
            'vat' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'discount' => [
                'type' => 'decimal',
                'constraint' => '10,4',
                'null' => true,
                'default' => null,
            ],
            'final_amount' => [
                'type' => 'decimal',
                'constraint' => '10,4',
            ],
            'ip' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
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

        $this->forge->addKey('order_id', true);
        $this->forge->createTable('cc_order');
    }

    public function down()
    {
        $this->forge->dropTable('cc_order');
    }
}
