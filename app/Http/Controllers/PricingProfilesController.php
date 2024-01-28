<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexPricingProfilesRequest;
use App\Repositories\PricingProfilesRepository;
use Illuminate\Http\Response;

class PricingProfilesController extends Controller
{
    private PricingProfilesRepository $repository;

    public function __construct (PricingProfilesRepository $repository) {
        $this->repository = $repository;
    }

    public function index(IndexPricingProfilesRequest $request): Response {
        $totalPrice = $this->repository->getByDates(
            $request->getStartDate(),
            $request->getEndDate()
        );

        return response($totalPrice);
    }
}
