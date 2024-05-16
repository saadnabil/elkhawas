<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCouponForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required' , 'string', 'max:10'],
            'description' => ['nullable' , 'string' ,'max:30'],
            'discount' => ['required' , 'numeric' ,'min:0', 'max:100'],
            'quantity' => ['required' , 'numeric' ,'min:1'],
            'valid_from' => ['required' , 'date','after_or_equal:' . now()->format('Y-m-d h:i:s')],
            'valid_to' => ['required' , 'date','after_or_equal:valid_from'],
        ];

    }
}
