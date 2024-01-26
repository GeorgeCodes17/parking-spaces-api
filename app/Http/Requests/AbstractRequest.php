<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class AbstractRequest extends FormRequest {
    public function getStartDate(): string {
        return $this->get("start_date");
    }

    public function getEndDate(): string {
        return $this->get("end_date");
    }
}