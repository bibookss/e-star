<?php

namespace App\Http\Requests\V1;

use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;

class UpdateImageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'string|unique:images,name|max:255',
            'path' => 'string|max:255',
        ];
    }
}
