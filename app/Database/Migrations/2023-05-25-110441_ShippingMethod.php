<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class ShippingMethod extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'shipping_method_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 155,
            ],
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => 155,
                'null' => true,
                'default' => null,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['1', '0'],
                'default' => '1',
            ],
        ]);

        $this->forge->addKey('shipping_method_id', true);
        $this->forge->createTable('cc_shipping_method');
    }

    public function down()
    {
        $this->forge->dropTable('cc_shipping_method');
    }
}
