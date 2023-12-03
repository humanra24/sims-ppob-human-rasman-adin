<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                "banner_name" => "Banner 1",
                "banner_image" => base_url('assets/Banner_1.png'),
                "description" => "Lerem Ipsum Dolor sit amet",
            ],
            [
                "banner_name" => "Banner 2",
                "banner_image" => base_url('assets/Banner_2.png'),
                "description" => "Lerem Ipsum Dolor sit amet",
            ],
            [
                "banner_name" => "Banner 3",
                "banner_image" => base_url('assets/Banner_3.png'),
                "description" => "Lerem Ipsum Dolor sit amet",
            ],
            [
                "banner_name" => "Banner 4",
                "banner_image" => base_url('assets/Banner_4.png'),
                "description" => "Lerem Ipsum Dolor sit amet",
            ],
            [
                "banner_name" => "Banner 5",
                "banner_image" => base_url('assets/Banner_5.png'),
                "description" => "Lerem Ipsum Dolor sit amet",
            ],
        ];

        // Insert data ke dalam tabel 'banners'
        $this->db->table('banners')->insertBatch($data);
    }
}
