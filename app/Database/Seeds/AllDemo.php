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
        $this->call('Products');
        $this->call('ProductAttribute');
        $this->call('ProductAttributeGroup');
        $this->call('ProductCategoryPopular');
        $this->call('ProductDescription');
        $this->call('ProductFeedback');
        $this->call('ProductFreeDelivery');
        $this->call('ProductImage');
        $this->call('ProductOption');
        $this->call('ProductRelated');
        $this->call('ProductSpecial');
        $this->call('ProductToCategory');
    }
}
