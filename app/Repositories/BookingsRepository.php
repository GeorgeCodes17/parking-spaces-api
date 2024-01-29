<?php

namespace App\Repositories;

use App\Http\Requests\StoreBookingsRequest;
use App\Models\Bookings;
use Carbon\Carbon;

class BookingsRepository {
    public function store(StoreBookingsRequest $request): bool {
        $model = new Bookings;
        $model->email = $request->getEmail();
        $model->_fk_parking_space = $request->getParkingSpace();
        $model->_fk_pricing_profile = $request->getPricingProfile();
        $model->start = $request->getStart();
        $model->end = $request->getEnd();

        return $model->save();
    }

    public function isBookable(
        int $parkingSpace,
        Carbon $startDate,
        Carbon $endDate
    ): bool {
        // I wanted to return false if record is found, not inverse, as it will be more efficient
        $bookedId = Bookings::where("_fk_parking_space", $parkingSpace)
            ->whereNull("is_cancelled")
            ->whereRaw('
                ? BETWEEN start AND end OR
                ? BETWEEN start AND end
            ', [$startDate, $endDate])
            ->first("id");
        
        return $bookedId === null;
    }
}