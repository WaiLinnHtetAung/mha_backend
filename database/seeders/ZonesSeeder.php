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
            ['name' => 'Yangon'],
            ['name' => 'Mandalay'],
            ['name' => 'NayPyiTaw'],
            ['name' => 'Bagan'],
            ['name' => 'Chaung Thar'],
            ['name' => 'Ngwe Saung'],
            ['name' => 'Maw La Mying'],
            ['name' => 'Magway'],
            ['name' => 'Rakhine'],
            ['name' => 'Bago'],
            ['name' => 'Pyay'],
            ['name' => 'Kachin'],
            ['name' => 'Kayah'],
            ['name' => 'Kayin'],
            ['name' => 'Pyin Oo Lwin'],
            ['name' => 'Shan (South)'],
            ['name' => 'Shan (North)'],
            ['name' => 'TaninTharYi'],
            ['name' => 'Sa Gaing'],
            ['name' => 'Chin'],
            ['name' => 'Golden Triangle'],
            ['name' => 'Hotel Suppliers'],
        ];

        Zone::insert($zones);
    }
}
