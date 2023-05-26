<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductAttributeGroup extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'attribute_group_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 155,
            ],
            'sort_order' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
        ]);

        $this->forge->addKey('attribute_group_id', true);
        $this->forge->createTable('cc_product_attribute_group');
    }

    public function down()
    {
        $this->forge->dropTable('cc_product_attribute_group');
    }
}
