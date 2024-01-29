<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexParkingSpacesRequest;
use App\Repositories\ParkingSpacesRepository;
use Illuminate\Http\Response;

class ParkingSpacesController extends Controller
{
    private ParkingSpacesRepository $repository;

    public function __construct (ParkingSpacesRepository $repository) {
        $this->repository = $repository;
    }

    public function index(IndexParkingSpacesRequest $request): Response {
        $parkingSpaces = $this->repository->getFreeSpacesByDates(
            $request->getStartDate(),
            $request->getEndDate()
        );

        return response($parkingSpaces);
    }
}
