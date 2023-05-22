<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CouponHistory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'coupon_history_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'coupon_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'order_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'amount' => [
                'type' => 'DECIMAL',
                'constraint' => '15,4',
            ],
            'date_added' => [
                'type' => 'datetime',
            ],
        ]);

        $this->forge->addKey('coupon_history_id', true);
        $this->forge->createTable('cc_coupon_history');
    }

    public function down()
    {
        $this->forge->dropTable('cc_coupon_history');
    }
}
