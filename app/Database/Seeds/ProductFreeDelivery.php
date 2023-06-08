<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductFreeDelivery extends Seeder
{
    public function run()
    {
        $data = [
            [
                'product_free_delivery_id' => 1,
                'product_id' => 1,
                'sort_order' => '0',
            ],
            [
                'product_free_delivery_id' => 2,
                'product_id' => 2,
                'sort_order' => '0',
            ],
            [
                'product_free_delivery_id' => 3,
                'product_id' => 3,
                'sort_order' => '0',
            ],
            [
                'product_free_delivery_id' => 4,
                'product_id' => 4,
                'sort_order' => '0',
            ],
            [
                'product_free_delivery_id' => 5,
                'product_id' => 5,
                'sort_order' => '0',
            ],
            [
                'product_free_delivery_id' => 6,
                'product_id' => 6,
                'sort_order' => '0',
            ],
        ];


        // Using Query Builder
        $this->db->table('cc_product_free_delivery')->insertBatch($data);
    }
}
