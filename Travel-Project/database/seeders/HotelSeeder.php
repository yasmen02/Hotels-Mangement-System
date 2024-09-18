<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    public function run()
    {
        // Create 10 hotels
        Hotel::factory()->count(10)->create();
    }
}

