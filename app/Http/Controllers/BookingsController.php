<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingsRequest;
use App\Repositories\BookingsRepository;
use Illuminate\Http\Response;

class BookingsController extends Controller
{
    private BookingsRepository $repository;

    public function __construct (BookingsRepository $repository) {
        $this->repository = $repository;
    }

    public function store(StoreBookingsRequest $request): Response {

        $this->repository->store($request);

        return response("created", Response::HTTP_CREATED);
    }
}
