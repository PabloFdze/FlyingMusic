<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|min:1|max:50', //Otra manera de validar: ['required','min:3','max:255']
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:50',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function message(){
        return[
            'name.required' => 'The :attribute is required',
            'name.min' => 'The minimun characters for :attribute is 3',
            'name.max' => 'The maximun characters for :attribute is 255',
            'email.required' => 'The :attribute is required',
            'email.unique' => 'The :attribute must be unique',
            'password.required' => 'The :attribute is required',
            'password.min' => 'The minimun characters for :attribute is 8',
            'password.max' => 'The maximun characters for :attribute is 50',
            'email.email' => 'The :attribute must be a valid email address',
            
        ];
    }

    public function attributes(){
        return[
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }
}
