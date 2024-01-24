<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricingProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("pricing_profiles")->insert([
            [
                'id' => 1,
                'name' => 'Spring Pricing',
                'price' => 13.99,
                'priority' => 1,
                'from' => '2024-03-20',
                'end' => '2024-06-20',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'name' => 'Summer Pricing',
                'price' => 10.99,
                'priority' => 1,
                'from' => '2024-06-21',
                'end' => '2024-09-21',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'name' => 'Summer Holidays Pricing',
                'price' => 16.49,
                'priority' => 2,
                'from' => '2024-06-28',
                'end' => '2024-09-05',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'name' => 'Autumn Pricing',
                'price' => 8.99,
                'priority' => 1,
                'from' => '2024-09-22',
                'end' => '2024-12-20',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'name' => 'Winter Pricing',
                'price' => 7.99,
                'priority' => 1,
                'from' => '2024-12-21',
                'end' => '2024-03-19',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
