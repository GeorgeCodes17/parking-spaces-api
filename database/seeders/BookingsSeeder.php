<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("bookings")->insert([
            [
                'id' => 1,
                'email' => 'exampleemail1@example.com',
                '_fk_parking_space' => 1,
                '_fk_pricing_profile' => 1,
                'start' => '2024-04-24 18:15:00',
                'end' => '2024-04-24 21:15:00',
                'is_cancelled' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'email' => 'examplecancelledemail2@example.com',
                '_fk_parking_space' => 4,
                '_fk_pricing_profile' => 1,
                'start' => '2024-04-29 12:15:00',
                'end' => '2024-04-29 19:00:00',
                'is_cancelled' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'email' => 'exampleemail3@example.com',
                '_fk_parking_space' => 6,
                '_fk_pricing_profile' => 2,
                'start' => '2024-07-01 14:00:00',
                'end' => '2024-07-01 18:45:00',
                'is_cancelled' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
