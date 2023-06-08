<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductAttribute extends Seeder
{
    public function run()
    {
        $data = [
            [
                'attribute_id' => 1,
                'attribute_group_id' => 1,
                'product_id' => 1,
                'name' => 'Samsung',
                'details' => null,
                'sort_order' => 0,
            ]
        ];


        // Using Query Builder
        $this->db->table('cc_product_attribute')->insertBatch($data);
    }
}
