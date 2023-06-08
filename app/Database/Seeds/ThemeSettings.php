<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ThemeSettings extends Seeder
{
    public function run()
    {
        $data = [
            [
                'theme_settings_id' => 1,
                'label' => 'slider_1',
                'title' => 'slider',
                'value' => 'slider_1684647687_df54ca4108a5e048790c.png',
            ],
            [
                'theme_settings_id' => 2,
                'label' => 'slider_2',
                'title' => 'slider',
                'value' => 'slider_1684678337_038c7230f60470759499.png',
            ],
            [
                'theme_settings_id' => 3,
                'label' => 'slider_3',
                'title' => 'slider',
                'value' => 'slider_1684648056_23a192851882cbec0c24.jpg',
            ],
            [
                'theme_settings_id' => 4,
                'label' => 'home_category',
                'title' => 'Home Category',
                'value' => '9',
            ],
            [
                'theme_settings_id' => 5,
                'label' => 'side_logo',
                'title' => 'side logo',
                'value' => 'logo_1684648190_da728d2cebeb808d8974.png',
            ],
            [
                'theme_settings_id' => 6,
                'label' => 'featured_products_limit',
                'title' => 'Featured Products Limit',
                'value' => '8',
            ],
            [
                'theme_settings_id' => 7,
                'label' => 'home_category_banner',
                'title' => 'Home Category Banner',
                'value' => 'banner_1684648200_a928cc40fd3ae096963c.jpg',
            ],
            [
                'theme_settings_id' => 8,
                'label' => 'hot_deals_category',
                'title' => 'Hot Deals Category',
                'value' => '9',
            ],
            [
                'theme_settings_id' => 9,
                'label' => 'trending_collection_category',
                'title' => 'Trending Collection Category',
                'value' => '10',
            ],
            [
                'theme_settings_id' => 10,
                'label' => 'special_category_one',
                'title' => 'Special Category one',
                'value' => '9',
            ],
            [
                'theme_settings_id' => 11,
                'label' => 'special_category_two',
                'title' => 'Special Category Two',
                'value' => '10',
            ],
            [
                'theme_settings_id' => 12,
                'label' => 'special_category_three',
                'title' => 'Special Category Three',
                'value' => '15',
            ],
            [
                'theme_settings_id' => 13,
                'label' => 'trending_youtube_video',
                'title' => 'Trending Youtube Video',
                'value' => 'https://www.youtube.com/embed/zsxBqvbUf20',
            ],
            [
                'theme_settings_id' => 14,
                'label' => 'brands_youtube_video',
                'title' => 'Brands Youtube Video',
                'value' => 'https://www.youtube.com/embed/6KPnDV5Lf6k',
            ],
            [
                'theme_settings_id' => 15,
                'label' => 'special_banner',
                'title' => 'Special Banner',
                'value' => 'sp_banner_1684574413_d5b3bd4ff10edbff4f43.jpg',
            ],
            [
                'theme_settings_id' => 16,
                'label' => 'left_side_banner_one',
                'title' => 'Left Side Banne One',
                'value' => 'left_banner_1684575043_eaa88d4936ca90a32426.jpg',
            ],
            [
                'theme_settings_id' => 17,
                'label' => 'left_side_banner_two',
                'title' => 'Left Side Banne Two',
                'value' => 'left_banner_1684575416_3e62a6d33c5f5d3f314e.jpg',
            ],
            [
                'theme_settings_id' => 18,
                'label' => 'left_side_banner_three',
                'title' => 'Left Side Banne Three',
                'value' => 'left_banner_1684575425_f56f732cf7688f93cf18.jpg',
            ],
        ];
        // Using Query Builder
        $this->db->table('cc_theme_settings')->insertBatch($data);
    }
}
