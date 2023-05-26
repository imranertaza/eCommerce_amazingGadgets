<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pages extends Seeder
{
    public function run()
    {
        $data = [
            [
                'page_id' => 1,
                'temp' => 'contact.php',
                'page_title' => 'Contact Us',
                'slug' => 'contact-us',
                'short_des' => 'test',
                'page_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'f_image' => '',
                'page_type' => '',
                'status' => 'Active',
            ],
            [
                'page_id' => 2,
                'temp' => 'about_us.php',
                'page_title' => 'About Us',
                'slug' => 'about-us',
                'short_des' => '',
                'page_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'f_image' => '',
                'page_type' => '',
                'status' => 'Active',
            ],
            [
                'page_id' => 3,
                'temp' => '',
                'page_title' => 'Lorem Ipsum',
                'slug' => 'test',
                'short_des' => '',
                'page_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'f_image' => '',
                'page_type' => '',
                'status' => 'Active',
            ],
            [
                'page_id' => 4,
                'temp' => 'default.php',
                'page_title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'short_des' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum numqu',
                'page_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'f_image' => '',
                'page_type' => '',
                'status' => 'Active',
            ],
            [
                'page_id' => 5,
                'temp' => 'default.php',
                'page_title' => 'Terms And Conditions',
                'slug' => 'terms-and-conditions',
                'short_des' => '',
                'page_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'f_image' => '',
                'page_type' => '',
                'status' => 'Active',
            ],
            [
                'page_id' => 6,
                'temp' => 'default.php',
                'page_title' => 'Returns Policy',
                'slug' => 'returns-policy',
                'short_des' => '',
                'page_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'f_image' => '',
                'page_type' => '',
                'status' => 'Active',
            ],
        ];
        // Using Query Builder
        $this->db->table('cc_pages')->insertBatch($data);
    }
}
