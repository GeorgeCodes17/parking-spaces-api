<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexPricingProfilesRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PricingProfilesController extends Controller
{
    public function index(IndexPricingProfilesRequest $request): Response {
        $startDate = $request->date("start_date");
        $endDate = $request->date("end_date");
        
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

        return response($totalPrice);
    }
}
