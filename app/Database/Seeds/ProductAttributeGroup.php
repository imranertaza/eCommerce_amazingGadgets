<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductAttributeGroup extends Seeder
{
    public function run()
    {
        $data = [
            [
                'attribute_group_id' => 1,
                'name' => 'Brand',
                'sort_order' => '0',
            ],
            [
                'attribute_group_id' => 2,
                'name' => 'Material',
                'sort_order' => '0',
            ],
        ];


        // Using Query Builder
        $this->db->table('cc_product_attribute_group')->insertBatch($data);
    }
}
