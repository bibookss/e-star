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
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Please upload an image',
            'image.file' => 'Please upload a valid image file',
            'image.mimes' => 'The image must be a JPEG, PNG, or JPG file',
            'image.max' => 'The image must be no larger than 2 MB',
        ];
    }
}
