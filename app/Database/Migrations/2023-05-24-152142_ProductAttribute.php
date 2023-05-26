<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class ProductAttribute extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'attribute_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'attribute_group_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'product_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'details' => [
                'type' => 'text',
                'null' => true,
                'default' => null,
            ],
            'sort_order' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
        ]);

        $this->forge->addKey('attribute_id', true);
        $this->forge->createTable('cc_product_attribute');
    }

    public function down()
    {
        $this->forge->dropTable('cc_product_attribute');
    }
}
