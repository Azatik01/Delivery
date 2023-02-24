<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:2'],
            'picture' => ['image', 'required'],
            'price' => ['required', 'numeric'],
            'description' => ['max:512', 'min:10'],
            'cafe_id' => ['required'],
            'kitchen_id' => ['']
        ];
    }
}
