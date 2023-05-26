<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class ProductFreeDelivery extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_free_delivery_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'product_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'sort_order' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
        ]);

        $this->forge->addKey('product_free_delivery_id', true);
        $this->forge->createTable('cc_product_free_delivery');
    }

    public function down()
    {
        $this->forge->dropTable('cc_product_free_delivery');
    }
}
