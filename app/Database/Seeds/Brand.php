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
                'createdBy' => 1,
            ],
            [
                'name' => 'LV',
                'image' => 'lv.png',
                'createdBy' => 1,
            ],
            [
                'name' => 'Bally',
                'image' => 'bally.png',
                'createdBy' => 1,
            ],
            [
                'name' => 'Hermes',
                'image' => 'hermes.png',
                'createdBy' => 1,
            ],
        ];

        // Using Query Builder
        $this->db->table('cc_brand')->insertBatch($data);
    }
}
