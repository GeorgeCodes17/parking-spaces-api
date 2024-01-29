<?php

namespace App\Repositories;

use App\Models\ParkingSpaces;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class ParkingSpacesRepository {
    public function getFreeSpacesByDates(Carbon $startDate, Carbon $endDate): Collection {
        // Make sure that if there is any booking attached to parking space at the time they want it will not select that space
        return ParkingSpaces::whereRaw("
            NOT EXISTS (
                SELECT 1
                FROM bookings AS b
                WHERE b._fk_parking_space = parking_spaces.id AND 
                (
                    ? BETWEEN b.start AND b.end OR
                    ? BETWEEN b.start AND b.end
                )
                LIMIT 1
            )
            ", [$startDate, $endDate]
        )->get();
    }
}