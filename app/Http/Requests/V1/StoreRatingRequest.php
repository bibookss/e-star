<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreRatingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "userId" => "required|integer",
            "dormId" => "required|integer",
            "locationRating" => "required|integer|between:1,5",
            "securityRating" => "required|integer|between:1,5",
            "internetRating" => "required|integer|between:1,5",
            "bathroomRating" => "required|integer|between:1,5",
        ];
    }
}
