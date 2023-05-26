<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class ProductFeedback extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_feedback_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'product_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'customer_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'feedback_star' => [
                'type'           => 'INT',
                'constraint'     => 1,
            ],
            'feedback_text' => [
                'type' => 'text',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Pending', 'Active'],
                'default' => 'Pending',
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

        $this->forge->addKey('product_feedback_id', true);
        $this->forge->createTable('cc_product_feedback');
    }

    public function down()
    {
        $this->forge->dropTable('cc_product_feedback');
    }
}
