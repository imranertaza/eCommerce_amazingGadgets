<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategoryPopular extends Seeder
{
    public function run()
    {
        $data = [
            [
                'prod_cat_popular_id' => 1,
                'prod_cat_id' => '1',
                'popular' => '1',
                'sort_order' => '0',
                'status' => '1',
                'createdDtm' => '2023-05-27 11:20:20',
                'createdBy' => '',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:20:20',
            ],
            [
                'prod_cat_popular_id' => 2,
                'prod_cat_id' => '2',
                'popular' => '1',
                'sort_order' => '0',
                'status' => '1',
                'createdDtm' => '2023-05-27 11:20:29',
                'createdBy' => '',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:20:29',
            ],
            [
                'prod_cat_popular_id' => 3,
                'prod_cat_id' => '3',
                'popular' => '1',
                'sort_order' => '0',
                'status' => '1',
                'createdDtm' => '2023-05-27 11:20:35',
                'createdBy' => '',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:20:35',
            ],
            [
                'prod_cat_popular_id' => 4,
                'prod_cat_id' => '4',
                'popular' => '1',
                'sort_order' => '0',
                'status' => '1',
                'createdDtm' => '2023-05-27 11:20:40',
                'createdBy' => '',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:20:40',
            ],
            [
                'prod_cat_popular_id' => 5,
                'prod_cat_id' => '5',
                'popular' => '1',
                'sort_order' => '0',
                'status' => '1',
                'createdDtm' => '2023-05-27 11:20:56',
                'createdBy' => '',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:20:56',
            ],
            [
                'prod_cat_popular_id' => 6,
                'prod_cat_id' => '8',
                'popular' => '1',
                'sort_order' => '0',
                'status' => '1',
                'createdDtm' => '2023-05-27 11:21:09',
                'createdBy' => '',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:21:09',
            ],
            [
                'prod_cat_popular_id' => 7,
                'prod_cat_id' => '7',
                'popular' => '1',
                'sort_order' => '0',
                'status' => '1',
                'createdDtm' => '2023-05-27 11:21:18',
                'createdBy' => '',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:21:18',
            ],
            [
                'prod_cat_popular_id' => 8,
                'prod_cat_id' => '9',
                'popular' => '1',
                'sort_order' => '0',
                'status' => '1',
                'createdDtm' => '2023-05-27 11:21:28',
                'createdBy' => '',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:21:28',
            ],
            [
                'prod_cat_popular_id' => 9,
                'prod_cat_id' => '10',
                'popular' => '1',
                'sort_order' => '0',
                'status' => '1',
                'createdDtm' => '2023-05-27 11:21:32',
                'createdBy' => '',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:21:32',
            ],
            [
                'prod_cat_popular_id' => 10,
                'prod_cat_id' => '11',
                'popular' => '1',
                'sort_order' => '0',
                'status' => '1',
                'createdDtm' => '2023-05-27 11:21:50',
                'createdBy' => '',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:21:50',
            ],
        ];


        // Using Query Builder
        $this->db->table('cc_product_category_popular')->insertBatch($data);
    }
}
