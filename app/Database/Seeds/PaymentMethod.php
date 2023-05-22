<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PaymentMethod extends Seeder
{
    public function run()
    {
        $data = [
            [
                'payment_method_id' => 1,
                'name' => 'Cash On Delivery',
                'code' => 'COD',
                'status' => '1',
            ],
        ];
        // Using Query Builder
        $this->db->table('cc_payment_method')->insertBatch($data);
    }
}
