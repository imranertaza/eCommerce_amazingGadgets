<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Role extends Seeder
{
    public function run()
    {
        $data = [
            [
                'role_id' => 1,
                'role' => 'Admin',
                'permission' => '{"Dashboard":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Pages":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Customers":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Product_category":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Settings":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Role":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"User":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Products":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Brand":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Customers":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Color_family":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Attribute_group":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Page_settings":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Coupon":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Module":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Newsletter":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Option":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Order":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Theme_settings":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Email_send":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Reviews":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Shipping":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"}}',
                'is_default' => 1,
                'createdBy' => 1,
            ],
            [
                'role_id' => 2,
                'role' => 'Manager',
                'permission' => '{"Dashboard":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Pages":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Customers":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Product_category":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Settings":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Role":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"User":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Products":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Brand":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Customers":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Color_family":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"}}',
                'is_default' => 0,
                'createdBy' => 1,
            ],
        ];
        // Using Query Builder
        $this->db->table('cc_roles')->insertBatch($data);
    }
}
