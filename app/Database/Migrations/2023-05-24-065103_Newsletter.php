<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Newsletter extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'newsletter_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'customer_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 155,
                'null' => true,
                'default' => null,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['1', '0'],
                'default' => '1',
            ],
        ]);

        $this->forge->addKey('newsletter_id', true);
        $this->forge->createTable('cc_newsletter');
    }

    public function down()
    {
        $this->forge->dropTable('cc_newsletter');
    }
}
