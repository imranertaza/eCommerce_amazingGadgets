<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class OrderHistory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_history_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'order_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'order_status_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'notify' => [
                'type'           => 'tinyint',
                'constraint'     => 1,
                'default' => 0,
            ],
            'comment' => [
                'type' => 'TEXT',
                'constraint' => 155,
            ],
            'date_added' => [
                'type' => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);

        $this->forge->addKey('order_history_id', true);
        $this->forge->createTable('cc_order_history');
    }

    public function down()
    {
        $this->forge->dropTable('cc_order_history');
    }
}
