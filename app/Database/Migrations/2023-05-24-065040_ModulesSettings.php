<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class ModulesSettings extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'module_settings_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'module_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'value' => [
                'type' => 'text',
                'null' => true,
                'default' => null,
            ],
            'time' => [
                'type' => 'timestamp',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
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

        $this->forge->addKey('module_settings_id', true);
        $this->forge->createTable('cc_module_settings');
    }

    public function down()
    {
        $this->forge->dropTable('cc_module_settings');
    }
}
