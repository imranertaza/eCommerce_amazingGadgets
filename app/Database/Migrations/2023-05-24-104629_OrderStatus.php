<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderStatus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_status_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
        ]);

        $this->forge->addKey('order_status_id', true);
        $this->forge->createTable('cc_order_status');
    }

    public function down()
    {
        $this->forge->dropTable('cc_order_status');
    }
}
