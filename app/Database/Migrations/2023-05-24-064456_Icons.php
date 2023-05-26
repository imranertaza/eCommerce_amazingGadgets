<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Icons extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'icon_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'text',
            ],
            'code' => [
                'type' => 'text',
                'null' => true,
                'default' => null,
            ],
            'path' => [
                'type' => 'text',
                'null' => true,
                'default' => null,
            ],
        ]);

        $this->forge->addKey('icon_id', true);
        $this->forge->createTable('cc_icons');
    }

    public function down()
    {
        $this->forge->dropTable('cc_icons');
    }
}
