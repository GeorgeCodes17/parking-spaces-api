<?php

namespace Database\Seeders;

use App\Models\ParkingSpaces;
use Illuminate\Database\Seeder;

class ParkingSpacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParkingSpaces::factory()
            ->count(10)
            ->create();
    }
}
