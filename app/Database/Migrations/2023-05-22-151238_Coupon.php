<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Coupon extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'coupon_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'discount_on' => [
                'type' => 'ENUM',
                'constraint' => ['Product', 'Shipping'],
                'default' => 'Product',
            ],
            'discount' => [
                'type' => 'decimal',
                'constraint' => '7,5',
            ],
            'for_subscribed_user' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1'],
                'default' => '0',
            ],
            'for_registered_user' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1'],
                'default' => '0',
            ],
            'total_useable' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => NULL,
                'null' => true,
            ],
            'total_used' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => NULL,
                'null' => true,
            ],
            'date_start' => [
                'type' => 'DATE',
            ],
            'date_end' => [
                'type' => 'DATE',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Active', 'Inactive'],
                'default' => 'Active',
            ],
        ]);

        $this->forge->addKey('coupon_id', true);
        $this->forge->createTable('cc_coupon');
    }

    public function down()
    {
        $this->forge->dropTable('cc_coupon');
    }
}
