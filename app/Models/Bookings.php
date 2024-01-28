<?php

namespace App\Models;

use App\Http\Requests\StoreBookingsRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    private function store(StoreBookingsRequest $request): void {
        $this->create($request);
    }
}
