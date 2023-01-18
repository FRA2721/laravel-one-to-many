<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //false to true boolean value
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => ["required", "max:150", "unique:posts"],
            "type_id" => ["nullable", "exists:types,id"],
            "description" => ["nullable"],
            "link" => ["max:255"],
            "cover_image" => ["nullable", "image", "max:512"],
        ];
    }
}
