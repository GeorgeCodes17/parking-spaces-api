<?php

namespace App\Repositories;

use App\Models\PricingProfiles;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PricingProfilesRepository {
    public function getByDates(Carbon $startDate, Carbon $endDate): int {
        $totalPrice = 0;
        while (!$startDate->equalTo($endDate)) {
            $totalPrice += PricingProfiles::select("pricing_profiles.price")
                ->whereRaw(
                    '? BETWEEN pricing_profiles.from AND pricing_profiles.end',
                    [$startDate]
                )
                ->first()->price;

            $startDate->addDay();
        }

        return $totalPrice;
    }
}