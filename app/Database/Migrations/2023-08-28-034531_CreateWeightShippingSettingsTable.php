<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateWeightShippingSettingsTable extends Migration
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
            'shipping_method_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'label' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 155,
            ],
            'value' => [
                'type'       => 'INT',
                'constraint' => 11,
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
        $this->forge->createTable('cc_weight_shipping_settings');
    }

    public function down()
    {
        $this->forge->dropTable('cc_weight_shipping_settings');
    }
}
