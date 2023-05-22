<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CouponProduct extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'coupon_product_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'coupon_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);

        $this->forge->addKey('coupon_product_id', true);
        $this->forge->createTable('cc_coupon_product');
    }

    public function down()
    {
        $this->forge->dropTable('cc_coupon_product');
    }
}
