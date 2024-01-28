<?php

namespace App\Repositories;

use App\Models\ParkingSpaces;
use Illuminate\Database\Eloquent\Collection;

class ParkingSpacesRepository {
    public function getByDates(string $startDate, string $endDate): Collection {
        return ParkingSpaces::leftJoin('bookings', 'bookings._fk_parking_space', '=', 'parking_spaces.id')
        ->whereNull("bookings.id")
        ->orWhereRaw(
            '? NOT BETWEEN bookings.start AND bookings.end AND ? NOT BETWEEN bookings.start AND bookings.end',
            [$startDate, $endDate]
        )
        ->select("parking_spaces.id")
        ->get();

    }
}