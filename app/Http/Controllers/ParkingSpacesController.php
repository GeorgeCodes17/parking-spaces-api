<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexParkingSpacesRequest;
use App\Models\ParkingSpaces;

class ParkingSpacesController extends Controller
{
    public function index(IndexParkingSpacesRequest $request) {
        return ParkingSpaces::leftJoin('bookings', 'bookings._fk_parking_space', '=', 'parking_spaces.id')
        ->whereNull("bookings.id")
        ->orWhereRaw(
            '? NOT BETWEEN bookings.start AND bookings.end AND ? NOT BETWEEN bookings.start AND bookings.end',
            [$request->getStartDate(), $request->getEndDate()]
        )
        ->select("parking_spaces.id")
        ->get();
    }
}