<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPrefixOnProductOption extends Migration
{
    public function up()
    {
        $fields = [
            'price_prefix' => [
                'type'           => 'varchar',
                'constraint'     => 1,
                'after' => 'price',
                'null' => false,
            ],
            'point_prefix' => [
                'type'           => 'varchar',
                'constraint'     => 1,
                'after' => 'points',
                'null' => false,
            ],
            'weight_prefix' => [
                'type'           => 'varchar',
                'constraint'     => 1,
                'after' => 'weight',
                'null' => false,
            ],
        ];
        $this->forge->addColumn('cc_product_option', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('cc_product_option', ['price_prefix', 'point_prefix', 'weight_prefix']);
    }
}
