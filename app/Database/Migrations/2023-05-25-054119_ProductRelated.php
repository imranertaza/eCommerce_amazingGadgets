<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class ProductRelated extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_related_id' => [
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

        $this->forge->addKey('product_related_id', true);
        $this->forge->createTable('cc_product_related');
    }

    public function down()
    {
        $this->forge->dropTable('cc_product_related');
    }
}
