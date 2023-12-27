<?php

namespace Database\Seeders;

use App\Models\Amenties;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmenitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Amenties::insert([
            ['amenity'=>'Free Wi-fi','icon'=>'ri-wifi-line'],
            ['amenity'=>'Parking','icon'=>'ri-parking-box-line'],
            ['amenity'=>'Garden','icon'=>' ri-leaf-line'],
            ['amenity'=>'Swimming Pool','icon'=>'ri-bubble-chart-line'],
            ['amenity'=>'TV','icon'=>'ri-tv-2-line'],
            ['amenity'=>'Air Conditioning','icon'=>'ri-windy-line'],
            ['amenity'=>'24x7 Service','icon'=>'ri-24-hours-line'],
            ['amenity'=>'Pets Allowed','icon'=>'ri-baidu-line'],
        ]);
    }
}
