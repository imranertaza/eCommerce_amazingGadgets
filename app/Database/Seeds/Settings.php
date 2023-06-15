<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Settings extends Seeder
{
    public function run()
    {
        $data = [
            [
                'settings_id' => 1,
                'label' => 'invoice_prefix',
                'title' => 'Invoice Prefix',
                'value' => 'AG-INV-',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 2,
                'label' => 'currency_symbol',
                'title' => 'Currency Symbol',
                'value' => '৳',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 3,
                'label' => 'currency',
                'title' => 'Currency',
                'value' => 'BDT',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 4,
                'label' => 'Theme',
                'title' => 'Theme',
                'value' => 'Theme_2',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 6,
                'label' => 'store_name',
                'title' => 'Store Name',
                'value' => 'Amazing Gazet',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 7,
                'label' => 'store_owner',
                'title' => 'Store Owner',
                'value' => 'admin',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 8,
                'label' => 'address',
                'title' => 'Address',
                'value' => 'Nowapara, Ovainagar, Jessore',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 9,
                'label' => 'email',
                'title' => 'Email',
                'value' => 'admin@gmail.com',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 10,
                'label' => 'phone',
                'title' => 'Phone',
                'value' => '01923121212',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 11,
                'label' => 'country',
                'title' => 'Country',
                'value' => '18',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 12,
                'label' => 'state',
                'title' => 'State',
                'value' => '322',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 13,
                'label' => 'language',
                'title' => 'Language',
                'value' => 'Language',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 14,
                'label' => 'length_class',
                'title' => 'Length Class',
                'value' => 'Centimeter',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 15,
                'label' => 'weight_class',
                'title' => 'Weight Class',
                'value' => 'Pound',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 16,
                'label' => 'store_logo',
                'title' => 'Store Logo',
                'value' => 'logo_1680408092_956787fe09859ea5cd56.png',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 17,
                'label' => 'store_icon',
                'title' => 'Store Icon',
                'value' => 'Store Icon',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 18,
                'label' => 'mail_protocol',
                'title' => 'Mail Protocol',
                'value' => 'Mail Protocol',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 19,
                'label' => 'mail_address',
                'title' => 'Mail Address',
                'value' => 'dnationsoftdm8@gmail.com',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 20,
                'label' => 'smtp_host',
                'title' => 'SMTP Host',
                'value' => 'SMTP Host',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 21,
                'label' => 'smtp_username',
                'title' => 'SMTP Username',
                'value' => 'SMTP Username',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 22,
                'label' => 'smtp_password',
                'title' => 'SMTP Password',
                'value' => 'SMTP Password',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 23,
                'label' => 'smtp_port',
                'title' => 'SMTP Port',
                'value' => 'SMTP Port',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 24,
                'label' => 'smtp_timeout',
                'title' => 'SMTP Timeout',
                'value' => 'SMTP Timeout',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 25,
                'label' => 'new_account_alert_mail',
                'title' => 'New Account Alert Mail',
                'value' => '',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 26,
                'label' => 'new_order_alert_mail',
                'title' => 'New Order Alert Mail',
                'value' => '1',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 27,
                'label' => 'fb_url',
                'title' => 'Facebook',
                'value' => 'https://www.facebook.com/',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 28,
                'label' => 'twitter_url',
                'title' => 'Twitter',
                'value' => 'https://twitter.com/',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 29,
                'label' => 'tiktok_url',
                'title' => 'Tiktok',
                'value' => 'https://www.tiktok.com/',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 30,
                'label' => 'instagram_url',
                'title' => 'Instagram',
                'value' => 'https://www.instagram.com/',
                'createdBy' => 1,
            ],
            [
                'settings_id' => 31,
                'label' => 'smtp_crypto',
                'title' => 'SMTP Crypto',
                'value' => 'ssl',
                'createdBy' => 1,
            ],
        ];
        // Using Query Builder
        $this->db->table('cc_settings')->insertBatch($data);
    }
}
