<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexPricingProfilesRequest;
use App\Repositories\PricingProfilesRepository;
use Illuminate\Http\Response;

class PricingProfilesController extends Controller
{
    public function index(IndexPricingProfilesRequest $request): Response {
        $repository = new PricingProfilesRepository();
        $totalPrice = $repository->getPriceByDates(
            $request->date("start_date"),
            $request->date("end_date")
        );

        return response($totalPrice);
    }
}
