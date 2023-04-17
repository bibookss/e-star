<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLocationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "barangay" => "nullable|string|max:100",
            "city" => "nullable|string|max:100",
            "street" => "nullable|string|max:100",
        ];
    }
}
