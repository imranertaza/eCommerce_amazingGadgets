<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductOption extends Seeder
{
    public function run()
    {
        $data = [
            [
                'product_option_id' => 1,
                'product_id' => 1,
                'option_id' => 2,
                'option_value_id' => '10',
                'quantity' => '5',
                'subtract' => '',
                'price' => '600.0000',
                'points' => '',
                'weight' => '',
            ],
            [
                'product_option_id' => 2,
                'product_id' => 7,
                'option_id' => 1,
                'option_value_id' => '1',
                'quantity' => '100',
                'subtract' => '',
                'price' => '500.0000',
                'points' => '',
                'weight' => '',
            ],
            [
                'product_option_id' => 3,
                'product_id' => 7,
                'option_id' => 1,
                'option_value_id' => '3',
                'quantity' => '100',
                'subtract' => '',
                'price' => '600.0000',
                'points' => '',
                'weight' => '',
            ],
        ];

        // Using Query Builder
        $this->db->table('cc_product_option')->insertBatch($data);
    }
}
