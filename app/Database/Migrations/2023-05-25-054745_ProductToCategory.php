<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductToCategory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_to_cat_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'product_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'category_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
        ]);

        $this->forge->addKey('product_to_cat_id', true);
        $this->forge->createTable('cc_product_to_category');
    }

    public function down()
    {
        $this->forge->dropTable('cc_product_to_category');
    }
}
