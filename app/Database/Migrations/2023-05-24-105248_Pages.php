<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Pages extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'page_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'temp' => [
                'type'       => 'VARCHAR',
                'constraint' => 155,
                'null' => true,
                'default' => null,
            ],
            'page_title' => [
                'type' => 'VARCHAR',
                'constraint' => 155,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 155,
                'null' => true,
                'default' => null,
            ],
            'short_des' => [
                'type' => 'VARCHAR',
                'constraint' => 155,
                'null' => true,
                'default' => null,
            ],
            'page_description' => [
                'type' => 'text',
                'null' => true,
                'default' => null,
            ],
            'f_image' => [
                'type' => 'VARCHAR',
                'constraint' => 155,
                'null' => true,
                'default' => null,
            ],
            'page_type' => [
                'type' => 'ENUM',
                'constraint' => ['page', 'post', 'video', 'analyses'],
                'null' => true,
                'default' => null,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Active', 'Inactive'],
                'default' => 'Active',
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

        $this->forge->addKey('page_id', true);
        $this->forge->createTable('cc_pages');
    }

    public function down()
    {
        $this->forge->dropTable('cc_pages');
    }
}
