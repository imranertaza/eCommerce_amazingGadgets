<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class PaymentSettings extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'settings_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'payment_method_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'label' => [
                'type' => 'VARCHAR',
                'constraint' => 155,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 155,
            ],
            'value' => [
                'type' => 'VARCHAR',
                'constraint' => 155,
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

        $this->forge->addKey('settings_id', true);
        $this->forge->createTable('cc_payment_settings');
    }

    public function down()
    {
        $this->forge->dropTable('cc_payment_settings');
    }
}
