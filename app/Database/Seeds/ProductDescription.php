<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductDescription extends Seeder
{
    public function run()
    {
        $data = [
            [
                'product_desc_id' => 1,
                'product_id' => 1,
                'description' => 'Samsung Galaxy Watch5 40mm R900 | Imported Not UK model | Without ECG & Samsung Pay. Monitor your health around the clock even at night.',
                'tag' => 'Watch',
                'meta_title' => 'Watch',
                'meta_description' => 'Watch',
                'meta_keyword' => 'Watch',
                'createdDtm' => '2023-05-27 11:33:19',
                'createdBy' => '1',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:56:59',
            ],
            [
                'product_desc_id' => 2,
                'product_id' => 2,
                'description' => 'Analog to digital, vintage to modern, select a watch face to help you face the day. Pick from the classic set or from the various watch faces.',
                'tag' => 'Watch',
                'meta_title' => 'Watch',
                'meta_description' => 'Watch',
                'meta_keyword' => 'Watch',
                'createdDtm' => '2023-05-27 11:37:27',
                'createdBy' => '1',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:37:27',
            ],
            [
                'product_desc_id' => 3,
                'product_id' => 3,
                'description' => 'Samsung Galaxy Watch5 40mm R900 | Import',
                'tag' => 'Watch',
                'meta_title' => 'Watch',
                'meta_description' => 'Watch',
                'meta_keyword' => 'Watch',
                'createdDtm' => '2023-05-27 11:41:54',
                'createdBy' => '1',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:41:54',
            ],
            [
                'product_desc_id' => 4,
                'product_id' => 4,
                'description' => 'Stay active and motivated with Activity rings. And train like never before with the enhanced Workout app. Now you can try custom workouts and get advanced fitness metrics like Heart Rate Zones, Stride Length, Ground Contact Time, and Vertical Oscillation.',
                'tag' => 'Apple Watch',
                'meta_title' => 'Apple Watch',
                'meta_description' => 'Apple Watch',
                'meta_keyword' => 'Apple Watch',
                'createdDtm' => '2023-05-27 11:45:48',
                'createdBy' => '1',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:45:48',
            ],
            [
                'product_desc_id' => 5,
                'product_id' => 5,
                'description' => 'Apple Watch Series 8 GPS 41mm with Sport Band | A healthy leap ahead. | Crash Detection to get help in an emergency',
                'tag' => 'Apple Watch',
                'meta_title' => 'Apple Watch',
                'meta_description' => 'Apple Watch',
                'meta_keyword' => 'Apple Watch',
                'createdDtm' => '2023-05-27 11:50:17',
                'createdBy' => '1',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:50:17',
            ],
            [
                'product_desc_id' => 6,
                'product_id' => 6,
                'description' => 'Xiaomi Mi Band 7 Smart Wristband Watch | All day spo2 monitoring | Up to 500nit, support manual adjustment',
                'tag' => 'Watch',
                'meta_title' => 'Watch',
                'meta_description' => 'Watch',
                'meta_keyword' => 'Watch',
                'createdDtm' => '2023-05-27 11:53:39',
                'createdBy' => '1',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-27 11:53:39',
            ],
            [
                'product_desc_id' => 7,
                'product_id' => 7,
                'description' => 'Stainless steel case with a stainless steel bracelet. Uni-directional rotating stainless steel bezel with a blue aluminium ring. Blue dial with luminous silver-tone hands and dot hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Tudor calibre MT5402 automatic movement, containing 27 Jewels, bitting at 28800 vph, and has a power reserve of approximately 70 hours. Scratch resistant sapphire crystal. Screw down crown. Solid case back. Round case shape. Case size: 39 mm. Case thickness: 11.9 mm. Band width: 20 mm. Fold over clasp with a push button release. Water resistant at 200 meters / 660 feet. Functions: hour, minute, second, chronometer. Black Bay Fifty Eight Series. Luxury watch style. Watch label: Swiss Made. Tudor Black Bay Fifty Eight Automatic Chronometer Blue Dial',
                'tag' => '',
                'meta_title' => 'Black Bay Fifty Eight Automatic Chronometer Blue Dial Men\'s Watch',
                'meta_description' => 'Black Bay Fifty Eight Automatic Chronometer Blue Dial Men\'s Watch',
                'meta_keyword' => 'Black Bay Fifty Eight Automatic Chronometer Blue Dial Men\'s Watch',
                'createdDtm' => '2023-05-28 19:59:05',
                'createdBy' => '1',
                'updatedBy' => '',
                'updatedDtm' => '2023-05-28 19:59:05',
            ],
        ];


        // Using Query Builder
        $this->db->table('cc_product_description')->insertBatch($data);
    }
}
