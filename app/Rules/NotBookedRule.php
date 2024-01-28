<?php

namespace App\Rules;

use App\Repositories\BookingsRepository;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class NotBookedRule implements DataAwareRule, ValidationRule
{
    protected int $parkingSpace;
    protected Carbon $startDate;
    protected Carbon $endDate;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $bookingsRepository = new BookingsRepository();
        $bookable = $bookingsRepository->isBookable(
            $this->parkingSpace,
            $this->startDate,
            $this->endDate
        );

        if (!$bookable) {
            $fail("Parking space already booked");
        }
    }

    /**
     * Set the data under validation.
     *
     * @param  array<string, mixed>  $data
     */
    public function setData(array $data): static
    {
        $this->parkingSpace = $data['parking_space'];
        $this->startDate = Carbon::createFromFormat('Y-m-d-H:i', $data['start_date']);
        $this->endDate = Carbon::createFromFormat('Y-m-d-H:i', $data['end_date']);
 
        return $this;
    }
}
