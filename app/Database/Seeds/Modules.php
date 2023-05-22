<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Modules extends Seeder
{
    public function run()
    {
        $data = [
            [
                'module_id' => 1,
                'module_name' => 'Top Search',
                'module_key' => 'top_search',
                'status' => 1,
            ],
            [
                'module_id' => 2,
                'module_name' => 'Wishlist',
                'module_key' => 'wishlist',
                'status' => 1,
            ],
            [
                'module_id' => 3,
                'module_name' => 'Compare',
                'module_key' => 'compare',
                'status' => 1,
            ],
        ];

        // Using Query Builder
        $this->db->table('cc_modules')->insertBatch($data);
    }
}
