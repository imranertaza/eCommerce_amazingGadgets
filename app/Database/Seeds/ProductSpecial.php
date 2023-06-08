<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSpecial extends Seeder
{
    public function run()
    {
        $data = [
            [
                'product_special_id' => 1,
                'product_id' => 1,
                'special_price' => 550.00,
                'start_date' => '2023-05-26',
                'end_date' => '2023-12-27',
                'createdDtm' => '2023-05-27 11:34:49',
                'createdBy' => '',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:34:49',
            ],
            [
                'product_special_id' => 2,
                'product_id' => 2,
                'special_price' => 1400.00,
                'start_date' => '2023-05-26',
                'end_date' => '2023-12-27',
                'createdDtm' => '2023-05-27 11:37:27',
                'createdBy' => '',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:37:27',
            ],
            [
                'product_special_id' => 3,
                'product_id' => 3,
                'special_price' => 1700.00,
                'start_date' => '2023-05-26',
                'end_date' => '2023-12-27',
                'createdDtm' => '2023-05-27 11:41:54',
                'createdBy' => '',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:41:54',
            ],
            [
                'product_special_id' => 4,
                'product_id' => 4,
                'special_price' => 3400.00,
                'start_date' => '2023-05-16',
                'end_date' => '2023-12-27',
                'createdDtm' => '2023-05-27 11:45:48',
                'createdBy' => '',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:45:48',
            ],
            [
                'product_special_id' => 5,
                'product_id' => 5,
                'special_price' => 2300.00,
                'start_date' => '2023-05-25',
                'end_date' => '2023-12-27',
                'createdDtm' => '2023-05-27 11:50:18',
                'createdBy' => '',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:50:18',
            ],
            [
                'product_special_id' => 6,
                'product_id' => 6,
                'special_price' => 500.00,
                'start_date' => '2023-05-26',
                'end_date' => '2023-12-27',
                'createdDtm' => '2023-05-27 11:53:39',
                'createdBy' => '',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:53:39',
            ],
        ];


        // Using Query Builder
        $this->db->table('cc_product_special')->insertBatch($data);
    }
}
