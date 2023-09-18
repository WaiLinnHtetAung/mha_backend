<?php

namespace Database\Seeders;

use App\Models\SubZone;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubZonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subZones = [
            [
                'id'        => 1,
                'name'      => 'Yangon',
                'zone_id'   => 1
            ],
            [
                'id'        => 2,
                'name'      => 'Than Hlyin',
                'zone_id'   => 1
            ],
            [
                'id'        => 3,
                'name'      => 'Taikkyi',
                'zone_id'   => 1
            ],
            [
                'id'        => 4,
                'name'      => 'Mandalay',
                'zone_id'   => 2
            ],
            [
                'id'        => 5,
                'name'      => 'Myingyan',
                'zone_id'   => 2
            ],
            [
                'id'        => 6,
                'name'      => 'Meikhtila',
                'zone_id'   => 2
            ],
            [
                'id'        => 7,
                'name'      => 'Kyauk Sal',
                'zone_id'   => 2
            ],
            [
                'id'        => 8,
                'name'      => 'Pyaw Bwe',
                'zone_id'   => 2
            ],
            [
                'id'        => 9,
                'name'      => 'Sint Khaing',
                'zone_id'   => 2
            ],
            [
                'id'        => 10,
                'name'      => 'Thazi',
                'zone_id'   => 2
            ],
            [
                'id'        => 11,
                'name'      => 'FDI (MDY)',
                'zone_id'   => 2
            ],
            [
                'id'        => 12,
                'name'      => 'Bagan',
                'zone_id'   => 4
            ],
            [
                'id'        => 13,
                'name'      => 'Kyauk Padaung',
                'zone_id'   => 4
            ],
            [
                'id'        => 14,
                'name'      => 'FDI (Bagan)',
                'zone_id'   => 4
            ],
            [
                'id'        => 15,
                'name'      => 'Taunggyi',
                'zone_id'   => 16
            ],
            [
                'id'        => 16,
                'name'      => 'Kalaw',
                'zone_id'   => 16
            ],
            [
                'id'        => 17,
                'name'      => 'Pindaya',
                'zone_id'   => 16
            ],
            [
                'id'        => 18,
                'name'      => 'Nyaung Shwe',
                'zone_id'   => 16
            ],
            [
                'id'        => 19,
                'name'      => 'Shwe Nyaung',
                'zone_id'   => 16
            ],
            [
                'id'        => 20,
                'name'      => 'Aung Ban',
                'zone_id'   => 16
            ],
            [
                'id'        => 21,
                'name'      => 'Pinlaung',
                'zone_id'   => 16
            ],
            [
                'id'        => 22,
                'name'      => 'Ywangan',
                'zone_id'   => 16
            ],
            [
                'id'        => 23,
                'name'      => 'Ngwe Saung',
                'zone_id'   => 6
            ],
            [
                'id'        => 24,
                'name'      => 'Hainggyi Kyun',
                'zone_id'   => 6
            ],
            [
                'id'        => 25,
                'name'      => 'Chaung Tha',
                'zone_id'   => 5
            ],
            [
                'id'        => 26,
                'name'      => 'Pathein',
                'zone_id'   => 5
            ],
            [
                'id'        => 27,
                'name'      => 'Shwe Taung Yan',
                'zone_id'   => 5
            ],
            [
                'id'        => 28,
                'name'      => 'Pyapon',
                'zone_id'   => 5
            ],
            [
                'id'        => 29,
                'name'      => 'Sittwe',
                'zone_id'   => 9
            ],
            [
                'id'        => 30,
                'name'      => 'Mrauk U',
                'zone_id'   => 9
            ],
            [
                'id'        => 31,
                'name'      => 'Ngapali',
                'zone_id'   => 9
            ],
            [
                'id'        => 32,
                'name'      => 'Kyauk Phyu',
                'zone_id'   => 9
            ],
            [
                'id'        => 33,
                'name'      => 'Taungoke',
                'zone_id'   => 9
            ],
            [
                'id'        => 34,
                'name'      => 'Gwa',
                'zone_id'   => 9
            ],
            [
                'id'        => 35,
                'name'      => 'Mawlamying',
                'zone_id'   => 7
            ],
            [
                'id'        => 36,
                'name'      => 'Kyaik Hto',
                'zone_id'   => 7
            ],
            [
                'id'        => 37,
                'name'      => 'Setse',
                'zone_id'   => 7
            ],
            [
                'id'        => 38,
                'name'      => 'Tha Htone',
                'zone_id'   => 7
            ],
            [
                'id'        => 39,
                'name'      => 'Yay',
                'zone_id'   => 7
            ],
            [
                'id'        => 40,
                'name'      => 'Bee Lin',
                'zone_id'   => 7
            ],
            [
                'id'        => 41,
                'name'      => 'Mudone',
                'zone_id'   => 7
            ],
            [
                'id'        => 42,
                'name'      => 'Than Phyu Zayat',
                'zone_id'   => 7
            ],
            [
                'id'        => 43,
                'name'      => 'Paung',
                'zone_id'   => 7
            ],
            [
                'id'        => 44,
                'name'      => 'Kyaing Tong',
                'zone_id'   => 21
            ],
            [
                'id'        => 45,
                'name'      => 'Tachileik',
                'zone_id'   => 21
            ],
            [
                'id'        => 46,
                'name'      => 'Mai Set',
                'zone_id'   => 21
            ],
            [
                'id'        => 47,
                'name'      => 'FDI',
                'zone_id'   => 21
            ],
            [
                'id'        => 48,
                'name'      => 'Bago',
                'zone_id'   => 10
            ],
            [
                'id'        => 49,
                'name'      => 'Taungoo',
                'zone_id'   => 10
            ],
            [
                'id'        => 50,
                'name'      => 'Pauk Khaung',
                'zone_id'   => 10
            ],
            [
                'id'        => 51,
                'name'      => 'Tharyarwaddy',
                'zone_id'   => 10
            ],
            [
                'id'        => 52,
                'name'      => 'Latpathan',
                'zone_id'   => 10
            ],
            [
                'id'        => 53,
                'name'      => 'Deik U',
                'zone_id'   => 10
            ],
            [
                'id'        => 54,
                'name'      => 'Putao',
                'zone_id'   => 12
            ],
            [
                'id'        => 55,
                'name'      => 'Myitkyina',
                'zone_id'   => 12
            ],
            [
                'id'        => 56,
                'name'      => 'Bamaw',
                'zone_id'   => 12
            ],
            [
                'id'        => 57,
                'name'      => 'Hpa Kant',
                'zone_id'   => 12
            ],
            [
                'id'        => 58,
                'name'      => 'Moe Nyin',
                'zone_id'   => 12
            ],
            [
                'id'        => 59,
                'name'      => 'Wine Maw',
                'zone_id'   => 12
            ],
            [
                'id'        => 60,
                'name'      => 'Monywa',
                'zone_id'   => 19
            ],
            [
                'id'        => 61,
                'name'      => 'Sagaing',
                'zone_id'   => 19
            ],
            [
                'id'        => 62,
                'name'      => 'Kalay',
                'zone_id'   => 19
            ],
            [
                'id'        => 63,
                'name'      => 'Kathar',
                'zone_id'   => 19
            ],
            [
                'id'        => 64,
                'name'      => 'Shwe Bo',
                'zone_id'   => 19
            ],
            [
                'id'        => 65,
                'name'      => 'Yin Mar Pin',
                'zone_id'   => 19
            ],
            [
                'id'        => 66,
                'name'      => 'Dawei',
                'zone_id'   => 18
            ],
            [
                'id'        => 67,
                'name'      => 'Myeik',
                'zone_id'   => 18
            ],
            [
                'id'        => 68,
                'name'      => 'Kaw Thaung',
                'zone_id'   => 18
            ],
            [
                'id'        => 69,
                'name'      => 'Bote Pyin',
                'zone_id'   => 18
            ],
            [
                'id'        => 70,
                'name'      => 'FDI (Thanintaryi)',
                'zone_id'   => 18
            ],
            [
                'id'        => 71,
                'name'      => 'Pyin Oo Lwin',
                'zone_id'   => 15
            ],
            [
                'id'        => 72,
                'name'      => 'Mogok',
                'zone_id'   => 15
            ],
            [
                'id'        => 73,
                'name'      => 'Hpa-An',
                'zone_id'   => 14
            ],
            [
                'id'        => 74,
                'name'      => 'Myawaddy',
                'zone_id'   => 14
            ],
            [
                'id'        => 75,
                'name'      => 'Kyar Inn Seik Gyi',
                'zone_id'   => 14
            ],
            [
                'id'        => 76,
                'name'      => 'Hsipaw',
                'zone_id'   => 17
            ],
            [
                'id'        => 77,
                'name'      => 'Lashio',
                'zone_id'   => 17
            ],
            [
                'id'        => 78,
                'name'      => 'Muse',
                'zone_id'   => 17
            ],
            [
                'id'        => 79,
                'name'      => 'Kyauk Me',
                'zone_id'   => 17
            ],
            [
                'id'        => 80,
                'name'      => 'Naung Hkio',
                'zone_id'   => 17
            ],
            [
                'id'        => 81,
                'name'      => 'Ho Pan',
                'zone_id'   => 17
            ],
            [
                'id'        => 82,
                'name'      => 'Tant Yan',
                'zone_id'   => 17
            ],
            [
                'id'        => 83,
                'name'      => 'Laukkai',
                'zone_id'   => 17
            ],
            [
                'id'        => 84,
                'name'      => 'Kuttkhai',
                'zone_id'   => 17
            ],
            [
                'id'        => 85,
                'name'      => 'Pyay',
                'zone_id'   => 11
            ],
            [
                'id'        => 86,
                'name'      => 'Magway',
                'zone_id'   => 8
            ],
            [
                'id'        => 87,
                'name'      => 'Minbu',
                'zone_id'   => 8
            ],
            [
                'id'        => 88,
                'name'      => 'Ye Nan Chaung',
                'zone_id'   => 8
            ],
            [
                'id'        => 89,
                'name'      => 'Pakokku',
                'zone_id'   => 8
            ],
            [
                'id'        => 90,
                'name'      => 'Taung Dwin Gyi',
                'zone_id'   => 8
            ],
            [
                'id'        => 91,
                'name'      => 'Pwint Phyu',
                'zone_id'   => 8
            ],
            [
                'id'        => 92,
                'name'      => 'Sa Lin',
                'zone_id'   => 8
            ],
            [
                'id'        => 93,
                'name'      => 'Loikaw',
                'zone_id'   => 13
            ],
            [
                'id'        => 94,
                'name'      => 'Demawso',
                'zone_id'   => 13
            ],
            [
                'id'        => 95,
                'name'      => 'Hpasawng',
                'zone_id'   => 13
            ],
            [
                'id'        => 96,
                'name'      => 'Kanpetlat',
                'zone_id'   => 20
            ],
            [
                'id'        => 97,
                'name'      => 'Mindat',
                'zone_id'   => 20
            ],
        ];

        SubZone::insert($subZones);
    }
}
