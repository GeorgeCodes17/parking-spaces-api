<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParkingSpaces>
 */
class ParkingSpacesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fake = fake();
        return [
            'name' => $fake->name(),
            'latitude' => $fake->randomFloat(4, -90, 90),
            'longitude' => $fake->randomFloat(4, -180, 180),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
