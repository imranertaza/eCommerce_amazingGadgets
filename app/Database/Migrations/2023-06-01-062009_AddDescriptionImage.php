<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDescriptionImage extends Migration
{
    public function up()
    {
        $fields = [
            'description_image' => [
                'type'           => 'varchar',
                'constraint'     => 225,
                'null' => true,
                'default' => null,
                'after' => 'meta_keyword',
            ],
            'documentation_pdf' => [
                'type'           => 'varchar',
                'constraint'     => 225,
                'null' => true,
                'default' => null,
                'after' => 'description_image',
            ],
            'safety_pdf' => [
                'type'           => 'varchar',
                'constraint'     => 225,
                'null' => true,
                'default' => null,
                'after' => 'documentation_pdf',
            ],
            'instructions_pdf' => [
                'type'           => 'varchar',
                'constraint'     => 225,
                'null' => true,
                'default' => null,
                'after' => 'safety_pdf',
            ],
            'video' => [
                'type'           => 'varchar',
                'constraint'     => 225,
                'null' => true,
                'default' => null,
                'after' => 'instructions_pdf',
            ],
        ];
        $this->forge->addColumn('cc_product_description', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('cc_product_description', ['description_image', 'documentation_pdf', 'safety_pdf', 'instructions_pdf', 'video']);
    }
}
