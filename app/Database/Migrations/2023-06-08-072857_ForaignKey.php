<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;


class ForaignKey extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'icon_id' => [
                'type' => 'INT',
            ],
            'CONSTRAINT produk_ibfk_1 FOREIGN KEY(`icon_id`) REFERENCES `cc_icons`(`icon_id`)',
        ]);

        $this->forge->addKey('order_id', true);
        //$this->forge->addForeignKey('icon_id', 'cc_icons', 'icon_id', 'CASCADE', 'CASCADE', 'my_fk_name');
        $this->forge->createTable('cc_checkFK');
    }

    public function down()
    {
        $this->forge->dropTable('cc_checkFK');
    }
}
