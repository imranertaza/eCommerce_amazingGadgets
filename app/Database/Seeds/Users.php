<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => '1',
                'email' => 'admin@gmail.com',
                'password' => sha1(12345678),
                'pass' => '12345678',
                'name' => 'Demo Admin',
                'mobile' => '01924329315',
                'address' => 'This is demo address',
                'pic' => 'admin.jpg',
                'role_id' => '1',
                'status' => '1',
                'is_default' => '1',
                'createdBy' => '1',
            ],
            [
                'user_id' => '2',
                'email' => 'maneger@gmail.com',
                'password' => sha1(12345678),
                'pass' => '12345678',
                'name' => 'Manager',
                'mobile' => '1923121212',
                'address' => 'This is demo address',
                'pic' => 'admin.jpg',
                'role_id' => '2',
                'status' => '1',
                'is_default' => 0,
                'createdBy' => '1',
            ],
        ];


        // Using Query Builder
        $this->db->table('cc_users')->insertBatch($data);
    }
}
