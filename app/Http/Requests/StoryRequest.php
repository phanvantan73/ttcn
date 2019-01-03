<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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
            'name' => 'required|string',
            'image' => 'required|image',
            'description' => 'required|string',
            'num_of_chaps' => 'numeric',
            'category_id' => 'required|numeric',
            'carousel' => 'image',
        ];
    }
}
