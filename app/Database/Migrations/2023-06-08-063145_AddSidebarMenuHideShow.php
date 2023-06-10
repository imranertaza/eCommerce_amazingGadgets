<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSidebarMenuHideShow extends Migration
{
    public function up()
    {
        $fields = [
            'side_menu' => [
                'type'           => 'ENUM',
                'constraint'     => ['1', '0'],
                'default' => '0',
                'null' => false,
                'after' => 'header_menu',
            ],
        ];
        $this->forge->addColumn('cc_product_category', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('cc_product_category', ['side_menu']);
    }
}
