<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductToCategory extends Seeder
{
    public function run()
    {
        $data = [
            [
                'product_to_cat_id' => 19,
                'product_id' => 2,
                'category_id' => 1,
            ],
            [
                'product_to_cat_id' => 20,
                'product_id' => 2,
                'category_id' => 2,
            ],
            [
                'product_to_cat_id' => 21,
                'product_id' => 2,
                'category_id' => 3,
            ],
            [
                'product_to_cat_id' => 22,
                'product_id' => 2,
                'category_id' => 4,
            ],
            [
                'product_to_cat_id' => 23,
                'product_id' => 2,
                'category_id' => 8,
            ],
            [
                'product_to_cat_id' => 24,
                'product_id' => 2,
                'category_id' => 9,
            ],
            [
                'product_to_cat_id' => 25,
                'product_id' => 2,
                'category_id' => 10,
            ],
            [
                'product_to_cat_id' => 26,
                'product_id' => 3,
                'category_id' => 1,
            ],
            [
                'product_to_cat_id' => 27,
                'product_id' => 3,
                'category_id' => 2,
            ],
            [
                'product_to_cat_id' => 28,
                'product_id' => 3,
                'category_id' => 3,
            ],
            [
                'product_to_cat_id' => 29,
                'product_id' => 3,
                'category_id' => 4,
            ],
            [
                'product_to_cat_id' => 30,
                'product_id' => 3,
                'category_id' => 8,
            ],
            [
                'product_to_cat_id' => 31,
                'product_id' => 3,
                'category_id' => 9,
            ],
            [
                'product_to_cat_id' => 32,
                'product_id' => 3,
                'category_id' => 10,
            ],
            [
                'product_to_cat_id' => 33,
                'product_id' => 4,
                'category_id' => 1,
            ],
            [
                'product_to_cat_id' => 34,
                'product_id' => 4,
                'category_id' => 2,
            ],
            [
                'product_to_cat_id' => 35,
                'product_id' => 4,
                'category_id' => 4,
            ],
            [
                'product_to_cat_id' => 36,
                'product_id' => 4,
                'category_id' => 8,
            ],
            [
                'product_to_cat_id' => 37,
                'product_id' => 4,
                'category_id' => 9,
            ],
            [
                'product_to_cat_id' => 38,
                'product_id' => 4,
                'category_id' => 10,
            ],
            [
                'product_to_cat_id' => 39,
                'product_id' => 5,
                'category_id' => 1,
            ],
            [
                'product_to_cat_id' => 40,
                'product_id' => 5,
                'category_id' => 2,
            ],
            [
                'product_to_cat_id' => 41,
                'product_id' => 5,
                'category_id' => 4,
            ],
            [
                'product_to_cat_id' => 42,
                'product_id' => 5,
                'category_id' => 9,
            ],
            [
                'product_to_cat_id' => 43,
                'product_id' => 5,
                'category_id' => 10,
            ],
            [
                'product_to_cat_id' => 44,
                'product_id' => 6,
                'category_id' => 1,
            ],
            [
                'product_to_cat_id' => 45,
                'product_id' => 6,
                'category_id' => 2,
            ],
            [
                'product_to_cat_id' => 46,
                'product_id' => 6,
                'category_id' => 4,
            ],
            [
                'product_to_cat_id' => 47,
                'product_id' => 6,
                'category_id' => 8,
            ],
            [
                'product_to_cat_id' => 48,
                'product_id' => 6,
                'category_id' => 9,
            ],
            [
                'product_to_cat_id' => 49,
                'product_id' => 6,
                'category_id' => 10,
            ],
            [
                'product_to_cat_id' => 62,
                'product_id' => 1,
                'category_id' => 1,
            ],
            [
                'product_to_cat_id' => 63,
                'product_id' => 1,
                'category_id' => 2,
            ],
            [
                'product_to_cat_id' => 64,
                'product_id' => 1,
                'category_id' => 4,
            ],
            [
                'product_to_cat_id' => 65,
                'product_id' => 1,
                'category_id' => 5,
            ],
            [
                'product_to_cat_id' => 66,
                'product_id' => 1,
                'category_id' => 9,
            ],
            [
                'product_to_cat_id' => 67,
                'product_id' => 1,
                'category_id' => 10,
            ],
            [
                'product_to_cat_id' => 68,
                'product_id' => 7,
                'category_id' => 2,
            ],
        ];


        // Using Query Builder
        $this->db->table('cc_product_to_category')->insertBatch($data);
    }
}
