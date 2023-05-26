<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'store_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'model' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'product_code' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'default' => null,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'brand_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'default' => null,
            ],
            'price' => [
                'type' => 'decimal',
                'constraint' => '10,2',
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'product_category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'default' => null,
            ],
            'featured' => [
                'type' => 'ENUM',
                'constraint' => ['1', '0'],
                'default' => '0',
            ],
            'average_feedback' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'default' => null,
            ],
            'date_available' => [
                'type' => 'date',
                'null' => true,
                'default' => null,
            ],
            'weight' => [
                'type' => 'decimal',
                'constraint' => '10,4',
            ],
            'length' => [
                'type' => 'decimal',
                'constraint' => '10,4',
            ],
            'width' => [
                'type' => 'decimal',
                'constraint' => '10,4',
            ],
            'height' => [
                'type' => 'decimal',
                'constraint' => '10,4',
            ],
            'sort_order' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Active', 'Inactive'],
                'default' => 'Active',
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

        $this->forge->addKey('product_id', true);
        $this->forge->createTable('cc_products');
    }

    public function down()
    {
        $this->forge->dropTable('cc_products');
    }
}
