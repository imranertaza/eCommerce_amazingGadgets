<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class OrderItem extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_item' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'order_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'product_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'price' => [
                'type'           => 'double',
                'unsigned'       => true,
            ],
            'quantity' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'total_price' => [
                'type'           => 'double',
                'unsigned'       => true,
            ],
            'discount' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true,
                'default' => null,
            ],
            'final_price' => [
                'type'           => 'double',
                'unsigned'       => true,
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

        $this->forge->addKey('order_item', true);
        $this->forge->createTable('cc_order_item');
    }

    public function down()
    {
        $this->forge->dropTable('cc_order_item');
    }
}
