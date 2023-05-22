<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ShippingSettings extends Seeder
{
    public function run()
    {
        $data = [
            [
                'settings_id' => 1,
                'shipping_method_id' => 1,
                'label' => 'flat_rate_price',
                'title' => 'Flat Rate',
                'value' => '5',
            ],
            [
                'settings_id' => 2,
                'shipping_method_id' => 2,
                'label' => 'in_dhaka',
                'title' => 'Inside of Dhaka',
                'value' => '80',
            ],
            [
                'settings_id' => 3,
                'shipping_method_id' => 2,
                'label' => 'out_dhaka',
                'title' => 'Outside of Dhaka',
                'value' => '120',
            ],
        ];
        // Using Query Builder
        $this->db->table('cc_shipping_settings')->insertBatch($data);
    }
}
