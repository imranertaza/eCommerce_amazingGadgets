<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Store extends Seeder
{
    public function run()
    {
        $data = [
            [
                'store_id' => 1,
                'name' => 'default',
                'description' => 'default',
                'is_default' => '1',
            ],
        ];
        // Using Query Builder
        $this->db->table('cc_stores')->insertBatch($data);
    }
}
