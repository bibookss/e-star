<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'locationRating' => 'integer|between:1,5',
            'securityRating' => 'integer|between:1,5',
            'internetRating' => 'integer|between:1,5',
            'bathroomRating' => 'integer|between:1,5',
        ];
    }
}
