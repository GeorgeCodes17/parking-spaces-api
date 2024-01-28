<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexPricingProfilesRequest;
use App\Models\PricingProfiles;
use Illuminate\Http\Response;

class PricingProfilesController extends Controller
{
    public function index(IndexPricingProfilesRequest $request): Response {
        $model = new PricingProfiles();
        $totalPrice = $model->getPriceByDates(
            $request->date("start_date"),
            $request->date("end_date")
        );

        return response($totalPrice);
    }
}
