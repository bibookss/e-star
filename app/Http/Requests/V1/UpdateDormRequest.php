<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => 'required|string|max:100',
            "locationId" => 'integer',
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
}
