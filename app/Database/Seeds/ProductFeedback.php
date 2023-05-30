<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductFeedback extends Seeder
{
    public function run()
    {
        $data = [
            [
                'product_feedback_id' => 1,
                'product_id' => 2,
                'customer_id' => 1,
                'feedback_star' => 5,
                'feedback_text' => 'good product',
                'status' => 'Active',
                'createdDtm' => '2023-05-27 17:03:07',
                'createdBy' => NULL,
                'updatedBy' => NULL,
                'updatedDtm' => '2023-05-27 17:04:00',
            ]
        ];


        // Using Query Builder
        $this->db->table('cc_product_feedback')->insertBatch($data);
    }
}
