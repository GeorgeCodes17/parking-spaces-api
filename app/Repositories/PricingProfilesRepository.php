<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PricingProfilesRepository {
    public function getByDates(Carbon $startDate, Carbon $endDate): int {
        $totalPrice = 0;
        while (!$startDate->equalTo($endDate)) {
            $totalPrice += DB::table("pricing_profiles as p")
                ->select(DB::raw("p.price"))
                ->whereRaw(
                    '? BETWEEN p.from AND p.end',
                    [$startDate]
                )
                ->first()->price;

            $startDate->addDay();
        }

        return $totalPrice;
    }
}