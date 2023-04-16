<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illiminate\Validation\Rule;

class StoreDormRequest extends FormRequest
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
            "locationId" => "integer",
            "name" => 'required|string|max:100',
        ];
    }

     function prepareForValidation() {
        $this->merge([
            "location_id" => $this->locationId,
        ]);
    }
}
