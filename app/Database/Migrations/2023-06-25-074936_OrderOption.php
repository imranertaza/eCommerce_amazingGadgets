<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class OrderOption extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_option_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'order_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'order_item_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'product_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'option_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'option_value_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'value' => [
                'type' => 'TEXT',
            ],
        ]);

        $this->forge->addKey('order_option_id', true);
        $this->forge->createTable('cc_order_option');
    }

    public function down()
    {
        $this->forge->dropTable('cc_order_option');
    }
}
