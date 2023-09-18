<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ZonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zones = [
            [
                'name' => 'Yangon',
                'slug' => 'Yangon'
            ],
            [
                'name' => 'Mandalay',
                'slug' => 'Mandalay'
            ],
            [
                'name' => 'NayPyiTaw',
                'slug' => 'NayPyiTaw'
            ],
            [
                'name' => 'Bagan',
                'slug' => 'Bagan'
            ],
            [
                'name' => 'Chaung Thar',
                'slug' => 'ChaungThar'
            ],
            [
                'name' => 'Ngwe Saung',
                'slug' => 'NgweSaung'
            ],
            [
                'name' => 'Maw La Mying',
                'slug' => 'MawLaMying'
            ],
            [
                'name' => 'Magway',
                'slug' => 'Magway'
            ],
            [
                'name' => 'Rakhine',
                'slug' => 'Rakhine'
            ],
            [
                'name' => 'Bago',
                'slug' => 'Bago'
            ],
            [
                'name' => 'Pyay',
                'slug' => 'Pyay'
            ],
            [
                'name' => 'Kachin',
                'slug' => 'Kachin'
            ],
            [
                'name' => 'Kayah',
                'slug' => 'Kayah'
            ],
            [
                'name' => 'Kayin',
                'slug' => 'Kayin'
            ],
            [
                'name' => 'Pyin Oo Lwin',
                'slug' => 'PyinOoLwin'
            ],
            [
                'name' => 'Shan (South)',
                'slug' => 'ShanSouth'
            ],
            [
                'name' => 'Shan (North)',
                'slug' => 'ShanNorth'
            ],
            [
                'name' => 'TaninTharYi',
                'slug' => 'TaninTharYi'
            ],
            [
                'name' => 'Sa Gaing',
                'slug' => 'SaGaing'
            ],
            [
                'name' => 'Chin',
                'slug' => 'Chin'
            ],
            [
                'name' => 'Golden Triangle',
                'slug' => 'GoldenTriangle'
            ],
            [
                'name' => 'Hotel Suppliers',
                'slug' => 'HotelSuppliers'
            ],
        ];

        Zone::insert($zones);
    }
}
