<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ValidateItemForm extends FormRequest
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
            'title.*' => ['required', 'string' ,'max:250'],
            'item_name.*' => ['required','string','max:250'],
            'description.*' => ['required', 'string'],
            'unit.*' => ['required', 'string' ,'max:250'],
            'units_number' => ['required', 'numeric' ,'min:1'],
            'unit_price' => ['required', 'numeric' ,'min:1'],
            'total_price' => ['required', 'numeric' ,'min:1'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,giv,svg'],
        ];
    }
}
