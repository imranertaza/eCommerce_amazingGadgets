<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Brand extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Chanel',
                'image' => 'chanel.png',
            ],
            [
                'name' => 'LV',
                'image' => 'lv.png',
            ],
            [
                'name' => 'Bally',
                'image' => 'bally.png',
            ],
            [
                'name' => 'Hermes',
                'image' => 'hermes.png',
            ],
        ];

        // Using Query Builder
        $this->db->table('cc_brand')->insertBatch($data);
    }
}
