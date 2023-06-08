<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductBoughtTogether extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'bought_together_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'product_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'related_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
        ]);

        $this->forge->addKey('bought_together_id', true);
        $this->forge->createTable('cc_product_bought_together');
    }

    public function down()
    {
        $this->forge->dropTable('cc_product_bought_together');
    }
}
