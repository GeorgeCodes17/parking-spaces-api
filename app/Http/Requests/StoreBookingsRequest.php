<?php

namespace App\Http\Requests;

use App\Rules\NotBookedRule;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookingsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'email',
            'parking_space' => ['exists:parking_spaces,id', new NotBookedRule()],
            'pricing_profile' => 'exists:pricing_profiles,id',
            'start_date' => 'date_format:Y-m-d-H:i',
            'start_date' => 'date_format:Y-m-d-H:i'
        ];
    }

    public function getEmail(): string {
        return $this->get("email");
    }

    public function getParkingSpace(): int {
        return $this->get("parking_space");
    }

    public function getPricingProfile(): int {
        return $this->get("pricing_profile");
    }

    public function getStart(): Carbon {
        return $this->date("start_date", "Y-m-d-H:i");
    }

    public function getEnd(): Carbon {
        return $this->date("end_date", "Y-m-d-H:i");
    }
}
