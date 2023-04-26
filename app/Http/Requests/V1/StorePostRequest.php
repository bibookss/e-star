<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'dormId' => 'required|integer',
            'review' => 'required|string',
            'locationRating' => 'required|integer|between:1,5',
            'securityRating' => 'required|integer|between:1,5',
            'internetRating' => 'required|integer|between:1,5',
            'bathroomRating' => 'required|integer|between:1,5',
        ];
    }
}
