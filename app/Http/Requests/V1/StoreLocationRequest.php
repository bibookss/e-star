<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "barangay" => "required|string|max:100",
            "city" => "required|string|max:100",
            "street" => "required|string|max:100",
        ];
    }
}
