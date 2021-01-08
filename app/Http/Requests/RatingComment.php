<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatingComment extends FormRequest
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
        $rules = [
            'rating' => 'required',
        ];

        return $rules;
    }
    public function messages(){
        return [
            'rating.required' => 'Bạn phải chọn số sao',
        ];
    }
}
