<?php

use App\Http\Controllers\ParkingSpacesController;
use App\Http\Controllers\PricingProfilesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get("parking-spaces", [ParkingSpacesController::class, 'index']);
Route::get("pricing-profiles", [PricingProfilesController::class, 'index']);
