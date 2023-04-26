<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illiminate\Validation\Rule;

class StoreDormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "locationId" => "required|integer",
            "name" => 'required|string|max:100',
            'schools' => [
                'array',
                function ($attribute, $value, $fail) {
                    foreach ($value as $item) {
                        if (!is_int($item)) {
                            $fail("The $attribute must be an array of integers.");
                        }
                    }
                },
            ]
        ];
    }

     function prepareForValidation() {
        $this->merge([
            "location_id" => $this->locationId,
        ]);
    }
}
