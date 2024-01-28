<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PricingProfiles extends Model
{
    public function getPriceByDates(Carbon $startDate, Carbon $endDate): int {
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
