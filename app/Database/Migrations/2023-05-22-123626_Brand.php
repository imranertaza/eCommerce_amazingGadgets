<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Brand extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'brand_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 155,
                'null' => true,
                'default' => NULL,
            ],
            'sort_order' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
            'createdDtm' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'createdBy' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'updatedBy' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'updatedDtm' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
                'on update' => 'NOW()',
            ],
        ]);
        $this->forge->addKey('brand_id', true);
        $this->forge->createTable('cc_brand');
    }

    public function down()
    {
        $this->forge->dropTable('cc_brand');
    }
}
