<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class IndexPricingProfilesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "start_date" => 'required|date_format:Y-m-d|before:end_date',
            "end_date" => 'required|date_format:Y-m-d|after:start_date'
        ];
    }

    public function getStartDate(): Carbon {
        return $this->date("start_date", "Y-m-d");
    }

    public function getEndDate(): Carbon {
        return $this->date("end_date", "Y-m-d");
    }
}
