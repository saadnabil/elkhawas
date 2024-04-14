<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

            'name' => 'required|string|max:250',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,gif,svg',
            'usercode' => 'nullable',
            'status' => 'nullable',
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
            

            //
        ];
    }
}
