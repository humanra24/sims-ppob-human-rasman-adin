<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                "service_code" => "PAJAK",
                "service_name" => "PBB",
                "service_icon" => base_url('assets/PBB.png'),
                "service_tariff"    => 40000,
            ],
            [
                "service_code" => "PLN",
                "service_name" => "Listrik",
                "service_icon" => base_url('assets/Listrik.png'),
                "service_tariff"    => 10000,
            ],
            [
                "service_code" => "PULSA",
                "service_name" => "Pulsa",
                "service_icon" => base_url('assets/Pulsa.png'),
                "service_tariff"    => 40000,
            ],
            [
                "service_code" => "PDAM",
                "service_name" => "PDAM",
                "service_icon" => base_url('assets/PDAM.png'),
                "service_tariff"    => 40000,
            ],
            [
                "service_code" => "PGN",
                "service_name" => "PGN",
                "service_icon" => base_url('assets/PGN.png'),
                "service_tariff"    => 50000,
            ],
            [
                "service_code" => "TV",
                "service_name" => "TV Berlangganan",
                "service_icon" => base_url('assets/Televisi.png'),
                "service_tariff"    => 50000,
            ],
            [
                "service_code" => "MUSIK",
                "service_name" => "Musik",
                "service_icon" => base_url('assets/Musik.png'),
                "service_tariff"    => 50000,
            ],
            [
                "service_code" => "VOUCHER_GAME",
                "service_name" => "Voucher Game",
                "service_icon" => base_url('assets/Game.png'),
                "service_tariff"    => 100000,
            ],
            [
                "service_code" => "VOUCHER_MAKANAN",
                "service_name" => "Voucher Makanan",
                "service_icon" => base_url('assets/voucher_makanan.png'),
                "service_tariff"    => 100000,
            ],
            [
                "service_code" => "QURBAN",
                "service_name" => "Qurban",
                "service_icon" => base_url('assets/Kurban.png'),
                "service_tariff"    => 200000,
            ],
            [
                "service_code" => "ZAKAT",
                "service_name" => "Zakat",
                "service_icon" => base_url('assets/Zakat.png'),
                "service_tariff"    => 300000,
            ],
            [
                "service_code" => "PAKET_DATA",
                "service_name" => "Paket data",
                "service_icon" => base_url('assets/paket_data.png'),
                "service_tariff"    => 50000,
            ],
        ];

        // Insert data ke dalam tabel 'service'
        $this->db->table('services')->insertBatch($data);
    }
}
