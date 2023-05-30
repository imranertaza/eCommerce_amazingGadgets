<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductRelated extends Seeder
{
    public function run()
    {
        $data = [
            [
                'product_related_id' => 1,
                'product_id' => 2,
                'related_id' => 1,
            ],
            [
                'product_related_id' => 2,
                'product_id' => 3,
                'related_id' => 1,
            ],
            [
                'product_related_id' => 3,
                'product_id' => 3,
                'related_id' => 2,
            ],
            [
                'product_related_id' => 4,
                'product_id' => 4,
                'related_id' => 1,
            ],
            [
                'product_related_id' => 5,
                'product_id' => 4,
                'related_id' => 2,
            ],
            [
                'product_related_id' => 6,
                'product_id' => 4,
                'related_id' => 3,
            ],
            [
                'product_related_id' => 7,
                'product_id' => 5,
                'related_id' => 2,
            ],
            [
                'product_related_id' => 8,
                'product_id' => 5,
                'related_id' => 1,
            ],
            [
                'product_related_id' => 9,
                'product_id' => 5,
                'related_id' => 3,
            ],
            [
                'product_related_id' => 10,
                'product_id' => 5,
                'related_id' => 4,
            ],
            [
                'product_related_id' => 11,
                'product_id' => 6,
                'related_id' => 1,
            ],
            [
                'product_related_id' => 12,
                'product_id' => 6,
                'related_id' => 2,
            ],
            [
                'product_related_id' => 13,
                'product_id' => 6,
                'related_id' => 3,
            ],
            [
                'product_related_id' => 14,
                'product_id' => 6,
                'related_id' => 4,
            ],
            [
                'product_related_id' => 15,
                'product_id' => 6,
                'related_id' => 5,
            ],
            [
                'product_related_id' => 19,
                'product_id' => 1,
                'related_id' => 1,
            ],
            [
                'product_related_id' => 20,
                'product_id' => 1,
                'related_id' => 3,
            ],
            [
                'product_related_id' => 21,
                'product_id' => 1,
                'related_id' => 6,
            ],
        ];


        // Using Query Builder
        $this->db->table('cc_product_related')->insertBatch($data);
    }
}
