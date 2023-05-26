<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Option extends Seeder
{
    public function run()
    {
        $data = [
            [
                'option_id' => 1,
                'name' => 'size',
                'type' => 'select',
                'sort_order' => '0',
            ],
            [
                'option_id' => 2,
                'name' => 'Color',
                'type' => 'checkbox',
                'sort_order' => '0',
            ],
        ];

        // Using Query Builder
        $this->db->table('cc_option')->insertBatch($data);
    }
}
