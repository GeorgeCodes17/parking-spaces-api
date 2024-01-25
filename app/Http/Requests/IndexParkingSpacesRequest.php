<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexParkingSpacesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "start_date" => 'required|date_format:Y-m-d-H:i',
            "end_date" => 'required|date_format:Y-m-d-H:i'
        ];
    }

    public function getStartDate(): string {
        return $this->get("start_date");
    }

    public function getEndDate(): string {
        return $this->get("end_date");
    }
}
