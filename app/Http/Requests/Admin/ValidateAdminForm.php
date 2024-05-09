<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAdminForm extends FormRequest
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
        $id = $this->route('admin')->id ?? null;
        if(request()->isMethod('post')){
            return [
                'name' => ['required' , 'string' ,'max:255'],
                'email' => ['required' , 'email' ,'unique:admins,email'],
                'password' => ['required' , 'string'],
                'repassword' => ['required_with:password' , 'string','same:password'],
                'phone' => ['required' , 'string' ],
                'status' => ['required' ],
                'image' => ['nullable', 'image' , 'mimes:png,jpg,jpeg,gif,svg'],
                'role' => ['required' , 'string'],
            ];
        }else{
            return [
                'name' => ['required' , 'string' ,'max:255'],
                'email' => ['required' , 'email' ,'unique:admins,email,'.$id],
                'password' => ['nullable' , 'string'],
                'repassword' => ['nullable','required_with:password', 'string','same:password'],
                'phone' => ['required' , 'string' ],
                'status' => ['required' ],
                'image' => ['nullable', 'image' , 'mimes:png,jpg,jpeg,gif,svg'],
                'role' => ['required' , 'string'],
            ];
        }
    }
}
