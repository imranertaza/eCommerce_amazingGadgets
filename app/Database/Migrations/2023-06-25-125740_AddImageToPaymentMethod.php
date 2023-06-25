<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageToPaymentMethod extends Migration
{
    public function up()
    {
        $fields = [
            'image' => [
                'type'           => 'varchar',
                'constraint'     => 155,
                'after' => 'code',
                'null' => true,
                'default' => null,
            ]
        ];
        $this->forge->addColumn('cc_payment_method', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('cc_payment_method', ['image']);
    }
}
