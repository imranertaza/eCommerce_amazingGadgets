<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllDemo extends Seeder
{
    public function run()
    {
        $this->call('Brand');
        $this->call('Country');
        $this->call('Icons');
        $this->call('Modules');
        $this->call('Option');
        $this->call('OptionValue');
        $this->call('OrderStatus');
        $this->call('Pages');
        $this->call('PaymentMethod');
        $this->call('ProductCategory');
        $this->call('Role');
        $this->call('Settings');
        $this->call('ShippingMethod');
        $this->call('ShippingSettings');
        $this->call('Stores');
        $this->call('ThemeSettings');
        $this->call('Users');
        $this->call('Zone');
    }
}
