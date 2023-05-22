<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CouponCategory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'coupon_category_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'coupon_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'prod_cat_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
        ]);

        $this->forge->addKey('coupon_category_id', true);
        $this->forge->createTable('cc_coupon_category');
    }

    public function down()
    {
        $this->forge->dropTable('cc_coupon_category');
    }
}
