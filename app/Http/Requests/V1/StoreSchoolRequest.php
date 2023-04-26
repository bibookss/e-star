<?php

namespace App\Http\Requests\V1;

use App\Models\Dorm;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'locationId' => 'required|integer',
            'name' => [
                'string', 
                'max:255',
                Rule::unique('schools', 'name')->where(function ($query) {
                    $locationId = $this->input('locationId');
                    return $query->where('location_id', $locationId);
                }),
            ],
            'dorms' => [
                'array',
                function ($attribute, $value, $fail) {
                    foreach ($value as $item) {
                        if (!is_int($item)) {
                            $fail("The $attribute must be an array of integers.");
                        }
                    }
                },
            ],
        ];
    }
}
