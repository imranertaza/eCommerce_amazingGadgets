<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OptionValue extends Seeder
{
    public function run()
    {
        $data = [
            [
                'option_value_id' => 1,
                'option_id' => '1',
                'name' => '44',
                'image' => '',
                'sort_order' => '0',
            ],
            [
                'option_value_id' => 2,
                'option_id' => '1',
                'name' => '42',
                'image' => '',
                'sort_order' => '0',
            ],
            [
                'option_value_id' => 3,
                'option_id' => '1',
                'name' => '40',
                'image' => '',
                'sort_order' => '0',
            ],
            [
                'option_value_id' => 4,
                'option_id' => '1',
                'name' => '38',
                'image' => '',
                'sort_order' => '0',
            ],
            [
                'option_value_id' => 5,
                'option_id' => '1',
                'name' => '34',
                'image' => '',
                'sort_order' => '0',
            ],
            [
                'option_value_id' => 6,
                'option_id' => '1',
                'name' => '45',
                'image' => '',
                'sort_order' => '0',
            ],
            [
                'option_value_id' => 7,
                'option_id' => '1',
                'name' => '48',
                'image' => '',
                'sort_order' => '0',
            ],
            [
                'option_value_id' => 8,
                'option_id' => '2',
                'name' => '#00008B',
                'image' => '',
                'sort_order' => '0',
            ],
            [
                'option_value_id' => 9,
                'option_id' => '2',
                'name' => '#0000FF',
                'image' => '',
                'sort_order' => '0',
            ],
            [
                'option_value_id' => 10,
                'option_id' => '2',
                'name' => '#00FFFF',
                'image' => '',
                'sort_order' => '0',
            ],
            [
                'option_value_id' => 11,
                'option_id' => '2',
                'name' => '#FF0000',
                'image' => '',
                'sort_order' => '0',
            ],
        ];

        // Using Query Builder
        $this->db->table('cc_option_value')->insertBatch($data);
    }
}
