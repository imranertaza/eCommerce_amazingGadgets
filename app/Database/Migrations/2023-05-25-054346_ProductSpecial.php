<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class ProductSpecial extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_special_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'product_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'special_price' => [
                'type' => 'decimal',
                'constraint' => '10,2',
            ],
            'start_date' => [
                'type' => 'date',
            ],
            'end_date' => [
                'type' => 'date',
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

        $this->forge->addKey('product_special_id', true);
        $this->forge->createTable('cc_product_special');
    }

    public function down()
    {
        $this->forge->dropTable('cc_product_special');
    }
}
