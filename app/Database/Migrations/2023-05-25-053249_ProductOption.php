<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class ProductOption extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_option_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'product_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'option_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'option_value_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
            'subtract' => [
                'type' => 'tinyint',
                'constraint' => 1,
                'null' => true,
                'default' => null,
            ],
            'price' => [
                'type' => 'decimal',
                'constraint' => '15,4',
            ],
            'points' => [
                'type' => 'INT',
                'constraint' => 8,
                'null' => true,
                'default' => null,
            ],
            'weight' => [
                'type' => 'decimal',
                'constraint' => '15,8',
                'null' => true,
                'default' => null,
            ],
        ]);

        $this->forge->addKey('product_option_id', true);
        $this->forge->createTable('cc_product_option');
    }

    public function down()
    {
        $this->forge->dropTable('cc_product_option');
    }
}
