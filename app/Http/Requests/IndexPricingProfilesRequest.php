<?php

namespace App\Http\Requests;

class IndexPricingProfilesRequest extends AbstractRequest
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
}
