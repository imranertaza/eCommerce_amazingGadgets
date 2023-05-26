<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class ProductCategoryPopular extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'prod_cat_popular_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'prod_cat_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'popular' => [
                'type'           => 'ENUM',
                'constraint'     => ['1', '0'],
                'default' => '1',
            ],
            'sort_order' => [
                'type' => 'INT',
                'constraint' => 3,
                'default' => '0',
            ],
            'status' => [
                'type'           => 'ENUM',
                'constraint'     => ['1', '0'],
                'default' => '1',
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

        $this->forge->addKey('prod_cat_popular_id', true);
        $this->forge->createTable('cc_product_category_popular');
    }

    public function down()
    {
        $this->forge->dropTable('cc_product_category_popular');
    }
}
